<x-profile-layout>
    <x-slot name="title">{{ __('Pages') }}</x-slot>

    <div class="container-xxl flex-grow-1 container-p-y">
        <header class="col-md-6 px-0"><h4 class="fw-bold py-3"><span class="text-muted fw-light">Posts</span></h4>
        </header>
        <x-shared.flash-msg/>

        <div class="card mb-5">
            <h5 class="card-header"><a href="{{route('profile.pages.create')}}" class="btn btn-outline-primary"><i
                        class='bx bx-plus-circle'></i> Create page</a></h5>

            <div class="table-responsive text-nowrap">
                <table class="table  table-striped">
                    <thead>
                    <tr class="text-nowrap">
                        <th scope="col" width="5%">#</th>
                        <th scope="col" width="30%">Title</th>
                        <th scope="col" width="40%">Page Content</th>
                        <th scope="col" width="25%">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @forelse($pages as $page)
                        <tr>
                            <th scope="row">{{$page->id}}</th>
                            <td>{{ Str::limit($page->title, 50) }}</td>
                            <td>{{ Str::limit(strip_tags($page->body), 60) }}</td>
                            <td>
                                <x-shared.actions :model="$page" resource="profile.pages"/>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">{{__('No pages')}}</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>

        </div>
        {{ $pages->links() }}
    </div>



    <x-slot name="css">{{--<style>CSS</style>--}}</x-slot>
    <x-slot name="js">{{--<script>JS</script>--}}</x-slot>
</x-profile-layout>
