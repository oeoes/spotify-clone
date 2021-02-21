@extends('app.layouts.parent')

@section('app-content')

<div class="app__header sp__column--bot">
    <div class="header__title size--5 fw--700 color--white sp__bot--left my-3">Browse</div>
    <div class="header__title--sticky size--4 fw--700 color--white sp__column--bot opacity__0">
        <span class="title__sticky--text hide__element--translate my-2">Browse</span>
        <div class="sp__top--left header__tab--container mb-2" data-tab-container="secondary">
            <div class="header__tab size--2 fw--400 color--grey" data-tab-button="genre_and_mood"><span class="header__tab--active"></span> <span>GENRES & MOODS</span></div>
            <div class="header__tab size--2 fw--400 color--grey" data-tab-button="podcast"><span>PODCASTS</span></div>
            <div class="header__tab size--2 fw--400 color--grey" data-tab-button="chart"><span>CHARTS</span></div>
            <div class="header__tab size--2 fw--400 color--grey" data-tab-button="new_release"><span>NEW RELEASE</span></div>
            <div class="header__tab size--2 fw--400 color--grey" data-tab-button="discover"><span>DISCOVER</span></div>
        </div>
    </div>
    <div class="sp__top--left header__tab--container px-45" data-tab-container="main">
        <div class="header__tab size--2 fw--400 color--grey" data-tab-button="genre_and_mood"><span class="header__tab--active"></span> <span>GENRES & MOODS</span></div>
        <div class="header__tab size--2 fw--400 color--grey" data-tab-button="podcast"><span>PODCASTS</span></div>
        <div class="header__tab size--2 fw--400 color--grey" data-tab-button="chart"><span>CHARTS</span></div>
        <div class="header__tab size--2 fw--400 color--grey" data-tab-button="new_release"><span>NEW RELEASE</span></div>
        <div class="header__tab size--2 fw--400 color--grey" data-tab-button="discover"><span>DISCOVER</span></div>
    </div>
</div>
<div class="body__content--container mt-4" data-tab-content="genre_and_mood">
    <div class="content__section">
        <div class="content__section--title size--3 fw--600 color--white sp__between">
            Genres & Moods
        </div>

        <div class="row">
            @forelse ($genres as $genre)
            <div class="col-md-3 my-3">
                <div class="box mx-2">
                    <div class="image__top">
                        <div class="hidden__element--wrapper image__top--hide">
                            <div class="box__buttons--container sp__around--center">
                                <span class="box__btn--love"><i class="sp-love"></i></span>
                                <span class="box__btn--play"><i class="sp-play-circle"></i> <i class="sp-pause-circle"></i></span>
                                <span class="sp__dropdown">
                                    <span class="box__btn--more" data-toggle="dropdown"><i class="sp-ellipsis-h"></i></span>
                                    <span class="sp__dropdown--content hide__element">
                                        <a href="#">Go to Playlist Radio</a>
                                        <div class="sp__divider"></div>
                                        <a href="#">Save to Your Library</a>
                                    </span>
                                </span>
                            </div>
                            <a href="#" class="image__top--overlay">

                            </a>
                        </div>
                        <img src="{{ $genre->cover }}" alt="">
                    </div>
                    <div class="box__title text-center"><a class="size--2 fw--600 color--white" href="#">{{ $genre->name }}</a></div>
                    <p class="size--2 fw--400 color--grey">
                        <!-- description -->
                    </p>
                </div>
            </div>
            @empty
            <div class="col-md-12 my-3">
                <div class="no__data size--5 color--grey sp__mid--center">
                    No data.
                </div>
            </div>
            @endforelse
        </div>
    </div>
</div>

<div class="body__content--container mt-4 tab__content--hidden" data-tab-content="podcast">
    <div class="content__section">
        <div class="content__section--title size--3 fw--600 color--white sp__between">
            Podcasts
        </div>

        <div class="row">
            @forelse ($podcasts as $podcast)
            <div class="col-md-3 my-3">
                <div class="box mx-2">
                    <div class="image__top">
                        <div class="hidden__element--wrapper image__top--hide">
                            <div class="box__buttons--container sp__around--center">
                                <span class="box__btn--love"><i class="sp-love"></i></span>
                                <span class="box__btn--play"><i class="sp-play-circle"></i> <i class="sp-pause-circle"></i></span>
                                <span class="sp__dropdown">
                                    <span class="box__btn--more" data-toggle="dropdown"><i class="sp-ellipsis-h"></i></span>
                                    <span class="sp__dropdown--content hide__element">
                                        <a href="#">Go to Playlist Radio</a>
                                        <div class="sp__divider"></div>
                                        <a href="#">Save to Your Library</a>
                                    </span>
                                </span>
                            </div>
                            <a href="#" class="image__top--overlay">

                            </a>
                        </div>
                        <img src="{{ $podcast->cover }}" alt="">
                    </div>
                    <div class="box__title text-center"><a class="size--2 fw--600 color--white" href="#">{{ $podcast->name }}</a></div>
                    <p class="size--2 fw--400 color--grey">
                        <!-- description -->
                    </p>
                </div>
            </div>
            @empty
            <div class="col-md-12 my-3">
                <div class="no__data size--5 color--grey sp__mid--center">
                    No data.
                </div>
            </div>
            @endforelse
        </div>
    </div>
</div>

<div class="body__content--container mt-4 tab__content--hidden" data-tab-content="chart">
    <div class="content__section">
        <div class="content__section--title size--3 fw--600 color--white sp__between">
            Charts
        </div>

        <div class="row">
            @forelse ($podcasts as $podcast)
            <div class="col-md-3 my-3">
                <div class="box mx-2">
                    <div class="image__top">
                        <div class="hidden__element--wrapper image__top--hide">
                            <div class="box__buttons--container sp__around--center">
                                <span class="box__btn--love"><i class="sp-love"></i></span>
                                <span class="box__btn--play"><i class="sp-play-circle"></i> <i class="sp-pause-circle"></i></span>
                                <span class="sp__dropdown">
                                    <span class="box__btn--more" data-toggle="dropdown"><i class="sp-ellipsis-h"></i></span>
                                    <span class="sp__dropdown--content hide__element">
                                        <a href="#">Go to Playlist Radio</a>
                                        <div class="sp__divider"></div>
                                        <a href="#">Save to Your Library</a>
                                    </span>
                                </span>
                            </div>
                            <a href="#" class="image__top--overlay">

                            </a>
                        </div>
                        <img src="{{ $podcast->cover }}" alt="">
                    </div>
                    <div class="box__title text-center"><a class="size--2 fw--600 color--white" href="#">{{ $podcast->name }}</a></div>
                    <p class="size--2 fw--400 color--grey">
                        <!-- description -->
                    </p>
                </div>
            </div>
            @empty
            <div class="col-md-12 my-3">
                <div class="no__data size--5 color--grey sp__mid--center">
                    No data.
                </div>
            </div>
            @endforelse
        </div>
    </div>
</div>

<div class="body__content--container mt-4 tab__content--hidden" data-tab-content="new_release">
    <div class="content__section">
        <div class="content__section--title size--3 fw--600 color--white sp__between">
            New Release
        </div>

        <div class="row">
            @forelse ($podcasts as $podcast)
            <div class="col-md-3 my-3">
                <div class="box mx-2">
                    <div class="image__top">
                        <div class="hidden__element--wrapper image__top--hide">
                            <div class="box__buttons--container sp__around--center">
                                <span class="box__btn--love"><i class="sp-love"></i></span>
                                <span class="box__btn--play"><i class="sp-play-circle"></i> <i class="sp-pause-circle"></i></span>
                                <span class="sp__dropdown">
                                    <span class="box__btn--more" data-toggle="dropdown"><i class="sp-ellipsis-h"></i></span>
                                    <span class="sp__dropdown--content hide__element">
                                        <a href="#">Go to Playlist Radio</a>
                                        <div class="sp__divider"></div>
                                        <a href="#">Save to Your Library</a>
                                    </span>
                                </span>
                            </div>
                            <a href="#" class="image__top--overlay">

                            </a>
                        </div>
                        <img src="{{ $podcast->cover }}" alt="">
                    </div>
                    <div class="box__title text-center"><a class="size--2 fw--600 color--white" href="#">{{ $podcast->name }}</a></div>
                    <p class="size--2 fw--400 color--grey">
                        <!-- description -->
                    </p>
                </div>
            </div>
            @empty
            <div class="col-md-12 my-3">
                <div class="no__data size--5 color--grey sp__mid--center">
                    No data.
                </div>
            </div>
            @endforelse
        </div>
    </div>
</div>

<div class="body__content--container mt-4 tab__content--hidden" data-tab-content="discover">
    <div class="content__section">
        <div class="content__section--title size--3 fw--600 color--white sp__between">
            Discover
        </div>

        <div class="row">
            @forelse ($podcasts as $podcast)
            <div class="col-md-3 my-3">
                <div class="box mx-2">
                    <div class="image__top">
                        <div class="hidden__element--wrapper image__top--hide">
                            <div class="box__buttons--container sp__around--center">
                                <span class="box__btn--love"><i class="sp-love"></i></span>
                                <span class="box__btn--play"><i class="sp-play-circle"></i> <i class="sp-pause-circle"></i></span>
                                <span class="sp__dropdown">
                                    <span class="box__btn--more" data-toggle="dropdown"><i class="sp-ellipsis-h"></i></span>
                                    <span class="sp__dropdown--content hide__element">
                                        <a href="#">Go to Playlist Radio</a>
                                        <div class="sp__divider"></div>
                                        <a href="#">Save to Your Library</a>
                                    </span>
                                </span>
                            </div>
                            <a href="#" class="image__top--overlay">

                            </a>
                        </div>
                        <img src="{{ $podcast->cover }}" alt="">
                    </div>
                    <div class="box__title text-center"><a class="size--2 fw--600 color--white" href="#">{{ $podcast->name }}</a></div>
                    <p class="size--2 fw--400 color--grey">
                        <!-- description -->
                    </p>
                </div>
            </div>
            @empty
            <div class="col-md-12 my-3">
                <div class="no__data size--5 color--grey sp__mid--center">
                    No data.
                </div>
            </div>
            @endforelse
        </div>
    </div>
</div>

@endsection