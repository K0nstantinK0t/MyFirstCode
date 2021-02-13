@extends('template')
@section('main')
    @if(Session::has('message'))
        <div class="bg-success p-2 d-flex justify-content-center">
            {{Session::get('message')}}
        </div>
    @endif
    <div class="container-fluid ps-sm-5 mt-4">
        <div class="row align-items-start">
            <div class="col-md-2">
                <form method="POST" action="">
                    @csrf
                    <div class="badge text-wrap mb-1" style="background-color: #4aca85">
                        Count of all your posts: {{$posts->total()}}
                    </div>
                    <div class="rounded p-2 mb-1" style="background-color: #2ebfca;">{{-- @small max-width: 300px;--}}
                        <label for="countPosts" class="form-label text-light">Set posts count per page</label>
                        <input type="number" size="2" min="1" max="50" class="form-control" id="countPosts" name="countPostsPerPage" value="{{$countPPP}}">
                    </div>
                    <input type="submit" class="btn btn-primary" value="Submit">
                </form>
            </div>
            <div class="col-md-9 p-1">
                <div class="d-flex flex-column bd-highlight mb-3">
                    <div class="mb-2">
                        <a href="{{url('newpost')}}" class="btn btn-success"> Add new post</a>
                    </div>
                    <div class="container p-0">
                        <div class="row row-cols-auto g-1 g-md-2 g-lg-3 p-0">
                            @if($posts->count())
                                @foreach($posts as $post)
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-3">{{$post->title}}</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">Updated at: {{$post->updated_at}}</h6>
                                        <a href="{{route('readPost', $post->id)}}" class="btn btn-primary">Read</a>
                                        <a href="{{route('editPost', $post->id)}}" class="btn btn-warning">Edit</a>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal{{$post->id}}">
                                            Delete
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="modal{{$post->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Are you really want to delete this post?</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                                        <a href="{{route('deletePost', $post->id)}}" type="button" class="btn btn-danger">Yes</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                @endforeach
                            @endif
                        </div>
                    <div class="row mt-1">
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
