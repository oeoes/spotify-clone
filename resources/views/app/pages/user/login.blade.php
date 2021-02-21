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
    <div class="app__wrapper" data-page="user-login">
        <div id="signup" class="auth__container sp__mid--center hide__container">
            <div class="modal__content--sm bg--primary-dark px-5">
                <!-- <div class="modal__close button__control"><i class="sp-cross"></i></div> -->
                <div class="modal__header mt-3">
                    <div class="size--3 fw---700 text-center mb-4">SpotifyClone</div>
                    <div class="size--4 fw---700 text-center">Signup to test spotify clone app. <br> 😁</div>
                </div>
                <div class="modal__body mt-2">
                    <form action="">
                        <div class="sp__form--group">
                            <input id="email" type="text" class="sp__form--control" placeholder="Email">
                        </div>

                        <div class="sp__form--group">
                            <input id="password" type="password" class="sp__form--control" placeholder="Create a Password">
                        </div>

                        <div class="sp__form--group">
                            <input id="name" type="text" class="sp__form--control" placeholder="What should we call you?">
                        </div>
                    </form>
                </div>
                <div class="modal__footer sp__top--center">
                    <button class="sp--btn sp--btn-green rounded-pill px-4 switch" data-target="#signup-final">NEXT <i class="sp-right"></i></button>
                </div>

                <div class="size--2 fw--3 ls--2 color--grey sp__top--center my-5">Already on Spotify? <a class="custom__link fw--600 ls--3 switch" data-target="#login">LOGIN</a></div>

            </div>
        </div>

        <div id="signup-final" class="auth__container sp__mid--center hide__container">
            <div class="modal__content--sm bg--primary-dark px-5">
                <!-- <div class="modal__close button__control"><i class="sp-cross"></i></div> -->
                <div class="modal__header mt-3">
                    <div class="size--3 fw---700 text-center mb-4">SpotifyClone</div>
                    <div class="size--4 fw---700 text-center">Almost there. <br> 🤩</div>
                </div>
                <div class="modal__body mt-2">
                    <form action="">
                        <div class="sp__form--group">
                            <label>Date of Birth</label>
                            <input id="date_of_birth" type="date" class="sp__form--control">
                        </div>

                        <div class="sp__form--group">
                            <label>Gender</label>
                            <select id="gender" class="sp__form--control">
                                <option value="0">Male</option>
                                <option value="1">Female</option>
                                <option value="2">Undefined</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal__footer sp__top--center">
                    <button id="btn-signup" class="sp--btn sp--btn-green rounded-pill px-4">CREATE</button>
                </div>

                <div class="size--1 fw--3 ls--2 color--grey sp__top--center my-5"><a class="custom__link switch" data-target="#signup"><i class="sp-left"></i> Back</a></div>

                <div class="size--2 fw--3 ls--2 color--grey sp__top--center my-5">Already on Spotify? <a class="custom__link fw--600 ls--3 switch" data-target="#login">LOGIN</a></div>

            </div>
        </div>

        <div id="login" class="auth__container sp__mid--center">
            <div class="modal__content--sm bg--primary-dark px-5">
                <!-- <div class="modal__close button__control"><i class="sp-cross"></i></div> -->
                <div class="modal__header mt-3">
                    <div class="size--3 fw---700 text-center mb-4">SpotifyClone</div>
                    <div class="size--4 fw---700 text-center">Login to continue. <br> 🥳</div>
                </div>
                <div class="modal__body mt-2">
                    <form action="" method="post">
                        @csrf
                        <div class="sp__form--group">
                            <input id="log-email" type="text" class="sp__form--control" placeholder="Email">
                        </div>

                        <div class="sp__form--group">
                            <input id="log-password" type="password" class="sp__form--control" placeholder="Password">
                        </div>
                        <div>
                            <a href="#" class="custom__link size--2 fw--200">Reset Password?</a>
                        </div>
                        <div class="sp__between mt-4">
                            <div class="size--2 fw--400">Remember me</div>
                            <div><input id="log-remember" type="checkbox" value="true"></div>
                        </div>
                </div>
                <div class="modal__footer sp__top--center">
                    <button id="btn-login" type="submit" class="sp--btn sp--btn-white rounded-pill px-4 fw--700 w--100">LOG IN</button>
                    </form>
                </div>

                <div class="size--2 fw--3 ls--2 color--grey sp__top--center my-5">Don't have an account? <a class="custom__link fw--600 ls--3 switch" data-target="#signup">SIGNUP</a></div>

            </div>
        </div>

        <div class="modal__overlay--blur bg--overlay-blur"></div>
    </div>

    <script src="{{ asset('js/spotify-clone.js') }}"></script>
    <script src="{{ asset('js/admin.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        const loginContainer = document.querySelector('#login');
        const signUpContainer = document.querySelector('#signup');
        const switchContainer = document.querySelectorAll('.switch');
        const signupButton = document.querySelector('#btn-signup');
        const loginButton = document.querySelector('#btn-login');

        switchContainer.forEach(btn => {
            btn.addEventListener('click', (e) => {
                const parentContainer = e.target.parentNode.parentElement.parentElement;
                parentContainer.classList.add('hide__container');
                document.querySelector(e.target.dataset.target).classList.remove('hide__container');
            })
        });

        signupButton.addEventListener('click', function(e) {
            this.textContent = 'CREATING...';
            e.preventDefault();

            axios.post('/app/signup', {
                name: document.querySelector('#name').value,
                email: document.querySelector('#email').value,
                password: document.querySelector('#password').value,
                gender: parseInt(document.querySelector('#gender').value),
                date_of_birth: document.querySelector('#date_of_birth').value,
            }).then(response => {
                response.data.status ? location.href = '/app' : alert(response.data.message);
            }).catch(error => {
                //
            }).finally(response => {
                this.textContent = 'CREATE';
            });
        });

        loginButton.addEventListener('click', function(e) {
            e.preventDefault();
                this.textContent = 'LOG IN...';
                axios.post('/app/login', {
                    remember: document.querySelector('#log-remember').value,
                    email: document.querySelector('#log-email').value,
                    password: document.querySelector('#log-password').value,
                }).then(response => {
                    response.data.status ? location.href = '/app' : alert(response.data.message);
                }).catch(error => {
                    //
                }).finally(response => {
                    this.textContent = 'LOG IN';
                });
        });
    </script>
</body>

</html>