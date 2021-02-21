'use strict';

const spaMenu = document.querySelector('.spa__menu');

spaMenu.addEventListener('click', function (e) {
    e.preventDefault();

    axios.get('/app/spa/queue').then(response => {
        appContent.innerHTML = response.data.data;
        pageWrapper.dataset.page = 'home';
    }).catch(error => {

    }).finally(() => {

    });
});