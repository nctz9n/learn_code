@extends('layouts.app',['title' => __('Admin Management')])
@section('content')
@include('admin.admins.partials.header' ,['title'=>__('Add Admin')])

<div class="container-fluid mt--7">
    <div>
        <div class="col-x1-12 order-x1-1">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-wite border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">{{ __('Admin Management') }}</h3>
                         </div>
                         <div class="col-4 text-right">
                           <a href="{{route('admins.index')}}" class="btn btn-sm btn-primary">
                              {{ __('Back to list') }}</a>
                            </div>
                         </div>
                      </div>

                 <div class="card-body" >
                   <form  method="post" action="{{ route('admins.store') }}" autocomplete="off">
                        @csrf
                        <input type="hidden" value="1" name="admin">
                  <h6 class="heading-small text-muted mb-4">{{ __('Admin information') }}
                    </h6>
<div class="pl-lg-4">
 <div class="form-group{{ $errors->has('name') ? 'has-danger' :''}}">
    <lable class="form-control-lable" for="input-name">{{ __('Name') }}</lable>
    <input type="text" name="name" id="input-name"class="form-control form-control-alternative{{ $errors->has('name') ? 'is-invalid' :''}}" placeholder="{{__('Name')}}" value="{{old('name')}}" required autofocus>

    @if ($errors->has('name'))
    <span class="invalid-feedback" role="alert">
        <strong> {{$errors->first('name')}}</strong>
</span>
@endif
</div>
<div class="form-group{{$errors->has('email') ? 'has-danger' : ''}}">
    <lable class="form-control-lable" for="input-email">
        {{__('Email')}}
</lable>
<input type="email" name="email" id="iput-email" class="form-control form-control-alternative{{$errors->has('email') ? 'is-invaild' :''}}" placeholder="{{__('Email')}}" value="{{old('email')}}" required>

@if ($errors->has('email'))
    <span class="invalid-feedback" role="alert">
        <strong> {{$errors->first('email')}}</strong>
</span>
@endif
</div>

<div class="form-group{{$errors->has('password') ? 'has-danger' : ''}}">
    <lable class="form-control-lable" for="input-email">
        {{__('Password')}}
</lable>
<input type="password" name="password" id="iput-password" class="form-control form-control-alternative{{$errors->has('password') ? 'is-invaild' :''}}" placeholder="{{__('Password')}}" value="" required>

@if ($errors->has('password'))
    <span class="invalid-feedback" role="alert">
        <strong> {{$errors->first('password')}}</strong>
</span>
@endif
</div>

<div class="form-group">
    <lable class="form-control-lable" for="input-password-confirmation">
        {{__('Confirm Password')}}
</lable>
<input type="password" name="password_confirmation" id="iput-password-confirmation" class="form-control form-control-alternative" placeholder="{{__('Confirm Password')}}" value="" required>

<div class="text-center">
    <button type="submit" class="btn btn-sucess mt-4">{{__('Save')}}</button>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
@include('layouts.footers.auth')
</div>
@endsection
