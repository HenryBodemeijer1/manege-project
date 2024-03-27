<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use mysql_xdevapi\Table;

class lessen extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'lesdoel',
        'onderwerp',
        'datetime',
        'instructeur_id'
    ];

    protected $table = 'lessen';
}
