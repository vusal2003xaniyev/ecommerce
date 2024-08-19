<?php

namespace App\Repositories;

use App\Repositories\Interfaces\SettingRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Traits\OperationTrait;
use Illuminate\Support\Str;

class SettingRepository implements SettingRepositoryInterface
{
    use OperationTrait;

    public function aboutUsIndex()
    {
        $about = DB::table('about')->where('id', 1)->first();
        return $about;
    }

    public function logoIndex()
    {
        $images = DB::table('settings')->first();
        return $images;
    }

    public function aboutUsEdit($data)
    {
        $image = $this->imageEdit('settings', $data['image'] ?? null, $data['oldimage']);
        $add = DB::table('about')->where('id', 1)->update(
            [
                'title' => $data['title'],
                'image' => $image,
                'description' => $data['description'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        );
        return $add ? true : false;
    }

    public function logoEdit($data)
    {
        $logo_image = $this->imageEdit('settings', $data['logo_image'] ?? null, $data['old_logo_image']);
        $favicon_image = $this->imageEdit('settings', $data['favicon_image'] ?? null, $data['old_favicon_image']);
        $add = DB::table('settings')->where('id', 1)->update(
            [
                'logo' => $logo_image,
                'favicon' => $favicon_image,
            ]
        );
        return $add ? true : false;
    }


    public function generalData()
    {
        $about = DB::table('settings')->first();
        return $about;
    }

    public function seoData()
    {
        $seo = DB::table('seo')->where('id', 1)->first();
        return $seo;
    }

    public function sosialMediaEdit($data)
    {

        $add = DB::table('settings')->where('id', 1)->update(

            [
                'instagram' => $data['instagram'],
                'telegram' => $data['telegram'],
                'facebook' => $data['facebook'],
                'linkedin' => $data['linkedin'],
                'youtube' => $data['youtube'],
                'tiktok' => $data['tiktok'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        );
        return $add ? true : false;
    }

    public function contactDataEdit($data)
    {
        $add = DB::table('settings')->where('id', 1)->update(
            [
                'email' => $data['email'],
                'phones' => $data['phones'],
                'address' => $data['address'],
                'address_link' => $data['address_link'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        );
        return $add ? true : false;
    }

    public function seoDataEdit($data)
    {
        $add = DB::table('seo')->where('id', 1)->update(
            [
                'title' => $data['title'],
                'seo_title' => $data['seo_title'],
                'seo_description' => $data['seo_description'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        );
        return $add ? true : false;
    }
}
