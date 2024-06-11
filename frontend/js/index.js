let url;

document.getElementById('logoutButton').addEventListener('click', (event) => {
    event.preventDefault();

    url = 'http://localhost/hallyuin-native/backend/logout.php';

    fetch(url)
    .then(response => response.text())
    .then(data => {
        data = JSON.parse(data);

        alert(data['message']);
        window.location.assign(`http://localhost/hallyuin-native/frontend/${data['redirect']}.php`);
    })
    .catch(error => {
        console.error(error);
        alert(error);
    });
});

document.addEventListener('DOMContentLoaded', () => {
    url = 'http://localhost/hallyuin-native/backend/auth.php';

    fetch(url)
    .then(response => response.text())
    .then(data => {
        if (data) {
            data = JSON.parse(data);
        }
        
        if (data['redirect']) {
            alert(data['message']);
            console.log(data['message']);
            window.location.href = `http://localhost/hallyuin-native/frontend/${data['redirect']}.php`;
        }
    })
    .catch(error => {
        console.error(error);
        // alert(error);
    });

    
});