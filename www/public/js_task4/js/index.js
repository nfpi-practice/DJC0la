async function showJson(){
    try {
        let response = await fetch('https://jsonplaceholder.typicode.com/todos/1');
        let result = await response.json();
        return console.log(result);
    }
    catch (error)
    {
        alert(error);
    }
}

showJson();