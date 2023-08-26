<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\DashboardRequest;
use App\Services\DashboardServices;
use App\Models\AttachFile;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use Illuminate\View\View;


class DashboardController extends Controller
{

    public function dashboard(): View
    {
        $data = [
            'title' => 'Dashboard',
            'name' => Auth::user()->name,
            'email' => Auth::user()->email,
            'uploaded_files' => AttachFile::where('user_id', Auth::id())->latest()->get(),
        ];

        return view('dashboard.dashboard', $data);
    }
    public function processDocument(DashboardRequest $request, DashboardServices $dashboardServices)
    {
        DB::beginTransaction();
        try {
            $userId = auth()->id();
            $uploadLimit = config('constant.upload_limit');
            $uploadTimeFrame = config('constant.upload_time_frame');
            $blockTime = config('constant.block_time');

            // Set server timezone to Dhaka
            date_default_timezone_set('Asia/Dhaka');
            $currentLocalTime = time();

            $user = User::find($userId);

            if ($user->is_blocked == 1) {
                if ($currentLocalTime >= strtotime($user->blocked_until)) {
                    // Unblock the user if the block time has passed
                    $user->is_blocked = 0;
                    $user->blocked_until = null;
                    $user->save();
                } else {
                    // Get block session and return
                    $blockExpireTime = date('h:i A', $user->block_expire_time);
                    showToastrMessage('error', 'You have exceeded the upload limit. Please try again after ' . $blockExpireTime);
                    return redirect()->back();
                }
            }

            $startTrackingTime = $currentLocalTime - $uploadTimeFrame;
            $uploadCount = AttachFile::where('user_id', $userId)
                ->where('upload_timestamp', '>', date('Y-m-d H:i:s', $startTrackingTime))
                ->count();

            if ($uploadCount >= $uploadLimit) {
                $user->block_expire_time = null;

                // Block the user if they exceed the upload limit within the time frame
                $user->is_blocked = 1;
                $user->blocked_until = date('Y-m-d H:i:s', $currentLocalTime + $blockTime);

                $blockEndTime = $currentLocalTime + $blockTime;
                $blockEndTimeDhaka = date('h:i A', $blockEndTime);

                // Set block_expire_time to display the time when the block will expire
                $user->block_expire_time = $blockEndTime;
                $user->save();

                showToastrMessage('error', 'You have exceeded the upload limit. Please try again after ' . $blockEndTimeDhaka);
                return redirect()->back();
            }


            $uploadDoc = $request->file('upload_doc');

            if ($uploadDoc) {
                $extension = $uploadDoc->getClientOriginalExtension();
                if ($extension === 'pdf') {
                    $dashboardServices->processPdfUpload($request);
                } elseif (in_array($extension, ['doc', 'docx'])) {
                    $dashboardServices->processDocUpload($request);
                }
            }

            DB::commit();
            showToastrMessage('success', 'Upload Successful');
            return redirect()->back();
        } catch (\Exception $exception) {
            DB::rollback();
            Log::error($exception);
            return redirect()->back()->with('error', 'Problem: ' . $exception->getMessage());
        }
    }
  
}
