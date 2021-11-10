<?php

namespace App\Http\Controllers\Frontend\CrmConvox;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Crm\Course;
use App\Models\Convox\Campaign;
use App\Models\CourseCampaign;
use App\Http\Requests\MapRequest;

class Mapping extends Controller
{
    //
    public function index()
    {
        $courseCampaigns = CourseCampaign::all();
        $courses = Course::all();
        $campaigns = Campaign::with('courseCampaign')->get();
        return view('frontend.mapping.index', compact('campaigns', 'courseCampaigns', 'courses'));
    }

    public function create()
    {
        $campaigns = Campaign::get();
        $courses = Course::get();
        return view('frontend.mapping.create', compact('campaigns', 'courses'));
    }

    public function store(MapRequest $request)
    {
        $courseCampaign = new CourseCampaign;
        if (!empty($request->campaign) && !empty($request->course)) {
            $count = count($request->course);
            $indexes = array_keys($request->course);
            for ($i = 0; $i < $count; $i++) {
                $index = $indexes[$i];
                $courseCampaigns[] = [
                    'campaign_id' => $request->campaign,
                    'course_id' => $request->course[$index],
                    'created_at' => date('Y-m-d H:i:s'),
                ];
            }
            CourseCampaign::insert($courseCampaigns);
            return redirect()->route('map.index')->withSuccess('Campaign to Course mapped successfully.');
        }
    }

}
