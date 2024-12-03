<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerfomanceAppraisal extends Model
{
    //use HasFactory;
    // Specify the table name
    protected $table = 'advanced_request';

    protected $fillable = ['file_name', 'file_path'];
}

