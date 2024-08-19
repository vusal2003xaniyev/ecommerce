<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Traits\OperationTrait;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use Illuminate\Support\Facades\View;
use App\Http\Requests\ProductAdd;
use Illuminate\Support\Facades\Log;
class productController extends Controller
{
    use OperationTrait;
    private $productRepository;
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    public function productIndex()
    {
        $products = $this->productRepository->productIndex();
        View::share([
            'products' => $products
        ]);
        return view('product.product');
    }
    public function productAddPost(ProductAdd $request)
    {
        try {
            $data = $request->all();
            $product = $this->productRepository->productAdd($data);
            return redirect()->back()->with($product ? 'success' : 'error', true);
        } catch (\Exception $e) {
            Log::error('ProductAdd - ' . $e);
            return redirect()->back()->with('error', true);
        }
    }
    public function productDelete($id)
    {
        return $this->productRepository->deleteProduct($id);
    }
    public function changeStatus(Request $request)
    {
        $data = $request->all();
        return $this->productRepository->changeStatus($data);
    }
    public function editView(Request $request)
    {
        $data = $request->all();
        return $this->productRepository->editView($data);
    }
    public function orderView(Request $request)
    {
        $data = $request->all();
        return $this->productRepository->orderView($data);
    }
    public function productEditPost(ProductAdd $request)
    {
        try {
            $data = $request->all();
            $product = $this->productRepository->productEdit($data);
            return redirect()->back()->with($product ? 'success' : 'error', true);
        } catch (\Exception $e) {
            Log::error('ProductAdd - ' . $e);
            return redirect()->back()->with('error', true);
        }
    }
    public function productOrderPost(Request $request)
    {
        try {
            $data = $request->all();
            $product = $this->productRepository->productOrder($data);
            return redirect()->back()->with($product ? 'success' : 'error', true);
        } catch (\Exception $e) {
            Log::error('ProductAdd - ' . $e);
            return redirect()->back()->with('error', true);
        }
    }
}
