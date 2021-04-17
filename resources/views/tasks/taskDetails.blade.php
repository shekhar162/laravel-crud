@extends('layout.1column')
@section('mainContent')

<div class="container marketing">

    <hr class="featurette-divider">

    <div>
        <h1>
            {{$taskDetails->title}}
        </h1>
        <p>
            {{$taskDetails->shortDesc}}
        </p>
    </div>
    <div>
        <p>
            <a href="{{url('tasks')}}">Back</a>
        </p>
    </div>

    <!-- /END THE FEATURETTES -->

</div><!-- /.container -->
@endsection
