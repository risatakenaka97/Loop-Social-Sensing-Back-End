document.querySelector('.burger').addEventListener('click', function() {
    const menu = document.querySelector('.header');
    const burger = document.querySelector('.burger');
    const cross = document.querySelector('.cross');
    if (menu.style.display === 'none' || menu.style.display === '') {
        menu.style.display = 'flex';
        burger.style.display = 'none';
        cross.style.display = 'block';
    }
});
document.querySelector('.cross').addEventListener('click', function() {
    const menu = document.querySelector('.header');
    const burger = document.querySelector('.burger');
    const cross = document.querySelector('.cross');
    if (menu.style.display !== 'none') {
        menu.style.display = '';
        burger.style.display = '';
        cross.style.display = '';
    }
});
