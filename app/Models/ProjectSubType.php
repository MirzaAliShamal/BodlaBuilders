<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectSubType extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'type',
        'subtype',
    ];

    public function project()
    {
        return $this->belongsTo('App\Models\Project');
    }
}
