

@if (isset($user) and $user)
<a href="{{gravatar_profile_url($user->eamil)}}" class="pull-left">
<img class="media-object img-thumbnail" src="{{gravatar_url($user->email, $size)}}" alt="{{$user->name}}">
</a>
@else
<a href="{{gravatar_profile_url('unknown@example.com')}}" class="pull-left">
    <img class="media-object img-thumbnail" src="{{gravatar_url('unknown@example.com', $size)}}" alt="Unknown User">
    </a>
@endif

