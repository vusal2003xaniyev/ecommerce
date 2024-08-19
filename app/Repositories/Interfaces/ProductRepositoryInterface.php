<?php

namespace App\Repositories\Interfaces;

interface ProductRepositoryInterface
{

    public function productIndex();
    public function productAdd($data);
    public function deleteProduct($id);
    public function changeStatus($data);
    public function editView($data);
    public function orderView($data);
    public function productEdit($data);
    public function productOrder($data);





}
