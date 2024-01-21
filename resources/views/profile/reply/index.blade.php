<x-profile-layout>
    <x-slot name="title">{{ __('Replies') }}</x-slot>

    <div class="container-xxl flex-grow-1 container-p-y">
        <header class="col-md-6 px-0"><h4 class="fw-bold py-3"><span class="text-muted fw-light">Replies</span></h4>
        </header>
        <x-shared.flash-msg/>

        <div class="card mb-5">

            <div class="table-responsive text-nowrap">
                <table class="table  table-striped">
                    <thead>
                    <tr class="text-nowrap">
                        <th scope="col" width="6%">#</th>
                        <th scope="col" width="10%">User</th>
                        <th scope="col" width="22%">In Comment</th>
                        <th scope="col" width="37%">Message</th>
                        <th scope="col" width="25%">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @forelse($replies as $reply)
                        <tr>
                            <th scope="row">{{$reply->id}}</th>
                            <td><a href="javascript:;"><img src="{{$reply->user->user_image()}}"
                                                            alt="{{$reply->user->name}}"
                                                            title="{{$reply->user->name}}"
                                                            class="rounded-circle avatar-post-list"></a></td>
                            <td title="Comment #ID: {{$reply->comment->id}}">Comment #ID: {{$reply->comment->id}}</td>
                            <td>{{ Str::limit($reply->message, 80) }}</td>
                            <td>
                                <x-shared.replies-actions :model="$reply" resource="profile.replies"/>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">{{__('No replies')}}</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>

        </div>
        {{ $replies->links() }}
    </div>


    {{--    <x-shared.flash-msg/>
        <section class="start row mb-2">
            <header class="col-md-6 px-0"><h2 class="display-4 fst-italic">Replies</h2></header>
        </section>

        <hr>

        <table class="table table-info table-striped table-hover table-bordered" border="1">
            <thead>
            <tr>
                <th scope="col" width="6%">#</th>
                <th scope="col" width="22%">User</th>
                <th scope="col" width="58%">Message</th>
                <th scope="col" width="15%">Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse($replies as $reply)
                <tr>
                    <th scope="row">{{$reply->id}}</th>
                    <td><img src="{{$reply->user->user_image()}}" alt="" style="width: 60px; height:60px; border-radius: 50%;border: 3px solid tomato; padding: 2px;"><br>
                        {{ Str::limit($reply->user->name, 50) }} <br>
                      Comment#{{$reply->comment->id}}
                    </td>
                    <td>{{ $reply->message }}</td>
                    <td>
                        <x-shared.replies-actions :model="$reply" resource="profile.replies"/>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">{{__('No replies')}}</td>
                </tr>
            @endforelse
            </tbody>
        </table>

        {{ $replies->links() }}--}}

    <x-slot name="css">{{--<style>CSS</style>--}}</x-slot>
    <x-slot name="js">{{--<script>JS</script>--}}</x-slot>
</x-profile-layout>
