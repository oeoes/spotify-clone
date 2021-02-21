@extends('app.layouts.parent')

@section('app-content')

<div class="app__header sp__column--bot">
    <div class="header__title size--5 fw--700 color--white sp__bot--left my-3">Albums</div>
    <div class="header__title--sticky size--4 fw--700 color--white sp__bot--left opacity__0">
        <span class="title__sticky--text hide__element--translate my-2">Albums</span>
    </div>
</div>

<div class="body__content--container">
    <div class="content__section">
        <div class="content__section--title size--3 fw--600 color--white sp__between">
            <!-- <div>
                                Mood
                                <small class="content__section--subtitle size--2 fw--400 color--grey">Playlists to match your mood</small>
                            </div> -->
        </div>
        <div class="row">
            @forelse ($liked_collections as $collection)
            @php
            $album = $collection->model::find($collection->model_id);
            @endphp

            <div class="col-md-3 my-3">
                <div class="box margin__auto">
                    <div class="image__top">
                        <div class="hidden__element--wrapper image__top--hide">
                            <div class="box__buttons--container sp__around--center">
                                <span class="box__btn--love" data-type="collection" data-id="{{ $album->id }}"><i class="sp-love-fill"></i></span>
                                <span class="box__btn--play" data-url="{{ route('app.audio.collection', ['collection' => $album->id]) }}"><i class="sp-play-circle"></i> <i class="sp-pause-circle"></i></span>
                                <span class="sp__dropdown">
                                    <span class="box__btn--more" data-toggle="dropdown" data-toggle="dropdown"><i class="sp-ellipsis-h"></i></span>
                                    <span class="sp__dropdown--content hide__element">
                                        <a href="">Add to Queue</a>
                                        <a href="#">Go to Playlist Radio</a>
                                        <a href="">Go to Artist</a>
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
                                </span>
                            </div>
                            <a href="{{ route('app.albums.view', ['album' => $album->id]) }}" class="image__top--overlay sp__around--center"></a>
                        </div>
                        <img class="" src="{{ $album->cover }}" alt="">
                    </div>
                    <div class="box__title text-left">
                        <a class="size--2 fw--600 color--white" href="{{ route('app.albums.view', ['album' => $album->id]) }}">{{ $album->title }}</a>
                        <div class="size--2 fw-600 color--grey">{{ $album->artist->full_name }}</div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-md-12">
                <div class="no__data size--5 color--grey sp__mid--center">
                    List empty
                </div>
            </div>
            @endforelse
        </div>
    </div>
</div>

@endsection