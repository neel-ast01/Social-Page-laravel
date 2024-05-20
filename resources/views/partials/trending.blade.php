<div class="flex flex-col flex-shrink-0 w-1/4 py-4 pl-4">
    <input class="flex items-center h-8 px-2 border border-gray-500 rounded-lg" type="search" Placeholder="Search…">
    {{-- <div> --}}
    {{-- <h3 class="mt-6 font-semibold">Suggest Friend Lists</h3> --}}

    <div class="container">
        <h3 class="mt-6 font-semibold">Suggested Friends</h3>
        <div id="suggestedFriendsList"></div>
    </div>
    @foreach ($friends as $friend)
        <div class="flex w-full py-4 border-b border-gray-300">
            <img class="image flex-shrink-0 w-12 h-12 bg-gray-400 rounded-full"
                src="\assests\{{ $friend->profile_picture }}"></img>
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
    document.addEventListener('DOMContentLoaded', function() {
        $('.follow-btn').on('click', function() {
            const button = $(this);
            const userId = button.data('id');

            console.log('Follow button clicked for user ID:', userId);

            $.ajax({
                url: '{{ route('follow') }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    user_id: userId
                },
                success: function(response) {
                    console.log('Follow response:', response);
                    if (response.status === 'success') {
                        // Remove the friend from the list
                        button.closest('.flex').remove();
                    } else {
                        alert(response.message);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Follow error:', status, error);
                    alert('An error occurred while following the user.');
                }
            });
        });
    });
</script>
