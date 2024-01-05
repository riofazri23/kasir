<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diskon extends Model
{
    use HasFactory;

    protected $table = 'tbl_diskon';
    protected $fillable = [
        'total_belanja',
        'diskon',
    ];

    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'updated_date';
    public $timestamps = false;
}
