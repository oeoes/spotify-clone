'use strict';

const photoFrames = document.querySelectorAll('.sp__photo--frame');
const bannerFrames = document.querySelectorAll('.sp__banner--frame');
const audioFrames = document.querySelectorAll('.sp__audio--frame');
const audio = document.createElement('audio');


const uploadImage = function (e) {
    const cls = e.target.classList;
    const target = cls.contains('sp__photo--frame') || cls.contains('sp__banner--frame') || cls.contains('sp__audio--frame') ? e.target : e.target.parentElement;
    const file = target.parentElement.children[0];
    const event = document.createEvent('MouseEvents');
    event.initEvent('click', false, false);
    file.dispatchEvent(event);

    file.addEventListener('change', () => {
        const child = target.children;
        if (!target.classList.contains('sp__audio--frame')) {
            child[0].src = URL.createObjectURL(file.files[0]);
            child[0].classList.remove('hide__element');
            child[1].classList.add('hide__element');
        } else {
            const reader = new FileReader();
            reader.onload = (e) => {
                audio.src = e.currentTarget.result;
                audio.addEventListener('loadedmetadata', () => {
                    document.querySelector('#target-audio').value = Math.round(audio.duration);
                })
            }
            reader.readAsDataURL(file.files[0]);
            child[0].textContent = `Name: ${file.files[0].name}; Size: ${(file.files[0].size / 1000000).toFixed(2)} Mb`;
        }
    });
}
photoFrames.forEach(photo => {
    photo?.addEventListener('click', uploadImage);
});
bannerFrames.forEach(banner => {
    banner ?.addEventListener('click', uploadImage);
});
audioFrames.forEach(audio => {
    audio ?.addEventListener('click', uploadImage);
});
