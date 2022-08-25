
   @extends("layouts.app");
   
   @section("content")
    <div class="container">

        @if(session('info'))
            <div class="alert alert-info">
                {{ session('info') }}
            </div>
        @endif

        @if(session('update'))
            <div class="alert alert-warning">
                {{ session('update') }}
            </div>
        @endif

        @foreach($articles as $article)
            <div class="card-body bg-secondary mb-3">
                <h5 class="card-title">{{ $article->title }}</h5>
                <div class="card-subtitle mb-2 text-danger small" >
                    {{ $article->created_at->diffForHumans() }}
                </div>
                <p class="card-text">{{ $article->body }}</p>
                <a  class="card-link text-warning" href="{{ url("/articles/detail/$article->id") }}">
                    View Detail &raquo
                </a>
            </div>
        @endforeach
    </div>
   @endsection
