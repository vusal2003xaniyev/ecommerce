<?php
namespace App\Repositories\Interfaces;

Interface GeneralRepositoryInterface{

    public function contactIndex();
    public function contactStatusChange($data);
    public function viewAnswer($id);
    public function sendAnswer($data);


}
