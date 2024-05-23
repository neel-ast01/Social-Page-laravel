<div x-show="isEditing" x-transition:enter="transition ease-out duration-100 transform"
    x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
    x-transition:leave="transition ease-in duration-75 transform" x-transition:leave-start="opacity-100 scale-100"
    x-transition:leave-end="opacity-0 scale-95" @click.away="isEditing = false" @keydown.escape.window="isEditing = false"
    class="update-model  fixed w-[600px] top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 rounded-lg p-6 z-50 w-128">
    <!-- Modal content -->
    <div class="relative p-4">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Update Post</h3>
                <button type="reset"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    @click="isEditing = false">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="update-button p-4 md:p-5" enctype="multipart/form-data" data-id="{{ $post->id }}">
                @csrf
                @method('PUT')
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                        <label for="post_title"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Post
                            Title</label>
                        <input type="text" name="post_data" id="post_data" value="{{ $post->descrip }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Hello Good Morning!" required />
                    </div>
                    <div class="col-span-2">
                        <label for="post_img"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Profile
                            Image</label>
                        <input type="file" id="post_img" name="post_img"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">

                        {{-- <div class="col-span-2">
                    <label for="photo"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" >Post
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
                                    class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500"  >
                                    <span>Upload a file</span>
                                    <input id="file-upload"
                                        name="post_img"
                                        type="file"
                                        value="\assests\posts\{{ $post->post_image }}"
                                        class="sr-only"  @click.stop/>
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
                        value="" /> --}}
                    </div>
                    <input type="hidden" name="_method" value="PUT">
                </div>
                <button type="submit" @click="isEditing = false"
                    class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                    </svg>
                    Update Post
                </button>
            </form>
        </div>
    </div>
</div>
</div>
