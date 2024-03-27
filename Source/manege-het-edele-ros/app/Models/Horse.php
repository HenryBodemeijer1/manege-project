<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horse extends Model
{
    use HasFactory;

    protected $table = 'paarden';

    protected $primaryKey = 'id';
    
    protected $fillable = [
        'naam',
        'geslacht',
        'tamheid'
    ];

    protected $hidden = [];
    
}
