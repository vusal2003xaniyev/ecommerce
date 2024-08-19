<div class="sidebar-wrapper group w-0 hidden xl:w-[248px] xl:block">
    <div id="bodyOverlay" class="w-screen h-screen fixed top-0 bg-slate-900 bg-opacity-50 backdrop-blur-sm z-10 hidden">
    </div>
    <div class="logo-segment">
        <a class="flex items-center" href="{{ route('dashboard') }}">
            {{--            <img src="{{asset('assets/images/logo/logo-capitalist.png')}}" class="black_logo" alt="logo"> --}}
            {{--            <img src="{{asset('assets/images/logo/logo-capitalist.png')}}" class="white_logo" alt="logo"> --}}
            <h3>E-COMMERCE</h3>
        </a>
        <!-- Sidebar Type Button -->
        <div id="sidebar_type" class="cursor-pointer text-slate-900 dark:text-white text-lg">
            <iconify-icon class="sidebarDotIcon extend-icon text-slate-900 dark:text-slate-200"
                icon="fa-regular:dot-circle"></iconify-icon>
            <iconify-icon class="sidebarDotIcon collapsed-icon text-slate-900 dark:text-slate-200"
                icon="material-symbols:circle-outline"></iconify-icon>
        </div>
        <button class="sidebarCloseIcon text-2xl inline-block md:hidden">
            <iconify-icon class="text-slate-900 dark:text-slate-200" icon="clarity:window-close-line"></iconify-icon>
        </button>
    </div>
    <div id="nav_shadow"
        class="nav_shadow h-[60px] absolute top-[80px] nav-shadow z-[1] w-full transition-all duration-200 pointer-events-none
      opacity-0">
    </div>
    <div class="sidebar-menus bg-white dark:bg-slate-800 py-2 px-4 h-[calc(100%-80px)] z-50" id="sidebar_menus">
        <ul class="sidebar-menu">
            <li class="sidebar-menu-title">Sayt daxili menyu</li>
            <li class="">
                <a href="{{ route('dashboard') }}" class="navItem">
                    <span class="flex items-center"><iconify-icon class=" nav-icon"
                            icon="heroicons-outline:home"></iconify-icon>Ana səhifə</span>
                </a>
            </li>
            <li class="{{ Request::segment(1) == 'settings' ? 'active' : '' }}">
                <a href="javascript:void(0)" class="navItem">
                    <span class="flex items-center"><iconify-icon class=" nav-icon"
                            icon="heroicons-outline:adjustments-horizontal"></iconify-icon>Parametrlər</span>
                    <iconify-icon class="icon-arrow" icon="heroicons-outline:chevron-right"></iconify-icon></a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{ route('generalDataIndex') }}"
                            class="{{ Request::segment(2) == 'general-data' ? 'active' : '' }}">Ümumi məlumat</a>
                    </li>
                    <li>
                        <a href="{{ route('logoIndex') }}"
                            class="{{ Request::segment(2) == 'logo' ? 'active' : '' }}">Logo & Favicon</a>
                    </li>

                </ul>
            </li>

            {{-- <li class="{{ Request::segment(1) == "adverts" ? 'active' : '' }}">
                <a href="javascript:void(0)" class="navItem" >
                <span class="flex items-center"><iconify-icon class=" nav-icon" icon="heroicons-outline:lifebuoy"></iconify-icon>Reklamlar</span>
                <iconify-icon class="icon-arrow" icon="heroicons-outline:chevron-right"></iconify-icon></a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{route('manuelAdvertIndex')}}" class="navItem {{ Request::segment(2) == "manuel-adverts" ? 'active' : '' }}">
                            <span class="flex items-center"><span>Şəxsi Reklamlar</span></span>
                        </a>
                    </li>
                </ul>
            </li> --}}

            <li>
                <a href="{{ route('aboutUsIndex') }}"
                    class="navItem {{ Request::segment(2) == 'about' ? 'active' : '' }}">
                    <span class="flex items-center"><iconify-icon class="nav-icon"
                            icon="heroicons-outline:identification"></iconify-icon>Haqqımızda</span>
                </a>
            </li>
            
            <li>
                <a href="{{ route('productIndex') }}"
                    class="navItem {{ Request::segment(2) == 'product' ? 'active' : '' }}">
                    <span class="flex items-center"><iconify-icon class="nav-icon"
                            icon="heroicons-outline:chat-bubble-bottom-center-text"></iconify-icon>Məhsullar
                </a>
            </li>
            

        </ul>
    </div>
</div>
