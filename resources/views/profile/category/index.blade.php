<x-profile-layout>
    <x-slot name="title">{{ __('Categories') }}</x-slot>

    <div class="container-xxl flex-grow-1 container-p-y">
        <header class="col-md-6 px-0"><h4 class="fw-bold py-3"><span class="text-muted fw-light">Categories</span></h4>
        </header>
        <x-shared.flash-msg/>

        <div class="card mb-5">
            <h5 class="card-header"><a href="{{route('profile.categories.create')}}" class="btn btn-outline-primary"><i
                        class='bx bx-plus-circle'></i> Create category</a></h5>

            <div class="table-responsive text-nowrap">
                <table class="table  table-striped">
                    <thead>
                    <tr class="text-nowrap">
                        <th scope="col" width="5%">#</th>
                        <th scope="col" width="30%">Name</th>
                        <th scope="col" width="40%">Category description</th>
                        <th scope="col" width="25%">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @forelse($categories as $category)
                        <tr>
                            <th scope="row">{{$category->id}}</th>
                            <td>{{ Str::limit($category->name, 50) }}</td>
                            <td>{{ Str::limit(strip_tags($category->description), 60) }}</td>
                            <td>
                                <x-shared.actions :model="$category" resource="profile.categories"/>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">{{__('No categories')}}</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>

        </div>
        {{ $categories->links() }}
    </div>



    <x-slot name="css">{{--<style>CSS</style>--}}</x-slot>
    <x-slot name="js">{{--<script>JS</script>--}}</x-slot>
</x-profile-layout>
