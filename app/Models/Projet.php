<?php

namespace App\Models;

use App\Models\task as ModelsTask;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    use HasFactory;
    protected $fillable=['name','description','start_date','end_date'];

    public function tasks() {
        return $this->hasMany(ModelsTask::class);
    }
    
}
