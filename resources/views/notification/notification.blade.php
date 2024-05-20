@extends('welcome')
@section('content')
  

    <div class="flex flex-col flex-grow w-3/5 border-l border-r border-gray-300">
        <div class="flex justify-between flex-shrink-0 px-8 py-4 border-b border-gray-300">
            <h1 class="text-xl font-semibold">Notifications</h1>
            <!-- <button class="flex items-center h-8 px-2 text-sm bg-gray-300 rounded-sm hover:bg-gray-400">New                                                                                                                                                                                                                                                                                                                                 post</button> -->
        </div>
        <div class="flex-grow h-0 overflow-auto">
            <div class="max-w-2xl mx-auto items-center h-screen">

                {{-- <div class="flex justify-between px-4 py-2 bg-white items-center gap-4 rounded-lg border border-gray-100 my-3">
                <div class="relative w-16 h-16 rounded-full bg-gradient-to-r from-purple-400 via-blue-500 to-red-400 ">
                    <div
                        class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-14 h-14 bg-gray-200 rounded-full border-2 border-white">
                        <img class="w-full h-full object-cover rounded-full"
                            src="https://d2qp0siotla746.cloudfront.net/img/use-cases/profile-picture/template_3.jpg"
                            alt="Profile Picture">
                    </div>
                </div>
                <div>
                    <span class="font-mono">Emma would like to connect with you</span>
                </div>
                <div class="flex gap-2">
                    <button>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                    <button>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            </div> --}}

                <div class="notification-list">
                    @foreach ($notifications as $notification)
                        {{-- {{ dd($notification)}}; --}}
                        <div
                            class="flex justify-between px-4 py-2 bg-white items-center gap-4 rounded-lg border border-gray-100 my-3">
                            <div
                                class="relative w-16 h-16 rounded-full bg-gradient-to-r from-purple-400 via-blue-500 to-red-400 ">
                                <div
                                    class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-14 h-14 bg-gray-200 rounded-full border-2 border-white">
                                    <img class="w-full h-full object-cover rounded-full"
                                        src="\assests\{{ $notification->user->profile_picture }}" alt="Profile Picture">
                                </div>
                            </div>
                            <div>

                                <span class="font-mono">{{ $notification->user->fullName ?? 'Unknown user' }}
                                    {{ $notification->type }} one of
                                    your Post </span>
                                {{-- <img src="\assests\posts\{{ $notification->post->post_image }}" alt="" > --}}

                            </div>
                            <div>
                                <img src="\assests\posts\{{ $notification->post->post_image }}" alt="Post Image"
                                    class="h-12 w-20">
                            </div>
                            <span class="notification-time">{{ $notification->created_at->diffForHumans() }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>


    <script>
        function fetchNotifications() {
            $.ajax({
                type: 'GET',
                url: '{{ route('notifications.index') }}',
                success: function(response) {
                    if (response.notifications.length > 0) {
                        response.notifications.forEach(function(notification) {
                            // Display notification
                            console.log(notification);
                        });
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });

        }

        $(document).ready(function() {
            fetchNotifications();

            // Optionally, fetch notifications periodically
            setInterval(fetchNotifications, 60000); // every minute
        });
    </script>
@endsection
