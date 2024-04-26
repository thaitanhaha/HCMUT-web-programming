// scripts.js

// This is where you can add JavaScript functionality
// For example, fetching featured products from an API and dynamically generating HTML
// Here's a simple example:

const productsContainer = document.querySelector(".products");

// Simulated data for featured products
const featuredProducts = [
  { name: "Men's Shirt", price: "$29.99", image: "shirt.jpg" },
  { name: "Women's Dress", price: "$49.99", image: "dress.jpg" },
  { name: "Kid's T-shirt", price: "$19.99", image: "kids-shirt.jpg" },
];

// Function to generate HTML for featured products
function generateFeaturedProducts(products) {
  products.forEach((product) => {
    const productHTML = `
            <div class="product">
                <img src="${product.image}" alt="${product.name}">
                <h3>${product.name}</h3>
                <p>${product.price}</p>
            </div>
        `;
    productsContainer.innerHTML += productHTML;
  });
}

// Call the function to generate featured products
generateFeaturedProducts(featuredProducts);
