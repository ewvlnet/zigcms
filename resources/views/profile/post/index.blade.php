<x-profile-layout>
    <x-slot name="title">{{ __('Posts') }}</x-slot>

    <div class="container-xxl flex-grow-1 container-p-y">
        <header class="col-md-6 px-0"><h4 class="fw-bold py-3"><span class="text-muted fw-light">Posts</span></h4>
        </header>
        <x-shared.flash-msg/>

        <div class="card mb-5">
            <h5 class="card-header"><a href="{{route('profile.posts.create')}}" class="btn btn-outline-primary"><i
                        class='bx bx-plus-circle'></i> Create post</a></h5>

            <div class="table-responsive text-nowrap">
                <table class="table  table-striped">
                    <thead>
                    <tr class="text-nowrap">
                        <th scope="col" width="5%">#</th>
                        <th scope="col" width="5%">User</th>
                        <th scope="col" width="27%">Title</th>
                        <th scope="col" width="38%">Post Content</th>
                        <th scope="col" width="25%">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @forelse($posts as $post)
                        <tr>
                            <th scope="row">{{$post->id}}</th>
                            <td><a href="javascript:;"><img src="{{$post->user->user_image()}}"
                                                            alt="{{$post->user->name}}" title="{{$post->user->name}}"
                                                            class="rounded-circle avatar-post-list"></a></td>
                            <td>{{ Str::limit($post->title, 50) }}</td>
                            <td>{{ Str::limit(strip_tags($post->body), 60) }}</td>
                            <td>
                                @if($profile == 'Editor' || $profile == 'Administrator')
                                    <x-shared.actions :model="$post" resource="profile.posts"/>
                                @else
                                    @can('owner', $post)
                                        <x-shared.actions :model="$post" resource="profile.posts"/>
                                    @endcan
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">{{__('No posts')}}</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>

        </div>
        {{ $posts->links() }}
    </div>

    <x-slot name="css">{{--<style>CSS</style>--}}</x-slot>
    <x-slot name="js">{{--<script>JS</script>--}}</x-slot>
</x-profile-layout>
