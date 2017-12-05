@foreach($comments as $comment)
    
    @include('comments.index', ['comment' => $comment]);

    @if($comment->replies->count() > 0)
        {{ $comment->replies }}
        @include('comments.show', ['comments' => $comment->replies])
    @endif
@endforeach
