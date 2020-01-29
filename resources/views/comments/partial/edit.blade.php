
<div class="media media__create__comment {{ isset($parentId) ? 'sub' : 'top' }}">

  <div class="media-body">
  <form action="{{ route('comments.update', $comment->id)}}" method="POST" class="form-horizontal">
    {!! csrf_field() !!}
    {!! method_field('PUT') !!}

    @if (isset($parentId))
     <input type="hidden" name="parent_id" value="{{$parentId}}">
    @endif

    <div class="form-group" {{ $errors->has('content') ? 'has-error' : ''}}>
    <textarea name="content" class="form-control">{{old('content', $comment->content)}}</textarea>
    {!! $errors->first('content', '<span class="form-error">:message</span>') !!}
    </div>
    <div class="text-right action__articles">
    <button type="submit" class="text-right btn btn-primary btn-sm">
      댓글 수정
    </button>
    </div>
 </form>
  </div>
</div>    

