@extends('layouts.app')

@section('content')
@php
    $viewName = 'articles.index';
@endphp
  <div class="page-header">
    <h4>포럼<small> / {{$article->title}}</small></h4>
  </div>
  
  <article data-id="{{$article->id}}">
      @include('articles.partial.article', compact('article'))

      <p>{!! markdown($article->content) !!}</p>
      @include('tags.partial.list',['tags' => $article->tags])
  </article>
  
  <div class="text-right action__articles">
   @can('delete', $article)
     <a href="{{ route('articles.edit' , $article->id) }}" class="btn btn-info">
     <i class="fa fa-pencil"></i>글 수정
   </a>
   @endcan
   @can('delete', $article)
   <form action="{{ route('articles.destroy', $article->id) }}" method="post">
    {!! csrf_field() !!}
    {!! method_field('DELETE') !!}
    <button type="submit" class="btn btn-danger button__delete">
          글 삭제
    </button>
  </form>
   @endcan

   <a href="{{ route('articles.index') }}" class="btn btn-default">
    <i class="fa fa-list"></i>글 목록
  </a>   
  </div>

  <div class="container__comment">
    @include('comments.index')
  </div>
@endsection



@section('script')
 <script>
  $.ajaxSetup({
      headers:{
          'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
      }
  });

  $('.button__delete').on('click', function(e){
      var articleId = $('article').data('id');

      if(confirm('글을 삭제합니다.')){
          $.ajax({
              type: 'DELETE',
              url : '/articles/' + articleId
          }).then(function(){
            window.location.href = '/articles';
          
          });
      }
  });
 
 </script>
    
@endsection




