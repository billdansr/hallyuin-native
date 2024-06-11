document.addEventListener('DOMContentLoaded', function () {
    const categories = document.querySelectorAll('.category-btn');
    categories.forEach(category => {
        category.addEventListener('click', function () {
            const selectedCategory = this.dataset.category;
            console.log(selectedCategory); // For debugging purposes
            loadProductsByCategory(selectedCategory);
        });
    });
});

function loadProductsByCategory(category) {
    // Example function to load products by category
    const productList = document.getElementById('list');
    const exampleProducts = [
        { name: 'Album 1', category: 'album', image: '/hallyuin-native-main/assets/example1.jpg' },
        { name: 'Merchandise 1', category: 'merchandise', image: '/hallyuin-native-main/assets/example2.jpg' },
        { name: 'Photobook 1', category: 'photobook', image: '/hallyuin-native-main/assets/example3.jpg' },
        { name: 'Disc 1', category: 'disc', image: '/hallyuin-native-main/assets/example4.jpg' },
        // Add more products here
    ];

    // Filter products by category
    const filteredProducts = exampleProducts.filter(product => product.category === category);

    if (filteredProducts.length > 0) {
        productList.innerHTML = ''; // Clear previous products
        filteredProducts.forEach(product => {
            const productElement = document.createElement('div');
            productElement.classList.add('col');
            productElement.innerHTML = `
                <div class="card">
                    <img src="${product.image}" class="card-img-top" alt="${product.name}">
                    <div class="card-body">
                        <h5 class="card-title">${product.name}</h5>
                        <p class="card-text">Description of ${product.name}</p>
                    </div>
                </div>
            `;
            productList.appendChild(productElement);
        });
    } else {
        console.log(`No products found for category: ${category}`);
        // Optionally, you can add a message to notify that no products were found
        productList.innerHTML = '<p>No products found for the selected category.</p>';
    }
}
