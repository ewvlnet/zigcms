<x-site-layout>
    <x-slot name="title">{{__('Tags')}}</x-slot>
    <x-slot name="hero"><x-site.home.slider/></x-slot>

    <section class="home-articles row mb-2">
        <header class="col-md-6 px-0"><h2 class="display-4 fst-italic">Tags</h2></header>

        <div class="p-3 ps-4 mb-3 bg-light rounded pct96">
            <ul class="list-unstyled mb-0 ulist">
                @forelse($tags as $tag)
                    <li><a href="{{route('site.tag', $tag->slug)}}">{{$tag->name}}</a></li>
                @empty
                    <li>{{__('No tag')}}</li>
                @endforelse
            </ul>
        </div>

    </section>
    {{ $tags->links() }}

    <x-slot name="css">{{--<style>CSS</style>--}}</x-slot>
    <x-slot name="js">{{--<script>JS</script>--}}</x-slot>
</x-site-layout>
