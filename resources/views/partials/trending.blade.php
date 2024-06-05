<div class="flex flex-col flex-shrink-0 w-1/4 py-4 pl-4">
    <input class="flex items-center h-8 px-2 border border-gray-500 rounded-lg" type="search" Placeholder="Search…">
    {{-- <div> --}}
    {{-- <h3 class="mt-6 font-semibold">Suggest Friend Lists</h3> --}}

    {{-- <div class="container">
        <h3 class="mt-6 font-semibold">Suggested Friends</h3>
        <div id="suggestedFriendsList" class="overflow-hidden">
            <div class="flex-grow h-64 overflow-auto">
                @foreach ($friends as $friend)
                    <!-- Only display three friends -->
                    <div class="flex w-full py-4 border-b border-gray-300">
                        <img class="image flex-shrink-0 w-12 h-12 bg-gray-400 rounded-full"
                            src="\assests\{{ $friend->profile_picture }}" alt="Profile Picture">
                        <div class="flex flex-col flex-grow ml-4">
                            <div class="flex text-sm">
                                <span class="font-semibold">{{ $friend->fullName }}</span>
                            </div>
                            <span class="text-sm text-gray-500">@ {{ $friend->username }}</span>
                        </div>
                        <div>
                            <button class="btn btn-primary follow-btn" data-id="{{ $friend->id }}">Follow</button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="mt-2 mb-2"></div> --}}
    <div class="container">
        <h3 class="mt-1 font-semibold">User List</h3>
        <div class="overflow-hidden">
            <div class="flex-grow h-96 overflow-auto">
                @foreach ($users as $user)
                    <div class="flex w-full py-2 border-b border-gray-300">
                        <img class="image flex-shrink-0 w-12 h-12 bg-gray-400 rounded-full"
                            src="{{ is_external_url($user->profile_picture) ? $user->profile_picture : asset('assests/' . $user->profile_picture) }}"
                            alt="{{ $user->fullName }} Profile Picture">
                        <div class="flex flex-col flex-grow ml-4">
                            <div class="flex text-sm">
                                <span class="font-semibold">{{ $user->fullName }}</span>
                            </div>
                            <span class="text-sm text-gray-500">@ {{ $user->username }}</span>
                        </div>
                        <div>
                            @if (Auth::user()->followings->contains($user))
                                <button class="removeFriend-btn border p-2 " data-id="{{ $user->id }}">
                                    Unfollow</button>
                            @else
                                <button class="addFrind-btn border p-2 " data-id="{{ $user->id }}">
                                    Follow</button>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
</div>

{{-- <script>
    $(document).ready(function() {
        // Follow user
        $('#followBtn').click(function(e) {
            e.preventDefault();
            var userId = $(this).data('user-id');
            $.ajax({
                type: 'POST',
                url: '{{ route('user.follow') }}',
                data: {
                    user_id: userId,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    alert(response.message);
                    // Update UI accordingly
                    $('#followBtn').hide();
                    $('#unfollowBtn').show();
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });

        // Unfollow user
        $('#unfollowBtn').click(function(e) {
            e.preventDefault();
            var userId = $(this).data('user-id');
            $.ajax({
                type: 'POST',
                url: '{{ route('user.unfollow') }}',
                data: {
                    user_id: userId
                },
                success: function(response) {
                    alert(response.message);
                    // Update UI accordingly
                    $('#unfollowBtn').hide();
                    $('#followBtn').show();
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
    });
</script> --}}

<script>
    $(document).ready(function() {
        // Use event delegation to handle click events for both buttons
        $(document).on('click', '.addFrind-btn', function() {
            var button = $(this);
            var userId = button.data('id');

            console.log('Follow button clicked for user ID:', userId);

            $.ajax({
                url: '{{ route('follow', '') }}/' + userId,
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                },
                success: function(response) {
                    console.log('Follow response:', response);
                    button.text('Unfollow');
                    button.removeClass('addFrind-btn').addClass('removeFriend-btn');
                },
                error: function(xhr, status, error) {
                    console.error('Follow error:', status, error);
                    alert('An error occurred while following the user.');
                }
            });
        });

        $(document).on('click', '.removeFriend-btn', function() {
            var button = $(this);
            var userId = button.data('id');

            console.log('UnFollow button clicked for user ID:', userId);

            $.ajax({
                url: '{{ route('unfollow', '') }}/' + userId,
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                },
                success: function(response) {
                    console.log('unFollow response:', response);
                    button.text('Follow');
                    button.removeClass('removeFriend-btn').addClass('addFrind-btn');
                },
                error: function(xhr, status, error) {
                    console.error('Unfollow error:', status, error);
                    alert('An error occurred while unfollowing the user.');
                }
            });
        });

    });
</script>
