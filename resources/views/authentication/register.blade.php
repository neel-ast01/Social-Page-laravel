<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <style>
        .error {
            color: red
        }
    </style>

</head>

<body>
    {{-- <div class="relative py-16 bg-clifford">
        <div class="relative container m-auto px-6 text-gray-500 md:px-12 xl:px-40">
            <div class="m-auto md:w-8/12 lg:w-6/12 xl:w-6/12">
                <div class="rounded-xl bg-slate-400 shadow-xl">
                    <div class="p-6 sm:p-16">
                        <div class="space-y-4">
                            <h2 class="mb-8 text-2xl text-cyan-900 font-bold">Sign in
                        </div>

                        <form id="registerForm" class="max-w-sm mx-auto" action="{{ route('register') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf

                            <label for="username" class="block mt-4 mb-2 text-sm font-medium">Username</label>
                            <input type="text" id="username" name="username" value="{{ old('username') }}"
                                class="bg-gray-50 border text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="neel002b">
                            @error('username')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror

                            <label for="fullName" class="block mt-4 mb-2 text-sm font-medium text-gray-900 ">Full
                                Name</label>
                            <input type="text" id="fullName" name="fullName" value="{{ old('fullName') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="John Wick">

                            <label for="email" class="block mt-4 mb-2 text-sm font-medium">Email</label>
                            <input type="email" id="email"
                                class="bg-gray-50 border {{ $errors->has('email') ? 'border-red-300 text-red-900' : 'border-gray-300 text-gray-900' }} text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="abc@gmail.com" name="email" value="{{ old('email') }}">
                            @error('email')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror

                            <label for="password"
                                class="block mt-4 mb-2 text-sm font-medium text-gray-900">Password</label>
                            <input type="password" id="password"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                name="password" placeholder="........." value="">

                            <label class="block mb-2 mt-4 text-sm font-medium text-gray-900" for="user_avatar">Upload
                                file</label>
                            <input
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                aria-describedby="user_avatar_help" id="user_avatar" type="file"
                                name="profile_picture">
                            <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="user_avatar_help">A profile
                                picture</div>

                            <p class="text-center mt-3 mb-2 text-[16px]">You have an account? <a href="/login"
                                    class="text-gray-800">Login</a>
                            </p>
                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-slate-600 dark:hover:bg-slate-500 dark:focus:ring-blue-800">Register
                                new account</button>
                        </form>





                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="min-h-screen bg-gray-100 text-gray-900 flex justify-center">
        <div class="max-w-screen-xl m-0 sm:m-10 bg-white shadow sm:rounded-lg flex justify-center flex-1">
            <div class="lg:w-1/2 xl:w-5/12 p-6 sm:p-12">
                <div>
                    <img src="https://storage.googleapis.com/devitary-image-host.appspot.com/15846435184459982716-LogoMakr_7POjrN.png"
                        class="w-32 mx-auto" />
                </div>
                <div class="mt-12 flex flex-col items-center">
                    <h1 class="text-2xl xl:text-3xl font-extrabold">
                        Sign up
                    </h1>
                    <div class="w-full flex-1 mt-8">
                        <div class="flex flex-col items-center">
                            {{-- <button
                                class="w-full max-w-xs font-bold shadow-sm rounded-lg py-3 bg-indigo-100 text-gray-800 flex items-center justify-center transition-all duration-300 ease-in-out focus:outline-none hover:shadow focus:shadow-sm focus:shadow-outline">
                                <div class="bg-white p-2 rounded-full">
                                    <svg class="w-4" viewBox="0 0 533.5 544.3">
                                        <path
                                            d="M533.5 278.4c0-18.5-1.5-37.1-4.7-55.3H272.1v104.8h147c-6.1 33.8-25.7 63.7-54.4 82.7v68h87.7c51.5-47.4 81.1-117.4 81.1-200.2z"
                                            fill="#4285f4" />
                                        <path
                                            d="M272.1 544.3c73.4 0 135.3-24.1 180.4-65.7l-87.7-68c-24.4 16.6-55.9 26-92.6 26-71 0-131.2-47.9-152.8-112.3H28.9v70.1c46.2 91.9 140.3 149.9 243.2 149.9z"
                                            fill="#34a853" />
                                        <path
                                            d="M119.3 324.3c-11.4-33.8-11.4-70.4 0-104.2V150H28.9c-38.6 76.9-38.6 167.5 0 244.4l90.4-70.1z"
                                            fill="#fbbc04" />
                                        <path
                                            d="M272.1 107.7c38.8-.6 76.3 14 104.4 40.8l77.7-77.7C405 24.6 339.7-.8 272.1 0 169.2 0 75.1 58 28.9 150l90.4 70.1c21.5-64.5 81.8-112.4 152.8-112.4z"
                                            fill="#ea4335" />
                                    </svg>
                                </div>
                                <span class="ml-4">
                                    Sign Up with Google
                                </span>
                            </button> --}}

                            {{-- <button
                                class="w-full max-w-xs font-bold shadow-sm rounded-lg py-3 bg-indigo-100 text-gray-800 flex items-center justify-center transition-all duration-300 ease-in-out focus:outline-none hover:shadow focus:shadow-sm focus:shadow-outline mt-5">
                                <div class="bg-white p-1 rounded-full">
                                    <svg class="w-6" viewBox="0 0 32 32">
                                        <path fill-rule="evenodd"
                                            d="M16 4C9.371 4 4 9.371 4 16c0 5.3 3.438 9.8 8.207 11.387.602.11.82-.258.82-.578 0-.286-.011-1.04-.015-2.04-3.34.723-4.043-1.609-4.043-1.609-.547-1.387-1.332-1.758-1.332-1.758-1.09-.742.082-.726.082-.726 1.203.086 1.836 1.234 1.836 1.234 1.07 1.836 2.808 1.305 3.492 1 .11-.777.422-1.305.762-1.605-2.664-.301-5.465-1.332-5.465-5.93 0-1.313.469-2.383 1.234-3.223-.121-.3-.535-1.523.117-3.175 0 0 1.008-.32 3.301 1.23A11.487 11.487 0 0116 9.805c1.02.004 2.047.136 3.004.402 2.293-1.55 3.297-1.23 3.297-1.23.656 1.652.246 2.875.12 3.175.77.84 1.231 1.91 1.231 3.223 0 4.61-2.804 5.621-5.476 5.922.43.367.812 1.101.812 2.219 0 1.605-.011 2.898-.011 3.293 0 .32.214.695.824.578C24.566 25.797 28 21.3 28 16c0-6.629-5.371-12-12-12z" />
                                    </svg>
                                </div>
                                <span class="ml-4">
                                    Sign Up with GitHub
                                </span>
                            </button> --}}
                        </div>

                        {{-- <div class="my-12 border-b text-center">
                            <div
                                class="leading-none px-2 inline-block text-sm text-gray-600 tracking-wide font-medium bg-white transform translate-y-1/2">
                                Or sign up with e-mail
                            </div>
                        </div> --}}

                        <div class="mx-auto max-w-xs">
                            <form id="registerForm" class="max-w-sm mx-auto" action="{{ route('register') }}"
                                method="post" enctype="multipart/form-data">
                                @csrf

                                {{-- Username --}}
                                <label for="username" class="block mt-4 mb-2 text-sm font-medium">Username</label>
                                <input type="text" id="username" name="username" value="{{ old('username') }}"
                                    class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white"
                                    placeholder="neel002b">
                                @error('username')
                                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                @enderror

                                {{-- Full name --}}
                                <label for="fullName" class="block mt-4 mb-2 text-sm font-medium text-gray-900 ">Full
                                    Name</label>
                                <input type="text" id="fullName" name="fullName" value="{{ old('fullName') }}"
                                    class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white"
                                    placeholder="John Wick">

                                {{-- email --}}
                                <label for="email" class="block mt-4 mb-2 text-sm font-medium">Email</label>
                                <input type="email" id="email"
                                    class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white"
                                    {{-- class="bg-gray-50 border {{ $errors->has('email') ? 'border-red-300 text-red-900' : 'border-gray-300 text-gray-900' }} text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" --}} placeholder="abc@gmail.com" name="email"
                                    value="{{ old('email') }}">
                                @error('email')
                                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                                @enderror

                                {{-- password --}}
                                <label for="password"
                                    class="block mt-4 mb-2 text-sm font-medium text-gray-900">Password</label>
                                <input type="password" id="password"
                                    class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white"
                                    name="password" placeholder="........." value="">

                                {{-- profile-image --}}
                                <label class="block mb-2 mt-4 text-sm font-medium text-gray-900"
                                    for="user_avatar">Upload
                                    file</label>
                                <input
                                    class="
                                    w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white"
                                    aria-describedby="user_avatar_help" id="user_avatar" type="file"
                                    name="profile_picture">
                                <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="user_avatar_help">A
                                    profile
                                    picture</div>

                                <p class="text-xs text-gray-600 text-center text-[16px]">You have an account? <a
                                        href="/login" class="text-gray-800 text-base border-b border-gray-500 border-dotted">Login</a>
                                </p>
                                <button type="submit"
                                    class="mt-5 tracking-wide font-semibold bg-indigo-500 text-gray-100 w-full py-4 rounded-lg hover:bg-indigo-700 transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none">
                                    <svg class="w-6 h-6 -ml-2" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M16 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" />
                                        <circle cx="8.5" cy="7" r="4" />
                                        <path d="M20 8v6M23 11h-6" />
                                    </svg>
                                    <span class="ml-3">
                                        Sign Up
                                    </span>
                                </button>
                                {{-- <button type="submit"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-slate-600 dark:hover:bg-slate-500 dark:focus:ring-blue-800">Register
                                    new account</button> --}}
                            </form>
                            <p class="mt-6 text-xs text-gray-600 text-center">
                                I agree to abide by templatana's
                                <a href="#" class="border-b border-gray-500 border-dotted">
                                    Terms of Service
                                </a>
                                and its
                                <a href="#" class="border-b border-gray-500 border-dotted">
                                    Privacy Policy
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex-1 bg-indigo-100 text-center hidden lg:flex">
                <div class="m-12 xl:m-16 w-full bg-contain bg-center bg-no-repeat"
                    style="background-image: url('https://storage.googleapis.com/devitary-image-host.appspot.com/15848031292911696601-undraw_designer_life_w96d.svg');">
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#registerForm').validate({
                rules: {
                    username: {
                        required: true,
                        minlength: 3
                    },
                    fullName: {
                        required: true
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                        minlength: 6
                    },
                    profile_picture: {
                        required: true,
                        extension: "jpg|jpeg|png"
                    },

                },
                messages: {
                    username: {
                        required: "Please enter your username",
                        minlength: "Your username must be at least 3 characters long"
                    },
                    fullName: {
                        required: "Please enter your full name"
                    },
                    email: {
                        required: "Please enter your email address",
                        email: "Please enter a valid email address"
                    },
                    password: {
                        required: "Please enter a password",
                        minlength: "Your password must be at least 6 characters long"
                    },
                    profile_picture: {
                        required: "Please select a profile picture",
                        extension: "Please select a valid image file (jpg, jpeg, png)"
                    },
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });


        });
    </script>


</body>

</html>
