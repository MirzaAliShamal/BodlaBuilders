<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectType extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'type',
    ];

    public function project()
    {
        return $this->belongsTo('App\Models\Project');
    }
}
