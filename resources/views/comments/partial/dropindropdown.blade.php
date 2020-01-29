<div class="dropdown pull-right hidden-xs hidden-sm">
    <span class="dropdown-toggle btn btn-default btn-xs" type="button" data-toggle="dropdown">
        댓글 수정
    </span>
    <ul class="dropdown-menu" role="menu">
      <li role="presentation">
        <div class="text-right action__comment">
               
 

            @can('update', $comment)
            @include('comments.partial.edit')    
            @endcan
            
        </div>
      </li>
    </ul>
</div>