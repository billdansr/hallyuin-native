
    document.addEventListener('DOMContentLoaded', function () {
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
                input.value = parseInt(input.value) + 1;
                updatePrice(index);
            });
        });

        function updatePrice(index) {
            const priceElement = document.querySelectorAll('.price')[index];
            const unitPrice = parseFloat(priceElement.dataset.unitPrice);
            const quantity = parseInt(quantityInputs[index].value);
            const newPrice = unitPrice * quantity;
            priceElement.textContent = newPrice.toFixed(2);
            updateTotalPrice();
        }

        function updateTotalPrice() {
            let total = 0;
            const priceElements = document.querySelectorAll('.price');
            priceElements.forEach(priceElement => {
                total += parseFloat(priceElement.textContent);
            });
            document.querySelector('.total-price').textContent = total.toFixed(2);
        }

        function updateTotalAmount() {
            let totalPrice = 0;
            let priceElements = document.getElementsByClassName("price");
            for (let i = 0; i < priceElements.length; i++) {
                let unitPrice = parseFloat(priceElements[i].getAttribute("data-unit-price"));
                let quantity = parseInt(priceElements[i].parentElement.querySelector(".quantity").value);
                totalPrice += unitPrice * quantity;
            }
            document.getElementById("total-amount").innerText = totalPrice.toLocaleString();
        }
        
        function moveToWishlist(button) {
            let item = button.parentElement.parentElement;
            let wishlist = document.getElementById("wishlist-items");
            wishlist.appendChild(item);
            button.innerText = "Moved to Wishlist";
            button.disabled = true;
        }
        
        window.onload = function() {
            updateTotalAmount();
        };
        
        // Panggil updateTotalAmount saat tombol increment atau decrement ditekan
        document.querySelectorAll(".increment, .decrement").forEach(item => {
            item.addEventListener("click", updateTotalAmount);
        });
        
    });

// FETCH
let url;

document.addEventListener('DOMContentLoaded', () => {
    url = 'http://localhost/hallyuin-native/backend/auth.php';

    fetch(url)
    .then(response => response.text())
    .then(data => {
        console.log(data);

        data = JSON.parse(data);

        alert(data['message']);
    })
});