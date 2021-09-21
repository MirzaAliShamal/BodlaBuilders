<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DhaProperty extends Model
{
    use HasFactory;

    protected $fillable = [
        'sector',
        'plot',
        'charges',
        'name',
        'contact',
        'demand',
        'description',
    ];
}
