<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spotify - Clone</title>
    <!-- CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/spotify-clone.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/fonts.css') }}">

    <style>
        body {
            background: url("{{ asset('images/background.png') }}") no-repeat;
            background-size: cover;
            background-position: center center;
            background-attachment: fixed;
        }
    </style>

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/js/regular.js" integrity="sha512-ixAMzV1RK3mhxY79Nh7hQJu7nkuzkMB8GygT2gbCetzCJdab7Q9Ul9Ys7UALf2e5qBvJk9UV9uQuN6VshjKywA==" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class="app__wrapper" data-page="admin-login">
        <div id="login" class="modal__container sp__mid--center">
            <div class="modal__content--sm bg--primary-dark px-5">
                <!-- <div class="modal__close button__control"><i class="sp-cross"></i></div> -->
                <div class="modal__header mt-3">
                    <div class="size--3 fw---700 text-center mb-4">SpotifyClone</div>
                    <div class="size--4 fw---700 text-center">Login to continue. <br> 🥳</div>
                </div>
                <div class="modal__body mt-2">
                    <form action="{{ route('admin.auth.login-validate') }}" method="post">
                        @csrf
                        <div class="sp__form--group">
                            <input name="email" type="text" class="sp__form--control" placeholder="Email">
                        </div>

                        <div class="sp__form--group">
                            <input name="password" type="password" class="sp__form--control" placeholder="Password">
                        </div>
                        <div>
                            <a href="#" class="custom__link size--2 fw--200">Reset Password?</a>
                        </div>
                        <div class="sp__between mt-4">
                            <div class="size--2 fw--400">Remember me</div>
                            <div><input name="remember" type="checkbox" value="true"></div>
                        </div>
                </div>
                <div class="modal__footer sp__top--center">
                    <button type="submit" class="sp--btn sp--btn-white rounded-pill px-4 fw--700 w--100">LOG IN</button>
                    </form>
                </div>

                <div class="size--2 fw--3 ls--2 color--grey sp__top--center my-5">Don't have an account? <a class="custom__link fw--600 ls--3" href="#">SIGNUP</a></div>

            </div>
            <div class="modal__overlay--blur bg--overlay-blur"></div>
        </div>
    </div>

    <script src="{{ asset('js/spotify-clone.js') }}"></script>
    <script src="{{ asset('js/admin.js') }}"></script>
</body>

</html>