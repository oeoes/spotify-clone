<div class="app__sidebar">
    <ul class="list-unstyled primary__menu">
        <li id="menu-home"><a href="{{ route('app.user.home') }}" data-menu="#menu-home"><i class="sp-home me-3 primary__menu--icon-size"></i> Home</a></li>
        <li id="menu-browse"><a href="{{ route('app.user.browses') }}" data-menu="#menu-browse"><i class="sp-browse me-3 primary__menu--icon-size"></i> Browse</a></li>
        <li id="menu-radio"><a href="#" data-menu="#menu-radio"><i class="sp-radio me-3 primary__menu--icon-size"></i>Radio</a></li>
    </ul>
    <ul class="list-unstyled secondary__menu">
        <li class="li__divider size--2 color--grey fw--100">YOUR LIBRARY</li>
        <li><a href="#">Made For You</a></li>
        <li><a href="#">Recently Played</a></li>
        <li id="menu-liked-song"><a href="{{ route('app.user.liked-songs') }}" data-menu="#menu-liked-song">Liked Songs</a></li>
        <li id="menu-album"><a href="{{ route('app.user.albums') }}" data-menu="#menu-album">Albums</a></li>
        <li id="menu-artist"><a href="{{ route('app.user.artists') }}" data-menu="#menu-artist">Artists</a></li>

        <li class="li__divider size--2 color--grey fw--100">PLAYLISTS</li>
        @foreach ($my_playlists as $key => $playlist)
        <li id="menu-playlist-{{$key}}"><a href="{{ route('app.playlists.view', ['playlist' => $playlist->id]) }}" data-menu="#menu-playlist-{{$key}}">{{ $playlist->title }}</a></li>
        @endforeach
    </ul>

    <div class="create__playlist sp__mid--center">
        <div class="modal__button sp__mid--center" data-target="#user__add--playlist"><i class="sp-plus-circle icon"></i> <span>New Playlist</span></div>
    </div>
</div>

<div id="user__add--playlist" class="modal__container sp__mid--center hidden">
    <div class="modal__content">
        <div class="modal__close button__control"><i class="sp-cross"></i></div>
        <div class="modal__header mt-3">
            <div class="size--4 fw---600">Add Playlist</div>
        </div>
        <div class="modal__body mt-2">
            <p class="size--3 fw--200">
            <form action="{{ route('app.playlists.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="sp__form--group">
                    <input name="title" type="text" class="sp__form--control-white" placeholder="Title">
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