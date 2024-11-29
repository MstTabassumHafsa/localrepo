searchForm = document.querySelector('.search-form');

document.querySelector('#search-btn').onclick = () =>{
    searchForm.classList.toggle('active');
}

document.addEventListener('DOMContentLoaded', () => {
    const addToCartButtons = document.querySelectorAll('.btn'); // add-to-cart
    const cartItemCount = document.querySelector('.cart-icon span'); // from header
    const cartItemsList = document.querySelector('.cart-items');
    const cartTotal = document.querySelector('.cart-total');
    const cartIcon = document.querySelector('.cart-icon');
    const sidebar = document.getElementById('sidebar');

    let cartItems = [];
    let totalAmount = 0;

    addToCartButtons.forEach((button) => {
        button.addEventListener('click', (event) => {
            // Get the parent .box element
            const box = event.target.closest('.box');
            const item = {
                name: box.querySelector('.card--title').textContent,
                price: parseFloat(box.querySelector('.price').textContent.slice(1)),
                quantity: 1,
            };

            const existingItem = cartItems.find(
                (cartItem) => cartItem.name === item.name,
            );
            if (existingItem) {
                existingItem.quantity++;
                totalAmount += existingItem.price;
            } else {
                cartItems.push(item);
                totalAmount += item.price;
            }

            updateCartUI();
        });
    });

    function updateCartUI() {
        updateCartItemCount(cartItems.length);
        updateCartItemList();
        updateCartTotal();
    }

    function updateCartItemCount(count) {
        cartItemCount.textContent = count;
    }

    function updateCartItemList() {
        cartItemsList.innerHTML = '';
        cartItems.forEach((item, index) => {
            const cartItem = document.createElement('div');
            cartItem.classList.add('cart-item', 'individual-cart-item');
            cartItem.innerHTML = `
            <span>(${item.quantity}x) ${item.name}</span>
            <span class="cart-item-price">$${(item.price * item.quantity).toFixed(2)}</span>
            <button class="remove-item" data-index="${index}">
                <i class="fa-solid fa-times"></i>
            </button>
            `;
            cartItemsList.append(cartItem);
        });

        const removeButtons = document.querySelectorAll('.remove-item');
        removeButtons.forEach((button) => {
            button.addEventListener('click', (event) => {
                const index = button.getAttribute('data-index');
                removeItemFromCart(index);
            });
        });
    }

    function removeItemFromCart(index) {
        const item = cartItems[index];
        if (item.quantity > 1) {
            item.quantity--;
            totalAmount -= item.price;
        } else {
            totalAmount -= item.price;
            cartItems.splice(index, 1);
        }
        updateCartUI();
    }

    function updateCartTotal() {
        cartTotal.textContent = `$${totalAmount.toFixed(2)}`;
    }

    cartIcon.addEventListener('click', () => {
        sidebar.classList.toggle('open');
    });

    const closeButton = document.querySelector('.sidebar-close');
    closeButton.addEventListener('click', () => {
        sidebar.classList.remove('open');
    });
});






























let loginForm = document.querySelector('.login-form-container');

document.querySelector('#login-btn').onclick = () =>{
    loginForm.classList.toggle('active');
}

document.querySelector('#close-login-btn').onclick = () =>{
    loginForm.classList.remove('active');
}

window.onscroll = () => {
    
    searchForm.classList.remove('active');

    if (window.scrollY > 80) {
        document.querySelector('.header .header-2').classList.add('active');
    } else {
        document.querySelector('.header .header-2').classList.remove('active');
    }




}

window.onload = () => {
    if (window.scrollY > 80) {
        document.querySelector('.header .header-2').classList.add('active');
    } else {
        document.querySelector('.header .header-2').classList.remove('active');
    }

    fadeOut();

}

function loader(){
    document.querySelector('.loader-container').classList.add('active')
}

function fadeOut(){
    setTimeout(loader, 6000);
}

var swiper = new Swiper(".books-slider",{
   
    loop:true,
    centeredSlides: true,
    autoplay:{
        delay: 2000,
        disableOnInteraction: false,
    },
    breakpoints: {
        0: {
            slidesPerView: 1,
        },
        768: {
            slidesPerView: 2,
        },
        1024: {
            slidesPerView: 3,
        },
    },
});

var swiper = new Swiper(".featured-slider",{
    spaceBetween:10,
    loop:true,
    centeredSlides: true,
    autoplay:{
        delay: 9500,
        disableOnInteraction: false,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    breakpoints: {
        0: {
            slidesPerView: 1,
        },
        450: {
            slidesPreView: 2,
        },
        768: {
            slidesPerView: 3,
        },
        1024: {
            slidesPerView: 4,
        },
    },
});

var swiper = new Swiper(".arrivals-slider",{
    spaceBetween:10,
    loop:true,
    centeredSlides: true,
    autoplay:{
        delay: 9500,
        disableOnInteraction: false,
    },
    breakpoints: {
        0: {
            slidesPerView: 1,
        },
        768: {
            slidesPerView: 2,
        },
        1024: {
            slidesPerView: 3,
        },
    },
});

var swiper = new Swiper(".reviews-slider",{
    spaceBetween:10,
    grabCursor:true,
    loop:true,
    centeredSlides: true,
    autoplay:{
        delay: 9500,
        disableOnInteraction: false,
    },
    breakpoints: {
        0: {
            slidesPerView: 1,
        },
        768: {
            slidesPerView: 2,
        },
        1024: {
            slidesPerView: 3,
        },
    },
});

var swiper = new Swiper(".blogs-slider",{
    spaceBetween:10,
    grabCursor:true,
    loop:true,
    centeredSlides: true,
    autoplay:{
        delay: 9500,
        disableOnInteraction: false,
    },
    breakpoints: {
        0: {
            slidesPerView: 1,
        },
        768: {
            slidesPerView: 2,
        },
        1024: {
            slidesPerView: 3,
        },
    },
});