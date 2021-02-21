@extends('app.layouts.parent')

@section('data-page', 'home')

@section('app-content')

<div class="app__header sp__column--bot">
    <div class="header__title size--5 fw--700 color--white sp__bot--left my-3">Play Queue</div>
    <div class="header__title--sticky size--4 fw--700 color--white sp__bot--left opacity__0">
        <span class="title__sticky--text hide__element--translate my-2">Play Queue</span>
    </div>
</div>

<div class="body__content--container">
    <!-- Now Playing -->
    <div class="song__list--container">
        <div class="size--3 fw--600 color--white mx-45">Now Playing</div>
        <div class="row mx-45 sp__table sp__bot--bordered sp__hovered">
            <div class="row sp__tr">
                <div class="col-1 sp__th"></div>
                <div class="col-1 sp__th"></div>
                <div class="col-3 sp__th">TITLE</div>
                <div class="col-2 sp__th">ARTIST</div>
                <div class="col-2 sp__th">ALBUM</div>
                <div class="col-1 sp__th"></div>
                <div class="col-2 sp__th sp__top--right"><i class="sp-clock size--3"></i></div>
            </div>
            <div class="row sp__tr color--active">
                <div class="col-1 sp__td"><i class="sp-play-circle size--4"></i></div>
                <div class="col-1 sp__td"><i class="sp-love"></i></div>
                <div class="col-3 sp__td color--active">Fuckin Boyfriend</div>
                <div class="col-2 sp__td"><a href="#" class="custom__link--active">Agnez Mo</a></div>
                <div class="col-2 sp__td"><a href="#" class="custom__link--active">Queen</a></div>
                <div class="col-1 sp__td sp__top--center">
                    <div class="sp__dropdown">
                        <div data-toggle="dropdown"><i class="sp-ellipsis-h"></i></div>
                        <span class="sp__dropdown--content hide__element">
                            <a href="">Add to Queue</a>
                            <a href="">Go to Song Radio</a>
                            <div class="sp__divider"></div>
                            <!-- <a href="">Go to Artist</a> -->
                            <span class="sp__sub--dropdown">
                                <a href="">
                                    <div class="row">
                                        <div class="col-10">Go To Artist</div>
                                        <div class="col-2 sp__mid--left"><i class="sp-right"></i></div>
                                    </div>
                                </a>
                                <div class="sp__sub--dropdown--content">
                                    <a href="">Oeoes</a>
                                    <a href="">Arijit Singh</a>
                                </div>
                            </span>
                            <a href="">Go to Album</a>
                            <div class="sp__divider"></div>
                            <a href="">Remove from Your Liked Song</a>
                            <span class="sp__sub--dropdown">
                                <a href="">
                                    <div class="row">
                                        <div class="col-10">Add to Playlist</div>
                                        <div class="col-2 sp__mid--left"><i class="sp-right"></i></div>
                                    </div>
                                </a>
                                <div class="sp__sub--dropdown--content">
                                    <a href="">New Playlist</a>
                                    <div class="sp__divider"></div>
                                    <a href="">My Playlist#01</a>
                                </div>
                            </span>
                        </span>
                    </div>
                </div>
                <div class="col-2 sp__td color--active sp__top--right">3:45</div>
            </div>
        </div>
    </div>

    <!-- List of queue -->
    <div class="song__list--container">
        <div class="sp__between">
            <div class="size--3 fw--600 color--white mx-45">Next In Queue</div>
            <div class="sp--btn sp--btn-transparent sp--radius me-2 px-4">CLEAR</div>
        </div>
        <div class="row mx-45 sp__table sp__bot--bordered sp__hovered">
            <div class="row sp__tr">
                <div class="col-1 sp__th"></div>
                <div class="col-1 sp__th"></div>
                <div class="col-3 sp__th">TITLE</div>
                <div class="col-2 sp__th">ARTIST</div>
                <div class="col-2 sp__th">ALBUM</div>
                <div class="col-1 sp__th"></div>
                <div class="col-2 sp__th sp__top--right"><i class="sp-clock size--3"></i></div>
            </div>
            <div class="row sp__tr">
                <div class="col-1 sp__td"><i class="sp-play-circle size--4"></i></div>
                <div class="col-1 sp__td"><i class="sp-love"></i></div>
                <div class="col-3 sp__td">Fuckin Boyfriend</div>
                <div class="col-2 sp__td"><a href="#" class="custom__link">Agnez Mo</a></div>
                <div class="col-2 sp__td"><a href="#" class="custom__link">Queen</a></div>
                <div class="col-1 sp__td sp__top--center">
                    <div class="sp__dropdown">
                        <div data-toggle="dropdown"><i class="sp-ellipsis-h"></i></div>
                        <span class="sp__dropdown--content hide__element">
                            <a href="">Add to Queue</a>
                            <a href="">Go to Song Radio</a>
                            <div class="sp__divider"></div>
                            <!-- <a href="">Go to Artist</a> -->
                            <span class="sp__sub--dropdown">
                                <a href="">
                                    <div class="row">
                                        <div class="col-10">Go To Artist</div>
                                        <div class="col-2 sp__mid--left"><i class="sp-right"></i></div>
                                    </div>
                                </a>
                                <div class="sp__sub--dropdown--content">
                                    <a href="">Oeoes</a>
                                    <a href="">Arijit Singh</a>
                                </div>
                            </span>
                            <a href="">Go to Album</a>
                            <div class="sp__divider"></div>
                            <a href="">Remove from Your Liked Song</a>
                            <span class="sp__sub--dropdown">
                                <a href="">
                                    <div class="row">
                                        <div class="col-10">Add to Playlist</div>
                                        <div class="col-2 sp__mid--left"><i class="sp-right"></i></div>
                                    </div>
                                </a>
                                <div class="sp__sub--dropdown--content">
                                    <a href="">New Playlist</a>
                                    <div class="sp__divider"></div>
                                    <a href="">My Playlist#01</a>
                                </div>
                            </span>
                            <div class="sp__divider"></div>
                            <a href="">Remove from Queue</a>
                        </span>
                    </div>
                </div>
                <div class="col-2 sp__td sp__top--right">3:45</div>
            </div>
            <div class="row sp__tr">
                <div class="col-1 sp__td"><i class="sp-play-circle size--4"></i></div>
                <div class="col-1 sp__td"><i class="sp-love"></i></div>
                <div class="col-3 sp__td">Fuckin Boyfriend</div>
                <div class="col-2 sp__td"><a href="#" class="custom__link">Agnez Mo</a></div>
                <div class="col-2 sp__td"><a href="#" class="custom__link">Queen</a></div>
                <div class="col-1 sp__td sp__top--center">
                    <div class="sp__dropdown">
                        <div data-toggle="dropdown"><i class="sp-ellipsis-h"></i></div>
                        <span class="sp__dropdown--content hide__element">
                            <a href="">Add to Queue</a>
                            <a href="">Go to Song Radio</a>
                            <div class="sp__divider"></div>
                            <!-- <a href="">Go to Artist</a> -->
                            <span class="sp__sub--dropdown">
                                <a href="">
                                    <div class="row">
                                        <div class="col-10">Go To Artist</div>
                                        <div class="col-2 sp__mid--left"><i class="sp-right"></i></div>
                                    </div>
                                </a>
                                <div class="sp__sub--dropdown--content">
                                    <a href="">Oeoes</a>
                                    <a href="">Arijit Singh</a>
                                </div>
                            </span>
                            <a href="">Go to Album</a>
                            <div class="sp__divider"></div>
                            <a href="">Remove from Your Liked Song</a>
                            <span class="sp__sub--dropdown">
                                <a href="">
                                    <div class="row">
                                        <div class="col-10">Add to Playlist</div>
                                        <div class="col-2 sp__mid--left"><i class="sp-right"></i></div>
                                    </div>
                                </a>
                                <div class="sp__sub--dropdown--content">
                                    <a href="">New Playlist</a>
                                    <div class="sp__divider"></div>
                                    <a href="">My Playlist#01</a>
                                </div>
                            </span>
                            <div class="sp__divider"></div>
                            <a href="">Remove from Queue</a>
                        </span>
                    </div>
                </div>
                <div class="col-2 sp__td sp__top--right">3:45</div>
            </div>
            <div class="row sp__tr">
                <div class="col-1 sp__td"><i class="sp-play-circle size--4"></i></div>
                <div class="col-1 sp__td"><i class="sp-love"></i></div>
                <div class="col-3 sp__td">Fuckin Boyfriend</div>
                <div class="col-2 sp__td"><a href="#" class="custom__link">Agnez Mo</a></div>
                <div class="col-2 sp__td"><a href="#" class="custom__link">Queen</a></div>
                <div class="col-1 sp__td sp__top--center">
                    <div class="sp__dropdown">
                        <div data-toggle="dropdown"><i class="sp-ellipsis-h"></i></div>
                        <span class="sp__dropdown--content hide__element">
                            <a href="">Add to Queue</a>
                            <a href="">Go to Song Radio</a>
                            <div class="sp__divider"></div>
                            <!-- <a href="">Go to Artist</a> -->
                            <span class="sp__sub--dropdown">
                                <a href="">
                                    <div class="row">
                                        <div class="col-10">Go To Artist</div>
                                        <div class="col-2 sp__mid--left"><i class="sp-right"></i></div>
                                    </div>
                                </a>
                                <div class="sp__sub--dropdown--content">
                                    <a href="">Oeoes</a>
                                    <a href="">Arijit Singh</a>
                                </div>
                            </span>
                            <a href="">Go to Album</a>
                            <div class="sp__divider"></div>
                            <a href="">Remove from Your Liked Song</a>
                            <span class="sp__sub--dropdown">
                                <a href="">
                                    <div class="row">
                                        <div class="col-10">Add to Playlist</div>
                                        <div class="col-2 sp__mid--left"><i class="sp-right"></i></div>
                                    </div>
                                </a>
                                <div class="sp__sub--dropdown--content">
                                    <a href="">New Playlist</a>
                                    <div class="sp__divider"></div>
                                    <a href="">My Playlist#01</a>
                                </div>
                            </span>
                            <div class="sp__divider"></div>
                            <a href="">Remove from Queue</a>
                        </span>
                    </div>
                </div>
                <div class="col-2 sp__td sp__top--right">3:45</div>
            </div>
            <div class="row sp__tr">
                <div class="col-1 sp__td"><i class="sp-play-circle size--4"></i></div>
                <div class="col-1 sp__td"><i class="sp-love"></i></div>
                <div class="col-3 sp__td">Fuckin Boyfriend</div>
                <div class="col-2 sp__td"><a href="#" class="custom__link">Agnez Mo</a></div>
                <div class="col-2 sp__td"><a href="#" class="custom__link">Queen</a></div>
                <div class="col-1 sp__td sp__top--center">
                    <div class="sp__dropdown">
                        <div data-toggle="dropdown"><i class="sp-ellipsis-h"></i></div>
                        <span class="sp__dropdown--content hide__element">
                            <a href="">Add to Queue</a>
                            <a href="">Go to Song Radio</a>
                            <div class="sp__divider"></div>
                            <!-- <a href="">Go to Artist</a> -->
                            <span class="sp__sub--dropdown">
                                <a href="">
                                    <div class="row">
                                        <div class="col-10">Go To Artist</div>
                                        <div class="col-2 sp__mid--left"><i class="sp-right"></i></div>
                                    </div>
                                </a>
                                <div class="sp__sub--dropdown--content">
                                    <a href="">Oeoes</a>
                                    <a href="">Arijit Singh</a>
                                </div>
                            </span>
                            <a href="">Go to Album</a>
                            <div class="sp__divider"></div>
                            <a href="">Remove from Your Liked Song</a>
                            <span class="sp__sub--dropdown">
                                <a href="">
                                    <div class="row">
                                        <div class="col-10">Add to Playlist</div>
                                        <div class="col-2 sp__mid--left"><i class="sp-right"></i></div>
                                    </div>
                                </a>
                                <div class="sp__sub--dropdown--content">
                                    <a href="">New Playlist</a>
                                    <div class="sp__divider"></div>
                                    <a href="">My Playlist#01</a>
                                </div>
                            </span>
                            <div class="sp__divider"></div>
                            <a href="">Remove from Queue</a>
                        </span>
                    </div>
                </div>
                <div class="col-2 sp__td sp__top--right">3:45</div>
            </div>
            <div class="row sp__tr">
                <div class="col-1 sp__td"><i class="sp-play-circle size--4"></i></div>
                <div class="col-1 sp__td"><i class="sp-love"></i></div>
                <div class="col-3 sp__td">Fuckin Boyfriend</div>
                <div class="col-2 sp__td"><a href="#" class="custom__link">Agnez Mo</a></div>
                <div class="col-2 sp__td"><a href="#" class="custom__link">Queen</a></div>
                <div class="col-1 sp__td sp__top--center">
                    <div class="sp__dropdown">
                        <div data-toggle="dropdown"><i class="sp-ellipsis-h"></i></div>
                        <span class="sp__dropdown--content hide__element">
                            <a href="">Add to Queue</a>
                            <a href="">Go to Song Radio</a>
                            <div class="sp__divider"></div>
                            <!-- <a href="">Go to Artist</a> -->
                            <span class="sp__sub--dropdown">
                                <a href="">
                                    <div class="row">
                                        <div class="col-10">Go To Artist</div>
                                        <div class="col-2 sp__mid--left"><i class="sp-right"></i></div>
                                    </div>
                                </a>
                                <div class="sp__sub--dropdown--content">
                                    <a href="">Oeoes</a>
                                    <a href="">Arijit Singh</a>
                                </div>
                            </span>
                            <a href="">Go to Album</a>
                            <div class="sp__divider"></div>
                            <a href="">Remove from Your Liked Song</a>
                            <span class="sp__sub--dropdown">
                                <a href="">
                                    <div class="row">
                                        <div class="col-10">Add to Playlist</div>
                                        <div class="col-2 sp__mid--left"><i class="sp-right"></i></div>
                                    </div>
                                </a>
                                <div class="sp__sub--dropdown--content">
                                    <a href="">New Playlist</a>
                                    <div class="sp__divider"></div>
                                    <a href="">My Playlist#01</a>
                                </div>
                            </span>
                            <div class="sp__divider"></div>
                            <a href="">Remove from Queue</a>
                        </span>
                    </div>
                </div>
                <div class="col-2 sp__td sp__top--right">3:45</div>
            </div>
            <div class="row sp__tr">
                <div class="col-1 sp__td"><i class="sp-play-circle size--4"></i></div>
                <div class="col-1 sp__td"><i class="sp-love"></i></div>
                <div class="col-3 sp__td">Fuckin Boyfriend</div>
                <div class="col-2 sp__td"><a href="#" class="custom__link">Agnez Mo</a></div>
                <div class="col-2 sp__td"><a href="#" class="custom__link">Queen</a></div>
                <div class="col-1 sp__td sp__top--center">
                    <div class="sp__dropdown">
                        <div data-toggle="dropdown"><i class="sp-ellipsis-h"></i></div>
                        <span class="sp__dropdown--content hide__element">
                            <a href="">Add to Queue</a>
                            <a href="">Go to Song Radio</a>
                            <div class="sp__divider"></div>
                            <!-- <a href="">Go to Artist</a> -->
                            <span class="sp__sub--dropdown">
                                <a href="">
                                    <div class="row">
                                        <div class="col-10">Go To Artist</div>
                                        <div class="col-2 sp__mid--left"><i class="sp-right"></i></div>
                                    </div>
                                </a>
                                <div class="sp__sub--dropdown--content">
                                    <a href="">Oeoes</a>
                                    <a href="">Arijit Singh</a>
                                </div>
                            </span>
                            <a href="">Go to Album</a>
                            <div class="sp__divider"></div>
                            <a href="">Remove from Your Liked Song</a>
                            <span class="sp__sub--dropdown">
                                <a href="">
                                    <div class="row">
                                        <div class="col-10">Add to Playlist</div>
                                        <div class="col-2 sp__mid--left"><i class="sp-right"></i></div>
                                    </div>
                                </a>
                                <div class="sp__sub--dropdown--content">
                                    <a href="">New Playlist</a>
                                    <div class="sp__divider"></div>
                                    <a href="">My Playlist#01</a>
                                </div>
                            </span>
                            <div class="sp__divider"></div>
                            <a href="">Remove from Queue</a>
                        </span>
                    </div>
                </div>
                <div class="col-2 sp__td sp__top--right">3:45</div>
            </div>
            <div class="row sp__tr">
                <div class="col-1 sp__td"><i class="sp-play-circle size--4"></i></div>
                <div class="col-1 sp__td"><i class="sp-love"></i></div>
                <div class="col-3 sp__td">Fuckin Boyfriend</div>
                <div class="col-2 sp__td"><a href="#" class="custom__link">Agnez Mo</a></div>
                <div class="col-2 sp__td"><a href="#" class="custom__link">Queen</a></div>
                <div class="col-1 sp__td sp__top--center">
                    <div class="sp__dropdown">
                        <div data-toggle="dropdown"><i class="sp-ellipsis-h"></i></div>
                        <span class="sp__dropdown--content hide__element">
                            <a href="">Add to Queue</a>
                            <a href="">Go to Song Radio</a>
                            <div class="sp__divider"></div>
                            <!-- <a href="">Go to Artist</a> -->
                            <span class="sp__sub--dropdown">
                                <a href="">
                                    <div class="row">
                                        <div class="col-10">Go To Artist</div>
                                        <div class="col-2 sp__mid--left"><i class="sp-right"></i></div>
                                    </div>
                                </a>
                                <div class="sp__sub--dropdown--content">
                                    <a href="">Oeoes</a>
                                    <a href="">Arijit Singh</a>
                                </div>
                            </span>
                            <a href="">Go to Album</a>
                            <div class="sp__divider"></div>
                            <a href="">Remove from Your Liked Song</a>
                            <span class="sp__sub--dropdown">
                                <a href="">
                                    <div class="row">
                                        <div class="col-10">Add to Playlist</div>
                                        <div class="col-2 sp__mid--left"><i class="sp-right"></i></div>
                                    </div>
                                </a>
                                <div class="sp__sub--dropdown--content">
                                    <a href="">New Playlist</a>
                                    <div class="sp__divider"></div>
                                    <a href="">My Playlist#01</a>
                                </div>
                            </span>
                            <div class="sp__divider"></div>
                            <a href="">Remove from Queue</a>
                        </span>
                    </div>
                </div>
                <div class="col-2 sp__td sp__top--right">3:45</div>
            </div>
            <div class="row sp__tr">
                <div class="col-1 sp__td"><i class="sp-play-circle size--4"></i></div>
                <div class="col-1 sp__td"><i class="sp-love"></i></div>
                <div class="col-3 sp__td">Fuckin Boyfriend</div>
                <div class="col-2 sp__td"><a href="#" class="custom__link">Agnez Mo</a></div>
                <div class="col-2 sp__td"><a href="#" class="custom__link">Queen</a></div>
                <div class="col-1 sp__td sp__top--center">
                    <div class="sp__dropdown">
                        <div data-toggle="dropdown"><i class="sp-ellipsis-h"></i></div>
                        <span class="sp__dropdown--content hide__element">
                            <a href="">Add to Queue</a>
                            <a href="">Go to Song Radio</a>
                            <div class="sp__divider"></div>
                            <!-- <a href="">Go to Artist</a> -->
                            <span class="sp__sub--dropdown">
                                <a href="">
                                    <div class="row">
                                        <div class="col-10">Go To Artist</div>
                                        <div class="col-2 sp__mid--left"><i class="sp-right"></i></div>
                                    </div>
                                </a>
                                <div class="sp__sub--dropdown--content">
                                    <a href="">Oeoes</a>
                                    <a href="">Arijit Singh</a>
                                </div>
                            </span>
                            <a href="">Go to Album</a>
                            <div class="sp__divider"></div>
                            <a href="">Remove from Your Liked Song</a>
                            <span class="sp__sub--dropdown">
                                <a href="">
                                    <div class="row">
                                        <div class="col-10">Add to Playlist</div>
                                        <div class="col-2 sp__mid--left"><i class="sp-right"></i></div>
                                    </div>
                                </a>
                                <div class="sp__sub--dropdown--content">
                                    <a href="">New Playlist</a>
                                    <div class="sp__divider"></div>
                                    <a href="">My Playlist#01</a>
                                </div>
                            </span>
                            <div class="sp__divider"></div>
                            <a href="">Remove from Queue</a>
                        </span>
                    </div>
                </div>
                <div class="col-2 sp__td sp__top--right">3:45</div>
            </div>
        </div>
    </div>
</div>

@endsection