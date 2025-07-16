document.addEventListener('DOMContentLoaded', function () {
    const text = document.querySelector('.tmp-text');
    const button = document.querySelector('.btn-test');

    button.addEventListener('click', function () {
        text.textContent = 'Кнопка была нажата!';
    });
});
