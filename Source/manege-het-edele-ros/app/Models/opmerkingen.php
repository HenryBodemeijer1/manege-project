<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class opmerkingen extends Model
{
    use HasFactory;

    /**
     * @var array<string, int>
     */
    protected $fillable = [
        'opmerking',
        'lessen_id',
        'user_id'
    ];

    protected $table = 'opmerkingen';
}
