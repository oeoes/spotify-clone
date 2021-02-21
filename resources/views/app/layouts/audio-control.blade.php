<div class="app__controll--bar sp__between">
    <div class="app__control--box">
        <div class="row">
            <div class="col-12">
                <div class="row g-0">
                    <div class="col-2">
                        <div class="thumbnail">
                            <img src="{{ asset('images/no-music.png') }}" alt="song thumbnail">
                        </div>
                    </div>
                    <div class="col-1"></div>
                    <div class="col-8">
                        <div class="row g-1">
                            <div class="col-12 mt-2">
                                <div class="sp__top--left">
                                    <div class="song__title">
                                        <a class="size--2 fw--3 color--white me-2" href="#">No music</a>
                                    </div>
                                    <div class="color--white hide__element"><i class="sp-love"></i></div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="artist__name">
                                    <a class="size--1 fw--3 color-grey" href="#">No music</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="app__control--box">
        <div class="progress__container">
            <div class="buttons__control--container text-center mb-2">
                <!-- audio -->
                <audio controls id="player" class="controller__hide">
                    <source src="" type="audio/mp3">
                </audio>
                <!-- the controller -->
                <span class="button__control">
                    <span class="controller__next"><i class="sp-shuffle"></i></span>
                </span>
                <span class="button__control">
                    <span class="controller__next"><i class="sp-previous"></i></span>
                </span>
                <span class="button__control">
                    <span class="controller__play"><i class="sp-play-circle"></i></span>
                    <span class="controller__pause controller__hide"><i class="sp-pause-circle"></i></span>
                </span>
                <span class="button__control">
                    <span class="controller__next"><i class="sp-next"></i></span>
                </span>
                <span class="button__control">
                    <span class="controller__next"><i class="sp-loop"></i></span>
                </span>
            </div>
            <div class="progress__bar--container">
                <div class="time__start">0:00</div>
                <div class="time__end">0:00</div>
                <div class="progress__bar"></div>
                <input class="progress__bar--slider" type="range" min="0" max="0" value="1" step="1">
            </div>

        </div>
    </div>
    <div class="app__control--box color--grey">
        <div class="row pt-3">
            <div class="col-6"></div>
            <div class="col-1">
                <span class="button__control"><i class="sp-mic"></i></span>
            </div>
            <div class="col-1">
                <span class="button__control"><a class="modal__button link__off" href="javascript:void(0)" data-target="#queue"><i class="sp-queue"></i></a></span>
            </div>
            <div class="col-4">
                <div class="row g-0">
                    <div class="col-3">
                        <span class="button__control" id="control--sound"><i class="sp-speaker"></i></span>
                    </div>
                    <div class="col-9">
                        <div class="progess__container pt-2">
                            <div class="progress__bar--container">
                                <div class="progress__bar" style="width: 50%"></div>
                                <input class="volume__slider" type="range" min="1" max="100" value="1">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal__container hidden sp__top--right" id="queue">

    <div class="sp__queue--popup">

        <div class="modal__close button__control"><i class="sp-cross"></i></div>

        <div class="mx-45 size--5 fw--700 color--white sp__bot--left my-3">Play Queue</div>
        <!-- Now Playing -->
        <div class="song__list--container">
            <div class="size--3 fw--600 color--white mx-45">Now Playing</div>
            <div class="row mx-45 sp__table sp__bot--bordered sp__hovered">
                <div class="row sp__tr">
                    <div class="col-1 sp__th"></div>
                    <div class="col-1 sp__th"></div>
                    <div class="col-3 sp__th">TITLE</div>
                    <div class="col-3 sp__th">ARTIST</div>
                    <div class="col-2 sp__th">ALBUM</div>
                    <div class="col-2 sp__th sp__top--right"><i class="sp-clock size--3"></i></div>
                </div>
                <div id="queue--now-playing" class="row sp__tr color--active">

                </div>
            </div>
        </div>

        <!-- List of queue -->
        <div class="song__list--container">
            <div class="sp__between">
                <div class="size--3 fw--600 color--white mx-45">Next In Queue</div>
                <div id="clear--nextin-queue" class="sp--btn sp--btn-transparent sp--radius me-2 px-4">CLEAR</div>
            </div>
            <div class="row mx-45 sp__table sp__bot--bordered sp__hovered">
                <div class="row sp__tr">
                    <div class="col-1 sp__th"></div>
                    <div class="col-1 sp__th"></div>
                    <div class="col-3 sp__th">TITLE</div>
                    <div class="col-3 sp__th">ARTIST</div>
                    <div class="col-2 sp__th">ALBUM</div>
                    <div class="col-2 sp__th sp__top--right"><i class="sp-clock size--3"></i></div>
                </div>
                <span id="next--in-queue">
                    <div id="next--in-queue" class="row sp__tr">

                    </div>
                </span>
            </div>
        </div>
    </div>

    <div class="modal__overlay"></div>
</div>