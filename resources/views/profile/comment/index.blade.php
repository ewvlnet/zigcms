<x-profile-layout>
    <x-slot name="title">{{ __('Comments') }}</x-slot>

    <div class="container-xxl flex-grow-1 container-p-y">
        <header class="col-md-6 px-0"><h4 class="fw-bold py-3"><span class="text-muted fw-light">Comments</span></h4>
        </header>
        <x-shared.flash-msg/>

        <div class="card mb-5">

            <div class="table-responsive text-nowrap">
                <table class="table  table-striped">
                    <thead>
                    <tr class="text-nowrap">
                        <th scope="col" width="6%">#</th>
                        <th scope="col" width="10%">User</th>
                        <th scope="col" width="22%">In Post</th>
                        <th scope="col" width="37%">Message</th>
                        <th scope="col" width="25%">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @forelse($comments as $comment)
                        <tr>
                            <th scope="row">{{$comment->id}}</th>
                            <td><a href="javascript:;"><img src="{{$comment->user->user_image()}}"
                                                            alt="{{$comment->user->name}}"
                                                            title="{{$comment->user->name}}"
                                                            class="rounded-circle avatar-post-list"></a></td>
                            <td title="Post #ID: {{$comment->post->id.' / Title: '.$comment->post->title}}">{{ Str::limit($comment->post->title, 20) }}</td>
                            <td>{{ Str::limit($comment->message, 80) }}</td>
                            <td>
                                <x-shared.comments-actions :model="$comment" resource="profile.comments"/>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">{{__('No comments')}}</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>

        </div>
        {{ $comments->links() }}
    </div>

    <x-slot name="css">{{--<style>CSS</style>--}}</x-slot>
    <x-slot name="js">{{--<script>JS</script>--}}</x-slot>
</x-profile-layout>
