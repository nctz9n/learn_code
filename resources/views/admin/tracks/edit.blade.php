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

    <form method="post" action="{{route('tracks.update',$track)}}" autocomplete="off">
    @csrf
    @method('patch')
    <div class="row">
        <div class="col-sm-10">
        <div class="form-group">
        <input type="text" name="name"  value="{{$track->name}}" class="form-control">
     </div>
  </div>
<div class="col-sm">
<input class="btn btn-primary" type="submit" value="Update" name="updatetracks">

</div>

    </form>


            </div>
        </div>
    </div>

  @include('layouts.footers.auth')
</div>
@endsection
