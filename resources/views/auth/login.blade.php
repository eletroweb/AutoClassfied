@extends('layouts.app')
@section('content')
<login
       action="{{route('login')}}"
       err_password="{{$errors->has('password')?$errors->first('password'):''}}"
       err_email="{{$errors->has('email')?$errors->first('email'):''}}"
       register="{{ route('register') }}"
       facebook_login="{{url('/auth/facebook')}}"
  ></login>
@endsection
