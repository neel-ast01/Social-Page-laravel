<?php
$config = require 'config.php';
$db = new Database($config['database']);

$posts = $db
    ->query(
        "SELECT posts.user_id,full_name,username,profile_picture,post_id,post_data,post_img,post_timedate,likes
        FROM register 
        LEFT JOIN posts 
        ON posts.user_id = register.user_id
        WHERE posts.post_id IS NOT NULL
    ORDER BY post_timedate DESC;",
    )
    ->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="posts">
    <?php foreach ($posts as $post) : ?>
    <div class="flex w-full p-8 border-b border-gray-300">
        <img class="image flex-shrink-0 w-12 h-12 bg-gray-400 rounded-full" src="/uploads/<?php echo $post['profile_picture']; ?>"></img>
        <div class="flex flex-col flex-grow ml-4">
            <div class="flex">
                <span class="font-semibold">
                    <?php echo $post['full_name']; ?>
                </span>
                <span class="ml-1">
                    <?php echo $post['username']; ?>
                </span>
                <span class="ml-auto text-sm">
                    <?php echo $post['post_timedate']; ?>
                </span>
            </div>
            <p class="mt-1">
                <?php echo $post['post_data']; ?> <a class="underline" href="#">#hashtag</a>
            </p>

            <img class="border rounded-lg" src="/uploads/<?php echo $post['post_img']; ?>">
            <div class="flex justify-around mt-4">
                <button
                    class="flex-1 flex items-center text-sm text-gray-400 hover:text-blue-400 transition duration-350 ease-in-out">
                    <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-2">
                        <g>
                            <path
                                d="M14.046 2.242l-4.148-.01h-.002c-4.374 0-7.8 3.427-7.8 7.802 0 4.098 3.186 7.206 7.465 7.37v3.828c0 .108.044.286.12.403.142.225.384.347.632.347.138 0 .277-.038.402-.118.264-.168 6.473-4.14 8.088-5.506 1.902-1.61 3.04-3.97 3.043-6.312v-.017c-.006-4.367-3.43-7.787-7.8-7.788zm3.787 12.972c-1.134.96-4.862 3.405-6.772 4.643V16.67c0-.414-.335-.75-.75-.75h-.396c-3.66 0-6.318-2.476-6.318-5.886 0-3.534 2.768-6.302 6.3-6.302l4.147.01h.002c3.532 0 6.3 2.766 6.302 6.296-.003 1.91-.942 3.844-2.514 5.176z">
                            </path>
                        </g>
                    </svg>
                    12.3 k
                </button>
                <button
                    class="flex-1 flex items-center  text-xs text-gray-400 hover:text-green-400 transition duration-350 ease-in-out">
                    <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-2">
                        <g>
                            <path
                                d="M23.77 15.67c-.292-.293-.767-.293-1.06 0l-2.22 2.22V7.65c0-2.068-1.683-3.75-3.75-3.75h-5.85c-.414 0-.75.336-.75.75s.336.75.75.75h5.85c1.24 0 2.25 1.01 2.25 2.25v10.24l-2.22-2.22c-.293-.293-.768-.293-1.06 0s-.294.768 0 1.06l3.5 3.5c.145.147.337.22.53.22s.383-.072.53-.22l3.5-3.5c.294-.292.294-.767 0-1.06zm-10.66 3.28H7.26c-1.24 0-2.25-1.01-2.25-2.25V6.46l2.22 2.22c.148.147.34.22.532.22s.384-.073.53-.22c.293-.293.293-.768 0-1.06l-3.5-3.5c-.293-.294-.768-.294-1.06 0l-3.5 3.5c-.294.292-.294.767 0 1.06s.767.293 1.06 0l2.22-2.22V16.7c0 2.068 1.683 3.75 3.75 3.75h5.85c.414 0 .75-.336.75-.75s-.337-.75-.75-.75z">
                            </path>
                        </g>
                    </svg>
                    14 k
                </button>
                <?php require 'likes.php'; ?>
                <button
                    class="flex-1 flex items-center  text-xs text-gray-400 hover:text-blue-400 transition duration-350 ease-in-out">
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
                </button>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>
