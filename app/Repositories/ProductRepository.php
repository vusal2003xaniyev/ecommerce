<?php

namespace App\Repositories;

use App\Repositories\Interfaces\ProductRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Traits\OperationTrait;
use Illuminate\Support\Str;

class ProductRepository implements ProductRepositoryInterface
{
    use OperationTrait;

    public function productIndex()
    {
        $products = DB::table('product')->get();
        return $products;
    }


    public function productAdd($data)
    {
        $add = DB::table('product')->insert(
            [
                'title' => $data['title'],
                'price' => $data['price'],
                'stock' => $data['stock'],
                'description' => $data['description'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        );
        return $add ? true : false;
    }
    public function deleteProduct($id)
    {
        $product = DB::table('product')->where('id', $id)->first();
        if (!$product) {
            return redirect()->back()->with('error', 'Məhsul tapılmadı');
        }
        $deleted = DB::table('product')->where('id', $id)->delete();
        return redirect()->back()->with($deleted ? 'deleteSuccess' : 'error', true);
    }
    public function changeStatus($data)
    {
        $data = DB::table('product')->where('id', $data['id'])->update([
            'status' => $data['status']
        ]);
        return response()->json([
            'success' => $data ? true : false
        ]);
    }
    public function editView($data)
    {
        $product = DB::table('product')->where('id', $data['id'])->first();
        return response()->json([
            'success' => $product ? true : false,
            'product' => $product,
        ]);
    }
    public function orderView($data)
    {
        $product = DB::table('product')->where('id', $data['id'])->first();
        return response()->json([
            'success' => $product ? true : false,
            'product' => $product,
        ]);
    }


    public function productEdit($data)
    {


        $edit = DB::table('product')->where('id', $data['id'])->update(
            [
                'title' => $data['title'],
                'price' => $data['price'],
                'stock' => $data['stock'],
                'description' => $data['description'],
                'updated_at' => date('Y-m-d H:i:s')
            ]
        );
        return $edit ? true : false;
    }
    public function productOrder($data)
    {

        $check = DB::table('product')->where([
            ['id', '=', $data['id']],
            ['stock', '>=', $data['order_stock']]
        ])->first();
        if (!$check) {
            return false;
        }
        $add_order = DB::table('orders')->insertGetId(
            [
                'client_id' => Auth::user()->id,
                'client_email' => Auth::user()->email,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        );

        $add_order = DB::table('orderitem')->insert(
            [
                'order_id' => $add_order,
                'product_id' => $data['id'],
                'quantity' => $data['order_stock'],
                'price' => $data['price'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        );


        $edit = DB::table('product')->where('id', $data['id'])->update(
            [
                'stock' => $check->stock - $data['order_stock'],
                'updated_at' => date('Y-m-d H:i:s')
            ]
        );
        return $edit ? true : false;
    }
}
