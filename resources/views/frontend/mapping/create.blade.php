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
                        <form method="POST" action="{{ route('map.store') }}"  class="form-horizontal" enctype="multipart/form-data" autocomplete="off">
                        @csrf
                            <div class="row">
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="campaign" class="control-label">Campaign<small class="text-danger required">*</small></label> 				
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group"> 
                                        <select name="campaign" id="campaign" class="form-control">
                                        @foreach($campaigns as $campaign)
                                            <option class="caps" value="{{$campaign->id}}" @if (old('campaign') == "$campaign->id") selected="selected" @endif>{{$campaign->campaign_name}}</option>
                                        @endforeach
                                        </select>
                                        @error('campaign')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror 							
                                    </div>
                                </div>
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="course" class="control-label">Course<small class="text-danger required">*</small></label> 				
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group"> 
                                        <select multiple="multiple" id="course" class="form-control course chosen" name="course[]">
                                            @foreach($courses as $course)
                                            <option class="fcaps" value="{{ $course->id }}" 
                                                {{ (collect(old('course'))->contains($course->id)) ? 'selected' : ''}}>
                                                {{ $course->course_name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('course')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror 							
                                    </div>
                                </div>
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-4" style="margin-left:160px;margin-top:30px;">
                                    <div class="form-group">
                                        <input type="submit" value="Create" class="btn btn-primary">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.7.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js" defer></script>	
<script> 
    document.getElementById("mySidenav").style.width = "250px";
    $(document).ready(function() {
        $("#course").select2();
    });  
</script>
@endsection
