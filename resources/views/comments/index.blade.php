@if($comment->parent_id == NULL)   
    <div style="background-color: red;">
        {{ $comment }}
    </div>
@endif