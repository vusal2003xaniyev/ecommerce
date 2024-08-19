@extends('layouts.master')
@section('title','Logo')
@section('content')
    <div class="content-wrapper transition-all duration-150 xl:ltr:ml-[248px] xl:rtl:mr-[248px]" id="content_wrapper">
        <div class="page-content">
            <div id="content_layout">
                <div class="grid grid-cols-1 gap-6">
                    <div class="card">
                        <div class="card-body flex flex-col p-6">
                            <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                                <div class="flex-1">
                                    <div class="card-title text-slate-900 dark:text-white">Loqo</div>
                                </div>
                                @include('widgets.errors')
                            </header>
                            <div class="card-text h-full ">
                                <div>
{{--                                    <ul class="nav nav-tabs flex flex-col md:flex-row flex-wrap list-none border-b-0 pl-0 mb-4" id="tabs-tab" role="tablist">--}}
{{--                                        @foreach($languages as $key => $lang)--}}
{{--                                            <li class="nav-item" role="presentation">--}}
{{--                                                <a href="#tabs-{{$lang->short_name}}" class="nav-link w-full block font-medium text-sm font-Inter leading-tight capitalize border-x-0 border-t-0 border-b border-transparent px-4 pb-2 my-2 hover:border-transparent focus:border-transparent {{$key == 0 ? 'active' : ''}}  dark:text-slate-300" id="tabs-{{$lang->short_name}}-tab" data-bs-toggle="pill" data-bs-target="#tabs-{{$lang->short_name}}" role="tab" aria-controls="tabs-{{$lang->short_name}}" aria-selected="true">{{$lang->short_name}}</a>--}}
{{--                                            </li>--}}
{{--                                        @endforeach--}}
{{--                                    </ul>--}}
                                    <form action="{{route('logoEdit')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="old_logo_image" value="{{$images->logo ?? ''}}">
                                        <input type="hidden" name="old_favicon_image" value="{{$images->favicon ?? ''}}">
                                        <div class="tab-content" id="tabs-tabContent">
                                            <div class="grid grid-cols-2" >
                                                <div class="col-span-1">
                                                    <div class="">

                                                        <label for="name" class="form-label">Loqo</label>
                                                        <div class="upload-image" style="display: flex;justify-content: space-around">
                                                            <input type='file' name="logo_image" value="" class="imgInp" id="logo_image" data-id='logo_img'/>
                                                            <div>
                                                                <button type="button" onclick="DeleteImage1()" class="btn btn-danger btn-sm"> <iconify-icon icon="heroicons:trash"></iconify-icon> Sil</button>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        @if($images->logo ?? false)
                                                            <img id="logo_img" class="imgInpVal" src="{{config('constants.view_path').$images->logo}}" alt="logo" height="150"/>
                                                        @else
                                                            <img id="logo_img" class="imgInpVal" src="{{asset('assets/images/avatar.jpg')}}" alt="about image" height="150"/>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-span-1">
                                                    <div class="">
                                                        <label for="name" class="form-label">Favicon</label>
                                                        <div class="upload-image" style="display: flex;justify-content: space-around">
                                                            <input type='file' name="favicon_image" value="" class="imgInp" id="favicon_image" data-id='favicon_img'/>
                                                            <div>
                                                                <button type="button" onclick="DeleteImage2()" class="btn btn-danger btn-sm"> <iconify-icon icon="heroicons:trash"></iconify-icon> Sil</button>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        @if($images->favicon ?? false)
                                                            <img id="favicon_img" class="imgInpVal" src="{{config('constants.view_path').$images->favicon}}" alt="logo" height="150"/>
                                                        @else
                                                            <img id="favicon_img" class="imgInpVal" src="{{asset('assets/images/avatar.jpg')}}" alt="about image" height="150"/>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <button onclick="showLoadingOverlay()" type="submit" class="btn inline-flex justify-center btn-outline-info mt-8">Redaktə et</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('css')
    <link href="{{ asset('assets/css/image_upload.css').$version }}" id="stylesheet1" rel="stylesheet" type="text/css">
@endsection
@section('js')
    <script src="{{ asset('assets/js/image-upload.js').$version }}"></script>
    <script>
        function DeleteImage1(){
            document.getElementById('logo_image').value = '';
            document.getElementById('logo_img').src = '{{asset('assets/images/avatar.jpg')}}';
        }

        function DeleteImage2(){
            document.getElementById('favicon_image').value = '';
            document.getElementById('favicon_img').src = '{{asset('assets/images/avatar.jpg')}}';
        }
    </script>

@endsection
