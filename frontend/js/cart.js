document.addEventListener('DOMContentLoaded', () => {
    const decrementButtons = document.querySelectorAll('.decrement');
    const incrementButtons = document.querySelectorAll('.increment');
    const quantityInputs = document.querySelectorAll('.quantity');

    decrementButtons.forEach((button, index) => {
        button.addEventListener('click', function () {
            const input = quantityInputs[index];
            if (input.value > 0) {
                input.value = parseInt(input.value) - 1;
                updatePrice(index);
            }
        });
    });

    incrementButtons.forEach((button, index) => {
        button.addEventListener('click', function () {
            const input = quantityInputs[index];
            if (input.value >= 0) {
                input.value = parseInt(input.value) + 1;
                updatePrice(index);
            }
        });
    });

    function updatePrice(index) {
        const priceElement = document.querySelectorAll('.price')[index];
        const unitPrice = parseFloat(priceElement.dataset.unitPrice);
        const quantity = parseInt(quantityInputs[index].value);
        const newPrice = unitPrice * quantity;

        priceElement.textContent = newPrice;
        updateTotalPrice();
    }

    function updateTotalPrice() {
        const priceElements = document.querySelectorAll('.price');
        const totalPriceElement = document.getElementById('total-price');

        let total = 0;

        priceElements.forEach(priceElement => {
            total += parseFloat(priceElement.textContent);
            console.log(total);
        });

        totalPriceElement.innerText = total;
    }
});

// FETCH
let url;

document.getElementById('logoutButton').addEventListener('click', (event) => {
    event.preventDefault();

    url = 'http://localhost/hallyuin-native/backend/logout.php';

    fetch(url)
    .then(response => response.text())
    .then(data => {
        if (data) {
            data = JSON.parse(data);
            alert(data['message']);
            window.location.assign(`http://localhost/hallyuin-native/frontend/${data['redirect']}.php`);
        }
    })
    .catch(error => {
        console.error(error);
        // alert(error);
    });
});

document.addEventListener('DOMContentLoaded', () => {
    url = 'http://localhost/hallyuin-native/backend/auth.php';

    fetch(url)
    .then(response => response.text())
    .then(data => {
        if (data) {
            data = JSON.parse(data);
        }

        if (data['redirect']) {
            alert(data['message']);
            console.log(data['message']);
            window.location.href = `http://localhost/hallyuin-native/frontend/${data['redirect']}.php`;
        }
    })
    .catch(error => {
        console.error(error);
        alert(error);
    });
});

function makeMerch(merch) {
    return `
        <div class="row item">
            <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                <!-- Image -->
                <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
                    <img class="image" src="${merch.image}" class="w-100">
                    <a href="#!">
                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                    </a>
                </div>
            </div>
            <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                <!-- Data -->
                <p class="name">${merch.name}</p>
                <p class="description">${merch.description}</p>
                <p>Kategori : <span class="category">${merch.category}</span></p>
                <button type="button" class="btn btn-detele" style="color: rgb(255, 255, 255); background-color: #fc0505;">Delete</button>
                <button type="button" class="btn btn-move-to-wishlist" style="color: rgb(255, 255, 255); background-color: #f2d541;">Add to Wishlist</button>
            </div>
            <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                <!-- Quantity -->
                <div class="d-flex mb-4" style="max-width: 300px">
                    <button class="btn btn-primary px-3 me-2 decrement" style="background-color: #7D009E;">
                        <i class="fas fa-minus"></i>
                    </button>
                    <input min="0" name="quantity" value="1" type="number" class="form-control quantity">
                    <button class="btn btn-primary px-3 ms-2 increment" style="background-color: #7D009E;">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
                <!-- Price -->
                <p class="text-start text-md-center price" data-unit-price="${merch.price}">
                    ${merch.price}
                </p>
            </div>
        </div>
        <hr class="my-4" />
    `;
}

const merch1 = {
    image: '',
    name: 'Wow',
    description: 'Y',
    category: '1',
    price: 5000.00
};
const merch2 = {
    image: '',
    name: 'Wow',
    description: 'Y',
    category: '1',
    price: 5000.00
};

document.getElementById('shopping-cart').innerHTML += makeMerch(merch1);
document.getElementById('shopping-cart').innerHTML += makeMerch(merch2);

document.getElementById('checkoutButton').addEventListener('click', () => {
    const rows = document.querySelectorAll('row');

    const order = [];

    url = 'http://localhost/hallyuin-native/backend/api/v1/orders.php';
    options = {
        method: 'POST',
    };

    fetch(url, options)
    .then(response => response.text())
    .then(data => {
        console.log(data);

        data = JSON.parse(data);

        rows.forEach(row => {
            const orderDetail = new FormData();
            orderDetail.append('order-id', data['order-id']);
            orderDetail.append('name', row.querySelector('.name').textContent);
            orderDetail.append('quantity-ordered', row.querySelector('input[name="quantity"]').value);

            // const orderDetail = {
            //     'order-id': data['orderId'],
            //     'name': row.querySelector('.name').textContent,
            //     'quantity-ordered': row.querySelector('input[name="quantity"]').value,
            // };

            url = 'http://localhost/hallyuin-native/backend/api/v1/orderdetails.php';
            options = {
                method: 'POST',
                headers: 'application/x-www-form-urlencoded',
                body: orderDetail,
            };

            fetch(url, options)
            .then(response => response.text())
            .then(data => {
                console.log(data);
            })
            .catch(error => {
                console.error(error);
                alert(error);
            });
        });
    })
    .catch(error => {
        console.error(error);
        alert(error);
    });
});