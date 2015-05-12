@extends('masterlayouts.master')
@section('content')
	 <div class="row">
        <div class="col-md-4 col-md-offset-4">
      <h3>Login</h3>
      @if (Session::has('flash_notice'))
    <div class="alert alert-info">{{Session::get('flash_notice')}}</div>
      @endif
      @if (Session::has('message'))
    <div class="alert alert-info">{{Session::get('message')}}</div>
      @endif
        
   

    {{Form::open(array('url' => 'login', 'method' => 'Post'))}}
      <div class="form-group {{$errors->has('firstname')?'has-error':''}}">
        {{form::label('username', 'Username')}}
        {{form::text('username', Input::old('firstname'), array('class'=> 'form-control'))}}
        <span class="help-block">{{$errors->first('firstname')}}</span>
      </div>
      <div class="form-group {{$errors->has('password')?'has-error':''}}">
        {{form::label('password', 'Password')}}
        {{form::password('password', array('class'=>'form-control'))}}
        <span class="help-block">{{$errors->first('password')}}</span>
      </div>
     
    {{Form::submit('Login', array('class' => 'btn btn-primary'))}}
    <a href="{{URL::to('register')}}" class="btn btn-success">Register</a>

    {{Form::close()}}
      </div>
   </div>
	 
@stop