<?php

namespace App\Services;

use App\Http\Requests\Dashboard\DashboardRequest;
use App\Models\AttachFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpWord\TemplateProcessor;
use setasign\Fpdi\Fpdi;

class DashboardServices
{

  public function processPdfUpload(DashboardRequest $request)
  {

    try {
      $uploadPdf = $request->file('upload_doc');
      $uploadImage = $request->file('upload_image');
      $x_axis_image = $request->x_axis_image ?? 0;
      $y_axis_image = $request->y_axis_image ?? 0;
      $set_text = $request->set_text;
      $x_axis_text = $request->x_axis_text ?? 0;
      $y_axis_text = $request->y_axis_text ?? 0;

      // Save the original document
      $originalDocumentPath = '/storage/' . auth()->id() . '/';
      $file_extension = $uploadPdf->getClientOriginalExtension();
      $file_name = $uploadPdf->getClientOriginalName();
      $originalFileName = time() . '_original.' . $file_extension;

      Storage::putFileAs('public/' . auth()->id(), $uploadPdf, $originalFileName);


      $pdf = new Fpdi();


      $pdf->AddPage();


      $pdf->setSourceFile($uploadPdf->getRealPath());


      $tplIdx = $pdf->importPage(1);
      $pdf->useTemplate($tplIdx);

      // Embed image if provided
      if ($uploadImage) {

        $copiedImageName = time() . '_' . auth()->id() . '.' . $uploadImage->getClientOriginalExtension();


        $destinationDirectory = storage_path('app/public/' . auth()->id());


        if (!is_dir($destinationDirectory)) {
          mkdir($destinationDirectory, 0755, true);
        }


        $destinationPath = $destinationDirectory . '/' . $copiedImageName;


        copy($uploadImage->getRealPath(), $destinationPath);


        $pdf->Image($destinationPath, $x_axis_image, $y_axis_image);
        unlink($destinationPath);
      }

      // Embed text if provided
      if ($set_text) {
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->SetXY($x_axis_text, $y_axis_text);
        $pdf->Cell(0, 10, $set_text, 0, 1, 'L');
      }

      // Generate unique filename
      $processedFileName = time() . '_' . auth()->id() . '.' . $file_extension;


      $outputPath = storage_path('app/public/' . auth()->id() . '/' . $processedFileName);
      $pdf->Output($outputPath, 'F');
      date_default_timezone_set('Asia/Dhaka');

      $currentTime = date('Y-m-d H:i:s');
      // Save details in AttachFile model
      $fileSize = filesize($outputPath);
      $attachFile = new AttachFile();
      $attachFile->file_name = $file_name;
      $attachFile->original_file_path = $originalDocumentPath . $originalFileName;
      $attachFile->file_path = '/storage/' . auth()->id() . '/' . $processedFileName;
      $attachFile->file_size = $fileSize;
      $attachFile->user_id = auth()->id();
      $attachFile->upload_timestamp = date('Y-m-d H:i:s'); // Convert time to datetime format

      $attachFile->save();
    } catch (\Exception $exception) {


      DB::rollback();
      Log::error($exception);
      return redirect()->back()->with('error', 'Problem: ' . $exception->getMessage());
    }
  }
  public function processDocUpload(DashboardRequest $request)
  {

    try {
      $uploadDoc = $request->file('upload_doc');
      $uploadImage = $request->file('upload_image');
      $x_axis_image = $request->x_axis_image ?? 0;
      $y_axis_image = $request->y_axis_image ?? 0;

      // Save the original document
      $originalDocumentPath = '/storage/' . auth()->id() . '/';
      $doc_extension = $uploadDoc->getClientOriginalExtension();
      $originalDocName = time() . '_original.' . $doc_extension;

      // Store the original document
      Storage::putFileAs('public/' . auth()->id(), $uploadDoc, $originalDocName);

      // Load the original template
      $templatePath = storage_path('app/public/' . auth()->id() . '/' . $originalDocName);
      $templateProcessor = new TemplateProcessor($templatePath);

      // Embed image if provided
      if ($uploadImage) {
        // Save the image to a temporary location
        $tempImagePath = storage_path('app/public/' . auth()->id() . '/' . uniqid('img_') . '.png');
        $uploadImage->move(storage_path('app/public/' . auth()->id()), basename($tempImagePath));

        // Convert inches to twips (1 inch = 1440 twips)
        $x_position_twips = $x_axis_image * 1440;
        $y_position_twips = $y_axis_image * 1440;

        // Add the image to the template
        $templateProcessor->addImage(
          $tempImagePath,
          array(
            'width' => 200, // Set the image width
            'height' => 200, // Set the image height
            'marginLeft' => $x_position_twips,
            'marginTop' => $y_position_twips,
            'alignment' => 'center'
          )
        );

        // Remove the temporary image
        unlink($tempImagePath);
      }

      // Save the processed document
      $processedDocName = time() . '_' . auth()->id() . '_processed.docx';
      $processedDocPath = storage_path('app/public/' . auth()->id() . '/' . $processedDocName);
      $templateProcessor->saveAs($processedDocPath);

      // Save details in AttachFile model
      $fileSize = filesize($processedDocPath);
      $attachFile = new AttachFile();
      $attachFile->file_name = $processedDocName;
      $attachFile->original_file_path = $originalDocumentPath . $originalDocName;
      $attachFile->file_path = '/storage/' . auth()->id() . '/' . $processedDocName;
      $attachFile->file_size = $fileSize;
      $attachFile->user_id = auth()->id();
      $attachFile->save();
    } catch (\Exception $exception) {
      DB::rollback();
      Log::error($exception);
      return redirect()->back()->with('error', 'Problem: ' . $exception->getMessage());
    }
  }
}
