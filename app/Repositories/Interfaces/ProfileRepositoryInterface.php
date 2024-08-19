<?php
namespace App\Repositories\Interfaces;

Interface ProfileRepositoryInterface{

    public function profileIndex();

    public function passwordEdit($data);

    public function profileAdd($data);

    public function profileEdit($data);

    public function profileView($data);
}
