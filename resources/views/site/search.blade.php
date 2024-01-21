<x-site-layout>
    <x-slot name="title">Search:. {{ $filters['filter'] ?? '' }}</x-slot>
    <x-slot name="hero"><x-site.home.slider/></x-slot>

    <x-site.search-field :filters="$filters"/>

    <section class="home-articles row mb-2">
        <header class="col-md-5 px-0"><h2 class="display-4 fst-italic">Results</h2></header>
        <p><small>Search: {!! $filters['filter'] ?? '&#8734;' !!}</small></p>

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
