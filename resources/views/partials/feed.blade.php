@section('content')
    <div class="flex flex-col flex-grow w-3/5 border-l border-r border-gray-300">
        <div class="flex justify-between flex-shrink-0 px-8 py-4 border-b border-gray-300">
            <h1 class="text-xl font-semibold">Feed Title</h1>
        </div>
        <!-- Feed -->
        <div class="flex-grow h-0 overflow-auto">
            <div class="flex w-full p-8 border-b-4 border-gray-300">
                <div class="flex flex-col flex-grow ml-4">
                    <form action="/" id="postForm" method="post" enctype="multipart/form-data">
                        <textarea class="p-3 bg-transparent border border-gray-500 rounded-lg w-full" name="post_data" id="post_data"
                            rows="3" placeholder="What's happening?"></textarea>
                        <div class="flex justify-between mt-2">
                            <div>
                                <label for="file" class="mt-2">Image</label>
                                <input type="file" accept="image/*" name="post_img" id="file"
                                    class="flex items-center h-8 px-3 text-xs rounded-lg hover:bg-gray-200" required>
                            </div>
                            <button type="submit"
                                class="submitPost flex items-center h-8 px-3 mt-6 text-xs rounded-lg bg-gray-300 hover:bg-gray-400">Post</button>
                        </div>
                    </form>

                </div>
            </div>

            <div class="flex w-full p-8 border-b border-gray-300">
                <img class="image flex-shrink-0 w-12 h-12 bg-gray-400 rounded-full" src="/images/profile_picture.jpg"></img>
                <div class="flex flex-col flex-grow ml-4">
                    <div class="flex">
                        <span class="font-semibold">John Doe</span>
                        <span class="ml-1">johndoe</span>
                        <span class="ml-auto text-sm">2024-05-15 10:30:00</span>
                    </div>
                    <p class="mt-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis vel libero ac nisi
                        fringilla lobortis. <a class="underline" href="#">#hashtag</a></p>

                    <img class="border rounded-lg" src="/images/post_image.jpg">
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
                            class="flex-1 flex items-center text-xs text-gray-400 hover:text-green-400 transition duration-350 ease-in-out">
                            <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-2">
                                <g>
                                    <path
                                        d="M23.77 15.67c-.292-.293-.767-.293-1.06 0l-2.22 2.22V7.65c0-2.068-1.683-3.75-3.75-3.75h-5.85c-.414 0-.75.336-.75.75s.336.75.75.75h5.85c1.24 0 2.25 1.01 2.25 2.25v10.24l-2.22-2.22c-.293-.293-.768-.293-1.06 0s-.294.768 0 1.06l3.5 3.5c.145.147.337.22.53.22s.383-.072.53-.22l3.5-3.5c.294-.292.294-.767 0-1.06zm-10.66 3.28H7.26c-1.24 0-2.25-1.01-2.25-2.25V6.46l2.22 2.22c.148.147.34.22.532.22s.384-.073.53-.22c.293-.293.293-.768 0-1.06l-3.5-3.5c-.293-.294-.768-.294-1.06 0l-3.5 3.5c-.294.292-.294.767 0 1.06s.767.293 1.06 0l2.22-2.22V16.7c0 2.068 1.683 3.75 3.75 3.75h5.85c.414 0 .75-.336.75-.75s-.337-.75-.75-.75z">
                                    </path>
                                </g>
                            </svg>
                            14 k
                        </button>
                        <button
                            class="flex-1 flex items-center text-xs text-gray-400 hover:text-red-600 transition duration-350 ease-in-out">
                            <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 ">
                                <g>
                                    <path
                                        d="M12 21.638h-.014C9.403 21.59 1.95 14.856 1.95 8.478c0-3.064 2.525-5.754 5.403-5.754 2.29 0 3.83 1.58 4.646 2.73.814-1.148 2.354-2.73 4.645-2.73 2.88 0 5.404 2.69 5.404 5.755 0 6.376-7.454 13.11-10.037 13.157H12zM7.354 4.225c-2.08 0-3.903 1.988-3.903 4.255 0 5.74 7.034 11.596 8.55 11.658 1.518-.062 8.55-5.917 8.55-11.658 0-2.267-1.823-4.255-3.903-4.255-2.528 0-3.94 2.936-3.952 2.965-.23.562-1.156.562-1.387 0-.014-.03-1.425-2.965-3.954-2.965z">
                                    </path>
                                </g>
                            </svg>
                            <span class="likes_count">100 likes</span>
                        </button>
                        <button
                            class="flex-1 flex items-center text-xs text-gray-400 hover:text-blue-400 transition duration-350 ease-in-out">
                            <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-2">
                                <g>
                                    <path
                                        d="M17.53 7.47l-5-5c-.293-.293-.768-.293-1.06 0l-5 5c-.294.293-.294.768 0 1.06s.767.294 1.06 0l3.72-3.72V15c0 .414.336.75.75.75s.75-.336.75-.75V4.81l3.72 3.72c.146.147.338.22.53.22s.384-.072.53-.22c.293-.293.293-.767 0-1.06z">
                                    </path>
                                    <path
                                        d="M19.708 21.944H4.292C3.028 21.944 2 20.916 2 19.652V14c0-.414.336-.75.75-.75s.75.336.75.75v5.652c0 .437.355.792.792.792h15.416c.437 0 .792-.355.792-.792V14c0-.414.336-.75.75-.75s.75.336.75.75v5.652c0 1.264-1.028 2.292-2.292 2.292z">
                                    </path>
                                </g>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
