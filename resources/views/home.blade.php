    {{-- @include('partials.header')
    @include('partials.aside')
    @include('partials.feed')
    @include('partials.trending')
    @include('partials.footer') --}}


    @extends('welcome')
    @section('content')
        <div class="flex flex-col flex-grow w-3/5 border-l border-r border-gray-300">
            <div class="flex justify-between flex-shrink-0 px-8 py-4 border-b border-gray-300">
                <h1 class="text-xl font-semibold">Feed Title</h1>
                <!-- <button class="flex items-center h-8 px-2 text-sm bg-gray-300 rounded-sm hover:bg-gray-400">New
                                                                                                                                                                                                                                                                                                                                                                                                                    post</button> -->
            </div>
            <!-- Feed -->
            <div class="flex-grow h-0 overflow-auto">
                <div class="flex w-full p-8 border-b-4 border-gray-300">
                    <img src="assests/{{ auth()->user()->profile_picture }}" class="w-12 h-12 rounded-full"
                        style="background-color: #ccc;">

                    <div class="flex flex-col flex-grow ml-4">
                        <form action="{{ route('posts.store') }}" id="postForm" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <textarea class="p-3 bg-transparent border border-gray-500 rounded-lg w-full" name="post_data" id="post_data"
                                rows="3" placeholder="What's happening?" required></textarea>
                            <div class="flex justify-between mt-2">
                                <div>
                                    <label for="file" class="mt-2">Image</label>
                                    <input type="file" accept="image/*" name="post_img" id="post_img"
                                        class="flex items-center h-8 px-3 text-xs rounded-lg hover:bg-gray-200">
                                </div>
                                <button type="submit"
                                    class="submitPost flex items-center h-8 px-3 mt-6 text-xs rounded-lg bg-gray-300 hover:bg-gray-400">Post</button>
                            </div>
                        </form>

                    </div>
                </div>



                <div class="posts">
                    @foreach ($posts as $post)
                        <div class="post flex w-full p-8 border-b border-gray-300" data-post-id="{{ $post->id }}">
                            <img class="image flex-shrink-0 w-12 h-12 bg-gray-400 rounded-full"
                                src="\assests\{{ $post->user->profile_picture }}"></img>
                            <div class="flex flex-col flex-grow ml-4">
                                <div class="flex">
                                    <span class="font-semibold">{{ $post->user->fullName }}</span>
                                    <span class="ml-1">
                                        {{ $post->user->username }}
                                    </span>
                                    <span class="ml-auto text-sm">{{ $post->created_at }}</span>
                                </div>
                                <p class="mt-1">{{ $post->descrip }} <a class="underline" href="#">#hashtag</a></p>

                                <img class="border rounded-lg" src="\assests\posts\{{ $post->post_image }}">
                                <div class="flex justify-around mt-4">
                                    <button
                                        class="flex-1 flex items-center text-sm text-gray-400 hover:text-blue-400 transition duration-350 ease-in-out">
                                        <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-2">
                                            <g>
                                                <path
                                                    d="M14.046 2.242l-4.148-.01h-.002c-4.374 0-7.8 3.427-7.8 7.802 0 4.098 3.186 7.206 7.465 7.37v3.828c0 .108.044.286.12.403.142.225.384.347.632.347.138 0 .277-.038.402-.118.264-.168 6.473-4.14 8.088-5.506 1.902-1.61 3.04-3.97 3.043-6.312v-.017c-.006-4.367-3.43-7.787-7.8-7.788zm3.787 12.972c-1.134.96-4.862 3.405-6.772 4.643V16.67c0-.414-.335-.75-.75-.75h-.396c-3.66 0-6.318-2.476-6.318-5.886 0-3.534 2.768-6.302 6.3-6.302l4.147.01h.002c3.532 0 6.3 2.766 6.302 6.296-.003 1.91-.942 3.844-2.514 5.176z">
                                                </path>
                                            </g>
                                        </svg>
                                        12.3 k
                                    </button>


                                    <button
                                        class="like-button flex-1 flex items-center text-xs text-gray-400 hover:text-red-600 transition duration-350 ease-in-out {{ in_array($user->id, $post->likes->pluck('user_id')->toArray()) ? 'text-red-600' : '' }}"
                                        data-id="{{ $post->id }}">
                                        <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                                            <g>
                                                <path
                                                    d="M12 21.638h-.014C9.403 21.59 1.95 14.856 1.95 8.478c0-3.064 2.525-5.754 5.403-5.754 2.29 0 3.83 1.58 4.646 2.73.814-1.148 2.354-2.73 4.645-2.73 2.88 0 5.404 2.69 5.404 5.755 0 6.376-7.454 13.11-10.037 13.157H12zM7.354 4.225c-2.08 0-3.903 1.988-3.903 4.255 0 5.74 7.034 11.596 8.55 11.658 1.518-.062 8.55-5.917 8.55-11.658 0-2.267-1.823-4.255-3.903-4.255-2.528 0-3.94 2.936-3.952 2.965-.23.562-1.156.562-1.387 0-.014-.03-1.425-2.965-3.954-2.965z">
                                                </path>
                                            </g>
                                        </svg>
                                        <span class="likes_count">{{ $post->likes->count() }} likes</span>
                                    </button>
                                    @if ($post->user->id === $user->id)
                                        <button class="savePostButton" data-id="{{ $post->id }}"
                                            class="flex-1 flex items-center text-xs text-gray-400 hover:text-blue-400 transition duration-350 ease-in-out 
                                        @if ($post->is_archive) text-blue-600 @endif">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0Z" />
                                            </svg>
                                        </button>
                                    @else
                                    @endif




                                </div>
                                <hr class="mt-2 mb-2 ">
                                <p class="text-gray-800 font-semibold">Comment</p>
                                <hr class="mt-2 mb-2">
                                <div class="mt-4">
                                    <div class="comments" id="comments-{{ $post->id }}">
                                        @foreach ($post->comments as $comment)
                                            <div class="flex items-center space-x-2" data-id="{{ $comment->id }}">
                                                <img src="\assests\{{ $comment->user->profile_picture }}" alt="User Avatar"
                                                    class="w-6 h-6 rounded-full">
                                                <div>
                                                    <p class="text-gray-800 font-semibold">{{ $comment->user->fullName }}
                                                    </p>
                                                    <p class="text-gray-500 text-sm">{{ $comment->content }}</p>
                                                    <a href="#" class="reply-button text-blue-500">Reply</a>
                                                </div>
                                            </div>
                                            @foreach ($comment->replies as $reply)
                                                <div class="flex items-center space-x-2 mt-2 ml-6"
                                                    data-id="{{ $reply->id }}">
                                                    <img src="\assests\{{ $reply->user->profile_picture }}"
                                                        alt="User Avatar" class="w-6 h-6 rounded-full">
                                                    <div>
                                                        <p class="text-gray-800 font-semibold">{{ $reply->user->fullName }}
                                                        </p>
                                                        <p class="text-gray-500 text-sm">{{ $reply->content }}</p>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endforeach
                                    </div>
                                    <form class="comment-form" data-post-id="{{ $post->id }}">
                                        <textarea name="content" required class="border p-2 w-full"></textarea>
                                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 mt-2">Submit</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>





                <style>
                    .like-button.liked {
                        background-color: darkred;
                        color: white;
                    }

                    .posts .flex {
                        transition: all 0.3s ease-in-out;
                    }
                </style>

                {{-- <style>
                            .red-like-button {
                                color: red;
                            }
                        </style> --}}
                {{-- <script>
                    $(document).ready(function() {
                        $('.like-button').on('click', function() {
                            var postId = $(this).data('post-id');
                            var likeCount = $(this).find('.likes-count');
                            var button = $(this);

                            $.ajax({
                                type: 'POST',
                                url: '/posts/likes',
                                data: {
                                    postId: postId
                                },
                                success: function(response) {
                                    likeCount.text(response);
                                    button.addClass('red-like-button'); // Add class to change color to red
                                },
                                error: function(xhr, textStatus, errorThrown) {
                                    console.log(xhr.responseText);
                                    console.log(textStatus);
                                    console.log(errorThrown);
                                }
                            });
                        });
                    });
                </script> --}}
                <script>
                    $("#postForm").submit(function(e) {
                        e.preventDefault(); // Prevent the form from submitting
                        var formData = new FormData(this); // Create FormData object
                        $.ajax({
                            url: "{{ route('posts.store') }}", // Form action URL
                            type: "POST",
                            data: formData,
                            processData: false, // Prevent jQuery from processing data
                            contentType: false, // Set content type to false
                            success: function(response) {
                                console.log(response);
                                if (response.success) {
                                    var post = response.post;
                                    // var user = response.post.user;
                                    var user = response.user;
                                    console.log(response);
                                    // console.log(response.user);
                                    // console.log(response.post.user);
                                    // var imagePath = "assets/posts/" + post.post_image;
                                    var newPost = `
                        <div class="flex w-full p-8 border-b border-gray-300 ">
                            <img class="image flex-shrink-0 w-12 h-12 bg-gray-400 rounded-full"
                                src="/assests/${ user.profile_picture }"></img>
                            <div class="flex flex-col flex-grow ml-4">
                                <div class="flex">
                                    <span class="font-semibold">${ user.fullName }</span>
                                    <span class="ml-1">
                                        ${user.username }
                                    </span>
                                    <span class="ml-auto text-sm">${ post.created_at }</span>
                                </div>
                                <p class="mt-1">${ post.descrip } <a class="underline" href="#">#hashtag</a></p>

                                <img class="border rounded-lg" src="assests/posts/${ post.post_image }">
                                <div class="flex justify-around mt-4">
                                    <button
                                        class="flex-1 flex items-center text-sm text-gray-400 hover:text-blue-400 transition duration-350 ease-in-out">
                                        <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-2">
                                            <g>
                                                <path
                                                    d="M14.046 2.242l-4.148-.01h-.002c-4.374 0-7.8 3.427-7.8 7.802 0 4.098 3.186 7.206 7.465 7.37v3.828c0 .108.044.286.12.403.142.225.384.347.632.347.138 0 .277-.038.402-.118.264-.168 6.473-4.14 8.088-5.506 1.902-1.61 3.04-3.97 3.043-6.312v-.017c-.006-4.367-3.43-7.787-7.8-7.788zm3.787 12.972c-1.134.96-4.862 3.405-6.772 4.643V16.67c0-.414-.335-.75-.75-.75h-.396c-3.66 0-6.318-2.476-6.318-5.886 0-3.534 2.768-6.302 6.3-6.302l4.147.01h.002c3.532 0 6.3 2.766 6.302 6.296-.003 1.91-.942 3.844-2.514 5.176z">
                                                </path>
                                            </g>
                                        </svg>
                                        12.3 k
                                    </button>
                                   
                                    <button
                                        class="like-button flex-1 flex items-center text-xs text-gray-400 hover:text-red-600 transition duration-350 ease-in-out {{ in_array($user->id, $post->likes->pluck('user_id')->toArray()) ? 'text-red-600' : '' }}"
                                        data-id="{{ $post->id }}">
                                        <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                                            <g>
                                                <path
                                                    d="M12 21.638h-.014C9.403 21.59 1.95 14.856 1.95 8.478c0-3.064 2.525-5.754 5.403-5.754 2.29 0 3.83 1.58 4.646 2.73.814-1.148 2.354-2.73 4.645-2.73 2.88 0 5.404 2.69 5.404 5.755 0 6.376-7.454 13.11-10.037 13.157H12zM7.354 4.225c-2.08 0-3.903 1.988-3.903 4.255 0 5.74 7.034 11.596 8.55 11.658 1.518-.062 8.55-5.917 8.55-11.658 0-2.267-1.823-4.255-3.903-4.255-2.528 0-3.94 2.936-3.952 2.965-.23.562-1.156.562-1.387 0-.014-.03-1.425-2.965-3.954-2.965z">
                                                </path>
                                            </g>
                                        </svg>
                                        <span class="likes_count">{{ $post->likes->count() }} likes</span>
                                    </button>`;
                                    if (post.user.id==user.id){
                                      newPost+=  `
                                        <button class="savePostButton" data-id="{{ $post->id }}"
                                            class="flex-1 flex items-center text-xs text-gray-400 hover:text-blue-400 transition duration-350 ease-in-out 
                                        @if ($post->is_archive) text-blue-600 @endif">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0Z" />
                                            </svg>
                                        </button>`;
                                    }else{

                                   } newPost+=` 
                                </div>
                            </div>
                        </div>`;
                                    // Append the new post to the posts container
                                    $("div.posts").prepend(newPost);
                                    // Reset the form
                                    $("#postForm")[0].reset();

                                    $(".like-button").on("click", function(e) {
                                        console.log('here');
                                        e.preventDefault();
                                        var postid = $(this).data("id");
                                        var $button = $(this);

                                        $.ajax({
                                            url: "{{ route('post.like') }}",
                                            type: "post",
                                            data: {
                                                postid: postid,
                                                _token: '{{ csrf_token() }}'
                                            },
                                            success: function(response) {
                                                console.log(response);
                                                if (response.success) {
                                                    $button
                                                        .toggleClass("text-red-600")
                                                        .find("span.likes_count")
                                                        .text(response.likeCount + " likes");
                                                }
                                            }

                                        });
                                    });
                                } else {
                                    alert("Post Add Erorr");
                                }
                                // if (response == "") {
                                //     $.ajax({
                                //         type: "GET",
                                //         url: "/posts/views",
                                //         success: function(result) {
                                //             console.log(result);
                                //             $("div.posts").html(result);
                                //             $("#postForm")[0].reset();
                                //             alert("Post submitted successfully!");
                                //             $(".like").off("click");
                                //             $(".like").on("click", function() {
                                //                 var postid = $(this).data("id");
                                //                 $post = $(this);

                                //                 $.ajax({
                                //                     url: "/posts/likes",
                                //                     type: "post",
                                //                     data: {
                                //                         postid: postid,
                                //                     },
                                //                     success: function(response) {
                                //                         console.log(response);
                                //                         if (response.error) {
                                //                             alert(response.error);
                                //                             if (response.error ==
                                //                                 "User not logged in."
                                //                                 ) {
                                //                                 window.location
                                //                                     .href =
                                //                                     "/login";
                                //                             }
                                //                         } else {
                                //                             $post
                                //                                 .parent()
                                //                                 .find(
                                //                                     "span.likes_count"
                                //                                     )
                                //                                 .text(response +
                                //                                     " likes");
                                //                             $post.toggleClass(
                                //                                 "text-red-600");
                                //                         }
                                //                     },
                                //                 });
                                //             });
                                //         },
                                //     });
                                // }
                            },
                            error: function(xhr, status, error) {
                                console.error(xhr.responseText);
                                alert("Error submitting post. Please try again.");
                            },
                        });
                    });

                    $(".like-button").on("click", function(e) {
                        console.log('here');
                        e.preventDefault();
                        var postid = $(this).data("id");
                        var $button = $(this);

                        $.ajax({
                            url: "{{ route('post.like') }}",
                            type: "post",
                            data: {
                                postid: postid,
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                console.log(response);
                                if (response.success) {
                                    $button
                                        .toggleClass("text-red-600")
                                        .find("span.likes_count")
                                        .text(response.likeCount + " likes");
                                }
                            }

                        });
                    });

                    $(".savePostButton").on("click", function(e) {
                        e.preventDefault();
                        var postid = $(this).data("id");
                        var $button = $(this);
                        $.ajax({
                            url: "{{ route('archive') }}",
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




                    $(document).ready(function() {
                        $(document).on('submit', '.comment-form', function(e) {
                            e.preventDefault();
                            var form = $(this);
                            var postId = form.data('post-id');
                            var content = form.find('textarea[name="content"]').val();
                            var token = '{{ csrf_token() }}';

                            $.ajax({
                                type: 'POST',
                                url: '{{ route('comments.store') }}',
                                data: {
                                    post_id: postId,
                                    content: content,
                                    _token: token
                                },
                                success: function(response) {
                                    console.log(response);
                                    var newComment = `
                <div class="flex items-center space-x-2 mt-2" data-id="${response.id}">
                    <img src="/assests/${response.user.profile_picture}" alt="User Avatar" class="w-6 h-6 rounded-full">
                    <div>
                        <p class="text-gray-800 font-semibold">${response.user.fullName}</p>
                        <p class="text-gray-500 text-sm">${response.content}</p>
                        <a href="#" class="reply-button text-blue-500">Reply</a>
                    </div>
                </div>`;
                                    $('#comments-' + postId).append(newComment);
                                    form.find('textarea[name="content"]').val('');
                                },
                                error: function(response) {
                                    alert('Error submitting comment: ' + response.responseJSON.error);
                                }
                            });
                        });




                        $(document).on('click', '.reply-button', function(e) {
                            e.preventDefault();
                            var parent = $(this).closest('.flex');
                            var parentId = parent.data('id');
                            var replyForm = `
                            
        <form class="reply-form mt-2 ml-6" data-parent-id="${parentId}">
            <textarea name="content" required class="border p-2 w-full"></textarea>
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 mt-2">Submit</button>
        </form>`;
                            parent.append(replyForm);
                        });

                        $(document).on('submit', '.reply-form', function(e) {
                            e.preventDefault();
                            var form = $(this);
                            var postId = form.find('input[name="post_id"]').val();
                            var parentId = form.data('parent-id');
                            var content = form.find('textarea[name="content"]').val();
                            var token = '{{ csrf_token() }}';

                            $.ajax({
                                type: 'POST',
                                url: '{{ route('comments.store') }}',
                                data: {
                                    post_id: postId,
                                    parent_id: parentId,
                                    content: content,
                                    _token: token
                                },
                                success: function(response) {
                                    var newReply = `
                <div class="flex items-center space-x-2 mt-2 ml-6" data-id="${response.id}">
                    <img src="/assests/${response.user.profile_picture}" alt="User Avatar" class="w-6 h-6 rounded-full">
                    <div>
                        <p class="text-gray-800 font-semibold">${response.user.fullName}</p>
                        <p class="text-gray-500 text-sm">${response.content}</p>
                    </div>
                </div>`;
                                    form.closest('.flex').append(newReply);
                                    form.remove();
                                },
                                error: function(response) {
                                    alert('Error submitting reply: ' + response.responseJSON.error);
                                }
                            });
                        });



                    });
                </script>
            </div>
        </div>
    @endsection
