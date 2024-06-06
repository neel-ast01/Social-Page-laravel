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
                                        src="{{ is_external_url($user->profile_picture) ? $user->profile_picture : asset('assests/' . $user->profile_picture) }}"
                                        alt="">
                                    <div class="absolute"></div>
                                </div>
                            </div>
                        </div>
                        <!-- Edit Profile Button -->
                        <div class="flex flex-col text-right">
                            <button data-modal-target="default-modal" data-modal-toggle="default-modal" type="button"
                                class="flex justify-center max-h-max whitespace-nowrap focus:outline-none focus:ring rounded max-w-max border bg-transparent border-blue-500 text-blue-500 hover:border-blue-800 items-center hover:shadow-lg font-bold py-2 px-4 mr-0 ml-auto">
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
                                                    value="{!! $user->username !!}"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    placeholder="Username" readonly>
                                            </div>
                                            <div class="col-span-2">
                                                <label for="fullName"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Full
                                                    Name</label>
                                                <input type="text" name="fullName" id="fullName"
                                                    value = "{!! $user->fullName !!}"
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
                                        <button type="submit" data-modal-toggle="default-modal"
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
                                                src="{{ is_external_url($user->profile_picture) ? $user->profile_picture : asset('assests/' . $user->profile_picture) }}"
                                                alt="">
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-base leading-6 font-medium ">
                                                {{ $user->fullName }}
                                                <span
                                                    class="text-sm leading-5 font-medium  transition ease-in-out duration-150">
                                                    {{ '@' . $user->username }} {{ $post->created_at->format('d M') }}
                                                </span>
                                            </p>
                                        </div>




                                        {{-- working using chat --}}
                                        <div class="ml-[270px]">
                                            <div x-data="{ isOpen: false, isDeleting: false, isEditing: false }" class="relative inline-block text-left">
                                                <!-- Dropdown Button -->
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

                                                <div x-show="isOpen" x-cloak
                                                    class="absolute right-0 z-10 w-48 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                                    @click.away="isOpen = false; isDeleting = false; 
                                                    @keydown.escape.window="isOpen=false;
                                                    isDeleting=false">
                                                    <div class="py-2" role="none">
                                                        <!-- Delete Button -->
                                                        <button
                                                            class="w-full mb-1 px-4 py-2 text-left text-red-600 hover:bg-red-100 hover:text-red-900 font-semibold"
                                                            type="button" @click="isDeleting = true">
                                                            DELETE
                                                        </button>
                                                        <!-- Update Button -->
                                                        <button @click="isEditing = !isEditing"
                                                            class="w-full mt-1 px-4 py-2 text-left text-sky-500 hover:bg-sky-100 hover:text-sky-900 font-semibold"
                                                            type="button">
                                                            UPDATE
                                                        </button>
                                                        {{-- Archive Button --}}
                                                        {{-- <button @click="isArchiving = true"
                                                            class="w-full mt-1 px-4 py-2 text-left text-yellow-600 hover:bg-yellow-100 hover:text-yellow-900 font-semibold"
                                                            type="button">
                                                            ARCHIVE
                                                        </button> --}}
                                                    </div>
                                                </div>
                                                <!-- Delete Modal -->
                                                <div x-show="isDeleting" x-cloak
                                                    class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5 z-30">
                                                    <button type="button" @click="isDeleting = false"
                                                        class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                        data-modal-toggle="deleteModal">
                                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd"
                                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                                clip-rule="evenodd"></path>
                                                        </svg>
                                                        <span class="sr-only">Close modal</span>
                                                    </button>

                                                    <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto"
                                                        aria-hidden="true" fill="currentColor"
                                                        viewBox="0293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                        clip-rule="evenodd"></path>
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                    </button>

                                                    <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto"
                                                        aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>

                                                    <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you want
                                                        to delete this item?</p>

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

                                                <!-- Update Modal -->
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
                                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
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
                                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                        viewBox="0 0 14 14">
                                                                        <path stroke="currentColor" stroke-linecap="round"
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
                                                                            id="post_data" value="{{ $post->descrip }}"
                                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                                            placeholder="Hello Good Morning!" required />
                                                                    </div>
                                                                    <div class="col-span-2">
                                                                        <label for="post_img"
                                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Profile
                                                                            Image</label>
                                                                        <input type="file" id="post_img"
                                                                            name="post_img"
                                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                                    </div>
                                                                    <input type="hidden" name="_method" value="PUT">
                                                                </div>
                                                                <button type="submit" @click="isEditing = false"
                                                                    class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                        viewBox="0 0 24 24" stroke-width="1.5"
                                                                        stroke="currentColor" class="w-6 h-6 mr-2">
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

                                                <!-- Archive Modal -->
                                                {{-- <div x-show="isArchiving" x-cloak
                                                    class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5 z-30">
                                                    <button type="button" @click="isArchiving = false"
                                                        class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                        data-modal-toggle="archiveModal">
                                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd"
                                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                                clip-rule="evenodd"></path>
                                                        </svg>
                                                        <span class="sr-only">Close modal</span>
                                                    </button>

                                                    <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto"
                                                        aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>

                                                    <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you want
                                                        to archive this item?</p>

                                                    <div class="flex justify-center items-center space-x-4">
                                                        <button data-modal-toggle="archiveModal" type="button"
                                                            @click="isArchiving = false"
                                                            class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                                            No, cancel
                                                        </button>

                                                        <button type="button" data-id="{{ $post->id }}"
                                                            class="archive-post-button py-2 px-3 text-sm font-medium text-center text-white bg-yellow-600 rounded-lg hover:bg-yellow-700 focus:ring-4 focus:outline-none focus:ring-yellow-300 dark:bg-yellow-500 dark:hover:bg-yellow-600 dark:focus:ring-yellow-900">
                                                            Yes, I'm sure
                                                        </button>
                                                    </div>
                                                </div> --}}
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

                                </div>
                                <div class="mt-3 ">
                                </div>
                                <div class="ml-5 mb-2">
                                    <button
                                        class="archive-toggle-btn border p-2 rounded-md {{ $post->is_archive ? 'bg-yellow-500' : 'bg-blue-400' }}"
                                        data-id="{{ $post->id }}"
                                        data-archive="{{ $post->is_archive ? 'true' : 'false' }}">
                                        {{ $post->is_archive ? 'Unarchive' : 'Archive' }}
                                    </button>




                                </div>
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

            $(document).on('click', '.archive-toggle-btn', function() {
                var button = $(this);
                var postId = button.data('id');
                var isArchive = button.data('archive');
                var token = '{{ csrf_token() }}';
                var newLabel = isArchive ? 'Archive' : 'Unarchive';
                var newColorClass = isArchive ? 'bg-blue-400' : 'bg-yellow-500';
                var oldColorClass = isArchive ? 'bg-yellow-500' : 'bg-blue-400';

                $.ajax({
                    url: '/posts/' + postId + '/toggle-archive',
                    type: 'POST',
                    data: {
                        _token: token,
                        is_archive: isArchive ? 0 : 1
                    },
                    success: function(response) {
                        if (response.success) {
                            button.text(newLabel);
                            button.data('archive', !isArchive); // Toggle the archive state
                            button.removeClass(oldColorClass).addClass(newColorClass);
                        } else {
                            alert('An error occurred while updating the post.');
                        }
                    },
                    error: function(xhr, status, error) {
                        alert('An error occurred while updating the post.');
                        console.error('Error:', status, error);
                    }
                });
            });

            // $(document).on('click', '.archive-button', function() {
            //     var button = $(this);
            //     var postId = button.data('id');
            //     var isArchive = button.data('archive');
            //     var token = '{{ csrf_token() }}';
            //     var newLabel = isArchive ? 'Archive' : 'Unarchive';

            //     $.ajax({
            //         url: '/posts/' + postId + '/toggle-archive',
            //         type: 'POST',
            //         data: {
            //             _token: token,
            //             is_archive: isArchive ? 0 : 1
            //         },
            //         success: function(response) {
            //             if (response.success) {
            //                 button.text(newLabel);
            //                 button.data('archive', isArchive ? 0 : 1);
            //                 button.toggleClass('archive-post unarchive-post');
            //             } else {
            //                 alert('An error occurred while updating the post.');
            //             }
            //         },
            //         error: function(xhr, status, error) {
            //             alert('An error occurred while updating the post.');
            //             console.error('Error:', status, error);
            //         }
            //     });
            // });

            //code is working
            // $(document).on('click', '.archive-button', function() {
            //     var button = $(this);
            //     var postId = button.data('id');
            //     var isArchive = button.data('archive');
            //     var token = '{{ csrf_token() }}';
            //     var newLabel = isArchive ? 'Archive' : 'Unarchive';
            //     var newColorClass = isArchive ?
            //         'bg-yellow-600 hover:bg-yellow-700 focus:ring-yellow-300 dark:bg-yellow-500 dark:hover:bg-yellow-600 dark:focus:ring-yellow-900' :
            //         'bg-red-600 hover:bg-red-700 focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900';
            //     var oldColorClass = isArchive ?
            //         'bg-red-600 hover:bg-red-700 focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900' :
            //         'bg-yellow-600 hover:bg-yellow-700 focus:ring-yellow-300 dark:bg-yellow-500 dark:hover:bg-yellow-600 dark:focus:ring-yellow-900';

            //     $.ajax({
            //         url: '/posts/' + postId + '/toggle-archive',
            //         type: 'POST',
            //         data: {
            //             _token: token,
            //             is_archive: isArchive ? 0 : 1
            //         },
            //         success: function(response) {
            //             if (response.success) {
            //                 button.text(newLabel);
            //                 button.data('archive', isArchive ? 0 : 1);
            //                 button.removeClass(oldColorClass).addClass(newColorClass);
            //             } else {
            //                 alert('An error occurred while updating the post.');
            //             }
            //         },
            //         error: function(xhr, status, error) {
            //             alert('An error occurred while updating the post.');
            //             console.error('Error:', status, error);
            //         }
            //     });
            // });






            $('.delete-post-button').on('click', function() {
                var postId = $(this).data('id');
                var token = '{{ csrf_token() }}';

                // var modal = $(this).closest('#deleteModal');
                // var backdrop = $('.modal-backdrop'); // Assuming the backdrop has the class 'modal-backdrop'

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

                            // // $('#deleteModal').addClass('hidden'); // Hide the delete modal
                            // $('.flowbite-backdrop').hide(); // Hide the backdrop if you have one

                            console.log('Post is delete');
                            // $('#deleteModal').addClass('hidden');
                            // const modal = $('#deleteModal');
                            // modal.hide();
                            // $('.flowbite-backdrop').hide();
                            //   modal.addClass('hidden');
                            //   backdrop.addClass('hidden'); // Hide the backdrop
                            // alert(response.message);
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
                        $('#updateModal').addClass('hidden');
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            });



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

                        alert("Profile is Sucessfull Update");

                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });

            });

        });
    </script>
@endsection
