<x-site-layout>
    <x-slot name="title">Tag:. {{ $tag->name }}</x-slot>
    <x-slot name="hero"><x-site.home.slider/></x-slot>

    <section class="home-articles row mb-2">
        <header class="col-md-6 px-0"><h2 class="display-4 fst-italic">{{ $tag->name }}</h2></header>
        <p><small>Tag: {{ $tag->name }}</small> {!! $tag->description ?? '&#8734;'!!}</p>
        @forelse($posts as $post)
            <x-site.home.post-in-list :post="$post"/>
        @empty
            <div>{{__('No posts')}}</div>
        @endforelse
    </section>
    <br><br><br><br><br>
    {{ $posts->links() }}

    <x-slot name="css">{{--<style>CSS</style>--}}</x-slot>
    <x-slot name="js">{{--<script>JS</script>--}}</x-slot>
</x-site-layout>
