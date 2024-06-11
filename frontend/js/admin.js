let url, options;

// GET
document.addEventListener('DOMContentLoaded', () => {
    // url = 'http://localhost/hallyuin-native/backend/admin-auth.php';
    
    // fetch(url)
    // .then(response => response.text())
    // .then(data => {
    //     data = JSON.parse(data);

    //     console.log(data)
    //     console.log(data['alert'])
    //     alert(data['message']);
        
    //     if (data['redirect']) {
    //         window.location.replace(`http://localhost/hallyuin-native/frontend/${data['redirect']}.php`)
    //     }
    // })
    // .catch(error => {
    //     console.error(error);
    //     alert(error);
    // });

    url = 'http://localhost/hallyuin-native/backend/api/v1/merches.php';
    options = {
        method: 'GET',
    };

    fetch(url, options)
    .then(response => response.text())
    .then(data => {
        const jsonObject = JSON.parse(data);

        jsonObject['data'].forEach(merch => {
            document.getElementById('merchTable').querySelector('tbody').innerHTML += 
            `<tr id="${merch.id}">
                <td>${merch.id}</td>
                <td>${merch.name}</td>
                <td>${merch.price}</td>
                <td>${merch.description}</td>
                <td>${merch.stock}</td>
                <td>
                    <img src=${merch.image.includes('http') ? merch.image : `http://localhost/hallyuin-native/backend/image/${merch.image}`} width="100">
                </td>
                <td>${merch.category}</td>
            </tr>`;
        });
    })
    .catch(error => {
        console.error(error);
        alert(error);
    });
});

// POST
document.getElementById('insertForm').addEventListener('submit', (event) => {
    event.preventDefault();

    url = 'http://localhost/hallyuin-native/backend/api/v1/merches.php';
    options = {
        method: 'POST',
        body: new FormData(event.target),
    }
        
    fetch(url, options)
    .then(response => response.text())
    .then(data => {
        console.log(data);
        alert(JSON.parse(data).message);
        window.location.reload();
    })
    .catch(error => {
        console.error(error);
        alert(error);
    });
});

// Preview Image Insert
document.getElementById('imageInput').onchange = event => {
    const [file] = event.target.files;

    if (file) {
        document.getElementById('imagePreview').src = URL.createObjectURL(file);
    }
};

// PUT
document.getElementById('updateForm').addEventListener('submit', (event) => {
    event.preventDefault();

    let formData = new FormData(event.target);
    formData.append('method', 'put');
    console.log(formData)

    url = 'http://localhost/hallyuin-native/backend/api/v1/merches.php';
    options = {
        method: 'POST',
        body: formData,
    }

    fetch(url, options)
    .then(response => response.text())
    .then(data => {
        console.log(data);
        alert(JSON.parse(data).message);
        window.location.reload;
    })
    .catch(error => {
        console.error(error);
        alert(error);
    });
});

// Preview Image Update
document.getElementById('imageEditInput').onchange = event => {
    const [file] = event.target.files;

    if (file) {
        document.getElementById('imageEditPreview').src = URL.createObjectURL(file);
    }
};

// DELETE
document.getElementById('deleteForm').addEventListener('submit', (event) => {
    event.preventDefault();

    url = `http://localhost/hallyuin-native/backend/api/v1/merches.php?method=delete&id=${event.target.querySelector('input[name="id"]').value}`;
    options = {
        method: 'GET',
    };

    fetch(url, options)
    .then(response => response.text())
    .then(data => {
        console.log(data);
        alert(JSON.parse(data).message);
        window.location.reload();
    })
    .catch(error => {
        console.error(error);
        alert(error);
    });
});

// Ranking Penjualan
document.addEventListener('DOMContentLoaded', () => {

    url = 'http://localhost/hallyuin-native/backend/api/v1/rank.php';
    options = {
        method: 'GET',
    };

    fetch(url, options)
    .then(response => response.text())
    .then(data => {
        const jsonObject = JSON.parse(data);

        jsonObject['data'].forEach(merch => {
            document.getElementById('rankingTable').querySelector('tbody').innerHTML += 
            `<tr>
                <td>${merch['name']}</td>
                <td>${merch['quantity_sold']}</td>
                <td>${merch['rank']}</td>
            </tr>`;
        });
    })
    .catch(error => {
        console.error(error);
        alert(error);
    });
});

// function editMerch(id) {
//     const merchCells = document.getElementById(id).querySelectorAll('td');

//     merchCells[0].setAttribute('contenteditable', true);
//     merchCells[1].setAttribute('contenteditable', true);
//     merchCells[2].setAttribute('contenteditable', true);
//     merchCells[3].setAttribute('contenteditable', true);
//     merchCells[4].setAttribute('contenteditable', true);
//     merchCells[5].querySelector('img').remove();
//     merchCells[5].innerHTML = '<input type="file" name="image">';
//     merchCells[6].setAttribute('contenteditable', true);
// }

// document.getElementById('search').addEventListener('change', (event) => {
//     url = `http://localhost/hallyuin-native/backend/api/v1/search.php?search=${event.target.value}`;
//     options = {
//         method: 'GET',
//     };

//     fetch(url, options)
//     .then(response => response.text())
//     .then(data => {
//         document.getElementById('search-output').innerHTML = '';

//         console.log(data);
//         jsonObject = JSON.parse(data);
//         data = jsonObject['data'];

//         data.forEach(merch => {
//             document.getElementById('search-output').innerHTML += merch.name + '<br><br>';
//         });
//     })
//     .catch(error => {
//         console.error(error);
//         alert(error);
//     });
// });