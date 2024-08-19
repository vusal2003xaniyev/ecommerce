@extends('layouts.master')
@section('title', 'Haqqımızda')
@section('content')
    <div class="content-wrapper transition-all duration-150 xl:ltr:ml-[248px] xl:rtl:mr-[248px]" id="content_wrapper">
        <div class="page-content">
            <div id="content_layout">
                <div class="grid grid-cols-1 gap-6">
                    <div class="card">
                        <div class="card-body flex flex-col p-6">
                            <header
                                class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                                <div class="flex-1">
                                    <div class="card-title text-slate-900 dark:text-white">Haqqımızda</div>
                                </div>
                                @include('widgets.errors')
                            </header>
                            <div class="card-text h-full ">
                                <div>

                                    <form action="{{ route('aboutUsEdit') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="oldimage" value="{{ $about->image ?? '' }}">

                                        <div class="tab-content" id="tabs-tabContent">
                                            <div class="flex justify-between">
                                                <div class="col-lg-3">
                                                    <div class="">
                                                        <label for="name" class="form-label">Şəkil Yüklə</label>
                                                        <div class="upload-image"
                                                            style="display: flex;justify-content: space-around">
                                                            <input type='file' name="image" value=""
                                                                class="imgInp" id="image" data-id='img' />
                                                            <div>
                                                                <button type="button" onclick="DeleteImage()"
                                                                    class="btn btn-danger btn-sm"> <iconify-icon
                                                                        icon="heroicons:trash"></iconify-icon> Sil</button>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        @if ($about->image ?? false)
                                                            <img id="img1" class="imgInpVal"
                                                                src="{{ config('constants.view_path') . $about->image }}"
                                                                alt="about image" height="150" />
                                                        @else
                                                            <img id="img1" class="imgInpVal"
                                                                src="{{ asset('assets/images/avatar.jpg') }}"
                                                                alt="about image" height="150" />
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade show active" id="tabs" role="tabpanel"
                                                aria-labelledby="tabs-tab">
                                                <div class="card-text h-full my-6 space-y-4">
                                                    <div class="input-area">
                                                        <label for="title" class="form-label">Başlıq</label>
                                                        <input id="title" type="text" name="title"
                                                            value="{{ $about->title ?? '' }}" class="form-control"
                                                            placeholder="Project Name">
                                                    </div>
                                                    <div class="input-area">
                                                        <label for="default" class="form-label">Məzmun </label>
                                                        <input type="hidden" name="description" id="html_content">
                                                        <div id="editor" style="color: #f0f0f0">{!! $about->description ?? '' !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" onclick="showLoadingOverlay()"
                                                class="btn inline-flex justify-center btn-outline-info">Redaktə et</button>
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
    <link href="{{ asset('assets/css/image_upload.css') . $version }}" id="stylesheet1" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="{{ asset('assets/js/image-upload.js') . $version }}"></script>
    <script src="trumbowyg/dist/trumbowyg.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
    <script>
        var quill = new Quill('#editor', {
            theme: 'snow'
        });
        document.querySelector('form').onsubmit = function() {
            let content = quill.root.innerHTML;
            document.querySelector('#html_content').value = content;
        };
    </script>
    <script>
        function DeleteImage() {
            document.getElementById('image').value = '';
            document.getElementById('img').src = '{{ asset('assets/images/avatar.jpg') }}';
        }
    </script>
@endsection
