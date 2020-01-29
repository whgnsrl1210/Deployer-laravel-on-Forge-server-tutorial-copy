<div class="media item__comment top" data-id="{{$comment->id}}" id="comment_{{$comment->id}}">
         
    
    @include('users.partial.avatar', ['user' => $comment->user , 'size'=> 32])

 <div class="media-body">
 <h5 class="media-heading">
 <a href="{{gravatar_profile_url($comment->user->email)}}">
  {{$comment->user->name}}
 </a>
 
    <small>
     {{$comment->created_at->diffForHumans()}}
    </small>
 </h5>

 <div class="content__comment">
     {!! markdown($comment->content) !!}
 </div>

 <div class="text-right action__comment">
    @can('update', $comment)
                
    <form action="{{ route('comments.destroy', $comment->id) }}" method="post">
       {!! csrf_field() !!}
       {!! method_field('DELETE') !!}
       <button type="submit" class="btn__delete__comment">
           댓글 삭제
       </button>
     </form>


     
     @include('comments.partial.dropdown')   
    
   @endcan
        
 </div>

 
 
 
 @if ($currentUser)
   @include('comments.partial.createComment', [
       'parentId' => $comment->id
   ])
 @endif



 @forelse ($comment->replies as $reply)
     @include('comments.partial.comment',[
         'comment' => $reply,
     ])

 @empty
   
 @endforelse
 </div>
</div>

