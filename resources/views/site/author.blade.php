<x-site-layout>
    <x-slot name="title">{{ $user->name }}</x-slot>
    <x-slot name="hero">
        <x-site.author.hero :user="$user"/>
    </x-slot>

    <section class="home-articles row mb-2">
        <article class="card mb-3 card-show" style="padding: 0;width: 98%;">
            <div class="row overflow-hidden flex-md-row p-4 pt-2 mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">

                    <header class="col-md-6 px-0"><h2 class="display-4 fst-italic">{{ $user->name }}</h2></header>
                    <p class="blog-post-meta mb-1 text-muted display-6">{{$user->posts()->count()}}Posts <br>
                        Since: {{ \Carbon\Carbon::make($user->created_at)->format('M d, Y H\hi')}}</p>

                </div>
            </div>
        </article>
    </section>

    <x-slot name="css">{{--<style>CSS</style>--}}</x-slot>
    <x-slot name="js">{{--<script>JS</script>--}}</x-slot>
</x-site-layout>
