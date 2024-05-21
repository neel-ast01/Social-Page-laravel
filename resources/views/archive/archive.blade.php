@extends('welcome')
@section('content')
    <div class="flex flex-col flex-grow w-3/5 border-l border-r border-gray-300">
        <div class="flex justify-between flex-shrink-0 px-8 py-4 border-b border-gray-300">
            <h1 class="text-xl font-semibold">Archive Post</h1>
            <!-- <button class="flex items-center h-8 px-2 text-sm bg-gray-300 rounded-sm hover:bg-gray-400">New
                            post</button> -->
        </div>
        <div class="flex-grow h-0 overflow-auto">
            @foreach ($archivedPosts as $post)
                <div class="post flex w-full p-8 border-b border-gray-300" data-post-id="{{ $post->id }}">
                    <img class="image flex-shrink-0 w-12 h-12 bg-gray-400 rounded-full"
                        src="\assests\{{ $post->user->profile_picture }}"></img>
                    <div class="flex flex-col flex-grow ml-4">
                        <div class="flex">
                            <span class="font-semibold">{{ $post->user->fullName }}</span>
                            <span class="ml-1">{{ $post->user->username }}</span>
                            <span class="ml-auto text-sm">{{ $post->created_at }}</span>
                        </div>
                        <p class="mt-1">{{ $post->descrip }} <a class="underline" href="#">#hashtag</a></p>
                        <img class="border rounded-lg" src="\assests\posts\{{ $post->post_image }}">
                        <button class="savePostButton" data-id="{{ $post->id }}"
                            class="flex-1 flex items-center text-xs text-gray-400 hover:text-blue-400 transition duration-350 ease-in-out 
                    @if ($post->is_archive) text-blue-600 @endif">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0Z" />
                            </svg>
                        </button>
                    </div>
                </div>
                <hr>
            @endforeach
        </div>
    </div>
    
    <script>
    $(".savePostButton").on("click", function(e) {
        e.preventDefault();
        var postid = $(this).data("id");
        var $button = $(this);
        $.ajax({
            url: "{{ route('showHidePost') }}",
            type: "post",
            data: {
                postid: postid,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if (response.success) {
                    console.log('Archive status toggled successfully', response.success);
                    // Hide the parent post element
                    $button.closest('.post').hide();
                } else {
                    console.error('Error toggling archive status:', response.message);
                }
            },
            error: function(xhr, status, error) {
                console.error('Error toggling archive status:', error);
            }
        });
    });
</script>

@endsection