@foreach($commentChilds as $comment)

    <div class="d-flex gap-4 mb-4">
        <div class="flex-shrink-0">
            <img class="rounded-circle w-16 h-16"
                 src="{{$comment->user->avatar}}"
                 alt="..."/></div>
        <div class="w-full">
            <div class="font-bold">{{$comment->user->user_name}}</div>
            <div>{{ $comment->content }}</div>
            <form method="post" class="mt-3" action="{{route('comment.store')}}">
                @csrf
                <div class="form-group">
                    <input type="text" name="content" class="form-control"/>
                    <input type="hidden" name="post_id" value="{{ $post->id }}"/>
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    <input type="hidden" name="parent_id" value="{{ $comment->id }}"/>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary btn-sm" value="Reply"/>
                </div>
            </form>
        @include('client.pages.comment.comment-child', ['commentChilds' => $comment->replies])
        </div>
    </div>

@endforeach
