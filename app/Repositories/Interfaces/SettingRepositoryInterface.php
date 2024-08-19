<?php
namespace App\Repositories\Interfaces;

Interface SettingRepositoryInterface{

    public function aboutUsIndex();
    public function aboutUsEdit($data);
    public function generalData();
    public function seoData();
    public function sosialMediaEdit($data);
    public function contactDataEdit($data);
    public function seoDataEdit($data);
    public function logoEdit($data);
    public function logoIndex();
}
