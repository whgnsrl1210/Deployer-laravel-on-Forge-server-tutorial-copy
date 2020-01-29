<div class="media media__create__comment {{ isset($parentId) ? 'sub' : 'top' }}">

    <div class="media-body">
  
      <div class="form-group">
      <textarea name="content" class="form-control"></textarea>
    
      </div>
      <div class="text-right action__articles">
      <button type="submit" class="btn btn-primary btn-sm">
       <a href="{{route('articles.create')}}" style="color:white; text-decoration:none; ">댓글 쓰기</a> 
      </button>
      </div>
    </div>
  </div>