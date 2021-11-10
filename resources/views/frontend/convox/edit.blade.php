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
                        <h5 style="text-align:center;"><b>Convox Settings</b></h5><br>
                        <form method="POST" action="{{ route('convox.update') }}"  class="form-horizontal" enctype="multipart/form-data" autocomplete="off">
                        @csrf
                            <div class="row">
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="name" class="control-label">Port<small class="text-danger required">*</small></label> 				
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group"> 
                                        <input name="port" type="text" id="port" class="form-control" <?php if($setting != null){ ?> value="{{ old('port', $setting->port)}}" <?php }else{ ?> value="{{ old('port')}}" <?php } ?>>
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
                                        <label for="name" class="control-label">IP Address<small class="text-danger required">*</small></label> 				
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group"> 
                                        <input name="ip_address" type="text" id="ip_address" class="form-control" <?php if($setting != null){ ?> value="{{ old('ip_address', $setting->ip_address)}}" <?php }else{ ?> value="{{ old('ip_address')}}" <?php } ?>>
                                        @error('ip_address')
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
                                        <input name="homepage_url" type="text" id="homepage_url" class="form-control" <?php if($setting != null){ ?> value="{{ old('homepage_url', $setting->homepage_url)}}" <?php }else{ ?> value="{{ old('homepage_url')}}" <?php } ?>>
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
                                        <input name="callback_url" type="text" id="callback_url" class="form-control" <?php if($setting != null){ ?> value="{{ old('callback_url', $setting->callback_url)}}" <?php }else{ ?> value="{{ old('callback_url')}}" <?php } ?>>
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
                                        <input name="client_id" type="text" id="client_id" class="form-control" <?php if($setting != null){ ?> value="{{ old('client_id', $setting->client_id)}}" <?php }else{ ?> value="{{ old('client_id')}}" <?php } ?>>
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
                                        <input name="client_secret" type="text" id="client_secret" class="form-control" <?php if($setting != null){ ?> value="{{ old('client_secret', $setting->client_secret)}}" <?php }else{ ?> value="{{ old('client_secret')}}" <?php } ?>>
                                        @error('client_secret')
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
                                        <label for="name" class="control-label">Access Token<small class="text-danger required">*</small></label> 				
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group"> 
                                        <input name="access_token" type="text" id="access_token" class="form-control" <?php if($setting != null){ ?> value="{{ old('access_token', $setting->access_token)}}" <?php }else{ ?> value="{{ old('access_token')}}" <?php } ?>>
                                        @error('access_token')
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
                                        <label for="name" class="control-label">Session Timeout<small class="text-danger required">*</small></label> 				
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group"> 
                                        <input name="session_timeout" type="text" id="session_timeout" class="form-control" <?php if($setting != null){ ?> value="{{ old('session_timeout', $setting->session_timeout)}}" <?php }else{ ?> value="{{ old('session_timeout')}}" <?php } ?>>
                                        @error('session_timeout')
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
                                        <label for="name" class="control-label">Frequency<small class="text-danger required">*</small></label> 				
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group"> 
                                        <input name="frequency" type="text" id="frequency" class="form-control" <?php if($setting != null){ ?> value="{{ old('frequency', $setting->frequency)}}" <?php }else{ ?> value="{{ old('frequency')}}" <?php } ?>>
                                        @error('frequency')
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
                                    @if($setting != null)
                                        <input type="submit" value="Update" class="btn btn-primary">
                                    @else
                                        <input type="submit" value="Create" class="btn btn-primary">
                                    @endif
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
<script>
     document.getElementById("mySidenav").style.width = "250px";
</script>
@endsection
