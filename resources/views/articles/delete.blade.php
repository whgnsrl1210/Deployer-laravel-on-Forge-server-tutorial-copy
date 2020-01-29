@extends('layouts.app')

@section('content')
  <div class="page-header">
    <h4><small> 글을 삭제하시겠습니까?</small></h4>
  </div>

  <form action="{{ route('articles.delete', $article->id)}}" method="POST">
    {!! csrf_field() !!}
    {!! method_field('DELETE') !!}

  

    <div class="form-group">
        <button type="submit" class="btn btn-primary">확인</button>
    </div>
  </form>
    
@endsection