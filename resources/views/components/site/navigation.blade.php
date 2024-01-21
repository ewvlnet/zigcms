<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3 d-block" data-navbar-on-scroll="data-navbar-on-scroll">
    <div class="container"><a class="navbar-brand" href="{{route('site.home')}}"><img
                src="/site/assets/img/gallery/logo.png" height="45" alt="logo"/></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"> </span></button>
        <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto pt-2 pt-lg-0 font-base">
                <li class="nav-item px-2"><a class="nav-link" aria-current="page" href="{{route('site.home')}}">Home</a>
                </li>
                <li class="nav-item px-2"><a class="nav-link" href="{{route('site.about')}}">About</a></li>
                <li class="nav-item px-2"><a class="nav-link" href="{{route('site.install')}}">Install</a></li>
            </ul>
            <a class="btn btn-primary order-1 order-lg-0 ms-lg-3" href="{{route('login')}}">Login</a>
        </div>
    </div>
</nav>


