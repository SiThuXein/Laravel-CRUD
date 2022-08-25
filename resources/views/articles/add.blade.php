@extends("layouts.app");

@section("content")
    <div class="container">
      @if($errors->any())
        <div class="alert alert-warning">
            <ol>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ol>
        </div>
      @endif

      <form method="post">
          @csrf
        <div class="form-group">
                <label class="form-label">Title</label>
                <input type="text" class="form-control" name="title">
            </div>
            <div class="form-group">
                <label class="form-label">Body</label>
                <textarea name="body" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label class="form-label">Category</label>
                <select name="category_id" class="form-control">
                    @foreach($categories as $category)
                    <option value="{{ $category['id'] }}">
                        {{ $category["name"] }}
                    </option>
                    @endforeach
                </select>
            </div>
            <input type="submit" value="Add Articel" class="btn btn-primary mt-3">
      </form>
    </div>
@endsection