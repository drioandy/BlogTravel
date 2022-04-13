@foreach($comments as $comment)

    @if($comment->parent_id ==null  )

        <div class="flex gap-4 mb-4">
            <!-- Parent comment-->
            <div class="flex-shrink-0">
                <img class="rounded-full w-16 h-16 ring ring-gray-200 object-cover"
                     src="{{$comment->user->avatar}}"
                     alt="..."/></div>
            <div class="w-full ">
                <div class="bg-gray-300 p-4 rounded">
                    <div class="font-bold">{{$comment->user->user_name}}</div>
                    <div>{{ $comment->content }}</div>
                </div>
                <div class="text-lg">{{ Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}
                </div>
                @include('admin.pages.comment.comment-child', ['commentChilds' => $comment->replies])

            </div>
        </div>

    @endif




@endforeach
