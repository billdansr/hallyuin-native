const products = [
	// { name: "Product 1", price: "$40.00", imgSrc: "https://dummyimage.com/450x300/dee2e6/6c757d.jpg" },
	// { name: "Product 2", price: "$50.00", imgSrc: "https://dummyimage.com/450x300/dee2e6/6c757d.jpg" },
	// { name: "Product 2", price: "$50.00", imgSrc: "https://dummyimage.com/450x300/dee2e6/6c757d.jpg" },
	// { name: "Product 2", price: "$50.00", imgSrc: "https://dummyimage.com/450x300/dee2e6/6c757d.jpg" },
	// { name: "Product 2", price: "$50.00", imgSrc: "https://dummyimage.com/450x300/dee2e6/6c757d.jpg" },
	// { name: "Product 5", price: "$50.00", imgSrc: "https://dummyimage.com/450x300/dee2e6/6c757d.jpg" },
	// { name: "Product 2", price: "$50.00", imgSrc: "https://dummyimage.com/450x300/dee2e6/6c757d.jpg" },
	// { name: "Product 2", price: "$50.00", imgSrc: "https://dummyimage.com/450x300/dee2e6/6c757d.jpg" },
	// { name: "Product 2", price: "$50.00", imgSrc: "https://dummyimage.com/450x300/dee2e6/6c757d.jpg" },
	// { name: "Product 2", price: "$50.00", imgSrc: "https://dummyimage.com/450x300/dee2e6/6c757d.jpg" },
	// { name: "Product 2", price: "$50.00", imgSrc: "https://dummyimage.com/450x300/dee2e6/6c757d.jpg" },
	// { name: "Product 2", price: "$50.00", imgSrc: "https://dummyimage.com/450x300/dee2e6/6c757d.jpg" },
	// { name: "Product 2", price: "$50.00", imgSrc: "https://dummyimage.com/450x300/dee2e6/6c757d.jpg" },
	// { name: "Product 2", price: "$50.00", imgSrc: "https://dummyimage.com/450x300/dee2e6/6c757d.jpg" },
	// { name: "Product 7", price: "$50.00", imgSrc: "https://dummyimage.com/450x300/dee2e6/6c757d.jpg" },
	// { name: "Product 2", price: "$50.00", imgSrc: "https://dummyimage.com/450x300/dee2e6/6c757d.jpg" },
	// { name: "Product 2", price: "$50.00", imgSrc: "https://dummyimage.com/450x300/dee2e6/6c757d.jpg" },
	// { name: "Product 2", price: "$50.00", imgSrc: "https://dummyimage.com/450x300/dee2e6/6c757d.jpg" },
	// Tambahkan lebih banyak produk di sini
];

const list_element = document.getElementById('list');
const pagination_element = document.getElementById('pagination');

let current_page = 1;
let rows = 6; // Jumlah produk per halaman

// FETCH START
url = 'http://localhost/hallyuin-native/backend/api/v1/merches.php';
options = {
	method: 'GET',
};

fetch(url, options)
.then(response => response.text())
.then(data => {
	data = JSON.parse(data);

	data['data'].forEach(product => {
		products.push({
			name: product.name,
			price: product.price,
			imgSrc: product.image,
		});
	});

	DisplayList(products, list_element, rows, current_page);
	SetupPagination(products, pagination_element, rows);
})
.catch(error => console.error(error));
// FETCH END

function DisplayList(items, wrapper, rows_per_page, page) {
	wrapper.innerHTML = "";
	page--;

	let start = rows_per_page * page;
	let end = start + rows_per_page;
	let paginatedItems = items.slice(start, end);

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

function SetupPagination(items, wrapper, rows_per_page) {
	wrapper.innerHTML = "";

	let page_count = Math.ceil(items.length / rows_per_page);
	for (let i = 1; i < page_count + 1; i++) {
		let btn = PaginationButton(i, items);
		wrapper.appendChild(btn);
	}
}

function PaginationButton(page, items) {
	let button = document.createElement('button');
	button.innerText = page;
	button.classList.add('btn', 'btn-outline-primary', 'mx-1');

	if (current_page == page) button.classList.add('active');

	button.addEventListener('click', function () {
		current_page = page;
		DisplayList(items, list_element, rows, current_page);
		
		let current_btn = document.querySelector('.pagination button.active');
		current_btn.classList.remove('active');

		button.classList.add('active');
	});

	return button;
}

DisplayList(products, list_element, rows, current_page);
SetupPagination(products, pagination_element, rows);
