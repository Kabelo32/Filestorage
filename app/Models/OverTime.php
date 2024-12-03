<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OverTime extends Model
{
    use HasFactory;
    // Specify the table name
    protected $table = 'over_time';

    protected $fillable = ['file_name', 'file_path'];
}
