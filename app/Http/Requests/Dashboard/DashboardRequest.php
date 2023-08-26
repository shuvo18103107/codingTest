<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class DashboardRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    $rules = [
      'upload_image' => ['required', 'image', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
      'upload_doc' => ['required', 'mimes:pdf,doc,docx', 'max:2048'],
    ];




    return $rules;
  }


  public function messages()
  {
    return [
      'upload_image.required' => 'The Upload Image field is required.',
      'upload_doc.required' => 'The Uplaod Document  field is required',



    ];
  }
}
