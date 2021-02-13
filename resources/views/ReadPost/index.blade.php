@extends('template')
@section('main')
    <div class="container">
        <a class="btn btn-success container-fluid" href="{{route('userPage')}}">Back</a>
        <h2>{{$post->title}}</h2>
        <article>
            {!!$post->text!!}
        </article>
    </div>
@endsection
