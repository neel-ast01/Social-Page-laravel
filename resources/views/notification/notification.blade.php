@extends('welcome')
@section('content')
  

    <div class="flex flex-col flex-grow w-3/5 border-l border-r border-gray-300">
        <div class="flex justify-between flex-shrink-0 px-8 py-4 border-b border-gray-300">
            <h1 class="text-xl font-semibold">Notifications</h1>
        </div>
        <div class="flex-grow h-0 overflow-auto">
            <div class="max-w-2xl mx-auto items-center h-screen">
                <div class="notification-list">
                    @foreach ($notifications as $notification)
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


            setInterval(fetchNotifications, 60000); 
        });
    </script>
@endsection
