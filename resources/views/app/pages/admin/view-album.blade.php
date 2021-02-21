@extends('app.layouts.admin.parent')

@section('data-page', 'album')

@section('modal')
<div class="sp--btn sp--btn-green btn--add modal__button sp__mid--center rounded__element size--3" data-target="#add__song"><i class="sp-plus"></i></div>

<div id="add__song" class="modal__container sp__mid--center hidden">
    <div class="modal__content">
        <div class="modal__close button__control"><i class="sp-cross"></i></div>
        <div class="modal__header mt-3">
            <div class="size--4 fw---600">Add Song</div>
        </div>
        <div class="modal__body mt-2">
            <p class="size--3 fw--200">
            <form action="{{ route('admin.artist.album.songs.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="sp__form--group">
                    <input name="title" type="text" class="sp__form--control-white" placeholder="Title">
                    <input name="collection_id" type="hidden" value="{{ $album->id }}">
                </div>

                <div class="sp__form--group">
                    <input name="audio" accept="audio/*" type="file" class="hide__element">
                    <div class="sp__audio--frame m-auto color--grey sp__mid--center">
                        <span>Upload audio</span>
                    </div>
                    <input id="target-audio" name="duration" type="hidden">
                </div>
                </p>
        </div>
        <div class="modal__footer sp__top--center">
            <button class="sp--btn sp--btn-green rounded-pill px-4">ADD SONG</button>
            </form>
        </div>

    </div>
    <div class="modal__overlay"></div>
</div>
@endsection

@section('app-content')
<div class="app__header sp__bot--left">
    <div class="playlist__sticky--header-container opacity__0">
        <div class="playlist__sticky--content hide__element--translate">
            <div class="row">
                <div class="col-9 sp__top--left">
                    <img class="playlist__thumbnail--img" src="{{ asset('storage/') }}/{{ $album->cover }}" alt="">
                    <div class="size--4 fw--600 mx-3">

                    </div>
                </div>
                <div class="col-3 sp__mid--right">
                    <div class="sp--btn sp--btn-green sp--radius me-2 px-5">PLAY</div>
                    <div class="sp--btn sp--btn-transparent sp--radius me-2"><i class="sp-love"></i></div>
                    <div class="sp__dropdown">
                        <div class="sp--btn sp--btn-transparent sp--radius me-2" data-toggle="dropdown"><i class="sp-ellipsis-h"></i></div>
                        <span class="sp__dropdown--content hide__element">
                            <a href="#">Add to Queue</a>
                            <a href="#">Go to Artist Radio</a>
                            <a href="#">Go to Artist</a>
                            <div class="sp__divider"></div>
                            <a href="#">Save to Your Library</a>
                            <a href="#">Add to Playlist</a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="playlist__header--container sp__column--bot">

        <div class="row g-3 mx-45">
            <div class="col-3">
                <img class="img__responsive" src="{{ $album->cover }}" alt="">
            </div>
            <div class="col-9 sp__column--bot">
                <div class="playlist__detail">
                    <div class="size--2 fw--200 color--white ls--1">ALBUM</div>
                    <div class="size--5 fw--700 color--white">{{ $album->title }}</div>
                    <p class="size--2 fw--300 color--grey">By <a href="{{ route('admin.artists.view', ['artist' => $album->artist->id]) }}" class="custom__link">{{ $album->artist->full_name }}</a></p>
                    <p class="size--2 fw--300 color--grey">{{ $album->year }} ・ {{ count($album->songs) }} songs, 32 min</p>
                    <div class="sp__between">
                        <div class="sp__top--left">
                            <div class="sp--btn sp--btn-green sp--radius me-2 px-5">PLAY</div>
                            <div class="sp--btn sp--btn-transparent sp--radius me-2"><i class="sp-love"></i></div>
                            <div class="sp__dropdown">
                                <div class="sp--btn sp--btn-transparent sp--radius me-2" data-toggle="dropdown"><i class="sp-ellipsis-h"></i></div>
                                <span class="sp__dropdown--content hide__element">
                                    <a href="#">Add to Queue</a>
                                    <a href="#">Go to Artist Radio</a>
                                    <a href="#">Go to Artist</a>
                                    <div class="sp__divider"></div>
                                    <a href="#">Save to Your Library</a>
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
                        <div>
                            <div class="size--2 fw--200 color--grey ls--1 text-right">FOLLOWERS</div>
                            <div class="size--2 fw--200 color--grey ls--1 text-right">372,28</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- List of songs -->
<div class="song__list--container">
    <div class="row mx-45 sp__table sp__bot--bordered sp__hovered">
        <div class="row sp__tr">
            <div class="col-sm-1 sp__th">#</div>
            <div class="col-sm-1 sp__th"></div>
            <div class="col-sm-1 sp__th"></div>
            <div class="col-sm-7 sp__th">TITLE</div>
            <div class="col-sm-1 sp__th"></div>
            <div class="col-sm-1 sp__th sp__top--right"><i class="sp-clock size--3"></i></div>
        </div>
        @forelse ($album->songs as $key => $song)
        <div class="row sp__tr">
            <div class="col-sm-1 sp__td">{{ $key+1 }}</div>
            <div class="col-sm-1 sp__td"><i class="sp-play-circle size--4"></i></div>
            <div class="col-sm-1 sp__td"><i class="sp-love"></i></div>
            <div class="col-sm-7 sp__td">
                {{ $song->title }}
                @if (count($song->singers->diff([$album->artist])))
                -
                @foreach ($song->singers->diff([$album->artist]) as $artist)
                <span class="artist__name"><a href="{{ route('admin.artists.view', ['artist' => $artist->id]) }}" class="color--grey">{{ $artist->full_name }}</a></span>
                @endforeach
                @endif
            </div>
            <div class="col-sm-1 sp__td sp__top--right">
                <div class="sp__dropdown">
                    <div data-toggle="dropdown"><i class="sp-ellipsis-h"></i></div>
                    <span class="sp__dropdown--content hide__element">
                        <a href="javascript:void(0)" class="modal__button" data-target="#add__singer{{$key}}">Add Singer</a>
                        <div class="sp__divider"></div>
                        <a href="#">Add to Queue</a>
                        <a href="#">Go to Song Radio</a>

                        @if (count($song->singers) > 1)
                        <span class="sp__sub--dropdown">
                            <a href="#">
                                <div class="row">
                                    <div class="col-10">Go To Artist</div>
                                    <div class="col-2 sp__mid--left"><i class="sp-right"></i></div>
                                </div>
                            </a>
                            <div class="sp__sub--dropdown--content">
                                @foreach($song->singers as $artist)
                                <a href="{{ route('admin.artists.view', ['artist' => $artist->id]) }}">{{ $artist->full_name }}</a>
                                @endforeach
                            </div>
                        </span>
                        <div class="sp__divider"></div>
                        <span class="sp__sub--dropdown">
                            <a href="javascript:void(0)">
                                <div class="row">
                                    <div class="col-10">Remove Artist</div>
                                    <div class="col-2 sp__mid--left"><i class="sp-right"></i></div>
                                </div>
                            </a>
                            <div class="sp__sub--dropdown--content">
                                @foreach($song->singers->diff([$album->artist]) as $artist)
                                <a href="javascript:void(0)" class="modal__button" data-target="#remove__singer{{$key}}">{{ $artist->full_name }}</a>
                                <div id="remove__singer{{$key}}" class="modal__container sp__mid--center hidden">
                                    <div class="modal__content">
                                        <div class="modal__close button__control"><i class="sp-cross"></i></div>
                                        <div class="modal__header mt-3">
                                            <div class="size--4 fw---600">Remove Singer</div>
                                        </div>
                                        <div class="modal__body mt-2">
                                            <div class="size--3 fw--200">
                                                <form action="{{ route('admin.artist.album.singers.delete', ['singer' => $artist->id]) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    Are you sure to delete this singer?
                                            </div>
                                        </div>
                                        <div class="modal__footer sp__top--center">
                                            <button type="submit" class="sp--btn sp--btn-red rounded-pill px-4">ABSOLUTELY</button>
                                        </div>
                                        </form>

                                    </div>
                                    <div class="modal__overlay"></div>
                                </div>
                                @endforeach
                            </div>
                        </span>
                        @else
                        <a href="{{ route('admin.artists.view', ['artist' => $song->singers[0]->id]) }}">Go to Artist</a>
                        @endif

                        <div class="sp__divider"></div>
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
                        <div class="sp__divider"></div>
                        <a href="javascript:void(0)" class="modal__button" data-target="#delete__song{{$key}}">Delete Song</a>
                        <div id="delete__song{{$key}}" class="modal__container sp__mid--center hidden">
                            <div class="modal__content">
                                <div class="modal__close button__control"><i class="sp-cross"></i></div>
                                <div class="modal__header mt-3">
                                    <div class="size--4 fw---600">Delete Song</div>
                                </div>
                                <div class="modal__body mt-2">
                                    <div class="size--3 fw--200">
                                        <form action="{{ route('admin.artist.album.songs.delete', ['song' => $song->id]) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            Are you sure to delete this song?
                                    </div>
                                </div>
                                <div class="modal__footer sp__top--center">
                                    <button type="submit" class="sp--btn sp--btn-red rounded-pill px-4">ABSOLUTELY</button>
                                </div>
                                </form>

                            </div>
                            <div class="modal__overlay"></div>
                        </div>
                    </span>
                </div>
            </div>
            <div class="col-sm-1 sp__td sp__top--right">{{ $song->duration }}</div>
        </div>
        <div id="add__singer{{$key}}" class="modal__container sp__mid--center hidden">
            <div class="modal__content">
                <div class="modal__close button__control"><i class="sp-cross"></i></div>
                <div class="modal__header mt-3">
                    <div class="size--4 fw---600">Add Singer</div>
                </div>
                <div class="modal__body mt-2">
                    <p class="size--3 fw--200">
                    <form action="{{ route('admin.artist.album.singers.store') }}" method="post">
                        @csrf
                        <div class="sp__form--group">
                            <select name="artist_id" class="sp__form--control-white">
                                <option>Select Artist</option>
                                @foreach ($artists->diff($song->singers) as $artist)
                                <option value="{{ $artist->id }}">{{ $artist->full_name }}</option>
                                @endforeach
                            </select>
                            <input name="song_id" type="hidden" value="{{$song->id}}">
                        </div>
                        </p>
                </div>
                <div class="modal__footer sp__top--center">
                    <button type="submit" class="sp--btn sp--btn-green rounded-pill px-4">ADD SINGER</button>
                    </form>
                </div>

            </div>
            <div class="modal__overlay"></div>
        </div>
        @empty
        <div class="row sp__tr">
            <div class="col-12 sp__td text-center">Song Unavailable</div>
        </div>
        @endforelse
    </div>
</div>

<div class="size--1 fw--500 color--grey mx-5">{{ $album->publisher}}</div>

@endsection