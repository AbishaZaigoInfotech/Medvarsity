<?php

namespace App\Models\Crm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CourseCampaign;
use App\Models\Convox\Campaign;

class Course extends Model
{
    use HasFactory;
    
    public function courseCampaign(){ 
        return $this->hasMany(CourseCampaign::class);
    }

    public function campaign(){ 
        return $this->hasMany(Campaign::class);
    }
}
