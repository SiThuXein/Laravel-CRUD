
    @extends("layouts.app");
    @section("content")
     <div class="container">

       
            @if(session('error'))
               <div class="alert alert-warning">
                    {{ session('error') }}
               </div>
            @endif
       

        <div class="card">
            <div class="card-body bg-secondary">
                <h1 class="card-title">{{ $articles->title }}</h1>
                <div class="card-subtitle text-danger small">
                    {{ $articles->created_at->diffForHumans() }},
                    Category : {{ $articles->category->name }}
                </div>
                <p class="card-text">{{ $articles->body }}</p>
                <a class="card-link text-warning" href="{{ url("/articles/delete/$articles->id") }}">
                    Delete
                </a>
                <a class="card-link text-warning" href="{{ url("/articles/update/$articles->id") }}">Update</a>
            </div>
        </div>
        
        <ul class="list-group mt-5 mb-5">
            <li class="list-group-item  bg-secondary">
                <b>Comments ( {{ count($articles->comments) }} )</b>

            </li>  
            @foreach($articles->comments as $comment)
                <li class="list-group-item">
                    {{ $comment->content }}
                    <a href="{{ url("/comments/delete/$comment->id") }}" class="close">
                        &times;
                    </a>
                    <div class="small mt-2">
                        By <b>{{ $comment->user->name }}</b>,
                        {{ $comment->created_at->diffForHumans() }}
                    </div>
                </li>
            @endforeach
        </ul>

    @auth
        <form action="{{ url("/comments/add") }}" method="post">
            @csrf
            <input type="hidden" value="{{ $articles->id }}" name="article_id">
            <textarea name="content" class="form-control" placeholder="New Content"></textarea>
            <input type="submit" class="btn btn-primary mt-2" value="Add Comment">
        </form>

     </div>
     @endauth
    @endsection
