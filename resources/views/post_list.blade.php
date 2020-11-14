@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('partials.sidenavbar')
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">All Posts
                    </h1>
                    <a href="{{ route('create_post') }}" class="btn btn-primary float-right">Add Post</a>
                </div>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="row container-fluid">
                    @foreach($posts as $post)
                        <div class="col-md-4">
                            <div class="card" style="width: 18rem;">
                                @if($post->image)
                                    <img class="card-img-top" src="{{ asset('images/'.$post->image) }}" alt="Blog Post Image">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{ $post->title }}</h5>
                                    <p class="card-text">
                                        {{ $post->body }}
                                    </p>
                                    <form action="{{ route('delete_post', ['post_id' => $post->id]) }}" method="post"><br>
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="mt-5 row container-fluid">
                    {{ $posts->links() }}
                </div>
            </main>
        </div>
    </div>
@endsection
