let url, options;

document.getElementById('loginForm').addEventListener('submit', (event) => {
    event.preventDefault();

    url = 'http://localhost/hallyuin-native/backend/login.php';
    options = {
        method: 'POST',
        body: new FormData(event.target)
    };

    fetch(url, options)
    .then(response => response.text())
    .then(data => {
        console.log(data);

        data = JSON.parse(data);
        
        alert(data['message']);
        window.location.replace(`http://localhost/hallyuin-native/frontend/${data['redirect']}.php`);
    })
    .catch(error => {
        console.error(error);
        alert(error);
    });
});