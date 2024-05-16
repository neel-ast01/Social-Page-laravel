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
      .error{
        color: red
      }
    </style>

</head>

<body>
    <div class="relative py-16 bg-clifford">
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
