<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveForm extends Model
{
    use HasFactory;
    // Specify the table name
    protected $table = 'leave_form';
    // Allow mass assignment for these fields
    protected $fillable = ['file_name', 'file_path'];
}
