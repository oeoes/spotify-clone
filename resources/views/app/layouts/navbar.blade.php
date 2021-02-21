<div class="app__navbar mt-3">
    <div class="row">
        <div class="col-6">
            <div class="search__field">
                <span class="icon"><i class="fas fa-search"></i></span>
                <input id="search" type="search" class="" placeholder="Search">
            </div>
        </div>
        <div class="col-6 sp__top--right">
            <div class="avatar__container">
                <img src="{{ asset('images/user.svg') }}" alt="">
                <span class="avatar__user size--2 fw--300 ls--1"><a href="#" class="custom__link">{{ auth()->user()->name }}</a></span>
                <span class="sp__dropdown">
                    <span class="size--1 color--grey mx-4" data-toggle="account"><i class="sp-down"></i></span>
                    <span class="sp__dropdown--content hide__element">
                        <a href="#">Account</a>
                        <a href="#">Settings</a>
                        <div class="sp__divider"></div>
                        <a href="{{ route('app.auth.logout') }}">Logout</a>
                    </span>
                </span>
            </div>
        </div>
    </div>
</div>