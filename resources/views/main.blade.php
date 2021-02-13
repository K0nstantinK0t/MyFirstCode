@extends('template')
@section('main')
    @if(!Auth::check())
                <div class="alert alert-secondary mx-auto" role="alert" style="width: 50%;">
                    <h1>
                        Welcome to my site!
                    </h1>
                    <p>
                        It's dedicated to keeping your own diary. <br />
                        But before starting you must to log in.
                    </p>
                </div>
    @else
        <div class="mx-auto" style="width: 50%">
            <h1> Welcome back </h1>
            <p> We are happy to see you again</p>
            <p> <a href="{{route('userPage')}}"> Go to posts list </a> </p>
        </div>
    @endif
@endsection
