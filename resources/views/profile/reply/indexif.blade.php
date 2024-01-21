<x-profile-if-layout>
    <x-slot name="title">{{ __('Replies') }}</x-slot>

    <div class="container-xxl flex-grow-1 container-p-y">
        <header class="col-md-6 px-0"><h4 class="fw-bold py-3"><span class="text-muted fw-light">Replies</span></h4>
        </header>
        <x-shared.flash-msg/>

        <div class="card mb-5">

            <div class="table-responsive text-nowrap">
                @php $resultsInPage = 0; @endphp
                <table class="table  table-striped">
                    <thead>
                    <tr class="text-nowrap">
                        <th scope="col" width="8%">#</th>
                        <th scope="col" width="40%">Reply</th>
                        <th scope="col" width="27%">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @forelse($replies as $reply)
                        @php $resultsInPage++; @endphp
                        <tr>
                            <th scope="row">{{$reply->id}}</th>
                            <td>{{ $reply->message }}</td>
                            <td>
                                <x-shared.replies-actions :model="$reply" :id="$id"
                                                          :currentPage="$replies->currentPage()"
                                                          resource="profile.posts.replies"/>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">{{__('No replies yet')}}</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>

        </div>
        {{ $replies->links() }}
    </div>

    <x-slot name="js">
        <script>
            var totalReplies = {{$replies->total()}};
            var resultsInPage = {{$resultsInPage}};
            var ifreplies = parent.document.querySelector('#ifreplies');

            window.onload = function () {
                switch (resultsInPage) {
                    case 1:
                        ifreplies.style.height = "360px";
                        break;
                    case 2:
                        ifreplies.style.height = "420px";
                        break;
                    case 3:
                        ifreplies.style.height = "520px";
                        break;
                    case 4:
                        ifreplies.style.height = "620px";
                        break;
                    case 5:
                        ifreplies.style.height = "720px";
                        break;
                }
            }
        </script>
    </x-slot>
</x-profile-if-layout>

