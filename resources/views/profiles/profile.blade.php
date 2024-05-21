{{-- @include('partials.header')
@include('partials.aside') --}}
@extends('welcome')
@section('content')
    <div class="flex flex-col flex-grow w-3/5 border-l border-r border-gray-300">
        <div class="flex justify-between flex-shrink-0 px-8 py-4 border-b border-gray-300">
            <h1 class="text-xl font-semibold">Profile</h1>
            <!-- <button class="flex items-center h-8 px-2 text-sm bg-gray-300 rounded-sm hover:bg-gray-400">New
                                                                                                                                                                                                                                                                                                                                                                                            post</button> -->
        </div>

        <div class="flex-grow h-0 overflow-auto">
            <!-- User card-->
            <div>
                <div class="w-full bg-cover bg-no-repeat bg-center"
                    style="height: 200px; background-image: url(https://images.pexels.com/photos/531880/pexels-photo-531880.jpeg?auto=compress&cs=tinysrgb&w=600);">
                    <img class="opacity-0 w-full h-full" src="" alt="">
                </div>
                <div class="p-4">
                    <div class="relative flex w-full">
                        <!-- Avatar -->
                        <div class="flex flex-1">
                            <div style="margin-top: -6rem;">
                                <div style="height:9rem; width:9rem;" class="md rounded-full relative avatar">
                                    <img id="profile-image" style="height:9rem; width:9rem;"
                                        class="md rounded-full relative border-2 border-gray-900"
                                        src="assests/{{ $user->profile_picture }}" alt="">
                                    <div class="absolute"></div>
                                </div>
                            </div>
                        </div>
                        <!-- Follow Button -->
                        <div class="flex flex-col text-right">
                            <button data-modal-target="default-modal" data-modal-toggle="default-modal" type="button"
                                class="flex justify-center max-h-max whitespace-nowrap focus:outline-none focus:ring rounded max-w-max border bg-transparent border-blue-500 text-blue-500 hover:border-blue-800 flex items-center hover:shadow-lg font-bold py-2 px-4 rounded-full mr-0 ml-auto">
                                Edit Profile
                            </button>
                        </div>
                        <div id="default-modal" tabindex="-1" aria-hidden="true"
                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-md max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <!-- Modal header -->
                                    <div
                                        class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                            Edit Profile
                                        </h3>
                                        <button type="button"
                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-toggle="default-modal">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <form class="update-profile p-4 md:p-5" data-id="{{ $user->id }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="grid gap-4 mb-4 grid-cols-2">
                                            <div class="col-span-2">
                                                <label for="username"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                                                <input type="text" name="username" id="username"
                                                    value="{{ $user->username }}"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    placeholder="Username" readonly>
                                            </div>
                                            <div class="col-span-2">
                                                <label for="fullName"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Full
                                                    Name</label>
                                                <input type="text" name="fullName" id="fullName"
                                                    value = "{{ $user->fullName }}"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    placeholder="Full Name" required>
                                            </div>
                                            <div class="col-span-2">
                                                <label for="bio"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bio</label>
                                                <textarea id="bio" rows="4" name="bio"
                                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Bio"></textarea>
                                            </div>
                                            <div class="col-span-2">
                                                <label for="profile_link"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Profile
                                                    Link</label>
                                                <input type="text" name="profile_link" id="profile_link"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    placeholder="Profile Link" required>
                                            </div>
                                            <div class="col-span-2">
                                                <label for="profile_image"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Profile
                                                    Image</label>
                                                <input type="file" name="profile_picture" id="profile_picture"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">

                                            </div>
                                            <input type="hidden" name="_method" value="PUT">


                                        </div>
                                        <button type="submit"
                                            class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            Update Profile
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Profile info -->
                    <div class="space-y-1 justify-center w-full mt-3 ml-3">
                        <!-- User basic-->
                        <div>
                            <h2 id="profile-fullName" class="text-xl leading-6 font-bold ">
                                {{ $user->fullName ?? 'Full Name' }}
                            </h2>
                            <p class="text-sm leading-5 font-medium ">
                                {{ '@' . $user->username ?? '@username' }}
                            </p>
                        </div>
                        <!-- Description and others -->
                        <div class="mt-3">
                            <h2 class=" leading-tight mb-2" id="profile-bio">Hello</h2>
                            <div class="text-gray-600 flex">
                                <span class="flex mr-2"><svg viewBox="0 0 24 24" class="h-5 w-5 paint-icon">
                                        <g>
                                            <path
                                                d="M11.96 14.945c-.067 0-.136-.01-.203-.027-1.13-.318-2.097-.986-2.795-1.932-.832-1.125-1.176-2.508-.968-3.893s.942-2.605 2.068-3.438l3.53-2.608c2.322-1.716 5.61-1.224 7.33 1.1.83 1.127 1.175 2.51.967 3.895s-.943 2.605-2.07 3.438l-1.48 1.094c-.333.246-.804.175-1.05-.158-.246-.334-.176-.804.158-1.05l1.48-1.095c.803-.592 1.327-1.463 1.476-2.45.148-.988-.098-1.975-.69-2.778-1.225-1.656-3.572-2.01-5.23-.784l-3.53 2.608c-.802.593-1.326 1.464-1.475 2.45-.15.99.097 1.975.69 2.778.498.675 1.187 1.15 1.992 1.377.4.114.633.528.52.928-.092.33-.394.547-.722.547z">
                                            </path>
                                            <path
                                                d="M7.27 22.054c-1.61 0-3.197-.735-4.225-2.125-.832-1.127-1.176-2.51-.968-3.894s.943-2.605 2.07-3.438l1.478-1.094c.334-.245.805-.175 1.05.158s.177.804-.157 1.05l-1.48 1.095c-.803.593-1.326 1.464-1.475 2.45-.148.99.097 1.975.69 2.778 1.225 1.657 3.57 2.01 5.23.785l3.528-2.608c1.658-1.225 2.01-3.57.785-5.23-.498-.674-1.187-1.15-1.992-1.376-.4-.113-.633-.527-.52-.927.112-.4.528-.63.926-.522 1.13.318 2.096.986 2.794 1.932 1.717 2.324 1.224 5.612-1.1 7.33l-3.53 2.608c-.933.693-2.023 1.026-3.105 1.026z">
                                            </path>
                                        </g>
                                    </svg> <a id="profile-profile_link" href="http://127.0.0.1:8000/profile"
                                        target="#" class="leading-5 ml-1 text-blue-400">www.socialMedia.com</a></span>
                                <span class="flex mr-2"><svg viewBox="0 0 24 24" class="h-5 w-5 paint-icon">
                                        <g>
                                            <path
                                                d="M19.708 2H4.292C3.028 2 2 3.028 2 4.292v15.416C2 20.972 3.028 22 4.292 22h15.416C20.972 22 22 20.972 22 19.708V4.292C22 3.028 20.972 2 19.708 2zm.792 17.708c0 .437-.355.792-.792.792H4.292c-.437 0-.792-.355-.792-.792V6.418c0-.437.354-.79.79-.792h15.42c.436 0 .79.355.79.79V19.71z">
                                            </path>
                                            <circle cx="7.032" cy="8.75" r="1.285"></circle>
                                            <circle cx="7.032" cy="13.156" r="1.285"></circle>
                                            <circle cx="16.968" cy="8.75" r="1.285"></circle>
                                            <circle cx="16.968" cy="13.156" r="1.285"></circle>
                                            <circle cx="12" cy="8.75" r="1.285"></circle>
                                            <circle cx="12" cy="13.156" r="1.285"></circle>
                                            <circle cx="7.032" cy="17.486" r="1.285"></circle>
                                            <circle cx="12" cy="17.486" r="1.285"></circle>
                                        </g>
                                    </svg> <span class="leading-5 ml-1">Joined
                                        {{ $user->created_at->format('F Y') }}
                                    </span></span>
                            </div>
                        </div>
                        <div class="pt-3 flex justify-start items-start w-full divide-x divide-gray-800 divide-solid">
                            <div class="text-center pr-3"><span class="font-bold ">520</span><span class="text-gray-600">
                                    Following</span></div>
                            <div class="text-center px-3"><span class="font-bold ">23,4m </span><span
                                    class="text-gray-600">
                                    Followers</span></div>
                        </div>
                    </div>
                </div>
                <hr class="border-gray-800">
            </div>

            {{-- <div class="text-center py-4">No posts found.</div> --}}

            <ul class="list-none">
                @if ($posts->isEmpty())
                    <p class="text-center py-4">No posts found.</p>
                @else
                    @foreach ($posts as $post)
                        <li id="post-{{ $post->id }}">
                            <!--second tweet-->
                            <article class=" transition duration-350 ease-in-out text-black ">
                                <div class="flex flex-shrink-0 p-4 pb-0">

                                    <div class="flex items-center">
                                        <div>
                                            <img class="inline-block h-10 w-10 rounded-full"
                                                src="assests/{{ $user->profile_picture }}" alt="">
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-base leading-6 font-medium ">
                                                {{ $user->fullName }}
                                                <span
                                                    class="text-sm leading-5 font-medium  transition ease-in-out duration-150">
                                                    {{ '@' . $user->username }} {{ $post->created_at->format('W M') }}
                                                </span>
                                            </p>
                                        </div>


                                        {{-- <div class="ml-[270px]">
                                            <div x-data="{ isOpen: false, isDeleting: false, isEditing: false }" class="relative inline-block text-left">
                                                <!-- Delete Button -->
                                                <button type="button" @click="isOpen = !isOpen"
                                                    class="inline-flex w-full justify-center gap-x-1.5 rounded-md px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm"
                                                    id="menu-button" aria-expanded="true" aria-haspopup="true">
                                                    <svg class="w-5 h-5" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                        viewBox="0 0 16 3">
                                                        <path
                                                            d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                                                    </svg>
                                                </button>

                                                <div x-show="isOpen"
                                                    x-transition:enter="transition ease-out duration-100 transform"
                                                    x-transition:enter-start="opacity-0 scale-95"
                                                    x-transition:enter-end="opacity-100 scale-100"
                                                    x-transition:leave="transition ease-in duration-75 transform"
                                                    x-transition:leave-start="opacity-100 scale-100"
                                                    x-transition:leave-end="opacity-0 scale-95"
                                                    @click.away="isOpen = false; isDeleting = false; isEditing = false"
                                                    @keydown.escape.window="isOpen = false; isDeleting = false; isEditing = false"
                                                    class="absolute right-0 z-10 w-48 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                                    role="menu" aria-orientation="vertical"
                                                    aria-labelledby="menu-button" tabindex="-1">
                                                    <div class="py-2" role="none">
                                                        <!-- Delete Button -->
                                                        <button
                                                            class="bg-red-500 w-44 mb-1 mr-2 ml-2 opacity-75 hover:opacity-100 text-black-900 hover:text-gray-900 rounded-full px-4 py-2 font-semibold"
                                                            type="button" @click="isDeleting = true">
                                                            DELETE
                                                        </button>

                                                        <div x-show="isDeleting"
                                                            class="fixed top-0 right-0 bottom-0 left-0 bg-black bg-opacity-50 z-20"
                                                            @click="isOpen = false; isDeleting = false"></div>

                                                        <!-- Delete Modal -->
                                                        <div x-show="isDeleting"
                                                            class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5 z-30">
                                                            <button type="button" @click="isDeleting = false"
                                                                class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                                data-modal-toggle="deleteModal">
                                                                <svg aria-hidden="true" class="w-5 h-5"
                                                                    fill="currentColor" viewBox="0 0 20 20"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path fill-rule="evenodd"
                                                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                                        clip-rule="evenodd"></path>
                                                                </svg>
                                                                <span class="sr-only">Close modal</span>
                                                            </button>

                                                            <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto"
                                                                aria-hidden="true" fill="currentColor"
                                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd"
                                                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                                    clip-rule="evenodd"></path>
                                                            </svg>

                                                            <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure
                                                                you
                                                                want to delete this item?</p>

                                                            <div class="flex justify-center items-center space-x-4">
                                                                <button data-modal-toggle="deleteModal" type="button"
                                                                    @click="isDeleting = false"
                                                                    class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                                    No, cancel
                                                                </button>

                                                                <button type="button" data-id="{{ $post->id }}"
                                                                    class="delete-post-button py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                                                                    Yes, I'm sure
                                                                </button>
                                                            </div>
                                                        </div>

                                                        <hr class="dark:border-gray-200" />

                                                        <!-- Update Button -->
                                                        <button @click="isEditing = !isEditing"
                                                            class="bg-sky-500 w-44 mt-1 mr-2 ml-2 opacity-75 hover:opacity-100 text-black-900 hover:text-gray-900 rounded-full px-4 py-2 font-semibold"
                                                            type="button">
                                                            <i class="mdi mdi-pencil -ml-2 mr-2"></i> UPDATE
                                                        </button>

                                                        <div x-show="isEditing"
                                                            x-transition:enter="transition ease-out duration-100 transform"
                                                            x-transition:enter-start="opacity-0 scale-95"
                                                            x-transition:enter-end="opacity-100 scale-100"
                                                            x-transition:leave="transition ease-in duration-75 transform"
                                                            x-transition:leave-start="opacity-100 scale-100"
                                                            x-transition:leave-end="opacity-0 scale-95"
                                                            @click.away="isEditing = false"
                                                            @keydown.escape.window="isEditing = false"
                                                            class="update-model  fixed w-[600px] top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 rounded-lg p-6 z-50 w-128">
                                                            <!-- Modal content -->
                                                            <div class="relative p-4">
                                                                <!-- Modal content -->
                                                                <div
                                                                    class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                                    <!-- Modal header -->
                                                                    <div
                                                                        class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                                        <h3
                                                                            class="text-lg font-semibold text-gray-900 dark:text-white">
                                                                            Update Post</h3>
                                                                        <button type="reset"
                                                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                                            @click="isEditing = false">
                                                                            <svg class="w-3 h-3" aria-hidden="true"
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                fill="none" viewBox="0 0 14 14">
                                                                                <path stroke="currentColor"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round"
                                                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                                            </svg>
                                                                            <span class="sr-only">Close modal</span>
                                                                        </button>
                                                                    </div>
                                                                    <!-- Modal body -->
                                                                    <form class="update-button p-4 md:p-5"
                                                                        enctype="multipart/form-data"
                                                                        data-id="{{ $post->id }}">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <div class="grid gap-4 mb-4 grid-cols-2">
                                                                            <div class="col-span-2">
                                                                                <label for="post_title"
                                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Post
                                                                                    Title</label>
                                                                                <input type="text" name="post_data"
                                                                                    id="post_data"
                                                                                    value="{{ $post->descrip }}"
                                                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                                                    placeholder="Hello Good Morning!"
                                                                                    required />
                                                                            </div>
                                                                            <div class="col-span-2">
                                                                                <label for="photo"
                                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Post
                                                                                    Image</label>
                                                                                <div
                                                                                    class="mt-2 flex justify-center rounded-lg border px-6 py-10">
                                                                                    <div class="text-center">
                                                                                        <svg class="mx-auto h-12 w-12 text-gray-300"
                                                                                            viewBox="0 0 24 24"
                                                                                            fill="currentColor"
                                                                                            aria-hidden="true">
                                                                                            <path fill-rule="evenodd"
                                                                                                d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z"
                                                                                                clip-rule="evenodd" />
                                                                                        </svg>
                                                                                        <div
                                                                                            class="mt-4 flex text-sm leading-6 text-gray-900">
                                                                                            <label for="file-upload"
                                                                                                class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                                                                                <span>Upload a file</span>
                                                                                                <input id="file-upload"
                                                                                                    name="post_img"
                                                                                                    type="file"
                                                                                                    value="\assests\posts\{{ $post->post_image }}"
                                                                                                    class="sr-only" />
                                                                                            </label>
                                                                                            <p class="pl-1">or drag and
                                                                                                drop
                                                                                            </p>
                                                                                        </div>
                                                                                        <p
                                                                                            class="text-xs leading-5 text-gray-900">
                                                                                            PNG, JPG, GIF up to 10MB</p>
                                                                                    </div>
                                                                                </div>
                                                                                <input type="hidden"
                                                                                    name="existing_photo"
                                                                                    value="" />
                                                                            </div>
                                                                            <input type="hidden" name="_method"
                                                                                value="PUT">
                                                                        </div>
                                                                        <button type="submit"
                                                                            class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                fill="none" viewBox="0 0 24 24"
                                                                                stroke-width="1.5" stroke="currentColor"
                                                                                class="w-6 h-6 mr-2">
                                                                                <path stroke-linecap="round"
                                                                                    stroke-linejoin="round"
                                                                                    d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                                                                            </svg>
                                                                            Update Post
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>  --}}


                                        {{-- THIS 12:32 UPDATE --}}
                                        <div class="ml-[270px]">
                                            <div x-data="{ isOpen: false, isDeleting: false, isEditing: false }" x-init="isDeleting = false;
                                            isEditing = false"
                                                class="relative inline-block text-left">
                                                <!-- Delete Button -->
                                                <button type="button" @click="isOpen = !isOpen"
                                                    class="inline-flex w-full justify-center gap-x-1.5 rounded-md px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm"
                                                    id="menu-button" aria-expanded="true" aria-haspopup="true">
                                                    <svg class="w-5 h-5" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                        viewBox="0 0 16 3">
                                                        <path
                                                            d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                                                    </svg>
                                                </button>

                                                <div x-show="isOpen"
                                                    x-transition:enter="transition ease-out duration-100 transform"
                                                    x-transition:enter-start="opacity-0 scale-95"
                                                    x-transition:enter-end="opacity-100 scale-100"
                                                    x-transition:leave="transition ease-in duration-75 transform"
                                                    x-transition:leave-start="opacity-100 scale-100"
                                                    x-transition:leave-end="opacity-0 scale-95"
                                                    @click.away="isOpen = false; isDeleting = false; isEditing = false"
                                                    @keydown.escape.window="isOpen = false; isDeleting = false; isEditing = false"
                                                    class="absolute right-0 z-10 w-48 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                                    role="menu" aria-orientation="vertical"
                                                    aria-labelledby="menu-button" tabindex="-1">
                                                    <div class="py-2" role="none">
                                                        <!-- Delete Button -->
                                                        <button
                                                            class="bg-red-500 w-44 mb-1 mr-2 ml-2 opacity-75 hover:opacity-100 text-black-900 hover:text-gray-900 rounded-full px-4 py-2 font-semibold"
                                                            type="button" @click="isDeleting = true">
                                                            DELETE
                                                        </button>

                                                        <div x-show="isDeleting" x-cloak
                                                            class="fixed top-0 right-0 bottom-0 left-0 bg-black bg-opacity-50 z-20"
                                                            @click="isOpen = false; isDeleting = false"></div>

                                                        <!-- Delete Modal -->
                                                        <div x-show="isDeleting" x-cloak
                                                            class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5 z-30">
                                                            <button type="button" @click="isDeleting = false"
                                                                class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                                data-modal-toggle="deleteModal">
                                                                <svg aria-hidden="true" class="w-5 h-5"
                                                                    fill="currentColor" viewBox="0 0 20 20"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path fill-rule="evenodd"
                                                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                                        clip-rule="evenodd"></path>
                                                                </svg>
                                                                <span class="sr-only">Close modal</span>
                                                            </button>

                                                            <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto"
                                                                aria-hidden="true" fill="currentColor"
                                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd"
                                                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                                    clip-rule="evenodd"></path>
                                                            </svg>

                                                            <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure
                                                                you
                                                                want to delete this item?</p>

                                                            <div class="flex justify-center items-center space-x-4">
                                                                <button data-modal-toggle="deleteModal" type="button"
                                                                    @click="isDeleting = false"
                                                                    class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                                    No, cancel
                                                                </button>

                                                                <button type="button" data-id="{{ $post->id }}"
                                                                    class="delete-post-button py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                                                                    Yes, I'm sure
                                                                </button>
                                                            </div>
                                                        </div>

                                                        <hr class="dark:border-gray-200" />

                                                        <!-- Update Button -->
                                                        <button @click="isEditing = !isEditing"
                                                            class="bg-sky-500 w-44 mt-1 mr-2 ml-2 opacity-75 hover:opacity-100 text-black-900 hover:text-gray-900 rounded-full px-4 py-2 font-semibold"
                                                            type="button">
                                                            <i class="mdi mdi-pencil -ml-2 mr-2"></i> UPDATE
                                                        </button>

                                                        <div x-show="isEditing" x-cloak
                                                            x-transition:enter="transition ease-out duration-100 transform"
                                                            x-transition:enter-start="opacity-0 scale-95"
                                                            x-transition:enter-end="opacity-100 scale-100"
                                                            x-transition:leave="transition ease-in duration-75 transform"
                                                            x-transition:leave-start="opacity-100 scale-100"
                                                            x-transition:leave-end="opacity-0 scale-95"
                                                            @click.away="isEditing = false"
                                                            @keydown.escape.window="isEditing = false"
                                                            class="update-model  fixed w-[600px] top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 rounded-lg p-6 z-50 w-128">
                                                            <!-- Modal content -->
                                                            <div class="relative p-4">
                                                                <!-- Modal content -->
                                                                <div
                                                                    class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                                    <!-- Modal header -->
                                                                    <div
                                                                        class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                                        <h3
                                                                            class="text-lg font-semibold text-gray-900 dark:text-white">
                                                                            Update Post</h3>
                                                                        <button type="reset"
                                                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                                            @click="isEditing = false">
                                                                            <svg class="w-3 h-3" aria-hidden="true"
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                fill="none" viewBox="0 0 14 14">
                                                                                <path stroke="currentColor"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round"
                                                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                                            </svg>
                                                                            <span class="sr-only">Close modal</span>
                                                                        </button>
                                                                    </div>
                                                                    <!-- Modal body -->
                                                                    <form class="update-button p-4 md:p-5"
                                                                        enctype="multipart/form-data"
                                                                        data-id="{{ $post->id }}">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <div class="grid gap-4 mb-4 grid-cols-2">
                                                                            <div class="col-span-2">
                                                                                <label for="post_title"
                                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Post
                                                                                    Title</label>
                                                                                <input type="text" name="post_data"
                                                                                    id="post_data"
                                                                                    value="{{ $post->descrip }}"
                                                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                                                    placeholder="Hello Good Morning!"
                                                                                    required />
                                                                            </div>
                                                                            <div class="col-span-2">
                                                                                <label for="photo"
                                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Post
                                                                                    Image</label>
                                                                                <div
                                                                                    class="mt-2 flex justify-center rounded-lg border px-6 py-10">
                                                                                    <div class="text-center">
                                                                                        <svg class="mx-auto h-12 w-12 text-gray-300"
                                                                                            viewBox="0 0 24 24"
                                                                                            fill="currentColor"
                                                                                            aria-hidden="true">
                                                                                            <path fill-rule="evenodd"
                                                                                                d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z"
                                                                                                clip-rule="evenodd" />
                                                                                        </svg>
                                                                                        <div
                                                                                            class="mt-4 flex text-sm leading-6 text-gray-900">
                                                                                            <label for="file-upload"
                                                                                                class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                                                                                <span>Upload a file</span>
                                                                                                <input id="file-upload"
                                                                                                    name="post_img"
                                                                                                    type="file"
                                                                                                    value="\assests\posts\{{ $post->post_image }}"
                                                                                                    class="sr-only" />
                                                                                            </label>
                                                                                            <p class="pl-1">or drag and
                                                                                                drop
                                                                                            </p>
                                                                                        </div>
                                                                                        <p
                                                                                            class="text-xs leading-5 text-gray-900">
                                                                                            PNG, JPG, GIF up to 10MB</p>
                                                                                    </div>
                                                                                </div>
                                                                                <input type="hidden"
                                                                                    name="existing_photo"
                                                                                    value="" />
                                                                            </div>
                                                                            <input type="hidden" name="_method"
                                                                                value="PUT">
                                                                        </div>
                                                                        <button type="submit"
                                                                            class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                fill="none" viewBox="0 0 24 24"
                                                                                stroke-width="1.5" stroke="currentColor"
                                                                                class="w-6 h-6 mr-2">
                                                                                <path stroke-linecap="round"
                                                                                    stroke-linejoin="round"
                                                                                    d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                                                                            </svg>
                                                                            Update Post
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        {{-- DropDown Button --}}
                                        {{-- <div class="ml-[270px]">
                                            <div class="relative inline-block text-left">
                                                <button id="dropdownButton" data-dropdown-toggle="dropdown"
                                                    class="inline-flex justify-center items-center text-sm font-medium text-center text-gray-500 hover:text-gray-900 focus:outline-none bg-gray-100 rounded-lg"
                                                    type="button">
                                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z">
                                                        </path>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div id="dropdown"
                                                class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow">
                                                <ul class="py-1 text-sm text-gray-700" aria-labelledby="dropdownButton">
                                                    <li>
                                                        <a href="#" data-modal-target="updateModal"
                                                            data-modal-toggle="updateModal"
                                                            class="block py-2 px-4 hover:bg-gray-100">Update</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" data-modal-target="deleteModal"
                                                            data-modal-toggle="deleteModal"
                                                            class="block py-2 px-4 hover:bg-gray-100">Delete</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div> --}}

                                        <!-- Update Modal -->
                                        <div id="updateModal" tabindex="-1" aria-hidden="true"
                                            class="hidden fixed top-0 left-0 right-0 z-50 flex justify-center items-center w-full p-4 overflow-x-hidden overflow-y-auto h-modal md:h-full">
                                            <div class="relative w-full h-full max-w-2xl md:h-auto">
                                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                    <div
                                                        class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                            Update Post
                                                        </h3>
                                                        <button type="button"
                                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                            data-modal-toggle="updateModal">
                                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd"
                                                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                                    clip-rule="evenodd"></path>
                                                            </svg>
                                                        </button>
                                                    </div>
                                                    <form class="p-6 space-y-6" method="post">
                                                        <div>
                                                            <label for="post_data"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Post
                                                                Title</label>
                                                            <input type="text" name="post_data" id="post_data"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                                required>
                                                        </div>
                                                        <div>
                                                            <label for="post_img"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Post
                                                                Image</label>
                                                            <input type="file" name="post_img" id="post_img"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                                                        </div>
                                                        <button type="submit"
                                                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-800">
                                                            Update Post
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Delete Modal -->
                                        <div id="deleteModal" tabindex="-1" aria-hidden="true"
                                            class="hidden fixed top-0 left-0 right-0 z-50 flex justify-center items-center w-full p-4 overflow-x-hidden overflow-y-auto h-modal md:h-full">
                                            <div class="relative w-full h-full max-w-2xl md:h-auto">
                                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                    <div
                                                        class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                            Delete Post
                                                        </h3>
                                                        <button type="button"
                                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                            data-modal-toggle="deleteModal">
                                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd"
                                                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                                    clip-rule="evenodd"></path>
                                                            </svg>
                                                        </button>
                                                    </div>
                                                    <div class="p-6 space-y-6">
                                                        <p
                                                            class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                                            Are you sure you want to delete this item?
                                                        </p>
                                                        <div class="flex justify-end space-x-4">
                                                            <button type="button" data-modal-toggle="deleteModal"
                                                                class="px-4 py-2 text-sm font-medium text-center text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                                No, cancel
                                                            </button>
                                                            <button type="button" data-id="{{ $post->id }}"
                                                                class="delete-post-button px-4 py-2 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                                                                Yes, I'm sure
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>




                                    </div>
                                </div>
                                <div class="pl-16">
                                    <p id="post-description" class="text-base width-auto font-medium flex-shrink">
                                        {{ $post->descrip }}</p>


                                    <div class="md:flex-shrink pr-6 pt-3">
                                        <img id="post-image" class="border rounded-lg"
                                            src="\assests\posts\{{ $post->post_image }}">
                                    </div>




                                    {{-- <div class="flex items-center py-4">
                                        <div
                                            class="flex-1 flex items-center  text-xs  hover:text-blue-400 transition duration-350 ease-in-out">
                                            <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-2">
                                                <g>
                                                    <path
                                                        d="M14.046 2.242l-4.148-.01h-.002c-4.374 0-7.8 3.427-7.8 7.802 0 4.098 3.186 7.206 7.465 7.37v3.828c0 .108.044.286.12.403.142.225.384.347.632.347.138 0 .277-.038.402-.118.264-.168 6.473-4.14 8.088-5.506 1.902-1.61 3.04-3.97 3.043-6.312v-.017c-.006-4.367-3.43-7.787-7.8-7.788zm3.787 12.972c-1.134.96-4.862 3.405-6.772 4.643V16.67c0-.414-.335-.75-.75-.75h-.396c-3.66 0-6.318-2.476-6.318-5.886 0-3.534 2.768-6.302 6.3-6.302l4.147.01h.002c3.532 0 6.3 2.766 6.302 6.296-.003 1.91-.942 3.844-2.514 5.176z">
                                                    </path>
                                                </g>
                                            </svg>
                                            12.3 k
                                        </div>

                                        <div
                                            class="flex-1 flex items-center  text-xs  hover:text-green-400 transition duration-350 ease-in-out">
                                            <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-2">
                                                <g>
                                                    <path
                                                        d="M23.77 15.67c-.292-.293-.767-.293-1.06 0l-2.22 2.22V7.65c0-2.068-1.683-3.75-3.75-3.75h-5.85c-.414 0-.75.336-.75.75s.336.75.75.75h5.85c1.24 0 2.25 1.01 2.25 2.25v10.24l-2.22-2.22c-.293-.293-.768-.293-1.06 0s-.294.768 0 1.06l3.5 3.5c.145.147.337.22.53.22s.383-.072.53-.22l3.5-3.5c.294-.292.294-.767 0-1.06zm-10.66 3.28H7.26c-1.24 0-2.25-1.01-2.25-2.25V6.46l2.22 2.22c.148.147.34.22.532.22s.384-.073.53-.22c.293-.293.293-.768 0-1.06l-3.5-3.5c-.293-.294-.768-.294-1.06 0l-3.5 3.5c-.294.292-.294.767 0 1.06s.767.293 1.06 0l2.22-2.22V16.7c0 2.068 1.683 3.75 3.75 3.75h5.85c.414 0 .75-.336.75-.75s-.337-.75-.75-.75z">
                                                    </path>
                                                </g>
                                            </svg>
                                            14 k
                                        </div>
                                        <div
                                            class="flex-1 flex items-center  text-xs  hover:text-red-600 transition duration-350 ease-in-out">
                                            <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-2">
                                                <g>
                                                    <path
                                                        d="M12 21.638h-.014C9.403 21.59 1.95 14.856 1.95 8.478c0-3.064 2.525-5.754 5.403-5.754 2.29 0 3.83 1.58 4.646 2.73.814-1.148 2.354-2.73 4.645-2.73 2.88 0 5.404 2.69 5.404 5.755 0 6.376-7.454 13.11-10.037 13.157H12zM7.354 4.225c-2.08 0-3.903 1.988-3.903 4.255 0 5.74 7.034 11.596 8.55 11.658 1.518-.062 8.55-5.917 8.55-11.658 0-2.267-1.823-4.255-3.903-4.255-2.528 0-3.94 2.936-3.952 2.965-.23.562-1.156.562-1.387 0-.014-.03-1.425-2.965-3.954-2.965z">
                                                    </path>
                                                </g>
                                            </svg>
                                            14 k
                                        </div>
                                        <div
                                            class="flex-1 flex items-center  text-xs  hover:text-blue-400 transition duration-350 ease-in-out">
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
                                        </div>
                                    </div>
                                    <hr class="mt-2 mb-2 ">
                                    <p class="text-gray-800 font-semibold">Comment</p>
                                    <hr class="mt-2 mb-2">
                                    <div class="mt-4">
                                        <!-- Comment 1 -->
                                        <div class="flex items-center space-x-2">
                                            <img src="https://placekitten.com/32/32" alt="User Avatar"
                                                class="w-6 h-6 rounded-full">
                                            <div>
                                                <p class="text-gray-800 font-semibold">Jane Smith</p>
                                                <p class="text-gray-500 text-sm">Lovely shot! 📸</p>
                                            </div>
                                        </div>
                                        <!-- Comment 2 -->
                                        <div class="flex items-center space-x-2 mt-2">
                                            <img src="https://placekitten.com/32/32" alt="User Avatar"
                                                class="w-6 h-6 rounded-full">
                                            <div>
                                                <p class="text-gray-800 font-semibold">Bob Johnson</p>
                                                <p class="text-gray-500 text-sm">I can't handle the cuteness! Where can I
                                                    get
                                                    one?
                                                </p>
                                            </div>
                                        </div>
                                        <!-- Reply from John Doe with indentation -->
                                        <div class="flex items-center space-x-2 mt-2 ml-6">
                                            <img src="https://placekitten.com/40/40" alt="User Avatar"
                                                class="w-6 h-6 rounded-full">
                                            <div>
                                                <p class="text-gray-800 font-semibold">John Doe</p>
                                                <p class="text-gray-500 text-sm">That little furball is from a local
                                                    shelter.
                                                    You
                                                    should check it out! 🏠😺</p>
                                            </div>
                                        </div>
                                        <!-- Add more comments and replies as needed -->
                                    </div> --}}
                                </div>
                                <div class="mt-3"></div>
                                <hr class="border-gray-800">
                            </article>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.delete-post-button').on('click', function() {
                var postId = $(this).data('id');
                var token = '{{ csrf_token() }}';
                var modal = $(this).closest('#deleteModal');
                var backdrop = $('.modal-backdrop'); // Assuming the backdrop has the class 'modal-backdrop'

                $.ajax({
                    url: base_url + "posts/" + postId,
                    type: 'DELETE',
                    data: {
                        '_token': csrf_token,
                        'id': postId
                    },
                    success: function(response) {
                        if (response.status == 'success') {
                            $('#post-' + postId).remove();
                            modal.addClass('hidden');
                            backdrop.addClass('hidden'); // Hide the backdrop
                            alert(response.message);
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function(xhr) {
                        alert('Error: ' + xhr.responseText);
                    }
                });
            });

            $('.update-button').submit(function(event) {
                event.preventDefault();

                var formData = new FormData(this);
                var postId = $(this).data('id');
                var $postContainer = $(this).closest('li#post-' + postId);

                $.ajax({
                    url: base_url + "posts/" + postId,
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        $postContainer.find('#post-description').text(data.post.descrip);
                        $postContainer.find('#post-image').attr('src', 'assests/posts/' + data
                            .post.post_image);

                        // Reset the isEditing state variable
                        $postContainer.closest('.update-model').find('[x-data]').data(
                            'isEditing', false);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            });

            // $('.update-button').submit(function(event) {
            //     event.preventDefault();

            //     var formData = new FormData(this);
            //     var postId = $(this).data('id');
            //     // formData.append('_method', 'PUT'); // Append _method field
            //     console.log("Hello");
            //     $.ajax({
            //         url: base_url + "posts/" + postId,
            //         type: 'POST', // Use POST method
            //         data: formData,
            //         processData: false,
            //         contentType: false,
            //         headers: {
            //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //         },
            //         success: function(data) {


            //             $('#post-description').text(data.post.descrip);
            //             $('#post-image').attr('src', 'assests/posts/' + data
            //                 .post.post_image);

            //             // $('.update-model').fadeOut();

            //         },
            //         error: function(xhr, status, error) {
            //             console.error('Error:', error);
            //         }
            //     });
            // });

            $('.update-profile').submit(function(event) {

                event.preventDefault();

                var formData = new FormData(this);
                var userId = $(this).data('id');

                // console.log('hello', userId, formData);
                $.ajax({
                    url: base_url + "profile/" + userId,
                    type: 'POST', // Use POST method
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {

                        console.log(data);
                        $('#profile-fullName').text(data.user.fullName);
                        $('#profile-bio').text(data.user.bio);
                        $('#profile-profile_link').attr('href', data.user.profile_link);
                        $('#profile-profile_link').text(data.user.profile_link);
                        $('#profile-image').attr('src', 'assests/' + data.user.profile_picture);

                        $('[data-modal-toggle="default-modal"]').click();

                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });

            });

        });
    </script>
@endsection
