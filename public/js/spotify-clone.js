'use strict';

!parseInt(localStorage.getItem('loop')) ? localStorage.setItem('loop', 0) : '';
!parseInt(localStorage.getItem('shuffle')) ? localStorage.setItem('shuffle', 0) : '';
!JSON.parse(localStorage.getItem('queueSongs')) ? localStorage.setItem('queueSongs', JSON.stringify([])) : '';

/**
 * Variable Declarations.
 * ======================
 */
const pageWrapper = document.querySelector('.app__wrapper');
const appContent = document.querySelector('.app__content');
const currentPage = pageWrapper.dataset.page;
const headerTabContainer = document.querySelectorAll('.header__tab--container');
const headerTabs = document.querySelectorAll('.header__tab');

const appHeader = document.querySelector('.app__header');
const appNavbar = document.querySelector('.app__navbar');

const headerTitle = document.querySelector('.header__title');
const headerTitleSticky = document.querySelector('.header__title--sticky');

const contentSections = document.querySelectorAll('.content__section');
const tabContentContainers = document.querySelectorAll('.body__content--container');

const headerSticky = document.querySelector('.header__sticky');
const artistBackgroundImage = document.querySelector('.artist__background--image');

// buttons on hovered item
const boxBtnPlays = document.querySelectorAll('.box__btn--play');
const boxBtnLoves = document.querySelectorAll('.box__btn--love');
const boxBtnMores = document.querySelectorAll('.box__btn--more');
const buttonsContainer = document.querySelectorAll('.box__buttons--container');
const buttonLoves = document.querySelectorAll('.box__btn--love');

// alert
const alertContainer = document.querySelector('.sp__alert');

// slide content
const buttonSlideContainer = document.querySelectorAll('.button__slide--content');
const slideContainer = document.querySelectorAll('.content__section--body');

// Audio
const player = document.querySelector('#player');
const buttonPlay = document.querySelector('.controller__play');
const buttonPause = document.querySelector('.controller__pause');
const timeStart = document.querySelector('.time__start');
const timeEnd = document.querySelector('.time__end');
const progressBarSlider = document.querySelector('.progress__bar--slider');
const progressBar = document.querySelector('.progress__bar');
const volumeSlider = document.querySelector('.volume__slider');
const toggleVolumeButton = document.querySelector('#control--sound');
const buttonLoop = document.querySelector('.sp-loop');
const buttonShuffle = document.querySelector('.sp-shuffle');
const buttonNext = document.querySelector('.sp-next');
const buttonPrevious = document.querySelector('.sp-previous');

const songTitle = document.querySelector('.song__title');
const artistName = document.querySelector('.artist__name');
const thumbnail = document.querySelector('.thumbnail');

// Modal
const closeButton = document.querySelectorAll('.modal__close');
const modalOverlay = document.querySelectorAll('.modal__overlay');
const modalContainers = document.querySelectorAll('.modal__container');
const modalButtons = document.querySelectorAll('.modal__button');

// Playist
const songListContainer = document.querySelector('.song__list--container');
const songListBody = document.querySelector('.playlist__table--header');
const thumbnailPlaylistHeader = document.querySelector('.playlist__sticky--header-container');
const playlistHeaderOverlay = document.querySelector('.playlist__header--overlay');
const playlistHeader = document.querySelector('.playlist__header--container');
const imagePlaylist = document.querySelectorAll('.image__top');

const artistHeader = document.querySelector('.artist__header--intro')

// dropdown
const dropdowns = document.querySelectorAll('.sp__dropdown');
const subDropdowns = document.querySelectorAll('.sp__sub--dropdown');

// follow button
const buttonFollow = document.querySelector('#button--follow');


// =================================================================
// lists
const menuLists = document.querySelectorAll('ul');

menuLists.forEach(menu => {
    menu.addEventListener('click', (e) => {
        e.preventDefault();
    
        localStorage.setItem('menu', e.target.dataset.menu);
        applyActiveMenu(menuLists);
    
        location.href = e.target.getAttribute('href');
    });
});

const applyActiveMenu = function (menu) {
    const active = localStorage.getItem('menu');

    // clear active
    clearActiveMenu(menu);

    active ? document.querySelector(active).classList.add('active') : menu.children[0].children[0].classList.add('active');
}

const clearActiveMenu = function (menu) {
    menu.forEach(mn => {
        [...mn.children].forEach(menu_list => {
            menu_list.classList.contains('active') ? menu_list.classList.remove('active') : '';
        })
    })
}

// call apply menu
applyActiveMenu(menuLists);

// =================================================================

/**
 * Function Declarations
 * ======================
 */
/**
 * Ubah tombal pause jadi tombol play setiap kali tombol play pada musik lain diklik
 */
const resetToPlayState = function () {
    boxBtnPlays.forEach(btnPlay => {
        if (!btnPlay.children[1].classList.contains('hide__element')) {
            btnPlay.children[0].classList.remove('hide__element');
            btnPlay.children[1].classList.add('hide__element');
        }
    });
}

/**
 * Menggunakan matching strategy fungsi ini menentukan tombol mana yg diklik
 * Button types = play, pause, love, more
 * 
 * @param event
 * @param type (type of button)
 */
const targetButton = function (event, type = 'other') {
    let button = '';
    if (type !== 'other') {
        let tag = event.target.tagName.toLowerCase();
        let element = event.target;

        if (tag === 'i') button = element.parentElement;
        else button = element;
    } else {
        if (!event.target.classList.contains('box__buttons--container')) {
            let element = event.target;
            if (element.tagName.toLowerCase() === 'i') button = element.parentElement;
            else button = element;
        }
    }

    return button;
}

/**
 * Menghapus class "active" pada tab dan tab content
 */
const clearActiveTab = function () {
    // clear active tab
    headerTabs.forEach(tab => {
        const firstElement = tab.firstElementChild;
        firstElement.classList.contains('header__tab--active') ? firstElement.remove() : '';
    });

    // clear active tab content
    tabContentContainers.forEach(content => {
        if (!content.classList.contains('tab__content--hidden')) content.classList.add('tab__content--hidden');
    });
}


/**
 * Remove distance between tabbed content and header used when sticky header activeted
 */
const prepareNewFreshTabContent = function () {
    const stickyHeader = appHeader.classList.contains('header__sticky');
    tabContentContainers.forEach(content => {
        if (stickyHeader) {
            content.children[0].classList.add('header__distance--on-sticky')
        } else {
            content.children[0].classList.remove('header__distance--on-sticky')
        }
    })
}


/**
 * Define which tab is active
 * @return dataset.tabButton
 */
const getActiveTab = function () {
    let dataTab = '';
    headerTabs.forEach(tab => {
        const firstElement = tab.firstElementChild;
        if (firstElement.classList.contains('header__tab--active')) {
            dataTab = firstElement.parentNode.dataset.tabButton;
        }
    });

    return dataTab;
}

/**
 * Menentukan scroll position kemana items harus digeser
 * @param {Number} initValue initial value where slide items should be started
 * @param {*} availablePart how many part of slides (each slide there are 4 boxes/elements showed on the screen)
 * @param {Number} currPos number generated by scrollLeft defined as current position
 * @param {String} direction slide direction right/left, default value is right
 * 
 * @return {Number} Position where screen should scroll to.
 */
const checkSlidePart = function (initValue, availablePart, currPos, direction = 'right') {
    if (direction === 'right') {
        for (let index = 1; index <= availablePart; index++) {
            if (currPos > initValue * availablePart) return initValue * availablePart;
            if (currPos < initValue * index && currPos >= initValue * (index - 1)) {
                return initValue * index
            }
        }
    } else { // PUSING BAGIAN INI HADOOOH
        for (let index = 1; index <= availablePart; index++) {
            return currPos - ((initValue * availablePart) - currPos)
        }
    }
}

/**
 * Get duration of an audio
 * @param {Object} audio instance of audio player
 * @return {Number/Boolean} Duration of audio otherwise False returned
 */
const getDuration = function (audio) {
    if (audio.duration) {
        // apply to slider 
        progressBarSlider.setAttribute('max', Math.floor(audio.duration));
        return [Math.floor(audio.duration / 60), Math.round(audio.duration % 60)]
    }
    return false;
}

/**
 * Visualize minute and seconds of played audio
 * @param {Object} audio instance of audio player
 * @return {Timer}
 */
var playBack;
const setTextPlayback = function (audio) {
    playBack = setInterval(() => {
        let second = Math.ceil(audio.currentTime % 60);
        let minute = Math.floor(audio.currentTime / 60);

        timeStart.textContent = `${minute}:${String(second).padStart(2, '0')}`;
        // apply to slider
        progressBarSlider.setAttribute('value', audio.currentTime);

        // increase progress bar
        progressBar.style.width = `${Number(progressBarSlider.getAttribute('value')) / Math.round(audio.duration) * 100}%`;

        if (audio.ended || audio.paused) {
            clearInterval(playBack);
            buttonPause.classList.add("controller__hide");
            buttonPlay.classList.remove('controller__hide');
        }

        audio.ended ? playFromQueue() : '';
    }, 1000);

    !audio.ended ? renderQueuePage() : '';

}

/**
 * 
 * @param {DOM} element range input element
 * @param {Number} init initial value to set volume slider when page loaded
 */
const setVolume = function (element, init = 0) {
    player.volume = element ? Number(element.value) / 100 : init / 100;
    volumeSlider.setAttribute('value', element ? element.value : init);
    element ? element.previousElementSibling.style.width = `${volumeSlider.getAttribute('value')}%` : volumeSlider.parentElement.children[0].style.width = `${volumeSlider.getAttribute('value')}%`;
}

/**
 * Play next song on the queue
 * @param {*} e 
 */
const playFromQueue = function (autoplay = true, ended = true) {
    const isLoop = parseInt(localStorage.getItem('loop'));

    // store queue song ke variable
    const queueSongs = JSON.parse(localStorage.getItem('queueSongs'));

    if (ended) {
        // Lakukan looping berdasarkan kondisi
        if (isLoop === 1) {
            const shiftedSong = queueSongs.shift(); // shifted song will be putted to the bottom of the stack
            queueSongs.push(shiftedSong);

            // update queue 
            localStorage.setItem('queueSongs', JSON.stringify(queueSongs));
        } else {
            queueSongs.shift();
            localStorage.setItem('queueSongs', JSON.stringify(queueSongs));
        }
    }

    // kalo music berenti, cek ke antrian kalo masih ada lagu tersisa, lgsg play
    if (queueSongs.length > 0) {
        songTitle.children[0].textContent = queueSongs[0].title;
        artistName.children[0].textContent = queueSongs[0].name;
        thumbnail.children[0].src = queueSongs[0].cover;

        player.src = queueSongs[0].audio;
        autoplay ? buttonPlay.click() : ''; // trigger play
    }
    renderQueuePage();

    localStorage.setItem('queueSongs', JSON.stringify(queueSongs));
}

const renderQueuePage = function () {
    const queueSongs = JSON.parse(localStorage.getItem('queueSongs'));
    
    const nextInQueue = queueSongs.slice(1);

    if (queueSongs.length > 0) {
        // now playing
        const song = queueSongs[0];

        document.querySelector('#queue--now-playing').innerHTML = `
        <div class="col-1 sp__td"><i class="sp-play-circle size--4"></i></div>
        <div class="col-1 sp__td"><i class="sp-love"></i></div>
        <div class="col-3 sp__td color--active">${song.title}</div>
        <div class="col-3 sp__td"><a href="#" class="custom__link--active">${song.name}</a></div>
        <div class="col-2 sp__td"><a href="#" class="custom__link--active">${song.collection_title}</a></div>
        
        <div class="col-2 sp__td color--active sp__top--right">${song.duration}</div>
        `;
    } else {
        document.querySelector('#queue--now-playing').innerHTML = `
        <div class="col-12 sp__td text-center">Queue is empty</div>`
    }

    // next in queue
    if (nextInQueue.length > 0) {
        let nextQueueRow = document.querySelector('#next--in-queue');
        nextQueueRow.innerHTML = '';

        nextInQueue.reverse().forEach(song => {
            const content = `
            <div class="row sp__tr">
            <div class="col-1 sp__td"><i class="sp-play-circle size--4"></i></div>
            <div class="col-1 sp__td"><i class="sp-love"></i></div>
            <div class="col-3 sp__td color--white">${song.title}</div>
            <div class="col-3 sp__td"><a href="#" class="custom__link">${song.name}</a></div>
            <div class="col-2 sp__td"><a href="#" class="custom__link">${song.collection_title}</a></div>
            
            <div class="col-2 sp__td color--white sp__top--right">${song.duration}</div>
            </div>
            `;

            nextQueueRow.insertAdjacentHTML('afterbegin', content);
        });
    } else {
        document.querySelector('#next--in-queue').innerHTML = `
        <div class="col-12 sp__td text-center">Queue is empty</div>`
    }
};

const removeNextInQueue = function () {
    const queueSongs = JSON.parse(localStorage.getItem('queueSongs'));
    queueSongs.splice(1);

    localStorage.setItem('queueSongs', JSON.stringify(queueSongs));
    renderQueuePage();
}

document.querySelector('#clear--nextin-queue') ?.addEventListener('click', removeNextInQueue);






/**
 * Event Listeners
 * ================
 */
const imageOverlayOn = function (e) {
    e.target.children[0].classList.remove('image__top--hide');
}
const imageOverlayOff = function (e) {
    if (e.classList ?.contains('img__top')) e.children[0].classList.add('image__top--hide');
    else e.target.children[0].classList.add('image__top--hide');
}
const removeOVerlayOffEvent = function (e) {
    e.removeEventListener('mouseleave', imageOverlayOff);
}
imagePlaylist.forEach(img => {
    img.addEventListener('mouseenter', imageOverlayOn);
    img.addEventListener('mouseleave', imageOverlayOff);
});

// Button pada kotak playlist
// Menggunakan matching strategy(bubbling) lalu menerapkan event listener pada 
// parentElement tombol mana yg diklik ditentukan oleh targetButton()
const zoomInIcon = function (e) {
    let button;
    if (targetButton(e)) button = targetButton(e);

    if (button) {
        if (button.classList.contains('box__btn--play')) {
            button.classList.remove('scale__0');
            button.classList.add('scale__6');
        } else if (button.classList.contains('box__btn--love') || button.classList.contains('box__btn--more')) {
            button.classList.remove('scale__0');
            button.classList.add('scale__2');
        }
    }
}
const zoomOutIcon = function (e) {
    let button;
    if (targetButton(e)) button = targetButton(e);

    if (button) {
        button.classList.remove('scale__6');
        button.classList.remove('scale__2');
        button.classList.add('scale__0');
    }
}
const clickIconPlay = function (e) {
    let button = targetButton(e, 'play');
    let queueSongs = [];

    switch (button.classList[0]) {
        case 'box__btn--play': // index[0] play button; index[1] pause button
            if (button.children[1].classList.contains('hide__element')) { // play
                resetToPlayState();
                button.children[1].classList.remove('hide__element');
                button.children[0].classList.add('hide__element');

                axios.get(button.dataset.url).then(response => {
                    const result = response.data.data;

                    if (button.dataset.type === 'playlist') {
                        result.forEach(song => {
                            queueSongs.push(song);
                        });
                    } else { // album
                        result.collection.songs.forEach(song => {
                            queueSongs.push({
                                id: song.id,
                                title: song.title,
                                duration: song.duration,
                                audio: song.audio,
                                collection_id: result.collection.id,
                                collection_title: result.collection.title,
                                cover: result.collection.cover,
                                artist_id: result.collection.artist.id,
                                picture: result.collection.artist.profile_picture,
                                name: result.collection.artist.full_name,
                            });
                        });
                    }

                    if (player.src !== queueSongs[0].audio) { // album yg diklik sama tdk dengan yg sedang diputar sekarang
                        songTitle.children[0].textContent = queueSongs[0].title; // karna song nya banyak (laravel collctions) ambil data pertama
                        artistName.children[0].textContent = queueSongs[0].name;
                        thumbnail.children[0].src = queueSongs[0].cover;

                        player.src = queueSongs[0].audio;
                    }
                }).catch(error => {

                }).finally(() => {
                    localStorage.setItem('queueSongs', JSON.stringify(queueSongs));
                    buttonPlay.click(); // trigger play
                });

            } else { // pause
                button.children[1].classList.add('hide__element');
                button.children[0].classList.remove('hide__element');
                buttonPause.click(); // trigger pause
            }
            break;

        default:
            break;
    }
}
buttonsContainer.forEach(btn => {
    if (btn.children[1]) btn.children[1].children[1] ?.classList.add('hide__element'); // hide pause button
    else btn.children[0].children[1] ?.classList.add('hide__element'); // hide pause button

    // hover in
    btn.addEventListener('mouseover', zoomInIcon);

    // hover out
    btn.addEventListener('mouseout', zoomOutIcon);

    // klik
    btn.addEventListener('click', clickIconPlay);
});

// Active tab
headerTabContainer ?.forEach((tabContainer, index) => {
    tabContainer.addEventListener('click', function (e) {
        const clicked = e.target.closest('.header__tab');

        if (!clicked.children[0].classList.contains('header__tab--active')) {
            clearActiveTab();
            clicked.insertAdjacentHTML('afterbegin', `<span class="header__tab--active"></span>`);


            // activete tab content
            tabContentContainers.forEach(content => {
                if (content.dataset.tabContent === clicked.dataset.tabButton) content.classList.remove('tab__content--hidden')
            });

            // remove sticky and distance sticky
            prepareNewFreshTabContent();
        }

        for (const anotherTarget of headerTabContainer[(headerTabContainer.length - 1) - index].children) {
            if (anotherTarget.dataset.tabButton === clicked.dataset.tabButton) {
                anotherTarget.insertAdjacentHTML('afterbegin', `<span class="header__tab--active"></span>`);
                break;
            }
        }
    });
});


// Slide element ke kiri/kanan menggunakan tombil arrow right and left
buttonSlideContainer.forEach((scc, i) => {
    const initialValue = Math.floor(document.querySelector('.box').getBoundingClientRect().width * 4 + 83.3);
    scc.addEventListener('click', (e) => {
        const slides = e.target.closest('.content__section--title').nextElementSibling.children;
        const slidePart = (slides.length / 4);

        if (e.target.parentElement.classList.contains('button__left')) {
            const value = checkSlidePart(initialValue, Math.floor(slidePart), slideContainer[i].scrollLeft, 'left');
            slideContainer[i].scrollLeft = value;

        } else if (e.target.parentElement.classList.contains('button__right')) {
            slideContainer[i].scrollLeft = checkSlidePart(initialValue, Math.floor(slidePart), slideContainer[i].scrollLeft);
        }
    });
});

// Audio
buttonLoop ?.addEventListener('click', function () {
    const loop = parseInt(localStorage.getItem('loop'));
    if (loop) {
        localStorage.setItem('loop', 0);
        this.classList.toggle('color--active');
    } else {
        localStorage.setItem('loop', 1);
        this.classList.toggle('color--active');
    }
});

buttonShuffle ?.addEventListener('click', function () {
    const shuffle = parseInt(localStorage.getItem('shuffle'));
    if (shuffle) {
        localStorage.setItem('shuffle', 0);
        this.classList.toggle('color--active');
    } else {
        localStorage.setItem('shuffle', 1);
        this.classList.toggle('color--active');
    }
});

buttonNext?.addEventListener('click', function () {
    const queueSongs = JSON.parse(localStorage.getItem('queueSongs'));
    const currentSong = queueSongs.shift();
    queueSongs.push(currentSong);

    localStorage.setItem('queueSongs', JSON.stringify(queueSongs));

    playFromQueue(true, false);
});

buttonPrevious?.addEventListener('click', function () {
    const queueSongs = JSON.parse(localStorage.getItem('queueSongs'));
    const lastSong = queueSongs.pop();
    queueSongs.unshift(lastSong);

    localStorage.setItem('queueSongs', JSON.stringify(queueSongs));

    playFromQueue(true, false);
});

// init audio
if (player) {
    player.addEventListener('loadedmetadata', function (e) {
        const duration = getDuration(player);
        timeEnd.textContent = `${duration[0]}:${duration[1]}`;
        player.controls = false;
        setVolume(undefined, 70);
    });

    // play button
    buttonPlay.addEventListener("click", function (e) {
        player.play();
        this.classList.add("controller__hide");
        buttonPause.classList.remove('controller__hide');

        setTextPlayback(player);
    });

    // pause button
    buttonPause.addEventListener("click", function (e) {
        player.pause();
        this.classList.add("controller__hide");
        buttonPlay.classList.remove('controller__hide');
    });

    // Hover duration bar on audio
    progressBarSlider.addEventListener('mouseenter', function (e) {
        progressBar.style.backgroundColor = 'var(--active-option)';
    });

    // Hover out duration bar on audio
    progressBarSlider.addEventListener('mouseout', function (e) {
        progressBar.style.backgroundColor = 'white';
    });

    // Change value of duration bar audio
    progressBarSlider.addEventListener('change', function (e) {
        player.currentTime = Number(this.value);

        progressBarSlider.setAttribute('value', this.value);
        this.previousElementSibling.style.width = `${Number(progressBarSlider.getAttribute('value')) / Math.round(player.duration) * 100}%`;
    });

    // Change value of volume
    volumeSlider.addEventListener('change', function (e) {
        setVolume(this);
    });

    // Toggle speaker/volume button mute/unmute
    toggleVolumeButton.addEventListener('click', function (e) {
        const target = this.children[0].classList;
        if (target.contains('sp-speaker')) {
            setVolume(undefined, 0);
            target.remove('sp-speaker');
            target.add('sp-speaker-mute')
        } else {
            setVolume(undefined, 50);
            target.remove('sp-speaker-mute');
            target.add('sp-speaker');
        }

    });

    //  run render queue page
    renderQueuePage();

    // play from queue
    playFromQueue(false, false);

    // cek if loop then apply class to button loop
    parseInt(localStorage.getItem('loop')) ? buttonLoop.parentElement.classList.add('color--active') : '';

    // cek if shuffle then apply class to button shuffle
    parseInt(localStorage.getItem('shuffle')) ? buttonShuffle.parentElement.classList.add('color--active') : '';
}


// Matching strategy on modal container
modalContainers.forEach(container => {
    container.addEventListener('click', function (e) {
        const target = e.target.classList;
        if (target.contains('sp-cross') || target.contains('modal__close') || target.contains('modal__overlay')) {
            this.closest('.modal__container').classList.add('hidden');
        }
    });
});

// Matching strategy on modal buttons
modalButtons.forEach(button => {
    button.addEventListener('click', function (e) {
        const target = !e.target.classList.contains('modal__button') ? e.target.parentElement : e.target;
        const modal = document.querySelector(target.dataset.target);
        modal.classList.remove('hidden');
    });
});

const hideAllImageOverlay = function () {
    dropdowns.forEach(dropdown => {
        const imgTop = dropdown.parentElement.parentElement.parentElement; // .img__top class
        const dropdownContainer = dropdown.children[1];

        if (!dropdownContainer.classList.contains('hide__element')) dropdownContainer.classList.add('hide__element');
        if (imgTop.classList.contains('image__top')) {
            if (!imgTop.classList.contains('image__top--hide')) imgTop.children[0].classList.add('image__top--hide');
        }
    });
}
// Dropdown
dropdowns.forEach(dropdown => {
    dropdown.children[0].addEventListener('click', function (e) { // box button ellipsis
        const target = e.target.dataset.toggle ? e.target.children[0] : e.target; // icon ellipsis
        // console.log(target);
        if (target.classList.contains('sp-down')) hideAllImageOverlay();

        const dropdownContainer = target.parentElement.parentElement.children[1]; // dropdown conatiner menu
        const imgTop = target.parentElement.parentElement.parentElement.parentElement.parentElement; // .img__top class

        dropdownContainer.classList.toggle('hide__element');
        if (imgTop.classList.contains('image__top')) removeOVerlayOffEvent(imgTop); // turnoff event litener mouseleave

        const body = document.querySelector('body');
        if (body.firstElementChild.classList.contains('sp__overlay')) {
            dropdownContainer.classList.add('hide__element');
            body.firstElementChild.remove();
        } else {
            body.insertAdjacentHTML('afterbegin', '<div class="sp__overlay"></div>'); // nambahin overlay setelah tag open body

            body.firstElementChild.addEventListener('click', function (event_body) {
                dropdownContainer.classList.toggle('hide__element');
                body.removeChild(event_body.target);
                if (!target.classList.contains('sp-down') && imgTop.classList.contains('image__top')) imgTop.children[0].classList.add('image__top--hide'); // kalau dropdown nya bukan dari tombol user account pojok kanan atas

                if (imgTop.classList.contains('image__top')) imgTop.addEventListener('mouseleave', imageOverlayOff); // turn on event listener mouseleave
            });
        }
    })
});
// Sub dropdown
subDropdowns.forEach(sd => {
    const boxElement = sd.parentElement.parentElement.parentElement.parentElement.parentElement.parentElement;
    const boxElementRect = boxElement.getBoundingClientRect();
    const viewport = document.documentElement.clientWidth;

    if (boxElementRect.left < viewport - boxElementRect.right) {
        sd.children[1].style.left = 200 + 'px';
    } else {
        sd.children[1].style.right = '0';
    }
})

// Love/save to library
buttonLoves.forEach(love => {
    love.addEventListener('click', function (e) {
        const target = e.target.classList.contains('sp-love') || e.target.classList.contains('sp-love-fill') ? e.target : e.target.children[0];

        axios.get(`/app/libraries/${target.parentElement.dataset.type}/${target.parentElement.dataset.id}`)
            .then(response => {
                alertContainer.children[0].textContent = response.data.message;
                alertContainer.children[0].className = 'sp__alert--success';
                alertContainer.classList.remove('sp__alert--hidden');

                // toggle class
                if (target.classList.contains('sp-love')) {
                    target.classList.remove('sp-love');
                    target.classList.add('sp-love-fill');
                } else {
                    target.classList.add('sp-love');
                    target.classList.remove('sp-love-fill');
                }

                setTimeout(() => {
                    alertContainer.classList.add('sp__alert--hidden');
                }, 3000);
            }).catch(error => {
                alertContainer.children[0].textContent = error.response.data.message;
                alertContainer.children[0].className = 'sp__alert--failed';
                alertContainer.classList.remove('sp__alert--hidden');

                setTimeout(() => {
                    alertContainer.classList.add('sp__alert--hidden');
                }, 3000);
            }).finally(response => {

            });
        // target.className = 'sp-love-fill';
    });
});

// follow artist
buttonFollow?.addEventListener('click', function (e) {
    const target = e.target;

    axios.get(`/app/libraries/${target.dataset.type}/${target.dataset.id}`)
        .then(response => {
            if (response.data.code === 201) {
                this.textContent = 'FOLLOWING';
                this.classList.add('color--active');
            } else {
                this.textContent = 'FOLLOW';
                this.classList.remove('color--active');
            }

            alertContainer.children[0].textContent = response.data.message;
            alertContainer.children[0].className = 'sp__alert--success';
            alertContainer.classList.remove('sp__alert--hidden');

            setTimeout(() => {
                alertContainer.classList.add('sp__alert--hidden');
            }, 3000);
        }).catch(error => {
            alertContainer.children[0].textContent = error.response.data.message;
            alertContainer.children[0].className = 'sp__alert--failed';
            alertContainer.classList.remove('sp__alert--hidden');

            setTimeout(() => {
                alertContainer.classList.add('sp__alert--hidden');
            }, 3000);
        }).finally(() => {

        });
})


/**
 * Observers 
 * ================= 
 */

// Sticky header
const stickyHeader = function (entries) {
    const [entry] = entries;
    if (!entry.isIntersecting) {
        headerTitleSticky.classList.remove('opacity__0');
        headerTitleSticky.children[0].classList.remove('hide__element--translate');
    } else {
        headerTitleSticky.classList.add('opacity__0');
        headerTitleSticky.children[0].classList.add('hide__element--translate');
    }
}


// Sticky header on playlist page
const stickyPlaylistHeader = function (entries) {
    const [entry] = entries;

    if (!entry.isIntersecting) {
        thumbnailPlaylistHeader.classList.remove('opacity__0');
        thumbnailPlaylistHeader.children[0].classList.remove('hide__element--translate');
    } else {
        thumbnailPlaylistHeader.children[0].classList.add('hide__element--translate');
        thumbnailPlaylistHeader.classList.add('opacity__0');
    }
}

if (!['playlist', 'album', 'view-artist'].includes(currentPage.toLowerCase())) {
    if (['admin-login', 'user-login'].includes(currentPage.toLowerCase())) {
        //
    } else {
        const headerTitleObserver = new IntersectionObserver(stickyHeader, {
            root: null,
            threshold: 1,
        });
        
        headerTitleObserver.observe(headerTitle);
    }
} else {
    const playlistHeaderObserver = new IntersectionObserver(stickyPlaylistHeader, {
        root: null,
        threshold: currentPage === 'view-artist' ?.6 : .5,
    });
    playlistHeaderObserver.observe(playlistHeader);
}
