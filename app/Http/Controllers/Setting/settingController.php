<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactData;
use App\Http\Requests\LogoEdit;
use App\Http\Requests\SeoData;
use App\Http\Requests\SosialMedia;
use App\Http\Traits\OperationTrait;
use App\Repositories\Interfaces\SettingRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;

class settingController extends Controller
{
    use OperationTrait;

    private $settingRepository;

    public function __construct(SettingRepositoryInterface $settingRepository)
    {
        $this->settingRepository = $settingRepository;
    }

    public function aboutUsIndex()
    {
        $about = $this->settingRepository->aboutUsIndex();
        View::share([
            'about' => $about
        ]);
        return view('about.about-us');
    }

    public function logoIndex()
    {
        $images = $this->settingRepository->logoIndex();
        View::share([
            'images' => $images,
        ]);
        return view('settings.logo');
    }

    public function aboutUsEdit(Request $request)
    {
        try {
            $data = $request->all();
            $about = $this->settingRepository->aboutUsEdit($data);
            return redirect()->back()->with($about ? 'success' : 'error', true);
        } catch (\Exception $e) {
            Log::error('aboutUsEdit - ' . $e);
            return redirect()->back()->with('error', true);
        }
    }

    public function generalDataIndex()
    {
        $generalData = $this->settingRepository->generalData();
        $seoData = $this->settingRepository->seoData();
        View::share([
            'generalData' => $generalData,
            'seoData' => $seoData
        ]);
        return view('settings.general-data');
    }
    

    public function sosialMediaEdit(SosialMedia $request)
    {
        try {
            $data = $request->all();
            $sosail = $this->settingRepository->sosialMediaEdit($data);
            return redirect()->back()->with($sosail ? 'success' : 'error', true);
        } catch (\Exception $e) {
            Log::error('sosialMediaEdit - ' . $e);
            return redirect()->back()->with('error', true);
        }
    }

    public function logoEdit(LogoEdit $request)
    {
        try {
            $data = $request->all();
            $images = $this->settingRepository->logoEdit($data);
            return redirect()->back()->with($images ? 'success' : 'error', true);
        } catch (\Exception $e) {
            Log::error('logoEdit - ' . $e);
            return redirect()->back()->with('error', true);
        }
    }

    public function contactDataEdit(ContactData $request)
    {
        try {
            $data = $request->all();
            $contact = $this->settingRepository->contactDataEdit($data);
            return redirect()->back()->with($contact ? 'success' : 'error', true);
        } catch (\Exception $e) {
            Log::error('contactDataEdit - ' . $e);
            return redirect()->back()->with('error', true);
        }
    }

    public function seoDataEdit(SeoData $request)
    {
        try {
            $data = $request->all();
            $seo = $this->settingRepository->seoDataEdit($data);
            return redirect()->back()->with($seo ? 'success' : 'error', true);
        } catch (\Exception $e) {
            Log::error('seoDataEdit - ' . $e);
            return redirect()->back()->with('error', true);
        }
    }
}
