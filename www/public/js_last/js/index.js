function simulateTask(time) {
    return new Promise(resolve => {
        setTimeout(() => resolve("Операция завершилась"), time);
    });
}

function checkStatus(taskPromise) {
    let isCompleted = false;
    let result = null;
    taskPromise.then((res) => {
       isCompleted = true;
       result = res;
    });

    const interval = setInterval(() => {
        if (isCompleted) {
            clearInterval(interval);
            addStatusMessage(result);
        }
        else {
            addStatusMessage("Операция выполняется");
        }
    }, 2000);
}

function addStatusMessage(message) {
    const container = document.getElementById("status");
    const element = document.createElement("div");
    element.className = "status-item";
    element.textContent = message;
    container.appendChild(element);
}

document.getElementById("startBtn").addEventListener("click", () => {
    addStatusMessage("Задача началась");
        const taskPromise = simulateTask(20000);
        checkStatus(taskPromise);
});