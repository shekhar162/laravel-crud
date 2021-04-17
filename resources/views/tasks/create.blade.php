@extends('layout.1column')
@section('mainContent')
<!-- @include('slider.carousel') -->

<!-- Wrap the rest of the page in another container to center all the content. -->


<div class="container mt-5 mb-5">
    <section>

        <form method="POST" action="{{url('/tasks/')}}">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="taskTitle">Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="" required>
                @if ($errors->has('title'))
                    <div class="alert alert-danger">
                        {{$errors->first('title')}}
                    </div>
                @endif
            </div>


            <div class="form-group">
                <label for="shortDescription">Short Description</label>
                <input type="text" class="form-control" id="shortDescription" name="shortDesc" placeholder="" required>
                @if ($errors->has('shortDesc'))
                    <div class="alert alert-danger">
                        {{$errors->first('shortDesc')}}
                    </div>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Add</button>

        </form>

    </section>


    <!-- /END THE FEATURETTES -->

</div><!-- /.container -->
@endsection
