@extends('layouts.app',['title'=> __('Track Management')])
@section('content')
@include('layouts.headers.cards')

<div class="container-fluid mt--7">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">{{ __('Tracks')}}</h3>
                        </div>

                    </div>
                </div>
                  @include('includes.errors')
                <div class="col-12">
                    @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{session('status')}}
                        <button type="button" class="close" data-dismiss="alert" aria-lable="Close">
                            <span aria-hidden="true">&times;</span>
    </botton>
    </div>
    @endif

    <form method="post" action="{{route('tracks.store')}}" autocomplete="off">
    @csrf
    <div class="row">
        <div class="col-sm-10">
        <div class="form-group">
        <input type="text" name="name" placeholder="Track Name" class="form-control">
     </div>
  </div>
<div class="col-sm">
<input class="btn btn-primary" type="submit" value="Add Track" name="addtracks">

</div>

    </form>
           @if(count($tracks))
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                        <tr>
                                <th scope="col">{{ __('Name')}}</th>
                                <th scope="col">{{ __('No. Courses')}}</th>

                                <th scope="col">{{ __('Creation Date')}}</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>

                        @foreach($tracks as $track)
                        <tr>
                            <td >
                            {{$track->name}}
                            </td>
                            <td >
                            {{count($track->courses)}}      Course
                            </td>


                                    <td>{{$track->created_at}}</td>
                                    <td class="text-right">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">


                                           <a class="dropdown-item" href="{{route('tracks.edit', $track->id)}}">{{ __('Edit')}}</a>
                                           <form method="post" action="{{route('tracks.destroy' , $track->id)}}" >
                                    @csrf
                                    @method('delete')
                                    <button   class="dropdown-item" type="submit" onclick="return confirm('Are you sure ?')">Delete</button>
                                </form>

    </div>
    </div>
    </td>
    </tr>


                        @endforeach

                    </tbody>
                    </table>
                </div>

                    @else
                        <p class="lead text-center">No Tracks Found</p>
                            @endif
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">
                        {{$tracks->links()}}

                    </nav>
                </div>
            </div>
        </div>
    </div>

  @include('layouts.footers.auth')
</div>
@endsection
