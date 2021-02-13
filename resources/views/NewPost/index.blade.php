@extends('template')

@section('header')
    @parent
    <script src="https://cdn.tiny.cloud/1/44vn0fh2ddbm8iz6fsa4nrqm1z71wuacrhh39xwmfgh28xdk/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
        tinymce.init({
            selector: '#text'
        });
    </script>
@endsection

@section('main')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <a class="btn btn-success" href="{{url('userpage')}}" style="width: 100%">Back</a>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (Session::has('message'))
                    <div class="alert alert-success">
                        {{Session::get('message')}}
                    </div>
                @endif
                <form method="POST" action="">
                    @csrf
                    <label for="title" class="form-label fs-4">Title</label>
                    <input type="text" id="title" name="title" class="form-control mb-1" value="{{Request::input('title')}}">
                    <label for="text" class="form-label fs-4">Content</label>
                    <textarea name="text" placeholder="Leave a content here" id="text" style="height: 300px">
                        {{Request::input('text')}}
                    </textarea>
                    <input type="submit" class="form-control btn btn-primary mt-1" name="add" value="Add">
                </form>
            </div>
        </div>
    </div>
@endsection

