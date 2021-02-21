'use strict';

const audioControl = document.querySelectorAll('.audio__control');

audioControl.forEach(audio => {
    audio.addEventListener('click', (e) => {
        const target = !e.target.classList.contains('audio__control') ? e.target.parentElement : e.target;
        const url = target.dataset.url;
        
        axios.get(url).then((response) => {
            const result = response.data.data;
            songTitle.children[0].textContent = result.song.title;
            artistName.children[0].textContent = result.artist.full_name;
            thumbnail.children[0].src = result.collection.cover;

            player.src = result.song.audio;
            buttonPlay.click(); // trigger play


            // console.log(result);
        }).catch((err) => {

        }).finally(() => {

        })
    });
});