<aside class="col-md-3">
    <a href="#" class="list-group-item disabled">Categories</a>
    @foreach($categories as $category)
        <a href="{{route('store.category',['id'=>$category->id])}}" class="list-group-item">{{$category->name}}</a>
    @endforeach
</aside>