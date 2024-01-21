@props(['user' => ''])
<section class="pt-5 my-6 mb-4 text-white rounded bg-dark" style="
background-image: url('/images/no-image.jpg');background-size: cover;">
    <header class="col-md-12 px-0">
        <div class="col-10 mx-auto p-4 hero-header-intro">
            <h2 class="display-4 fst-italic"><img src="{{$user->user_image()}}" alt="{{$user->name}}"
                                                  class="author-show-avatar" title="{{$user->name}}">
                <span class="lead my-3 text-light">{{$user->name}}</span></h2>
        </div>
    </header>
</section>
