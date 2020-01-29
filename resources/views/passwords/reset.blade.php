

@extends('layouts.app')

@section('content')
<form action="{{ route('reset.store') }}" method="POST" class="form__auth">
 {!! csrf_field() !!}
    <input type="hidden" name="token" value="{{ $token }}">



  <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
    <input type="text" name="email" class="form-control" placeholder="이메일" value="{{old('email')}}" autofocus/>
    {!! $errors->first('email', '<span class="form-error">:message</span>') !!}
  </div>

  <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
    <input type="password" name="password" class="form-control" placeholder="비밀번호" value="{{old('password')}}" autofocus/>
    {!! $errors->first('password', '<span class="form-error">:message</span>') !!}
  </div>

  <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
    <input type="password" name="password_confirmation" class="form-control" placeholder="비밀번호 확인" value="{{old('password_confirmation')}}" autofocus/>
    {!! $errors->first('password_confirmation', '<span class="form-error">:message</span>') !!}
  </div>


  <div class="form-group">
      <button class="btn btn-primary btn-lg btn-block" type="submit">
          비밀번호 변경
      </button>
  </div>

</form>
    
@endsection