@extends('layout.1column')
@section('mainContent')
<!-- @include('slider.carousel') -->

<!-- Wrap the rest of the page in another container to center all the content. -->


<div class="container marting">

    @if (\Session::has('notification'))
        <div class="alert alert-success">
            <ul>
                <li>{!! \Session::get('notification') !!}</li>
            </ul>
        </div>
    @endif
    <!-- Demo header-->
    <section class="pb-5 header text-right">
        <div class="container py-5 text-white">

            <div class="row">
                <div class="row">
                    <div class="col-md-12 bg-light text-right">
                        <a href="{{url('tasks/create/')}}"><i class="fa fa-plus" style="color:black; margin-right:5px"></i></a>
                       <a href="{{url('tasks')}}"> <i class="fa fa-home" style="color:black; margin-right:5px"></i></a>

                    </div>
                </div>
                <div class="card border-0 shadow">
                    <div class="card-body p-5">


                        <!-- Responsive table -->
                        <div class="table-responsive">
                            <table class="table m-0">
                                <thead>
                                    <tr>
                                        <th scope="col">id</th>
                                        <th scope="col">Task</th>
                                        <th scope="col">Shot Desc</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Started on</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dataArr as $data)
                                        <tr>
                                            <th>{{$data['id']}}</th>
                                            <td>{{$data['title']}}</td>
                                            <td>{{$data['shortDesc']}}</td>
                                            <td>{{$data['status']}}</td>
                                            <td>{{$data['createdAt']}}</td>
                                            <td>
                                                <!-- Call to action buttons -->

                                                <ul class="list-inline m-0">

                                                    <li class="list-inline-item">
                                                        <a href="{{url('tasks/'.$data['id'])}}">
                                                            <i class="fa fa-info-circle"></i>
                                                        </a>
                                                    </li>

                                                    <li class="list-inline-item">
                                                        <a href="{{url('tasks/'.$data['id'].'/edit')}}">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                    </li>

                                                    <li class="list-inline-item">
                                                        <form method="post" action="{{url('tasks', $data['id'])}}">
                                                            @method('delete')
                                                            <button class="btn" type="submit">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                            @csrf
                                                        </form>

                                                    </li>


                                                </ul>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>


            </div>
        </div>
    </section>


    <!-- /END THE FEATURETTES -->

</div><!-- /.container -->
@endsection
