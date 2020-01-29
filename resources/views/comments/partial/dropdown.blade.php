<div class="dropdown pull-right hidden-xs hidden-sm">
    <button class="" data-toggle="dropdown">
        댓글 수정
    </button>
    <ul class="dropdown-menu" role="menu">
      <li role="presentation">
        <div class="text-right action__comment">
            @can('update', $comment)
  
                 @can('update', $comment)
                 @include('comments.partial.edit')    
                 @endcan
               @endcan


        </div>
      </li>
    </ul>
</div>