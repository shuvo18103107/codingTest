<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttachFile extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'original_file_path',
        'file_name',
        'file_path',
        'file_type',
        'file_size',
        'upload_timestamp',
        'created_at',
        'updated_at',
    ];
}
