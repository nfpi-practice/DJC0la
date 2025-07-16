let startCount = prompt("Введите сколько раз вызвать функцию");
let counter = createCounter();

for (i = 0; i < startCount; i++) {
    let result = counter();
    alert(result);
}

function createCounter() {
    let count = 0;

    return function () {
        count += 1;
        return count;
    }
}
