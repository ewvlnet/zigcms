<x-site-layout>
    <x-slot name="title">{{ $post->title }}</x-slot>
    <x-slot name="hero"><x-site.show.hero :post="$post"/></x-slot>

    <section class="home-articles row mb-2">
        <article class="card mb-3 card-show" style="padding: 0;width: 98%;">
            <div class="row overflow-hidden flex-md-row p-4 pt-2 mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                    <strong class="d-inline-block mb-2 text-primary">
                        <a href="{{route('site.category', $post->category->slug)}}">{{$post->category->name}}</a> |
                        @forelse($post->tags as $tag)
                            <a class="text-4 fw-500" href="{{ route('site.tag', $tag->slug) }}">{{$tag->name}}</a>
                            @unless ($loop->last) | @endunless
                        @empty
                        @endforelse
                    </strong>
                    <p class="blog-post-meta mb-4 text-muted">
                        {{ \Carbon\Carbon::make($post->created_at)->format('M d, Y H\hi')}}
                        by <a href="{{route('site.author', $post->user->slug)}}">{{$post->user->name}}</a></p>

                    <p class="card-text mb-auto">{!! $post->body !!}</p>
                </div>
            </div>
        </article>

    </section>

    <x-slot name="css">{{--<style>CSS</style>--}}</x-slot>
    <x-slot name="js">{{--<script>JS</script>--}}</x-slot>
</x-site-layout>
