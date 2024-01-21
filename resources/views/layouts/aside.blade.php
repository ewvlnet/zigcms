<aside class="col-md-4">
    <x-site.search-field :filters="$filters ??''"/>

    <div class="position-sticky">

        <div class="p-3 ps-4 mb-3 bg-light rounded">
            <h4 class="fst-italic">Last Posts</h4>
            <ul class="list-unstyled mb-0">
                @forelse($posts as $post)
                    <li><a href="{{route('site.show', $post->slug)}}" title="{{$post->title}}">{{ Str::limit($post->title, 20) }}</a></li>
                @empty
                    <li><a href="javascript:;">No posts</a></li>
                @endforelse
            </ul>
        </div>

        <div class="p-3 ps-4 mb-3 bg-light rounded">
            <h4 class="fst-italic">Categories</h4>
            <ol class="list-unstyled mb-0">
                @forelse($categories as $category )
                    <li><a href="{{route('site.category', $category->slug)}}">{{$category->name}}</a></li>
                @empty
                    <li><a href="javascript:;">No categories</a></li>
                @endforelse
            </ol>
        </div>

        <div class="p-3 ps-4 mb-3 bg-light rounded">
            <h4 class="fst-italic">Tags</h4>
            <ol class="list-unstyled mb-0">
                @forelse($tags as $tag)
                    <li><a href="{{route('site.tag', $tag->slug)}}">{{$tag->name}}</a></li>
                @empty
                    <li><a href="javascript:;">No tags</a></li>
                @endforelse
            </ol>
        </div>

    </div>
</aside>
