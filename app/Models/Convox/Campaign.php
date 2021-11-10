<?php

namespace App\Models\Convox;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CourseCampaign;

class Campaign extends Model
{
    use HasFactory;
    public function courseCampaign(){
        return $this->hasMany(CourseCampaign::class);
    } 
}
