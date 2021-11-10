@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-2">
        </div>
        <div class="col-10" style="margin-left:220px;">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="card-body">
                        <h5 style="text-align:center;"><b>Course to Campaign Mapping</b></h5><br>
                        <!-- start success message -->
                        @if (session('success'))
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                {{ session('success') }}          
                            </div>
                        @endif	
                        <!-- end success message -->
                        <!-- start error message -->
                        @if (session('error'))				
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                {{ session('error') }}
                            </div>
                        @endif					
				        <!-- end error message -->	
                        <div class="col-md-2 pad-0">
                            <a href="{{ route('map.create') }}" title="Create mapping" class="btn btn-primary btn-sm"><i aria-hidden="true" class="fa fa-plus"></i> Create
                            </a>
                        </div>
                        
                        <br> <br> 
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Campaign</th>
                                        <th>Courses</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($campaigns as $campaign)
                                    <tr>
                                        <td>{{$campaign->campaign_name}}</td>
                                        <td>
                                        @foreach($courseCampaigns as $coursecampaign)
                                            @if($campaign->id == $coursecampaign->campaign_id)
                                                @foreach($courses as $course)
                                                    @if($course->id == $coursecampaign->course_id)
                                                    {{$course->course_name}}<br>
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endforeach
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>                    
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
     document.getElementById("mySidenav").style.width = "250px";
</script>
@endsection