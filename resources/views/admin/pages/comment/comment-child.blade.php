@foreach($commentChilds as $comment)

    <div class="flex gap-4  my-4">
        <div class="flex-shrink-0">
            <img class="rounded-full w-16 h-16"
                 src="{{$comment->user->avatar}}"
                 alt="..."/></div>
        <div class="w-full ">
            <div class="bg-gray-200 p-4 rounded">
                <div class="font-bold">{{$comment->user->user_name}}</div>
                <div>{{ $comment->content }}</div>
            </div>
            <div class="text-lg">{{ Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}
            </div>

            @include('admin.pages.comment.comment-child', ['commentChilds' => $comment->replies])
        </div>
    </div>

@endforeach
