@props(['post' => ''])
<section class="pt-5 my-6 mb-4 text-white rounded bg-dark" style="
@forelse($post->files->take(1) as $file)
  background-image: url({{url('/storage/uploads/'.$file->url)}});background-size: cover;
@empty
 background-image: url('/images/no-image.jpg');background-size: cover;
@endforelse">
    <header class="col-md-12 px-0">
        <div class="col-10 mx-auto p-4 hero-header-intro">
            <h2 class="display-4 fst-italic text-light">{{$post->title}}</h2>
            <p class="lead my-3">{{ ($post->excerpt) ? Str::limit(strip_tags($post->excerpt), 100) : Str::limit(strip_tags($post->body), 100) }}</p>
        </div>
    </header>
</section>
