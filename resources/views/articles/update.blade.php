@extends("layouts.app");
@section("content")
    <div class="container">
        @if($errors->any())
            <div class="alert alert-warning">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

       <form method="post" action="{{ url("/articles/update/$data->id") }}">
        @csrf
          <div class="form-group">
            <label class="form-label" >Title</label>
            <input type="text" class="form-control" name="title" value="{{ $data->title }}">
          </div>
          <div class="form-group">
              <label class="form-label">Body</label>
              <textarea name="body" class="form-control">{{ $data->body }}</textarea>
          </div>
            <!-- <div class="form-group">
                <label for="" class="form-label">Category Id</label>
                <input type="text" class="form-control" name="category_id" >
            </div> -->
          
          <input type="submit" value="Update" class="btn btn-primary mt-3">
       

       </form>
    </div>
@endsection