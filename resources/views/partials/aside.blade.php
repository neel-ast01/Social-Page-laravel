{{-- <div class="h-screen overflow-hidden flex items-center justify-center">
    <div class="flex justify-between mx-32 w-screen h-screen px-4 text-gray-700"> --}}

<div class="flex flex-col w-1/5 py-4 pr-3">
    <a class="flex px-3 py-2 mt-2 text-lg font-medium rounded-lg hover:bg-gray-300" href="{{ route('home') }}"> <svg
            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-6 h-6 mr-2">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
        </svg>Home</a>
    <a class="flex px-3 py-2 mt-2 text-lg font-medium rounded-lg hover:bg-gray-300" href="#"><svg
            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="w-6 h-6 mr-2">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="m15.75 15.75-2.489-2.489m0 0a3.375 3.375 0 1 0-4.773-4.773 3.375 3.375 0 0 0 4.774 4.774ZM21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
        </svg>Discover</a>
    <a class="flex px-3 py-2 mt-2 text-lg font-medium rounded-lg hover:bg-gray-300"
        href="{{ route('notifications.index') }}">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="w-6 h-6 mr-2">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0M3.124 7.5A8.969 8.969 0 0 1 5.292 3m13.416 0a8.969 8.969 0 0 1 2.168 4.5" />
        </svg>Notifications</a>



    @if (auth()->check())
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit"
                class="w-full grid justify-items-center mt-4 px-3 py-2 text-lg font-medium rounded-full bg-blue-400 hover:bg-gray-300">
                Log Out
            </button>
        </form>
    @else
        <a href="{{ route('login') }}"
            class="w-full grid justify-items-center mt-4 px-3 py-2 text-lg font-medium rounded-full bg-blue-400 hover:bg-gray-300">
            Signup / Login
        </a>
    @endif




    @if (Auth::check())
        <a href="{{ route('profile.index') }}"
            class="flex px-3 py-2 mt-2 mt-auto text-lg rounded-lg font-medium hover:bg-gray-200">
            <img 
            
            src="{{ is_external_url(Auth::user()->profile_picture) ? Auth::user()->profile_picture : asset('assests/' . Auth::user()->profile_picture) }}"
            alt="Profile Picture"
                class="flex-shrink-0 w-10 h-10 rounded-full">

            <div class="flex flex-col ml-2">
                <span class="mt-1 text-sm font-semibold leading-none">
                    {{ Auth::user()->fullName ?? 'Full Name' }}
                </span>
                <span class="mt-1 text-xs leading-none">
                    {{ '@' . Auth::user()->username ?? '@username' }}
                </span>
            </div>
        </a>
    @endif



</div>
