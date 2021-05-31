<?php

namespace App\Models;

use App\Models\Task;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Checklist extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'checklist_group_id'
    ];


    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

}
