let SearchBtn = document.querySelector('.SearchBtn');
let CloseBtn = document.querySelector('.CloseBtn');
let SearchBox = document.querySelector('.SearchBox');
let navigation = document.querySelector('.navigation');
let header = document.querySelector('header');
let lastScrollPosition = window.pageYOffset;

SearchBtn.onclick = function() {
    SearchBox.classList.add('active');
    CloseBtn.classList.add('active');
    SearchBtn.classList.add('active');
}

CloseBtn.onclick = function() {
    SearchBox.classList.remove('active');
    CloseBtn.classList.remove('active');
    SearchBtn.classList.remove('active');
}

window.addEventListener('scroll', function() {
    let currentScrollPosition = window.pageYOffset;

    if (currentScrollPosition > lastScrollPosition) {
        header.classList.add('hide');
    } else {
        header.classList.remove('hide');
    }

    lastScrollPosition = currentScrollPosition;

    if (currentScrollPosition === 0) {
        header.classList.remove('hide');
    }
});
