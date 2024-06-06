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
                        </div>
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
                                    placeholder="abc@gmail.com" name="email"
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
                                        href="/login"
                                        class="text-gray-800 text-base border-b border-gray-500 border-dotted">Login</a>
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
