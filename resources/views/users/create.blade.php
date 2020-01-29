@extends('layouts.app')

@section('content')
<form action="{{ route('users.store') }}" method="POST" class="form__auth">
  <!--토큰(_token) 키를 가진 숨은 필드를 만드는 도우미 함수-->
    {!! csrf_field() !!}
  

  <!--has메소드 안에 들은 키의 유효성 검사 오류가 있는지 확인하는 구문, 오류가 있으면 has-error를 출력-->  
  <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
       <input type="text" name="name" class="form-control" placeholder="이름" value="{{old('name')}}" autofocus/>
      <!--$errors 인스턴스에 있는 first메소드 키(name)에 할당된 메시지 중 첫번째를 형식(<span class~~~>)에 맞추어 반환--> 
       {!! $errors->first('name', '<span class="form-error">:message</span>') !!}
  </div>

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
          가입하기
      </button>
  </div>

</form>
    
@endsection