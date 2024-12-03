<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class CellPhone extends Model
{
    //
    use HasFactory;
    // Specify the table name
    protected $table = 'cell_phone';
    // Allow mass assignment for these fields
    protected $fillable = ['file_name', 'file_path'];
}
