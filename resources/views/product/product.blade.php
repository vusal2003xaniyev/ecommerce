@extends('layouts.master')
@section('title', 'Məhsullar')
@section('content')
    <div class="content-wrapper transition-all duration-150 xl:ltr:ml-[248px] xl:rtl:mr-[248px]" id="content_wrapper">
        <div class="page-content">
            <div id="content_layout">
                <div class=" space-y-5">
                    <div class="card">
                        <header class="card-header noborder">
                            <h4 class="card-title">Məhsul Məlumatları</h4>
                            <div class="card-text h-full "></div>
                            <button class="btn btn-sm btn-outline-info" data-bs-toggle="modal"
                                data-bs-target="#addModal">Əlavə et</button>
                        </header>
                        <div class="card-body px-6 pb-6">
                            <div class="overflow-x-auto -mx-6 dashcode-data-table">
                                <div class="inline-block min-w-full align-middle">
                                    <div class="overflow-hidden ">
                                        <table
                                            class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700 data-table">
                                            <thead class=" bg-slate-200 dark:bg-slate-700">
                                                <tr>
                                                    <th scope="col" class=" table-th ">Id</th>
                                                    <th scope="col" class=" table-th ">Adı</th>
                                                    <th scope="col" class=" table-th ">Status</th>
                                                    <th scope="col" class=" table-th ">Əməliyyat</th>
                                                </tr>
                                            </thead>
                                            <tbody
                                                class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                                                @foreach ($products as $key => $product)
                                                    <tr id="portfolio{{ $key }}" class="text-center">
                                                        <td class="table-td">{{ $key + 1 }}</td>
                                                        <td class="table-td ">{{ $product->title }}</td>
                                                        <td class="table-td">
                                                            <div class="flex">
                                                                <select
                                                                    onchange="StatusProduct('{{ $product?->id }}',this.value,)"
                                                                    class="form-control m-auto">
                                                                    <option value="0"
                                                                        @if ($product?->status == '0') selected @endif
                                                                        class="py-1 inline-block font-Inter font-normal text-sm text-slate-400">
                                                                        Passiv</option>
                                                                    <option value="1"
                                                                        @if ($product?->status == '1') selected @endif
                                                                        class="py-1 inline-block font-Inter font-normal text-sm text-slate-400">
                                                                        Aktiv</option>
                                                                </select>
                                                            </div>
                                                        </td>
                                                        <td class="table-td text-center m-auto">
                                                            <div class="flex space-x-3 justify-center">
                                                                <button
                                                                    onclick="Delete('{{ $product?->id }}','/product/delete/')"
                                                                    title="Silmək" class="action-btn p-6 justify-center"
                                                                    type="button">
                                                                    <iconify-icon icon="heroicons:trash"></iconify-icon>
                                                                </button>
                                                                <button data-bs-toggle="modal" data-bs-target="#editModal"
                                                                    onclick="viewEdit({{ $product->id }})"
                                                                    title="Redaktə et"
                                                                    class="action-btn p-6 justify-center" type="button">
                                                                    <iconify-icon
                                                                        icon="heroicons:chevron-double-right"></iconify-icon>
                                                                </button>
                                                                @if($product->stock>0)
                                                                <button data-bs-toggle="modal" data-bs-target="#orderModal"
                                                                    onclick="viewOrder({{ $product->id }})"
                                                                    title="Sifariş et"
                                                                    class="action-btn p-6 justify-center" type="button">
                                                                    <iconify-icon
                                                                        icon="heroicons:chevron-right"></iconify-icon>
                                                                </button>
                                                                @endif
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
        </div>
    </div>
    <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
        id="addModal" tabindex="-1" aria-labelledby="infoModalLabel" aria-hidden="true">
        <div class="modal-dialog relative w-auto pointer-events-none">
            <div
                class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                <div class="relative bg-white rounded-lg shadow dark:bg-slate-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-slate-600 bg-info-500">
                        <h3 class="text-base font-medium text-white dark:text-white capitalize">
                            Məlumatlar
                        </h3>
                        <button type="button"
                            class="text-slate-400 bg-transparent hover:text-slate-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-slate-600 dark:hover:text-white"
                            data-bs-dismiss="modal">
                            <svg aria-hidden="true" class="w-5 h-5" fill="#ffffff" viewbox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10
                                                                                    11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Modal bağla</span>
                        </button>
                    </div>
                    <form action="{{ route('productAddPost') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- Modal body -->
                        <div class="p-6 space-y-4">
                            <div class="p-6 space-y-6">
                                <div class="input-group">
                                    <div>
                                        <label for="title" class="form-label">Məhsul adı :</label>
                                        <input class="form-control mb-5" required type="text" id="title"
                                            name="title">
                                    </div>
                                    <div>
                                        <label for="price" class="form-label">Məhsul qiyməti :</label>
                                        <input class="form-control mb-5" min="0.00" step="0.01" required
                                            type="number" id="price" name="price">
                                    </div>
                                    <div>
                                        <label for="stock" class="form-label">Məhsul sayı :</label>
                                        <input class="form-control mb-5" min="0" required type="number"
                                            id="stock" name="stock">
                                    </div>
                                    <div>
                                        <label for="description" class="form-label">Məhsul haqqında :</label>
                                        <textarea required class="form-control" name="description" id="description" rows="5"
                                            placeholder="Cavab mətni yazın..."></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal footer -->
                        <div
                            class="flex items-center justify-end p-6 space-x-2 border-t border-slate-200 rounded-b dark:border-slate-600">
                            <button class="btn inline-flex justify-center text-white bg-info-500">Göndər</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
        id="editModal" tabindex="-1" aria-labelledby="infoModalLabel" aria-hidden="true">
        <div class="modal-dialog relative w-auto pointer-events-none">
            <div
                class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                <div class="relative bg-white rounded-lg shadow dark:bg-slate-700">
                    <!-- Modal header -->
                    <div
                        class="flex items-center justify-between p-5 border-b rounded-t dark:border-slate-600 bg-info-500">
                        <h3 class="text-base font-medium text-white dark:text-white capitalize">
                            Məlumatlar
                        </h3>
                        <button type="button"
                            class="text-slate-400 bg-transparent hover:text-slate-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-slate-600 dark:hover:text-white"
                            data-bs-dismiss="modal">
                            <svg aria-hidden="true" class="w-5 h-5" fill="#ffffff" viewbox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10
                                                                                    11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Modal bağla</span>
                        </button>
                    </div>
                    <form action="{{ route('productEditPost') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- Modal body -->
                        <div class="p-6 space-y-4">
                            <div class="p-6 space-y-4">
                                <div class="p-6 space-y-6">
                                    <div class="input-group">
                                        <input type="hidden" id="edit_id" name="id">
                                        <div>
                                            <label for="title" class="form-label">Məhsul adı :</label>
                                            <input class="form-control mb-5" required type="text" id="edit_title"
                                                name="title">
                                        </div>
                                        <div>
                                            <label for="price" class="form-label">Məhsul qiyməti :</label>
                                            <input class="form-control mb-5" min="0.00" step="0.01" required
                                                type="number" id="edit_price" name="price">
                                        </div>
                                        <div>
                                            <label for="stock" class="form-label">Məhsul sayı :</label>
                                            <input class="form-control mb-5" min="0" required type="number"
                                                id="edit_stock" name="stock">
                                        </div>
                                        <div>
                                            <label for="description" class="form-label">Məhsul haqqında :</label>
                                            <textarea required class="form-control" name="description" id="edit_description" rows="5"
                                                placeholder="Cavab mətni yazın..."></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal footer -->
                        <div
                            class="flex items-center justify-end p-6 space-x-2 border-t border-slate-200 rounded-b dark:border-slate-600">
                            <button class="btn inline-flex justify-center text-white bg-info-500">Göndər</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto"
    id="orderModal" tabindex="-1" aria-labelledby="infoModalLabel" aria-hidden="true">
    <div class="modal-dialog relative w-auto pointer-events-none">
        <div
            class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
            <div class="relative bg-white rounded-lg shadow dark:bg-slate-700">
                <!-- Modal header -->
                <div
                    class="flex items-center justify-between p-5 border-b rounded-t dark:border-slate-600 bg-info-500">
                    <h3 class="text-base font-medium text-white dark:text-white capitalize">
                        Məlumatlar
                    </h3>
                    <button type="button"
                        class="text-slate-400 bg-transparent hover:text-slate-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-slate-600 dark:hover:text-white"
                        data-bs-dismiss="modal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="#ffffff" viewbox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10
                                                                                11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Modal bağla</span>
                    </button>
                </div>
                <form action="{{ route('productOrderPost') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Modal body -->
                    <div class="p-6 space-y-4">
                        <div class="p-6 space-y-4">
                            <div class="p-6 space-y-6">
                                <div class="input-group">
                                    <input type="hidden" id="order_id" name="id">
                                    <input type="hidden" id="order_price" name="price">

                                    <div>
                                        <label for="view_stock" class="form-label">Məhsul sayı :</label>
                                        <input class="form-control mb-5" readonly  type="number"  id="view_stock"
                                            >
                                    </div>
                                   
                                    <div>
                                        <label for="order_stock" class="form-label">Sifariş sayı :</label>
                                        <input class="form-control mb-5" min="0" required type="number"
                                            id="order_stock" name="order_stock">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div
                        class="flex items-center justify-end p-6 space-x-2 border-t border-slate-200 rounded-b dark:border-slate-600">
                        <button class="btn inline-flex justify-center text-white bg-info-500">Sifariş et</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
    <script>
        var img_path = '<?= config('constants.view_path') ?>';
    </script>
    <script src="{{ asset('assets/js/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/own/product.js') . $version }}"></script>
    <script src="{{ asset('assets/js/own/operation.js') . $version }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
