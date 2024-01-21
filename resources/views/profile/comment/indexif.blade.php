<x-profile-if-layout>
    <x-slot name="title">{{ __('Comments') }}</x-slot>

    <div class="container-xxl flex-grow-1 container-p-y">
        <header class="col-md-6 px-0"><h4 class="fw-bold py-3"><span class="text-muted fw-light">Comments</span></h4>
        </header>
        <x-shared.flash-msg/>

        <div class="card mb-5">

            <div class="table-responsive text-nowrap">
                @php $resultsInPage = 0; @endphp
                <table class="table  table-striped">
                    <thead>
                    <tr class="text-nowrap">
                        <th scope="col" width="10%">#</th>
                        <th scope="col" width="50%">Comment</th>
                        <th scope="col" width="40%">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @forelse($comments as $comment)
                        @php $resultsInPage++; @endphp
                        <tr>
                            <th scope="row">{{$comment->id}}</th>
                            <td>{{ Str::limit($comment->message, 80) }}</td>
                            <td>
                                <x-shared.comments-actions :model="$comment" :id="$id"
                                                           :currentPage="$comments->currentPage()"
                                                           resource="profile.posts.comments"/>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">{{__('No comments yet')}}</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>

        </div>
        {{ $comments->links() }}
    </div>

    <x-slot name="js">
        <script>
            var totalComments = {{$comments->total()}};
            var resultsInPage = {{$resultsInPage}};
            var ifcomments = parent.document.querySelector('#ifcomments');
            //alert(parent.document.querySelector('#ifcomments').clientHeight);
            window.onload = function () {
                switch (resultsInPage) {
                    case 1:
                        ifcomments.style.height = "360px";
                        break;
                    case 2:
                        ifcomments.style.height = "420px";
                        break;
                    case 3:
                        ifcomments.style.height = "520px";
                        break;
                    case 4:
                        ifcomments.style.height = "620px";
                        break;
                    case 5:
                        ifcomments.style.height = "720px";
                        break;
                }
            }
        </script>
    </x-slot>
</x-profile-if-layout>
