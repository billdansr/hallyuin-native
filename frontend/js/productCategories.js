document.addEventListener('DOMContentLoaded', function () {
    const categories = document.querySelectorAll('.category-btn');
    const productList = document.getElementById('list');
    const paginationWrapper = document.getElementById('pagination');
    const rowsPerPage = 6;
    let currentPage = 1;

    const products = [
        { name: 'Album 1', category: 'album', imgSrc: "https://dummyimage.com/450x300/dee2e6/6c757d.jpg" },
        { name: 'Album 1', category: 'album', imgSrc: "https://dummyimage.com/450x300/dee2e6/6c757d.jpg" },
        { name: 'Album 1', category: 'album', image: "https://dummyimage.com/450x300/dee2e6/6c757d.jpg" },
        { name: 'Album 1', category: 'album', image: "https://dummyimage.com/450x300/dee2e6/6c757d.jpg" },
        { name: 'Merchandise 1', category: 'merchandise', image: "https://dummyimage.com/450x300/dee2e6/6c757d.jpg" },
        { name: 'Merchandise 1', category: 'merchandise', image: "https://dummyimage.com/450x300/dee2e6/6c757d.jpg" },
        { name: 'Merchandise 1', category: 'merchandise', image: "https://dummyimage.com/450x300/dee2e6/6c757d.jpg" },
        { name: 'Merchandise 1', category: 'merchandise', image: "https://dummyimage.com/450x300/dee2e6/6c757d.jpg" },
        { name: 'Photobook 1', category: 'photobook', image: "https://dummyimage.com/450x300/dee2e6/6c757d.jpg" },
        { name: 'Photobook 1', category: 'photobook', image: "https://dummyimage.com/450x300/dee2e6/6c757d.jpg" },
        { name: 'Photobook 1', category: 'photobook', image: "https://dummyimage.com/450x300/dee2e6/6c757d.jpg" },
        { name: 'Photobook 1', category: 'photobook', image: "https://dummyimage.com/450x300/dee2e6/6c757d.jpg" },
        { name: 'Disc 1', category: 'disc', image: "https://dummyimage.com/450x300/dee2e6/6c757d.jpg" },
        { name: 'Disc 1', category: 'disc', image: "https://dummyimage.com/450x300/dee2e6/6c757d.jpg" },
        { name: 'Disc 1', category: 'disc', image: "https://dummyimage.com/450x300/dee2e6/6c757d.jpg" },
        { name: 'Disc 1', category: 'disc', image: "https://dummyimage.com/450x300/dee2e6/6c757d.jpg" },

        // Add more products here
    ];

    function loadProductsByCategory(category = null) {
        let filteredProducts;
        if (category) {
            filteredProducts = products.filter(product => product.category === category);
        } else {
            filteredProducts = products;
        }

        displayList(filteredProducts, productList, rowsPerPage, currentPage);
        setupPagination(filteredProducts, paginationWrapper, rowsPerPage);
    }

    function displayList(items, wrapper, rowsPerPage, page) {
        wrapper.innerHTML = "";
        page--;

        let start = rowsPerPage * page;
        let end = start + rowsPerPage;
        let paginatedItems = items.slice(start, end);

        paginatedItems.forEach(item => {
            let itemElement = document.createElement('div');
            itemElement.classList.add('col');
            itemElement.innerHTML = `
                <div class="card h-100">
                    <img class="card-img-top" src="${item.image}" alt="${item.name}" />
                    <div class="card-body p-4">
                        <div class="text-center">
                            <h5 class="fw-bolder">${item.name}</h5>
                        </div>
                    </div>
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center">
                            <a class="btn btn-outline-dark mt-auto" href="#">View options</a>
                        </div>
                    </div>
                </div>
            `;
            wrapper.appendChild(itemElement);
        });
        paginatedItems.forEach(item => {
            let item_element = document.createElement('div');
            item_element.classList.add('col');
            item_element.innerHTML = `
              <div class="card h-100">
                <img class="card-img-top" src="${item.imgSrc}" alt="${item.name}" />
                <div class="card-body p-4">
                  <div class="text-center">
                    <h5 class="fw-bolder">${item.name}</h5>
                    ${item.price}
                  </div>
                </div>
                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                  <div class="text-center">
                    <a class="btn btn-outline-dark mt-auto" href="#">View options</a>
                  </div>
                </div>
              </div>
            `;
            wrapper.appendChild(item_element);
          });

    }

    function setupPagination(items, wrapper, rowsPerPage) {
        wrapper.innerHTML = "";
        let pageCount = Math.ceil(items.length / rowsPerPage);
        for (let i = 1; i <= pageCount; i++) {
            let btn = paginationButton(i, items);
            wrapper.appendChild(btn);
        }
    }

    function paginationButton(page, items) {
        let button = document.createElement('button');
        button.innerText = page;
        button.classList.add('btn', 'btn-outline-primary', 'mx-1');

        if (currentPage === page) button.classList.add('active');

        button.addEventListener('click', function () {
            currentPage = page;
            displayList(items, document.getElementById('list'), rowsPerPage, currentPage);

            let currentBtn = document.querySelector('.pagination button.active');
            currentBtn.classList.remove('active');

            button.classList.add('active');
        });

        return button;
    }

    categories.forEach(category => {
        category.addEventListener('click', function () {
            const selectedCategory = this.dataset.category;
            console.log(selectedCategory); // For debugging purposes
            currentPage = 1; // Reset to the first page
            loadProductsByCategory(selectedCategory);
        });
    });

    // Initial display of all products
    loadProductsByCategory();
});
