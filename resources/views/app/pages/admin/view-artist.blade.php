@extends('app.layouts.admin.parent')

@section('data-page', 'view-artist')

@section('modal')
<div class="sp--btn sp--btn-green btn--add modal__button sp__mid--center rounded__element size--3" data-target="#add__collection"><i class="sp-plus"></i></div>
<div id="add__collection" class="modal__container sp__mid--center hidden">
    <div class="modal__content--sm">
        <div class="modal__close button__control"><i class="sp-cross"></i></div>
        <div class="modal__header mt-3">
            <div class="size--4 fw---600">Add Collection (Album/Single/Ep)</div>
        </div>
        <div class="modal__body mt-2">
            <p class="size--3 fw--200">
            <form action="{{ route('admin.artists.album.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="sp__form--group">
                    <input name="title" type="text" class="sp__form--control-white" placeholder="Title">
                    <input name="artist_id" type="hidden" class="sp__form--control-white" value="{{ $artist->id }}">
                </div>

                <div class="sp__form--group">
                    <select name="collection_type" class="sp__form--control-white">
                        <option>Pick collection type</option>
                        <option value="album">Album</option>
                        <option value="single">Single</option>
                        <option value="ep">EP</option>
                    </select>
                </div>

                <div class="sp__form--group">
                    <input name="year" type="text" class="sp__form--control-white" placeholder="Year">
                </div>

                <div class="sp__form--group">
                    <input name="publisher" type="text" class="sp__form--control-white" placeholder="Publisher">
                </div>

                <div class="sp__form--group">
                    <input name="cover" accept="image/*" type="file" class="hide__element">
                    <div class="sp__photo--frame m-auto color--grey sp__mid--center">
                        <img src="" alt="" class="hide__element img__responsive">
                        <span>Upload collection cover</span>
                    </div>
                </div>
                </p>
        </div>
        <div class="modal__footer sp__top--center">
            <button type="submit" class="sp--btn sp--btn-green rounded-pill px-4">CREATE</button>
            </form>
        </div>

    </div>
    <div class="modal__overlay"></div>
</div>
@endsection

@section('app-content')
<div class="app__header artist__header--height sp__column--bot">
    <!-- backgrond image of artist -->
    <div class="artist__background--image">
    </div>

    <div class="playlist__header--container sp__column--bot">
        <div class="playlist__sticky--header-container sp__column--bot pb-2 opacity__0">
            <div class="row my-3 artist__title--bar hide__element--translate">
                <div class="col-6">
                    <div class="playlist__thumbnail--title size--4 fw--600 px-5">
                        {{ $artist->full_name }}
                    </div>
                </div>
                <div class="col-3"></div>
                <div class="col-3">
                    <div class="sp__top--right">
                        <div class="sp--btn sp--btn-green sp--radius me-2 px-5">PLAY</div>
                        <div class="sp--btn sp--btn-transparent sp--radius me-2"><i class="sp-love"></i></div>
                        <div class="sp__dropdown">
                            <div class="sp--btn sp--btn-transparent sp--radius me-2" data-toggle="dropdown"><i class="sp-ellipsis-h"></i></div>
                            <span class="sp__dropdown--content hide__element">
                                <a href="#">Go to Artist Radio</a>
                                <div class="sp__divider"></div>
                                <a href="#">Follow</a>
                                <a href="#">Report</a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="sp__top--left header__tab--container mx-5">
                        <div class="header__tab size--1 fw--600 ls--2 color--grey" data-tab-button="overview"><span class="header__tab--active"></span> <span>OVERVIEW</span></div>
                        <div class="header__tab size--1 fw--600 ls--2 color--grey" data-tab-button="fans_also_like"><span>FANS ALSO LIKE</span></div>
                        <div class="header__tab size--1 fw--600 ls--2 color--grey" data-tab-button="about"><span>ABOUT</span></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="artist__header--intro">
            <div class="row mx-45">
                <div class="col-12 mt-3">
                    <div class="size--1 ls--3 fw--300 color--white mb-3">ARTIST</div>
                </div>
                <div class="col-12 mb-3">
                    <div class="header__title display-1 fw--700 no__padding">{{ $artist->full_name }}</div>
                </div>
                <div class="col-12 mb-3">
                    <div class="row">
                        <div class="col-4">
                            <div class="sp__top--left">
                                <div class="sp--btn sp--btn-green sp--radius me-2 px-5">PLAY</div>
                                <div class="sp--btn sp--btn-transparent sp--radius me-2 px-5">FOLLOW</div>
                                <div class="sp--btn sp--btn-transparent sp--radius me-2"><i class="sp-love"></i></div>
                                <div class="sp__dropdown">
                                    <div class="sp--btn sp--btn-transparent sp--radius me-2" data-toggle="dropdown"><i class="sp-ellipsis-h"></i></div>
                                    <span class="sp__dropdown--content hide__element">
                                        <a href="#">Go to Artist Radio</a>
                                        <div class="sp__divider"></div>
                                        <a href="#">Follow</a>
                                        <a href="#">Report</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-6"></div>
                        <div class="col-2">
                            <div class="size--2 fw--200 color--grey ls--1 text-right">MONTHLY LISTENERS</div>
                            <div class="size--2 fw--200 color--grey ls--1 text-right">372,28</div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="sp__top--left header__tab--container no__padding">
                        <div class="header__tab size--1 fw--600 ls--2 color--grey" data-tab-button="overview"><span class="header__tab--active"></span> <span>OVERVIEW</span></div>
                        <div class="header__tab size--1 fw--600 ls--2 color--grey" data-tab-button="fans_also_like"><span>FANS ALSO LIKE</span></div>
                        <div class="header__tab size--1 fw--600 ls--2 color--grey" data-tab-button="about"><span>ABOUT</span></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- TAB CONTENT -->
<div class="body__content--container" data-tab-content="overview">
    <div class="artist__info--container">
        <div class="row">
            <div class="col-8">
                <div class="size--3 fw--600 color--white mb-4">Popular</div>
                <!-- List of songs -->
                <div class="song__list--container no__padding">
                    <div class="row sp__table sp__bordered sp__hovered">
                        @forelse ($popular as $p)
                        <div class="row sp__tr">
                            <div class="col-1 sp__td no__padding">
                                <img class="img__responsive" src="" alt="cover song">
                            </div>
                            <div class="col-1 sp__td sp__mid--center"><i class="sp-play-circle size--4"></i></div>
                            <div class="col-1 sp__td sp__mid--center"><i class="sp-love"></i></div>
                            <div class="col-6 sp__td sp__mid--left">Fuckin Boyfriend</div>
                            <div class="col-1 sp__td sp__mid--right">
                                <div class="sp__dropdown">
                                    <div data-toggle="dropdown"><i class="sp-ellipsis-h"></i></div>
                                    <span class="sp__dropdown--content hide__element">
                                        <a href="#">Add to Queue</a>
                                        <a href="#">Go to Song Radio</a>
                                        <div class="sp__divider"></div>
                                        <!-- <a href="#">Go to Artist</a> -->
                                        <span class="sp__sub--dropdown">
                                            <a href="#">
                                                <div class="row">
                                                    <div class="col-10">Go To Artist</div>
                                                    <div class="col-2 sp__mid--left"><i class="sp-right"></i></div>
                                                </div>
                                            </a>
                                            <div class="sp__sub--dropdown--content">
                                                <a href="#">Oeoes</a>
                                                <a href="#">Arijit Singh</a>
                                            </div>
                                        </span>
                                        <a href="#">Go to Album</a>
                                        <div class="sp__divider"></div>
                                        <a href="#">Add to your Liked Song</a>
                                        <span class="sp__sub--dropdown">
                                            <a href="#">
                                                <div class="row">
                                                    <div class="col-10">Add to Playlist</div>
                                                    <div class="col-2 sp__mid--left"><i class="sp-right"></i></div>
                                                </div>
                                            </a>
                                            <div class="sp__sub--dropdown--content">
                                                <a href="#">New Playlist</a>
                                                <div class="sp__divider"></div>
                                                <a href="#">My Playlist#01</a>
                                            </div>
                                        </span>
                                    </span>
                                </div>
                            </div>
                            <div class="col-2 sp__td sp__mid--right">4,456,678</div>
                        </div>
                        @empty
                        <div class="col-12 sp__td mx-3">No data.</div>
                        @endforelse
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="size--3 fw--600 color--white mb-4">Fans Also Like</div>
                <div class="row sp__table sp__hovered">
                    @forelse ($fans as $f)
                    <div class="row sp__tr mb-3">
                        <a href="#" class="custom__link--liked-fans">
                            <div class="row">
                                <div class="col-2 sp__td no__padding">
                                    <img class="rounded-pill" src="" alt="thumbnail artist" style="width: 50px">
                                </div>
                                <div class="col-10 sp__td sp__mid--left">
                                    <div class="size--2 fw--600 color--white">Jason Derulo</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @empty
                    <a href="#" class="custom__link--liked-fans">
                        <div class="row">
                            <div class="col-12 sp__td no__padding mx-3">
                                No data
                            </div>
                        </div>
                    </a>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <div class="content__section">
        <div class="content__section--title size--3 fw--600 color--white">
            <div>
                Albums
            </div>
        </div>
        <div class="container mt-3">
            <div class="row g-2">
                @forelse ($albums as $key => $album)
                <div class="col-md-3">
                    <div class="box">
                        <div class="image__top">
                            <div class="hidden__element--wrapper image__top--hide">
                                <div class="box__buttons--container sp__around--center">
                                    <span class="sp--btn sp--btn-blue modal__button" data-target="#edit__album{{$key}}"><i class="sp-edit"></i> EDIT</span>
                                    <span class="sp--btn sp--btn-red modal__button" data-target="#delete__album{{$key}}"><i class="sp-delete"></i> DELETE</span>
                                </div>
                                <a href="{{ route('admin.artists.album.view', ['album' => $album->id]) }}" class="image__top--overlay sp__around--center">

                                </a>
                            </div>
                            <img src="{{ $album->cover }}" alt="cover album">
                        </div>
                        <div class="box__title"><a class="size--2 fw--600 color--white" href="{{ route('admin.artists.album.view', ['album' => $album->id]) }}">{{ $album->title }}</a></div>
                        <p class="size--2 fw--400 color--grey">
                            {{ $album->year }}
                        </p>
                    </div>
                </div>

                <div id="edit__album{{$key}}" class="modal__container sp__mid--center hidden">
                    <div class="modal__content--sm">
                        <div class="modal__close button__control"><i class="sp-cross"></i></div>
                        <div class="modal__header mt-3">
                            <div class="size--4 fw---600">Edit Album</div>
                        </div>
                        <div class="modal__body mt-2">
                            <p class="size--3 fw--200">
                            <form action="{{ route('admin.artists.album.update', ['album' => $album->id]) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="sp__form--group">
                                    <input name="title" type="text" class="sp__form--control-white" placeholder="Title" value="{{ $album->title }}">
                                    <input name="artist_id" type="hidden" class="sp__form--control-white" value="{{ $artist->id }}">
                                </div>

                                <div class="sp__form--group">
                                    <select name="collection_type" class="sp__form--control-white">
                                        <option>Pick collection type</option>
                                        <option <?php $album->collection_type === 'album' ? print "selected" : '' ?> value="album">Album</option>
                                        <option <?php $album->collection_type === 'single' ? print 'selected' : '' ?> value="single">Single</option>
                                        <option <?php $album->collection_type === 'ep' ? print 'selected' : '' ?> value="ep">EP</option>
                                    </select>
                                </div>

                                <div class="sp__form--group">
                                    <input name="year" type="text" class="sp__form--control-white" placeholder="Year" value="{{ $album->year }}">
                                </div>

                                <div class="sp__form--group">
                                    <input name="publisher" type="text" class="sp__form--control-white" placeholder="Publisher" value="{{ $album->publisher }}">
                                </div>

                                <div class="sp__form--group">
                                    <input name="cover" accept="image/*" type="file" class="hide__element">
                                    <div class="sp__photo--frame m-auto color--grey sp__mid--center">
                                        <img src="{{ $album->cover }}" alt="" class="img__responsive">
                                        <span class="hide__element">Upload collection cover</span>
                                    </div>
                                </div>
                                </p>
                        </div>
                        <div class="modal__footer sp__top--center">
                            <button type="submit" class="sp--btn sp--btn-green rounded-pill px-4">UPDATE</button>
                            </form>
                        </div>

                    </div>
                    <div class="modal__overlay"></div>
                </div>
                <div id="delete__album{{$key}}" class="modal__container sp__mid--center hidden">
                    <div class="modal__content">
                        <div class="modal__close button__control"><i class="sp-cross"></i></div>
                        <div class="modal__header mt-3">
                            <div class="size--4 fw---600">Delete Album</div>
                        </div>
                        <div class="modal__body mt-2">
                            <div class="size--3 fw--200">
                                <form action="{{ route('admin.artists.album.delete', ['album' => $album->id]) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('DELETE')
                                    Are you sure to delete this album?
                            </div>
                        </div>
                        <div class="modal__footer sp__top--center">
                            <button type="submit" class="sp--btn sp--btn-red rounded-pill px-4">ABSOLUTELY</button>
                        </div>
                        </form>

                    </div>
                    <div class="modal__overlay"></div>
                </div>
                @empty
                <div class="no__data size--5 color--grey sp__mid--center">
                    Albums Unavailable
                </div>
                @endforelse
            </div>
        </div>
    </div>

    <div class="content__section">
        <div class="content__section--title size--3 fw--600 color--white">
            <div>
                Singles And EPs
            </div>
        </div>
        <div class="container mt-3">
            <div class="row g-2">
                @forelse ($single_eps as $key => $se)
                <div class="col-md-3">
                    <div class="box">
                        <div class="image__top">
                            <div class="hidden__element--wrapper image__top--hide">
                                <div class="box__buttons--container sp__around--center">
                                    <span class="sp--btn sp--btn-blue modal__button" data-target="#edit__se{{$key}}"><i class="sp-edit"></i> EDIT</span>
                                    <span class="sp--btn sp--btn-red modal__button" data-target="#delete__se{{$key}}"><i class="sp-delete"></i> DELETE</span>
                                </div>
                                <a href="{{ route('admin.artists.album.view', ['album' => $se->id]) }}" class="image__top--overlay sp__around--center">

                                </a>
                            </div>
                            <img src="{{ $se->cover }}" alt="cover single">
                        </div>
                        <div class="box__title"><a class="size--2 fw--600 color--white" href="{{ route('admin.artists.album.view', ['album' => $se->id]) }}">{{ $se->title }}</a></div>
                        <p class="size--2 fw--400 color--grey">
                            {{ $se->year }}
                        </p>
                    </div>
                </div>

                <div id="edit__se{{$key}}" class="modal__container sp__mid--center hidden">
                    <div class="modal__content--sm">
                        <div class="modal__close button__control"><i class="sp-cross"></i></div>
                        <div class="modal__header mt-3">
                            <div class="size--4 fw---600">Edit Album</div>
                        </div>
                        <div class="modal__body mt-2">
                            <p class="size--3 fw--200">
                            <form action="{{ route('admin.artists.album.update', ['album' => $se->id]) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="sp__form--group">
                                    <input name="title" type="text" class="sp__form--control-white" placeholder="Title" value="{{ $se->title }}">
                                    <input name="artist_id" type="hidden" class="sp__form--control-white" value="{{ $artist->id }}">
                                </div>

                                <div class="sp__form--group">
                                    <select name="collection_type" class="sp__form--control-white">
                                        <option>Pick collection type</option>
                                        <option <?php $se->collection_type === 'album' ? print "selected" : '' ?> value="album">Album</option>
                                        <option <?php $se->collection_type === 'single' ? print 'selected' : '' ?> value="single">Single</option>
                                        <option <?php $se->collection_type === 'ep' ? print 'selected' : '' ?> value="ep">EP</option>
                                    </select>
                                </div>

                                <div class="sp__form--group">
                                    <input name="year" type="text" class="sp__form--control-white" placeholder="Year" value="{{ $se->year }}">
                                </div>

                                <div class="sp__form--group">
                                    <input name="publisher" type="text" class="sp__form--control-white" placeholder="Publisher" value="{{ $se->publisher }}">
                                </div>

                                <div class="sp__form--group">
                                    <input name="cover" accept="image/*" type="file" class="hide__element">
                                    <div class="sp__photo--frame m-auto color--grey sp__mid--center">
                                        <img src="{{ $se->cover }}" alt="" class="img__responsive">
                                        <span class="hide__element">Upload collection cover</span>
                                    </div>
                                </div>
                                </p>
                        </div>
                        <div class="modal__footer sp__top--center">
                            <button type="submit" class="sp--btn sp--btn-green rounded-pill px-4">UPDATE</button>
                            </form>
                        </div>

                    </div>
                    <div class="modal__overlay"></div>
                </div>
                <div id="delete__se{{$key}}" class="modal__container sp__mid--center hidden">
                    <div class="modal__content">
                        <div class="modal__close button__control"><i class="sp-cross"></i></div>
                        <div class="modal__header mt-3">
                            <div class="size--4 fw---600">Delete Single/Ep</div>
                        </div>
                        <div class="modal__body mt-2">
                            <div class="size--3 fw--200">
                                <form action="{{ route('admin.artists.album.delete', ['album' => $se->id]) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('DELETE')
                                    Are you sure to delete this album?
                            </div>
                        </div>
                        <div class="modal__footer sp__top--center">
                            <button type="submit" class="sp--btn sp--btn-red rounded-pill px-4">ABSOLUTELY</button>
                        </div>
                        </form>

                    </div>
                    <div class="modal__overlay"></div>
                </div>
                @empty
                <div class="no__data size--5 color--grey sp__mid--center">
                    Single nor EP Unavailable
                </div>
                @endforelse
            </div>
        </div>
    </div>
</div>

<div class="body__content--container tab__content--hidden" data-tab-content="fans_also_like">

    <div class="artist__info--container">
        <div class="content__section--title size--3 fw--600 color--white">
            <div>
                Discover more artists -- based on what fans play on SpotifyClone 😁
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 my-3">
                <div class="box margin__auto">
                    <div class="image__top">
                        <div class="hidden__element--wrapper image__top--hide">
                            <div class="box__buttons--container sp__around--center">
                                <span class="box__btn--love"><i class="sp-love"></i></span>
                                <span class="box__btn--play"><i class="sp-play-circle"></i> <i class="sp-pause-circle"></i></span>
                                <span class="sp__dropdown">
                                    <span class="box__btn--more" data-toggle="dropdown"><i class="sp-ellipsis-h"></i></span>
                                    <span class="sp__dropdown--content hide__element">
                                        <a href="#">Go to Artist Radio</a>
                                        <div class="sp__divider"></div>
                                        <a href="#">Follow</a>
                                    </span>
                                </span>
                            </div>
                            <a href="#" class="image__top--overlay sp__around--center rounded__element"></a>
                        </div>
                        <img class="rounded__element" src="" alt="another artst photo">
                    </div>
                    <div class="box__title text-center"><a class="size--2 fw--600 color--white" href="#">GAC (Gamaliel Audrey Cantika)</a></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="body__content--container tab__content--hidden" data-tab-content="about">
    <div class="artist__info--container">
        <div class="size--3 fw--600 color--white mb-3">
            Image Gallery
        </div>
        <div class="size--3 fw--600 color--white mb-3">
            Bio
        </div>
        <p class="artist__bio size--2 fw--400 color--grey ls--1">
            {{ $artist->bio }}
        </p>

        <div class="sp__mid--left">
            <div class="artist__thumbnail">
                <img class="img__responsive" src="{{ $artist->profile_picture }}" alt="artist photo">
            </div>
            <div class="size--2 fw--300 color--white">Posted by {{ $artist->full_name }}</div>
        </div>

        <div class="artist__progress">
            <div class="row">
                <div class="col-6">
                    <div class="size--5 fw--600 color--white">2,345,654</div>
                    <div class="size--2 fw--500 color--grey">Monthly Listeners</div>
                </div>
                <div class="col-6">
                    <div class="size--5 fw--600 color--white">6,788,873</div>
                    <div class="size--2 fw--500 color--grey">Followers</div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END TAB CONTENT -->
@endsection

@section('custom-js')
<script>
    // Set background image of artist in header
    const bgImageUrl = "{{ $artist->profile_banner }}";
    artistBackgroundImage.style.backgroundImage = `url(${bgImageUrl})`;
</script>
@endsection