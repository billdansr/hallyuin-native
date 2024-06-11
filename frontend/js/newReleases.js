document.addEventListener('DOMContentLoaded', () => {
    url = 'http://localhost/hallyuin-native/backend/api/v1/new-releases.php';
    options = {
        method: 'GET',
    };

    fetch(url, options)
    .then(response => response.text())
    .then(data => {
        console.log(data);
        
        data = JSON.parse(data);

        let i = 0;

        data['data'].forEach(newRelease => {
            document.getElementById('newReleases').querySelectorAll('img')[i].setAttribute('src', newRelease.image);
            document.getElementById('newReleases').querySelectorAll('button')[i].setAttribute('data-id', newRelease.id);
            i++;

            // document.getElementById('newReleases').innerHTML += `
            // <div class="item card-carousel me-2 position-relative">
            //     <img src="${newRelease.image}" alt="" />
            //     <div class="overlay position-absolute top-0 bottom-0 start-0 end-0 w-100 h-100">
            //         <div class="position-absolute top-50 start-50 translate-middle text-center w-100">
            //             <button class="see-product">See product</button>
            //         </div>
            //     </div>
            // </div>
            // `;
        });

        // document.getElementById('newReleases').querySelectorAll('.item').forEach(el => {
        //     el.innerHTML += `<img src="${data['data'][i++].image}" alt="" />`;
        // });
    })
    .catch(error => console.error(error));
});

document.querySelectorAll('.see-product').forEach(button => {
    button.addEventListener('click', () => {
        url = `http://localhost/hallyuin-native/backend/api/v1/merches.php?id=${button.getAttribute('data-id')}`;
        console.log(url)
        window.location.href = url;
    });
});