<x-site-layout>
    <x-slot name="title">{{ __('Title Page') }}</x-slot>
    <x-slot name="hero"><x-site.home.slider/></x-slot>

    <section class="home-articles row mb-2">
        @forelse($posts as $post)
            <x-site.home.post-in-list :post="$post"/>
        @empty
            <div>{{__('No posts')}}</div>
        @endforelse
    </section>
    {{ $posts->links() }}

    <x-slot name="css">{{--<style>CSS</style>--}}</x-slot>
    <x-slot name="js">{{--<script>JS</script>--}}</x-slot>
</x-site-layout>
