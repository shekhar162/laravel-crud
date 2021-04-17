@extends('layout.1column')
@section('mainContent')
<!-- @include('slider.carousel') -->

<!-- Wrap the rest of the page in another container to center all the content. -->


<div class="container marting">

    <hr class="featurette-divider">


    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <section>

        <form method="post" action="{{ url('tasks', $taskDetails->id) }}">
            @method('put')
            @csrf

            <div class="form-group">
                <label for="taskTitle">Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder=""
                    value="{{$taskDetails->title}}">
            </div>
            @if($errors->has('title'))
            <div class="error alert">{{ $errors->first('title') }}</div>
            @endif

            <div class="form-group">
                <label for="shortDesc">Short Description</label>
                <input type="text" class="form-control" id="shortDesc" name="shortDesc" placeholder=""
                    value="{{$taskDetails->shortDesc}}">

                @if($errors->has('shortDesc'))
                    <div class="error alert">{{ $errors->first('shortDesc') }}</div>
                @endif

            </div>

            <button type="submit" class="btn btn-primary">Update</button>

        </form>

    </section>


    <!-- /END THE FEATURETTES -->

</div><!-- /.container -->
@endsection
