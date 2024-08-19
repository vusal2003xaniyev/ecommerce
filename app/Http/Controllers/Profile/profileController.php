<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordEdit;
use App\Http\Requests\ProfileAddRequest;
use App\Http\Requests\ProfileEditRequest;
use App\Http\Traits\OperationTrait;
use App\Repositories\Interfaces\ProfileRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;

class profileController extends Controller
{
    use OperationTrait;

    private $profileRepository;

    public function __construct(ProfileRepositoryInterface $profileRepository)
    {
        $this->profileRepository = $profileRepository;
    }

    public function profileIndex()
    {
        $admins = $this->profileRepository->profileIndex();
        View::share([
            'admins' => $admins,
            'user' => Auth::user()
        ]);
        return view('profile.profile');
    }

    public function passwordEdit(PasswordEdit $request)
    {
        try {
            $data = $request->all();
            $profile = $this->profileRepository->passwordEdit($data);
            return redirect()->back()->with($profile ? 'success' : 'error', true);
        } catch (\Exception $e) {
            Log::error('passwordEdit - ' . $e);
            return redirect()->back()->with('error', true);
        }
    }

    public function profileStatus(Request $request)
    {
        return $this->changeStatusId($request, 'users');
    }

    public function profileDelete($id)
    {
        return $this->deleteId('users', $id);
    }

    public function profileAdd(ProfileAddRequest $request)
    {
        try {
            $data = $request->validated();
            $users = $this->profileRepository->profileAdd($data);
            return redirect()->back()->with($users ? 'success' : 'error', true);
        } catch (\Exception $e) {
            Log::error('profileAdd - ' . $e);
            return redirect()->back()->with('error', true);
        }
    }

    public function profileEdit(ProfileEditRequest $request)
    {
        try {
            $data = $request->validated();
            $users = $this->profileRepository->profileEdit($data);
            return redirect()->back()->with($users ? 'success' : 'error', true);
        } catch (\Exception $e) {
            Log::error('profileEdit - ' . $e);
            return redirect()->back()->with('error', true);
        }
    }

    public function profileView(Request $request)
    {
        try {
            return $this->profileRepository->profileView($request);
        } catch (\Exception $e) {
            Log::error('profileView - ' . $e);
            return redirect()->back()->with('error', true);
        }
    }
}
