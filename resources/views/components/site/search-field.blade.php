@props(['filters' => ''])
<form name="search" action="{{ route('site.search.filters', $filters['filter']??'') }}" method="POST">
    @csrf
    <div class="container-search-field">
        <div class="icon-group icon-group-end mb-4">
            <input type="text" name="filter" id="filter" placeholder="{{__('Search')}}"
                   class="form-control form-control-sm py-2"
                   value="{{$filters['filter'] ?? ''}}"/>
            <span class="icon-inside"> <i class="fa fa-search"></i></span>
        </div>
    </div>
</form>
