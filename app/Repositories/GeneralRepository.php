<?php

namespace App\Repositories;

use App\Mail\SendMail;
use App\Repositories\Interfaces\GeneralRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Traits\OperationTrait;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class GeneralRepository implements GeneralRepositoryInterface
{
    use OperationTrait;

    public function contactIndex()
    {
        return DB::table('contact')->latest()->get();
    }

    public function viewAnswer($id)
    {
        $data = DB::table('contact')->where('id', $id)->first();
        return response()->json([
            'success' => $data ? true : false,
            'contact' => $data ?? null
        ]);
    }

    public function contactStatusChange($data)
    {
        DB::table('contact')
            ->where('id', $data['id'])
            ->update([
                'status' => $data['status'],
            ]);
        return response()->json([
            'success' => $data ? true : false,
        ]);
    }

    public function sendAnswer($data)
    {
        DB::table('contact')
            ->where('id', $data['id'])
            ->update(['answer' => $data['answer_message']]);
        $user = DB::table('contact')->where('id', $data['id'])->first();
        $mailData = [
            'name' => $user->fullname,
            'date' => $user->created_at,
            'answer' => $user->answer,
            'message' => $user->message,
            'subject' => 'Wikisun cavab bildirişi',
            'view' => 'email.answer-text',
        ];
        Mail::to($user->email)->send(new SendMail($mailData));
        return response()->json([
            'success' => $data ? true : false,
        ]);
    }
}
