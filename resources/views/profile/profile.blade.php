@extends('layouts.master')
@section('title','Profile')
@section('content')
    <div class="content-wrapper transition-all duration-150 xl:ltr:ml-[248px] xl:rtl:mr-[248px]" id="content_wrapper">
        <div class="page-content">
            <div id="content_layout">
                <!-- BEGIN: Breadcrumb -->
                <div class="mb-5">
                    <ul class="m-0 p-0 list-none">
                        <li class="inline-block relative text-sm text-slate-500 font-Inter dark:text-white">Profil</li>
                    </ul>
                </div>
                <!-- END: BreadCrumb -->
                <div class="space-y-5 profile-page">
                    <div class="profiel-wrap px-[35px] pb-10 md:pt-[84px] pt-10 rounded-lg bg-white dark:bg-slate-800 lg:flex lg:space-y-0
                space-y-6 justify-between items-end relative z-[1]">
                        <div class="bg-slate-900 dark:bg-slate-700 absolute left-0 top-0 md:h-1/2 h-[150px] w-full z-[-1] rounded-t-lg"></div>
                        <div class="profile-box flex-none md:text-start text-center">
                            <div class="md:flex items-end md:space-x-6 rtl:space-x-reverse">
                                <div class="flex-none">
                                    <div class="md:h-[186px] md:w-[186px] h-[140px] w-[140px] md:ml-0 md:mr-0 ml-auto mr-auto md:mb-0 mb-4 rounded-full ring-4
                                ring-slate-100 relative">
                                        <img src="{{asset('assets/images/all-img/user-icon.png')}}" alt="" class="w-full h-full object-cover rounded-full">
{{--                                        <a href="profile-setting.html" class="absolute right-2 h-8 w-8 bg-slate-50 text-slate-600 rounded-full shadow-sm flex flex-col items-center--}}
{{--                                    justify-center md:top-[140px] top-[100px]">--}}
{{--                                            <iconify-icon icon="heroicons:pencil-square"></iconify-icon>--}}
{{--                                        </a>--}}
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <div class="text-2xl font-medium text-slate-900 dark:text-slate-200 mb-[3px]">
                                        {{$user->name}}
                                    </div>
                                    <div class="text-sm font-light text-slate-600 dark:text-slate-400">
                                        @if($user->role == '1')
                                        Superadmin
                                        @elseif($user->role == '2')
                                        Admin
                                        @elseif($user->role == '3')
                                        Moderator
                                        @else
                                        Təcrübəçi
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end profile box -->
                        <div class="profile-info-500 md:flex md:text-start text-center flex-1 max-w-[516px] md:space-y-0 space-y-4">
                            <div class="flex-1">
                                <div class="text-base text-slate-900 dark:text-slate-300 font-medium mb-1">
                                    Email
                                </div>
                                <div class="text-sm text-slate-600 font-light dark:text-slate-300">
                                    {{$user->email}}
                                </div>
                            </div>
                            <!-- end single -->
                        </div>
                        <!-- profile info-500 -->
                    </div>
                    @include('widgets.errors')
                    <div class="grid grid-cols-12 gap-6">
                        <div class="lg:col-span-4 col-span-12">
                            <div class="card h-full">
                                <header class="card-header">
                                    <div class="flex text-2xl text-slate-600 dark:text-slate-300">
                                        <iconify-icon icon="heroicons:lock-closed"></iconify-icon>
                                        <h4 class="card-title ml-3">Şifrə yenilə</h4>
                                    </div>
                                </header>
                                <div class="card-body p-6">
                                    <ul class="list space-y-8">
                                        <li class="flex space-x-3 rtl:space-x-reverse">
                                            <div class="flex-1">
                                                <form action="{{route('passwordEdit')}}" method="POST">
                                                    @csrf
                                                    <div class="input-area mt-3 password-container">
                                                        <label for="passwordInput" class="form-label">Şifrə</label>
                                                        <input id="passwordInput" name="password" type="password" class="form-control" placeholder="Şifrə" value="">
                                                        <span class="toggleIcon text-2xl mt-3" id="eye"><iconify-icon class=" nav-icon" icon="heroicons-outline:eye"></iconify-icon></span>
                                                        <span class="toggleIcon text-2xl mt-3 hidden" id="eye-slash"><iconify-icon class=" nav-icon" icon="heroicons-outline:eye-slash"></iconify-icon></span>
                                                    </div>
                                                    <div class="input-area mt-5 password-container">
                                                        <label for="password_input_repeater" class="form-label">Şifrə təkrarı</label>
                                                        <input id="password_input_repeater" name="password_repeater" type="password" class="form-control" placeholder="Şifrə təkrarı" value="">
                                                        <span class="toggleIcon text-2xl mt-3" id="eyeRepeater"><iconify-icon class=" nav-icon" icon="heroicons-outline:eye"></iconify-icon></span>
                                                        <span class="toggleIcon text-2xl mt-3 hidden" id="eye-slashRepeater"><iconify-icon class=" nav-icon" icon="heroicons-outline:eye-slash"></iconify-icon></span>
                                                    </div>

                                                <div class="flex justify-center items-center mt-5">
                                                    <button onclick="showLoadingOverlay()" type="submit" class="block btn btn-outline-info w-1/2 text-center">Redaktə et</button>
                                                </div>
                                                </form>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @can('allAdmin')
                        <div class="lg:col-span-8 col-span-12">
                            <div class="card ">
                                <header class="card-header">
                                    <h4 class="card-title">Wikisun Komandası</h4>
                                    <div class="card-text h-full ">
                                        @can('superadmin')
                                        <div class="btn-group-example btn-group">
                                            <a ><button class="btn inline-flex justify-center btn-outline-info" data-bs-toggle="modal" data-bs-target="#userAdd">İstifadəçi əlavə et</button></a>
                                        </div>
                                        @endcan
                                    </div>
                                </header>
                                <div class="card-body">
                                    <div class="card-body px-6 pb-6">
                                        <div class="overflow-x-auto -mx-6 dashcode-data-table">
                                            <span class=" col-span-8  hidden"></span>
                                            <span class="  col-span-4 hidden"></span>
                                            <div class="inline-block min-w-full align-middle">
                                                <div class="overflow-hidden ">
                                                    <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700 data-table">
                                                        <thead class=" bg-slate-200 dark:bg-slate-700">
                                                        <tr>
                                                            <th scope="col" class=" table-th ">Id</th>
                                                            <th scope="col" class=" table-th ">Ad</th>
                                                            <th scope="col" class=" table-th ">E-poçt</th>
                                                            <th scope="col" class=" table-th ">Rol</th>
                                                            <th scope="col" class=" table-th ">Status</th>
                                                            <th scope="col" class=" table-th ">Əməliyyatlar</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                                                        @foreach($admins as $key=>$admin)
                                                            <tr id="portfolio{{$key}}">
                                                                <td class="table-td">{{$key+1}}</td>
                                                                <td class="table-td ">{{$admin->name}}</td>
                                                                <td class="table-td " style="text-transform: lowercase;">{{$admin->email}}</td>
                                                                <td class="table-td ">{{$admin->role == '1' ? 'Admin' : 'Moderator' }}</td>
                                                                <td class="table-td ">
                                                                    <div id="statusdata{{$key}}" class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25  {{$admin->status == '1' ? 'text-success-500  bg-success-500' : 'text-danger-500  bg-danger-500'}}">
                                                                        {{$admin->status == '1' ? 'Active' : 'Deactive'}}
                                                                    </div>
                                                                </td>
                                                                <td class="table-td ">
                                                                    <div class="flex space-x-3 rtl:space-x-reverse">
                                                                        <div class="flex items-center mr-2 sm:mr-4 space-x-2">
                                                                            <label class="relative inline-flex h-6 w-[46px] items-center rounded-full transition-all duration-150 cursor-pointer">
                                                                                <input type="checkbox" value="{{$admin->status== '1' ? '0' : '1'}}"  {{$admin->status== '1'  ? 'checked' : ''}} id="status{{$key}}"  onchange="Status('{{$admin->id}}','{{$key}}',this.value,'/profile/status')"   class="sr-only peer">
                                                                                <div class="w-14 h-6 bg-gray-200 peer-focus:outline-none ring-0 rounded-full peer dark:bg-gray-900 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:z-10 after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-primary-500"></div>
                                                                                <span class="absolute left-1 z-20 text-xs text-white font-Inter font-normal opacity-0 peer-checked:opacity-100">On</span>
                                                                                <span class="absolute right-1 z-20 text-xs text-white font-Inter font-normal opacity-100 peer-checked:opacity-0">Off</span>
                                                                            </label>
                                                                        </div>
                                                                        @can('superadmin')
                                                                        <button class="action-btn" type="button" onclick="updateUser({{$admin->id}})">
                                                                            <iconify-icon icon="heroicons:pencil-square"></iconify-icon>
                                                                        </button>
                                                                        @endcan
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endcan
                    </div>
                </div>

            </div>
        </div>
    </div>
    {{-- User Add Modal --}}
    <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="userAdd" tabindex="-1" aria-labelledby="userAddLabel" aria-hidden="true">
        <div class="modal-dialog relative w-auto pointer-events-none">
            <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                <div class="relative bg-white rounded-lg shadow dark:bg-slate-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-slate-600 bg-info-500">
                        <h3 class="text-base font-medium text-white dark:text-white capitalize">
                            İstifadəçi əlavə et
                        </h3>
                        <button type="button" class="text-slate-400 bg-transparent hover:text-slate-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-slate-600 dark:hover:text-white" data-bs-dismiss="modal">
                            <svg aria-hidden="true" class="w-5 h-5" fill="#ffffff" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10
                                                                11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Modal bağla</span>
                        </button>
                    </div>
                    <form action="{{route('profileAdd')}}" method="POST">
                    @csrf
                        <div class="p-6 space-y-4">
                            <div class="p-6 space-y-6">
                                <div class="input-area">
                                    <label for="title" class="form-label">Ad</label>
                                    <input id="title" type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="Ad" />
                                </div>
                                <div class="input-area">
                                    <label for="email" class="form-label">E-poçt</label>
                                    <input id="email" type="email" name="email" value="{{old('email')}}" class="form-control" placeholder="E-poçt" />
                                </div>
                                <div class="input-area">
                                    <label for="user_password" class="form-label">Şifrə</label>
                                    <input id="user_password" type="password" name="password" value="{{ old('password') }}" class="form-control" placeholder="Şifrə" />
                                </div>
                                <div class="input-area">
                                    <label for="user_confirmed_password" class="form-label">Şifrə təkrarı</label>
                                    <input id="user_confirmed_password" type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" class="form-control" placeholder="Şifrə təkrarı" />
                                </div>
                                <div class="input-group">
                                    <div>
                                        <label for="basicSelect" class="form-label">Rol seç</label>
                                        <select name="role" id="role" class="form-control w-full mt-2">
                                            <option selected="Selected" disabled="disabled" value="none" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">Rol seç</option>
                                            <option value="2" {{ old('role') == '2' ? 'selected' : '' }} class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">Superadmin</option>
                                            <option value="1" {{ old('role') == '1' ? 'selected' : '' }} class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">Admin</option>
                                            <option value="1" {{ old('role') == '3' ? 'selected' : '' }} class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">Moderator</option>
                                            <option value="1" {{ old('role') == '4' ? 'selected' : '' }} class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">Təcrübəçi</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- Modal footer -->
                        <div
                            class="flex items-center justify-end p-6 space-x-2 border-t border-slate-200 rounded-b dark:border-slate-600">
                            <button onclick="showLoadingOverlay()" class="btn inline-flex justify-center text-white bg-info-500">Əlavə et</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- User Add Modal --}}
    {{-- USER EDIT MODAL --}}
    <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="userEdit" tabindex="-1" aria-labelledby="userEditLabel" aria-hidden="true">
        <div class="modal-dialog relative w-auto pointer-events-none">
            <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                <div class="relative bg-white rounded-lg shadow dark:bg-slate-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-slate-600 bg-info-500">
                        <h3 class="text-base font-medium text-white dark:text-white capitalize">
                            İsifadəçi redaktəsi
                        </h3>
                        <button type="button" class="text-slate-400 bg-transparent hover:text-slate-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-slate-600 dark:hover:text-white" data-bs-dismiss="modal">
                            <svg aria-hidden="true" class="w-5 h-5" fill="#ffffff" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10
                                                                                                                    11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Modal bağla</span>
                        </button>
                    </div>
                    <form action="{{route('profileEdit')}}" method="POST">
                        <input type="hidden" name="id" id="edit_id">
                        @csrf
                        <!-- Modal body -->
                        <div class="p-6 space-y-4">
                            <div class="p-6 space-y-6">
                                <div class="input-area">
                                    <label for="title" class="form-label">Ad</label>
                                    <input id="admin_edit_name" type="text" name="name" value="" class="form-control" placeholder="Ad" />
                                </div>
                                <div class="input-group">
                                    <div>
                                        <label for="basicSelect" class="form-label">Rol seç</label>
                                        <select name="role" id="admin_edit_role" class="form-control w-full mt-2">
                                            <option selected="Selected" disabled="disabled" value="none" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">Rol seç</option>
                                            <option value="1" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">Superadmin</option>
                                            <option value="2" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">Admin</option>
                                            <option value="3" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">Moderator</option>
                                            <option value="4" class="py-1 inline-block font-Inter font-normal text-sm text-slate-600">Təcrübəçi</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal footer -->
                        <div
                            class="flex items-center justify-end p-6 space-x-2 border-t border-slate-200 rounded-b dark:border-slate-600">
                            <button onclick="showLoadingOverlay()" class="btn inline-flex justify-center text-white bg-info-500">Redaktə et</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- User Edit Modal --}}
@endsection
@section('js')
    <script src="{{ asset('assets/js/jquery/jquery.min.js').$version }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('assets/js/own/operation.js').$version }}"></script>
    <script src="{{ asset('assets/js/own/profile.js').$version }}"></script>
@endsection
