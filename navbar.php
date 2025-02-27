<div id="navbar" class="flex items-center justify-between px-6 py-4">
    <div id="logo" class="text-4xl font-bold font-mono">findhome.com</div>
    <div id="sidebar">
        <ul class="flex items-center justify-center list-none gap-4">
            <li class="font-bold text-gray-500 hover:text-[#2a2a2a] cursor-pointer"><a href="/">Home</a></li>
            <li class="font-bold text-gray-500 hover:text-[#2a2a2a] cursor-pointer">About</li>
            <li class="font-bold text-gray-500 hover:text-[#2a2a2a] cursor-pointer">Contact</li>
            <?php if($_SESSION['login']) :?>
                <li id="user" class="rounded-full bg-gray-500">
                    <a href="/dashboard">
                        <svg class="mx-auto" fill="none" height="30px" stroke="#fff" viewBox="0 0 24 24" width="30px" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path class="group-hover:fill-white" d="M12 22.01C17.5228 22.01 22 17.5329 22 12.01C22 6.48716 17.5228 2.01001 12 2.01001C6.47715 2.01001 2 6.48716 2 12.01C2 17.5329 6.47715 22.01 12 22.01Z" fill="#292D32" opacity="0.4"></path> <path class="group-hover:fill-white" d="M12 6.93994C9.93 6.93994 8.25 8.61994 8.25 10.6899C8.25 12.7199 9.84 14.3699 11.95 14.4299C11.98 14.4299 12.02 14.4299 12.04 14.4299C12.06 14.4299 12.09 14.4299 12.11 14.4299C12.12 14.4299 12.13 14.4299 12.13 14.4299C14.15 14.3599 15.74 12.7199 15.75 10.6899C15.75 8.61994 14.07 6.93994 12 6.93994Z" fill="#D3D3D3"></path> <path class="group-hover:fill-white" d="M18.7807 19.36C17.0007 21 14.6207 22.01 12.0007 22.01C9.3807 22.01 7.0007 21 5.2207 19.36C5.4607 18.45 6.1107 17.62 7.0607 16.98C9.7907 15.16 14.2307 15.16 16.9407 16.98C17.9007 17.62 18.5407 18.45 18.7807 19.36Z" fill="#D3D3D3"></path> </g></svg>
                    </a>
                </li>
                <li id="logout" class="px-4 py-2 bg-[#2a2a2a] text-white hover:bg-black rounded-lg cursor-pointer"><a href="/logout">Logout</a></li>
            <?php else :?>
                <li id="login" class="px-4 py-2 bg-[#2a2a2a] text-white hover:bg-black rounded-lg cursor-pointer"><a href="/login">Login</a></li>
            <?php endif;?>
        </ul>
    </div>
</div>