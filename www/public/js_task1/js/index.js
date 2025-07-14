let number = prompt("Введите число");

alert(
    isNaN(number) ? "Вы ввели строку" :
    number % 2 == 0 ? "Четное" : "Не четное"
);