<?php

namespace App\Http\Traits;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Telegram\Bot\FileUpload\InputFile;
use Telegram\Bot\Laravel\Facades\Telegram;

trait OperationTrait
{
    public function changeStatus($request, $table)
    {
        $data = DB::table($table)
            ->where('general_key', $request->id)
            ->update([
                'status' => $request->status,
                'updated_at' => date('Y-m-d H:i:s')
            ]);

        return response()->json([
            'success' => $data ? true : false,
            'status' => $data ? $request->status : null,
        ]);
    }

    public function changeStatusIdConfirm($request, $table)
    {
        $data = DB::table($table)
            ->where('id', $request->id)
            ->update([
                'status_moderator' => $request->status,
                'updated_at' => date('Y-m-d H:i:s')
            ]);

        return response()->json([
            'success' => $data ? true : false,
            'status' => $data ? $request->status : null,
        ]);
    }

    public function changePostsConfirmStatus($request)
    {
        $data = DB::table('posts')
            ->where('general_key', $request->general_key)
            ->update([
                'confirm_status' => $request->confirm_status,
                'status' => $request->confirm_status == '2' ? '0' : DB::raw('status'),
                'rejected_reason' => $request->confirm_status != '2' ? null : DB::raw('rejected_reason'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);

        $post = DB::table('posts')->where('general_key', $request->general_key)->first();
        $this->all_point_calculate($post->author_id);

        return response()->json([
            'success' => $data ? true : false,
            'confirm_status' => $data ? $request->confirm_status : null,
        ]);
    }

    public function changeStatusId($request, $table)
    {
        $data = DB::table($table)
            ->where('id', $request->id)
            ->update([
                'status' => $request->status,
                'updated_at' => date('Y-m-d H:i:s')
            ]);

        return response()->json([
            'success' => $data ? true : false,
            'status' => $data ? $request->status : null,
        ]);
    }

    public function Delete($table, $id)
    {
        $deleted = DB::table($table)
            ->where('general_key', $id)
            ->delete();

        return redirect()->back()->with($deleted ? 'deleteSuccess' : 'error', true);
    }
    public function deleteId($table, $id)
    {
        $deleted = DB::table($table)
            ->where('id', $id)
            ->delete();

        return redirect()->back()->with($deleted ? 'deleteSuccess' : 'error', true);
    }
    public function imageAdd($path, $file)
    {
        if ($file != null) {
            $photo = fopen($file, 'r');
            $name = $file->getClientOriginalName();
            $response = Http::withHeaders([
                'X-Static-Token' => config('constants.x_static_token'),
            ])->attach('image', $photo, $name)->post(config('constants.file_upload_path'), ['path' => $path]);
            $statusCode = $response->getStatusCode();
            $responseBody = $response->getBody()->getContents();
            $responseData = json_decode($responseBody, true);
            if ($statusCode === 200) {
                return $responseData['fileName'];
            }
        }
        return null;
    }
    public function imageEdit($path, $file, $oldimage)
    {
        if ($file != null) {
            return $this->imageAdd($path, $file,);
        }
        return $oldimage;
    }

    public function languages()
    {
        $languages = DB::table('langs')
            ->where('status', '1')
            ->get();
        return $languages;
    }
    public function viewModal($request, $table)
    {
        $data = DB::table($table)->where('id', $request->id)->first();
        return response()->json([
            'success' => $data ? true : false,
            'data' => $data ?? null,
        ]);
    }
    public function all_point_calculate($author_id)
    {
        $all_point =  DB::table('post_point')
            ->leftJoin('posts','post_point.post_id','posts.id')
            ->where([['posts.author_id', $author_id],['posts.lang_id', 1],['posts.confirm_status','1'],['posts.status', '1']])
            ->sum('general_point');

        DB::table('author_about')
            ->where([['author_id', $author_id],['lang_id', 1]])
            ->update([
                'all_point' => $all_point,
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        return 1;
    }
    public function getYoutubeVideoIdFromUrl($url)
    {
        if (preg_match('~
            # Match non-linked youtube URL in the wild. (Rev:20130823)
            https?://         # Required scheme. Either http or https.
            (?:[0-9A-Z-]+\.)? # Optional subdomain.
            (?:               # Group host alternatives.
              youtu\.be/      # Either youtu.be,
            | youtube         # or youtube.com or
              (?:-nocookie)?  # youtube-nocookie.com
              \.com           # followed by
              \S*             # Allow anything up to VIDEO_ID,
              [^\w\s-]       # but char before ID is non-ID char.
            )                 # End host alternatives.
            ([\w-]{11})      # $1: VIDEO_ID is exactly 11 chars.
            (?=[^\w-]|$)     # Assert next char is non-ID or EOS.
            (?!               # Assert URL is not pre-linked.
              [?=&+%\w.-]*    # Allow URL (query) remainder.
              (?:             # Group pre-linked alternatives.
                [\'"][^<>]*>  # Either inside a start tag,
              | </a>          # or inside <a> element text contents.
              )               # End recognized pre-linked alts.
            )                 # End negative lookahead assertion.
            [?=&+%\w.-]*        # Consume any URL (query) remainder.
            ~ix',
            $url,
            $matches)
        ) {
            return $matches[1];
        }
        return $url;
    }
}
