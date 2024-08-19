<div class="z-[9]" id="app_header">
    <div class="app-header z-[999] bg-white dark:bg-slate-800 shadow-sm dark:shadow-slate-700">
        <div class="flex justify-between items-center h-full">
            <div class="flex items-center md:space-x-4 space-x-4 rtl:space-x-reverse vertical-box">
                <a href="{{route('dashboard')}}" class="mobile-logo xl:hidden inline-block">
{{--                    <img src="{{asset('assets/images/logo/logo-capitalist.png')}}" class="black_logo" alt="logo">--}}
{{--                    <img src="{{asset('assets/images/logo/logo-capitalist.png')}}" class="white_logo" alt="logo">--}}
                    <h3>WIKISUN</h3>
                </a>
                <button class="smallDeviceMenuController open-sdiebar-controller hidden xl:hidden md:inline-block"><iconify-icon class="leading-none bg-transparent relative text-xl top-[2px] text-slate-900 dark:text-white" icon="heroicons-outline:menu-alt-3"></iconify-icon></button>
                <button class="sidebarOpenButton text-xl text-slate-900 dark:text-white !ml-0 hidden rtl:rotate-180"><iconify-icon icon="ph:arrow-right-bold"></iconify-icon></button>
            </div>
            <!-- end vertcial -->
            <div class="items-center space-x-4 rtl:space-x-reverse horizental-box">
                <a href="{{route('dashboard')}}" class="leading-0">
                    <span class="xl:inline-block hidden">
{{--                        <img src="{{asset('assets/images/logo/logo-capitalist.png')}}" class="black_logo " alt="logo">--}}
{{--                        <img src="{{asset('assets/images/logo/logo-capitalist.png')}}" class="white_logo" alt="logo">--}}
                         <h3>WIKISUN</h3>
                    </span>
                    <span class="xl:hidden inline-block">
{{--                        <img src="{{asset('assets/images/logo/logo-capitalist.png')}}" class="black_logo " alt="logo">--}}
{{--                        <img src="{{asset('assets/images/logo/logo-capitalist.png')}}" class="white_logo " alt="logo">--}}
                         <h3>WIKISUN</h3>
                    </span>
                </a>
                <button class="smallDeviceMenuController open-sdiebar-controller hidden md:inline-block xl:hidden"><iconify-icon class="leading-none bg-transparent relative text-xl top-[2px] text-slate-900 dark:text-white" icon="heroicons-outline:menu-alt-3"></iconify-icon></button>
                <button class="items-center xl:text-sm text-lg xl:text-slate-400 text-slate-800 dark:text-slate-300 focus:outline-none focus:shadow-none px-1 space-x-3 rtl:space-x-reverse search-modal inline-flex xl:hidden" data-bs-toggle="modal" data-bs-target="#searchModal"><iconify-icon icon="heroicons-outline:search"></iconify-icon><span class="xl:inline-block hidden">Search...</span></button>
            </div>
            <div class="nav-tools flex items-center lg:space-x-5 space-x-3 rtl:space-x-reverse leading-0">
                <!-- Mail Dropdown -->
{{--                <div class="relative md:block hidden">--}}
{{--                    <button class="lg:h-[32px] lg:w-[32px] lg:bg-slate-50 lg:dark:bg-slate-900 dark:text-white text-slate-900 cursor-pointer rounded-full text-[20px] flex flex-col items-center justify-center" type="button" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                        <iconify-icon class="text-slate-800 dark:text-white text-xl" icon="heroicons-outline:mail"></iconify-icon>--}}
{{--                        <span class="absolute -right-1 lg:top-0 -top-[6px] h-4 w-4 bg-red-500 text-[8px] font-semibold flex flex-col items-center justify-center rounded-full text-white z-[45]">{{$count}}</span>--}}
{{--                    </button>--}}
{{--                </div>--}}
                <!-- END: Message Dropdown -->
                <div class="md:block hidden w-full">
                    <button class="text-slate-800 dark:text-white focus:ring-0 focus:outline-none font-medium rounded-lg text-sm text-center inline-flex items-center" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="lg:h-8 lg:w-8 h-7 w-7 rounded-full flex-1 ltr:mr-[10px] rtl:ml-[10px]">
                            <img src="{{asset('assets/images/all-img/user-icon.png')}}" alt="user" class="block w-full h-full object-cover rounded-full">
                        </div>
                        <span
                            class="flex-none text-slate-600 dark:text-white text-sm font-normal items-center lg:flex hidden overflow-hidden text-ellipsis whitespace-nowrap">{{\Illuminate\Support\Facades\Auth::user()->name}}</span>
                        <svg class="w-[16px] h-[16px] dark:text-white hidden lg:inline-block text-base inline-block ml-[10px] rtl:mr-[10px]" aria-hidden="true" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div class="dropdown-menu z-10 hidden bg-white divide-y divide-slate-100 shadow w-44 dark:bg-slate-800 border dark:border-slate-700 !top-[23px] rounded-md overflow-hidden">
                        <ul class="py-1 text-sm text-slate-800 dark:text-slate-200">
                            <li>
                                <a href="{{route('profileIndex')}}" class="block px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-white font-inter text-sm text-slate-60 dark:text-white font-normal">
                                    <iconify-icon icon="heroicons-outline:user" class="relative top-[2px] text-lg ltr:mr-1 rtl:ml-1"></iconify-icon>
                                    <span class="font-Inter">Profil</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('logout')}}" class="block px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-white font-inter text-sm text-slate-60 dark:text-white font-normal">
                                    <iconify-icon icon="heroicons-outline:login" class="relative top-[2px] text-lg ltr:mr-1 rtl:ml-1"></iconify-icon>
                                    <span class="font-Inter">Çıxış</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- END: Header -->
                <button class="smallDeviceMenuController md:hidden block leading-0">
                    <iconify-icon class="cursor-pointer text-slate-900 dark:text-white text-2xl" icon="heroicons-outline:menu-alt-3"></iconify-icon>
                </button>
                <!-- end mobile menu -->
            </div>
            <!-- end nav tools -->
        </div>
    </div>
</div>
