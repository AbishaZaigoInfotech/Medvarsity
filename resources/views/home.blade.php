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
                        <h5 style="text-align:center;"><b>CRM Settings</b></h5><br>
                        <form method="POST" action="{{ route('crm.store') }}"  class="form-horizontal" enctype="multipart/form-data" autocomplete="off">
                        @csrf
                            <div class="row">
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="name" class="control-label">Host<small class="text-danger required">*</small></label> 				
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group"> 
                                        <input name="host" type="text" id="host" class="form-control" value="">
                                        @error('host')
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
                                        <label for="name" class="control-label">Port<small class="text-danger required">*</small></label> 				
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group"> 
                                        <input name="port" type="text" id="port" class="form-control" value="">
                                        @error('port')
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
                                        <label for="name" class="control-label">Home Page Url<small class="text-danger required">*</small></label> 				
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group"> 
                                        <input name="homepage_url" type="text" id="homepage_url" class="form-control" value="">
                                        @error('homepage_url')
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
                                        <label for="name" class="control-label">Callback Url<small class="text-danger required">*</small></label> 				
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group"> 
                                        <input name="callback_url" type="text" id="callback_url" class="form-control" value="">
                                        @error('callback_url')
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
                                        <label for="name" class="control-label">Client Id<small class="text-danger required">*</small></label> 				
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group"> 
                                        <input name="client_id" type="text" id="client_id" class="form-control" value="">
                                        @error('client_id')
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
                                        <label for="name" class="control-label">Client Secret<small class="text-danger required">*</small></label> 				
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group"> 
                                        <input name="client_secret" type="text" id="client_secret" class="form-control" value="">
                                        @error('client_secret')
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
                                        <input type="submit" value="Update" class="btn btn-primary">
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
@endsection
