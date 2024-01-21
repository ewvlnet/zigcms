<x-profile-layout>
    <x-slot name="title">{{ __('Users') }}</x-slot>

    <div class="container-xxl flex-grow-1 container-p-y">
        <header class="col-md-6 px-0"><h4 class="fw-bold py-3"><span class="text-muted fw-light">Users</span></h4>
        </header>
        <x-shared.flash-msg/>

        <div class="card mb-5">
            <h5 class="card-header"><a href="{{route('profile.users.create')}}" class="btn btn-outline-primary"><i
                        class='bx bx-plus-circle'></i> Create user</a></h5>

            <div class="table-responsive text-nowrap">
                <table class="table  table-striped table-bordered">
                    <thead>
                    <tr class="text-nowrap">
                        <th scope="col" width="7%">#</th>
                        <th scope="col" width="10%">Image</th>
                        <th scope="col" width="20%">Name</th>
                        <th scope="col" width="16%">Profile</th>
                        <th scope="col" width="17%">Email</th>
                        <th scope="col" width="30%">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @forelse($users as $user)
                        <tr>
                            <th scope="row">{{$user->id}}</th>
                            <td><img src="{{$user->user_image()}}"
                                     alt="{{$user->name}}"
                                     title="{{$user->name}}"
                                     class="rounded-circle avatar-post-list">
                            </td>
                            <td>{{ Str::limit($user->name, 50) }}</td>
                            <td>{{$user->profiles->pluck('name')->implode(', ')}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                <x-shared.actions :model="$user" resource="profile.users"/>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">{{__('No users')}}</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>

        </div>
        {{ $users->links() }}
    </div>

    <x-slot name="css">{{--<style>CSS</style>--}}</x-slot>
    <x-slot name="js">{{--<script>JS</script>--}}</x-slot>
</x-profile-layout>
