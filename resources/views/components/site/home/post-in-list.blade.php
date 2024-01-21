@props(['post' => ''])
<article class="card mb-3" style="padding: 0;width: 98%;">
    <div class="row g-0">
        @forelse($post->files->take(1) as $file)
            <div class="col-md-4 post-list-thumb"
                 style="background-image: url({{url('/storage/uploads/thumbs/'.$file->url)}});">
                @empty
                    <div class="col-md-4 post-list-thumb" style="background-image: url('/images/no-image.jpg');">
                        @endforelse
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{ Str::limit($post->title, 30) }}</h5>
                            <p class="card-text"><a href="{{route('site.category', $post->category->slug)}}"
                                                    class="d-inline-block mb-2 text-primary">{{$post->category->name}}</a><br>
                                {{ ($post->excerpt) ? Str::limit(strip_tags($post->excerpt), 90) : Str::limit(strip_tags($post->body), 90) }}
                            </p>
                            <div class="d-flex justify-content-between card-text"><small
                                    class="text-muted">{{ \Carbon\Carbon::make($post->created_at)->format('M d, Y H\hi')}}
                                    by <a
                                        href="{{route('site.author', $post->user->slug)}}">{{$post->user->name}}</a></small>
                                <a href="{{route('site.show', $post->slug)}}" class="btn btn-primary px-5"><small>Continue reading</small></a></div>
                        </div>
                    </div>
            </div>
</article>
