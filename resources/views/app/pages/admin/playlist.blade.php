@extends('app.layouts.admin.parent')

@section('data-page', 'playlist-home')

@section('modal')
<div class="sp--btn sp--btn-green btn--add modal__button sp__mid--center rounded__element size--3" data-target="#add__playlist"><i class="sp-plus"></i></div>
<div id="add__playlist" class="modal__container sp__mid--center hidden">
    <div class="modal__content">
        <div class="modal__close button__control"><i class="sp-cross"></i></div>
        <div class="modal__header mt-3">
            <div class="size--4 fw---600">Add Playlist</div>
        </div>
        <div class="modal__body mt-2">
            <p class="size--3 fw--200">
            <form action="{{ route('admin.playlists.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="sp__form--group">
                    <input name="title" type="text" class="sp__form--control-white" placeholder="Title">
                    <input name="user_id" type="hidden">
                </div>

                <div class="sp__form--group">
                    <select name="genre_id" class="sp__form--control-white">
                        <option>Select genre</option>
                        @foreach($genres as $genre)
                        <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="sp__form--group">
                    <textarea name="description" class="sp__form--control-white" name="" cols="5" rows="5" placeholder="Write a bit description about the playlist."></textarea>
                </div>

                <div class="sp__form--group">
                    <input name="cover" accept="image/*" type="file" class="hide__element">
                    <div class="sp__photo--frame m-auto color--grey sp__mid--center">
                        <img src="" alt="" class="hide__element img__responsive">
                        <span>Upload a cover</span>
                    </div>
                </div>
                </p>
        </div>
        <div class="modal__footer sp__top--center">
            <button class="sp--btn sp--btn-green rounded-pill px-4">CREATE</button>
            </form>
        </div>

    </div>
    <div class="modal__overlay"></div>
</div>
@endsection

@section('app-content')
<div class="app__header sp__bot--left">
    <div class="header__title size--5 fw--700 color--white sp__bot--left my-3">Playlists</div>
    <div class="header__title--sticky size--4 fw--700 color--white sp__bot--left opacity__0">
        <span class="title__sticky--text hide__element--translate my-2">Playlists</span>
    </div>
</div>

<div class="content__section">
    <!-- <div class="content__section--title size--3 fw--600 color--white sp__between">
                        <div>
                            Mood
                            <small class="content__section--subtitle size--2 fw--400 color--grey">Playlists to match your mood</small>
                        </div>
                    </div> -->

    <div class="row">
        @forelse ($playlists as $key => $playlist)
        <div class="col-md-3">
            <div class="box mx-2">
                <div class="image__top">
                    <div class="hidden__element--wrapper image__top--hide">
                        <div class="box__buttons--container sp__around--center">
                            <span class="sp--btn sp--btn-blue modal__button" data-target="#edit__playlist{{$key}}"><i class="sp-edit"></i> EDIT</span>
                            <span class="sp--btn sp--btn-red modal__button" data-target="#delete__playlist{{$key}}"><i class="sp-delete"></i> DELETE</span>
                        </div>
                        <a href="{{ route('admin.playlists.view', ['playlist' => $playlist->id]) }}" class="image__top--overlay">

                        </a>
                    </div>
                    <img src="{{ $playlist->cover }}" alt="">
                </div>
                <div class="box__title"><a class="size--2 fw--600 color--white" href="{{ route('admin.playlists.view', ['playlist' => $playlist->id]) }}">{{ $playlist->title }}</a></div>
                <p class="size--2 fw--400 color--grey">
                    {{ $playlist->description }}
                </p>
            </div>
        </div>
        <div id="edit__playlist{{$key}}" class="modal__container sp__mid--center hidden">
            <div class="modal__content">
                <div class="modal__close button__control"><i class="sp-cross"></i></div>
                <div class="modal__header mt-3">
                    <div class="size--4 fw---600">Add Playlist</div>
                </div>
                <div class="modal__body mt-2">
                    <p class="size--3 fw--200">
                    <form action="{{ route('admin.playlists.update', ['playlist' => $playlist->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="sp__form--group">
                            <input name="title" type="text" class="sp__form--control-white" placeholder="Title" value="{{ $playlist->title }}">
                            <input name="user_id" type="hidden">
                        </div>

                        <div class="sp__form--group">
                            <select name="genre_id" class="sp__form--control-white">
                                <option>Select genre or mood</option>
                                @foreach($genres as $genre)
                                <option <?php $genre->id === $playlist->genre_id ? print 'selected' : '' ?> value="{{ $genre->id }}">{{ $genre->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="sp__form--group">
                            <textarea name="description" class="sp__form--control-white" name="" cols="5" rows="5" placeholder="Write a bit description about the playlist.">{{ $playlist->description }}</textarea>
                        </div>

                        <div class="sp__form--group">
                            <input name="cover" accept="image/*" type="file" class="hide__element">
                            <div class="sp__photo--frame m-auto color--grey sp__mid--center">
                                <img src="{{ $playlist->cover }}" alt="" class="img__responsive">
                                <span class="hide__element">Upload a cover</span>
                            </div>
                        </div>
                        </p>
                </div>
                <div class="modal__footer sp__top--center">
                    <button class="sp--btn sp--btn-green rounded-pill px-4">UPDATE</button>
                    </form>
                </div>

            </div>
            <div class="modal__overlay"></div>
        </div>
        <div id="delete__playlist{{$key}}" class="modal__container sp__mid--center hidden">
            <div class="modal__content">
                <div class="modal__close button__control"><i class="sp-cross"></i></div>
                <div class="modal__header mt-3">
                    <div class="size--4 fw---600">Delete Playlist</div>
                </div>
                <div class="modal__body mt-2">
                    <div class="size--3 fw--200">
                        <form action="{{ route('admin.playlists.delete', ['playlist' => $playlist->id]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            Are you sure to delete this playlist?
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
        <div class="col-md-12">
            <div class="no__data size--4 color--grey sp__mid--center">Playlist Unavailable</div>
        </div>
        @endforelse
    </div>
</div>
@endsection