document.addEventListener('DOMContentLoaded', function () {
    const addToCartButtons = document.querySelectorAll('.shop-item .add-to-cart');
    const cartItems = document.getElementById('shop-items');
    const cartTotal = document.getElementById('cart-total');
    let total = 0;

    addToCartButtons.forEach(button => {
        button.addEventListener('click', function () {
            const item = button.closest('.shop-item');
            const itemName = item.getAttribute('data-name');
            const itemPrice = parseFloat(item.getAttribute('data-price'));

            const cartItem = document.createElement('li');
            cartItem.textContent = `${itemName} - $${itemPrice.toFixed(2)}`;
            cartItems.appendChild(cartItem);

            total += itemPrice;
            cartTotal.textContent = total.toFixed(2);
        });
    });
});
