<?php

namespace App\Repositories;

use App\Repositories\Interfaces\ProfileRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Traits\OperationTrait;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProfileRepository implements ProfileRepositoryInterface
{
    use OperationTrait;

    public function profileIndex()
    {
        $admins = DB::table('users')
            ->where([['id','!=',Auth::user()->id],['role','!=','0']])
            ->orderBy('id','DESC')
            ->get();
        return $admins;
    }

    public function profileView($data)
    {
            $data  = DB::table('users')->where('id' ,$data->id)->first();
            return response()->json([
                'success' => $data ? true : false,
                'user' => $data ?? null ,
            ]);

    }
    public function passwordEdit($data)
    {
                DB::table('users')->where('id',Auth::user()->id)->update(
                    [
                        'password' => Hash::make($data['password']),
                        'updated_at' => date('Y-m-d H:i:s'),
                    ]);
            return true;
    }

    public function profileAdd($data) {
     DB::table('users')->insert([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'role' => $data['role'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
            return true;
    }

    public function profileEdit($data) {
            DB::table('users')->where('id',$data['id'])->update([
                'name' => $data['name'],
                'role' => $data['role'],
            ]);
            return true;
    }
}
