<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;



use App\Models\UploadedFile;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{


    public function dashboard()
    {
        // $data['title'] = 'Dashboard';
        // $data['name'] = auth()->user()->name;
        // $data['email'] = auth()->user()->email;
        // $data['image_path'] = auth()->user()->image_path;
        // $timestamps = date('Y-m-d H:i:s', time());
        // // if app_token and signer_id avialable then pass it 
        // // $certificate = Certificate::where('user_id', auth()->user()->id)->latest()->first();
        // // dd($data);
        // $data['uploaded_files'] = UploadedFile::where('uploaded_by', auth()->id())->latest()->get();
        // $data['app_token'] = $certificate->app_token ?? null;
        // $data['timestamps'] = $timestamps ?? '';

        // // dd($data);
        return view('instructor.profile-dashboard', $data);
    }


    public function uploadSignFile(Request $request)
    {
        DB::beginTransaction();
        try {


            $filesystem = new Filesystem();
            $web_path = '/storage/' . auth()->id() . '/';
            $dir_path = public_path($web_path);

            if (!$filesystem->exists($dir_path)) {
                $filesystem->makeDirectory($dir_path, 0755, true);
            }

            $uploadPdf = $request->file('uploadPdf');
            $file_extension = $uploadPdf->getClientOriginalExtension();
            $file_name = time() . '.' . $file_extension;

            $uploadPdf->move($dir_path, $file_name);

            $file = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . auth()->id() . DIRECTORY_SEPARATOR . $file_name;

            // if (function_exists('curl_file_create')) { // php 5.5+
            //     $cFile = curl_file_create($file);
            // } else { // 
            //     $cFile = '@' . realpath($file);
            // }
            // dd($cFile);
            $file_size = filesize($file);
            $file_extension = pathinfo($file, PATHINFO_EXTENSION);
            $file_type = mime_content_type($file);

            $data = [
                'file_name_original' => $uploadPdf->getClientOriginalName(),
                'file_name_generated' => $file_name,
                'file_path' => $web_path,
                'file_type' => $file_type,
                'file_size' => $file_size,
                'is_signed' => 0,
                'meta_data' => '{}',
                'document_hash' => '',
                'uploaded_by' => auth()->id()
            ];
            $doc_name = $uploadPdf->getClientOriginalName();
            // call upload doc api 

            if (function_exists('curl_file_create')) { // php 5.5+
                $cFile = curl_file_create($file);
            } else { // 
                $cFile = '@' . realpath($file);
            }

            $api_key = '997dc568-5d89-4147-a48f-186185b66bc7';
            $api_secret_key = '887dc568-5d89-4147-a48f-186185b66bc7-997dc568-5d89-4147-a48f-186185b66bc9';


            $post = array('APIKEY' => $api_key, 'pdf_doc' => $cFile, 'APISECKEY' => $api_secret_key, 'doc_name' => $doc_name);

            // signatory list must needed to call api
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, env('ESIGNER') . 'sign-embed/upload-doc');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_ENCODING, '');
            curl_setopt($ch, CURLOPT_TIMEOUT, 0);
            curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
            $result = curl_exec($ch);
            curl_close($ch);
            $response = json_decode($result, true);


            if ($response['code'] == 200) {
                $data['name_hash'] = $response['body']['name_hash'];
                $data['doc_uuid'] = $response['body']['doc_uuid'];
                $data['uuid_hash'] = $response['body']['uuid_hash'];
                $data['download_link'] = $response['body']['downloadUrl'];
            } else {
                return redirect()->back()->with('error', 'File Upload Error!');
            }
            // dd($response);
        } catch (\Exception $exception) {
            \Log::error($exception);
            dd($exception);
            DB::rollBack();
            return redirect()->back()->with('error', 'Problem: ' . $exception->getMessage());
        }
        UploadedFile::create($data);

        DB::commit();
        $this->showToastrMessage('success', 'Upload Successfull');
        return redirect()->back();
    }
}
