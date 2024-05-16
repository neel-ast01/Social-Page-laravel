<!DOCTYPE html>
<html lang="en">

<head>

    @include('partials.header')

</head>

<body style="background: #edf2f7;">
    <div class="h-screen overflow-hidden flex items-center justify-center">
        <div class="flex justify-between mx-32 w-screen h-screen px-4 text-gray-700">
            @include('partials.aside')
            @yield('content')
            {{-- @include('partials.feed') --}}
            @include('partials.trending')
        </div>
    </div>
    @include('partials.footer')
    @yield('script')
</body>

</html>
