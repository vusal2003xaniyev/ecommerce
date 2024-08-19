@extends('layouts.master')
@section('title', 'Ümumi məlumat')
@section('content')

    //// poinlere dil aktivliyi getirmek laZImzdir



    <div class="content-wrapper transition-all duration-150 xl:ltr:ml-[248px] xl:rtl:mr-[248px]" id="content_wrapper">
        <div class="page-content">
            <div id="content_layout">
                @include('widgets.errors')
                <div class="grid grid-cols-2 gap-6 mb-5 mt-5">
                    <!-- Basic Inputs -->
                    <div class="card">
                        <div class="card-body flex flex-col p-6">
                            <header
                                class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                                <div class="flex-1">
                                    <div class="card-title text-slate-900 dark:text-white">Sosial Media</div>
                                </div>
                            </header>
                            <form action="{{ route('sosialMediaEdit') }}" method="POST">
                                @csrf
                                <input type="hidden" name="sosial_id" value="{{ $generalData->id ?? '' }}">
                                <div class="card-text h-full space-y-4">
                                    <div class="input-area">
                                        <label for="instagram" class="form-label">Instagaram</label>
                                        <input id="instagram" name="instagram" type="url" class="form-control"
                                            placeholder="Instagaram" value="{{ $generalData->instagram ?? '' }}">
                                    </div>
                                    <div class="input-area">
                                        <label for="facebook" class="form-label">Facebook</label>
                                        <input id="facebook" name="facebook" type="url" class="form-control"
                                            placeholder="Facebook" value="{{ $generalData->facebook ?? '' }}">
                                    </div>
                                    <div class="input-area">
                                        <label for="telegram" class="form-label">Telegram</label>
                                        <input id="telegram" name="telegram" type="url" class="form-control"
                                            placeholder="Telegram" value="{{ $generalData->telegram ?? '' }}">
                                    </div>
                                    <div class="input-area">
                                        <label for="linkedin" class="form-label">Linkedin</label>
                                        <input id="linkedin" name="linkedin" type="url" class="form-control"
                                            placeholder="Linkedin" value="{{ $generalData->linkedin ?? '' }}">
                                    </div>
                                    <div class="input-area">
                                        <label for="youtube" class="form-label">Youtube</label>
                                        <input id="youtube" name="youtube" type="url" class="form-control"
                                            placeholder="Youtube" value="{{ $generalData->youtube ?? '' }}">
                                    </div>
                                    <div class="input-area">
                                        <label for="tiktok" class="form-label">Tiktok</label>
                                        <input id="tiktok" name="tiktok" type="url" class="form-control"
                                            placeholder="Tiktok" value="{{ $generalData->tiktok ?? '' }}">
                                    </div>
                                    <div class="flex justify-center items-center">
                                        <button onclick="showLoadingOverlay()" type="submit"
                                            class="block btn btn-outline-info w-1/2 text-center">Redaktə et</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Sized Inputs -->
                    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-1 gap-6">
                        <div class="card">
                            <div class="card-body flex flex-col p-6">
                                <header
                                    class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                                    <div class="flex-1">
                                        <div class="card-title text-slate-900 dark:text-white">Əlaqə məlumatları</div>
                                    </div>
                                </header>
                                <form action="{{ route('contactDataEdit') }}" method="POST">
                                    <input type="hidden" name="contact_id" value="{{ $generalData->id ?? '' }}">
                                    @csrf
                                    <div class="card-text h-full space-y-4">
                                        <div class="input-area">

                                            <div class="tab-pane fade show active" id="address" role="tabpanel"
                                                aria-labelledby="address-tab">
                                                <div class="input-area">
                                                    <label for="address" class="form-label">Ünvan</label>
                                                    <div class="relative">
                                                        <input id="address" name="address" type="text"
                                                            class="form-control" placeholder="Ünvan"
                                                            value="{{ $generalData->address ?? '' }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="input-area">
                                            <label for="address_link" class="form-label">Ünvan (Google xəritə
                                                linki)</label>
                                            <input id="address_link" name="address_link" type="text"
                                                class="form-control" placeholder="Address (Google map link)"
                                                value="{{ $generalData->address_link ?? '' }}">
                                        </div>
                                        <div class="input-area">
                                            <label for="email" class="form-label">E-poçt</label>
                                            <input id="email" name="email" type="email" class="form-control"
                                                placeholder="E-poçt" value="{{ $generalData->email ?? '' }}">
                                        </div>
                                        <div class="input-area">
                                            <label for="phone" class="form-label">Telefon nömrəsi</label>
                                            <input id="phone" name="phones" type="tel" class="form-control"
                                                placeholder="Telefon nömrəsi" value="{{ $generalData->phones ?? '' }}">
                                        </div>
                                        <div class="flex justify-center items-center">
                                            <button onclick="showLoadingOverlay()" type="submit"
                                                class="block btn btn-outline-info w-1/2 text-center">Redaktə et</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-3 gap-6">
                    <!-- Formatter Support -->
                    <div class="card col-span-2 gap-6 rounded-md bg-white dark:bg-slate-800 lg:h-full shadow-base">
                        <div class="card-body flex flex-col p-6">
                            <header
                                class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                                <div class="flex-1">
                                    <div class="card-title text-slate-900 dark:text-white">Seo Məlumatlar</div>
                                </div>
                            </header>
                            <div class="card-text h-full ">
                                <div>

                                    <form action="{{ route('seoDataEdit') }}" method="POST" id="Seo">
                                        @csrf
                                        <div class="tab-content" id="tabs-tabContent">
                                            <div class="tab-pane fade show active " id="tabs" role="tabpanel"
                                                aria-labelledby="tabs-tab">
                                                <div class="card-text h-full my-6 space-y-4">
                                                    <div class="input-area">
                                                        <label for="title" class="form-label">Başlıq</label>
                                                        <div class="relative">
                                                            <input id="title" name="title" type="text"
                                                                class="form-control" placeholder="Başlıq"
                                                                value="{{ $seoData->title ?? '' }}">
                                                        </div>
                                                    </div>
                                                    <div class="input-area">
                                                        <label for="seo_title" class="form-label">Seo başlıq</label>
                                                        <div class="relative">
                                                            <input id="seo_title" name="seo_title" type="text"
                                                                class="form-control" placeholder="Seo başlıq"
                                                                value="{{ $seoData->seo_title ?? '' }}">
                                                        </div>
                                                    </div>
                                                    <div class="input-area col-span-2">
                                                        <label for="description" class="form-label">Seo məzmun</label>
                                                        <input type="hidden" name="seo_description" id="html_content">
                                                        <div id="editor" style="color: #f0f0f0">{!! $seoData->seo_description ?? '' !!}
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="btn-container text-center col-span-2">
                                                <button onclick="showLoadingOverlay()" type="submit"
                                                    class="btn inline-flex justify-center btn-outline-info w-1/2 block">Redaktə
                                                    et</button>
                                            </div>
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
    </div>
@endsection
@section('css')
    <link href="{{ asset('assets/css/image_upload.css') . $version }}" id="stylesheet1" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />
@endsection
@section('js')
    <script src="{{ asset('assets/js/image-upload.js') . $version }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
    <script>
        var quill = new Quill('#editor', {
            theme: 'snow'
        });

        document.querySelector('#Seo').onsubmit = function() {
            let content = quill.root.innerHTML;
            document.querySelector('#html_content').value = content;
        };
    </script>
@endsection
