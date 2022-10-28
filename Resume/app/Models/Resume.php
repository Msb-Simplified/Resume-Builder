<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    use HasFactory;
    protected $table = "resumes";

    public $timestamps = false;
    
    public function resumebelongstouser()
    {
       return $this->belongsTo(User::class);
    }

    
    public function skillsrelation()
    {
       return $this->hasMany(Skill::class,'resume_id','id');
    }

}
