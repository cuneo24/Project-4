<div class='commentWrapper'>
    <div class='commentHeader'>
        <span class='commenterName'>{{$comment->user->name}}</span><br><em>Posted {{$comment->created_at->format('d M Y, g:iA')}}</em>
    </div>
    <div class='commentContent'>
        {{$comment->comment}}
    </div>
    @if(isset($user) && $user->id == $comment->user_id)
        <form class='commentDeleteForm' method='POST' action='/{{$comment->id}}/deletecomment'>
            {{ csrf_field() }}
            {{method_field('DELETE')}}
            <input class='commentDelete' type='submit' value='Delete'>
        </form>
    @endif
</div>