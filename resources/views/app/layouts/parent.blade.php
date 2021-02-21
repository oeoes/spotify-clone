<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spotify - Clone</title>
    <!-- CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/spotify-clone.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/fonts.css') }}">

    <!-- Font Awesome JS -->
    <!-- <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"> -->
    </script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/js/regular.js" integrity="sha512-ixAMzV1RK3mhxY79Nh7hQJu7nkuzkMB8GygT2gbCetzCJdab7Q9Ul9Ys7UALf2e5qBvJk9UV9uQuN6VshjKywA==" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"> -->
    </script>
</head>

<body>
    <div></div>
    <div id="add__playlist" class="modal__container sp__mid--center hide__element">
        <div class="modal__content">
            <div class="modal__close button__control"><i class="sp-cross"></i></div>
            <div class="modal__header mt-3">
                <div class="size--3 fw---700 text-center">Create Playlist</div>
            </div>
            <div class="modal__body mt-2">
                <div class="row">
                    <div class="col-4">
                        <div id="playlist-cover" class="card w--100 h--100 bg--primary-lighter no__radius sp__mid--center">
                            <input type="file" class="hide__element">
                            <span class="size--5"><i class="sp-play-circle"></i></span>
                            <span class="size--2 fw--400">Choos Image</span>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="sp__form--group">
                            <label>Name</label>
                            <input type="text" class="sp__form--control-white" placeholder="Playlist name">
                        </div>

                        <div class="sp__form--group">
                            <label>Description</label>
                            <textarea class="sp__form--control-white" placeholder="Kasih deskripsi playlistmu yg anjay bgt." name="" id="" cols="10" rows="5"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal__footer sp__top--center">
                <button class="sp--btn sp--btn-green rounded-pill px-4">CREATE</button>
            </div>

        </div>
        <div class="modal__overlay"></div>
    </div>
    <div class="app__wrapper" data-page="@yield('data-page')">

        <!-- SIDEBAR -->
        @include('app.layouts.sidebar')

        <div class="app__content--container">
            <!-- NAVBAR -->
            @include('app.layouts.navbar')

            <!-- CONTENT -->
            <div class="app__content">
                @yield('app-content')

            </div>
        </div>

        <!-- AUDION CONTROL -->
        @include('app.layouts.audio-control')
    </div>

    <!-- ALERT -->
    <div class="sp__alert sp__mid--center sp__alert--hidden">
        <div class="sp__alert--success"></div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="{{ asset('js/spotify-clone.js') }}"></script>
    <script src="{{ asset('js/admin.js') }}"></script>
    <script src="{{ asset('js/audio.js') }}"></script>
    @yield('custom-js')
</body>

</html>