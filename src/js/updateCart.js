// updateCart.js

function updateCart() {
    console.log("Dishes added");

    // Get the current cart count
    var cartCountElement = document.getElementById('cart-count');
    var currentCount = parseInt(cartCountElement.innerText);

    // Increment the cart count
    var newCount = currentCount + 1;

    // Update the cart count on the page
    cartCountElement.innerText = newCount;
}
