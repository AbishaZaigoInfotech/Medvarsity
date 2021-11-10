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
                        @if($setting != null)
                            <a href="{{ route('crm.edit') }}" title="Edit CRM" class="btn btn-primary btn-sm"><i aria-hidden="true" class="fa fa-pencil-square-o"></i> Edit
                            </a>
                        @else
                            <a href="{{ route('crm.edit') }}" title="Create CRM" class="btn btn-primary btn-sm"><i aria-hidden="true" class="fa fa-plus"></i> Create
                            </a>
                        @endif
                        </div>
                        
                        <br> <br> 
                        @if($setting != null)
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th>Port</th>
                                    <td>{{$setting->port}}</td>
                                </tr>
                                <tr>
                                    <th>IP Address</th>
                                    <td>{{$setting->ip_address}}</td>
                                </tr>
                                <tr>
                                    <th>Homepage Url</th>
                                    <td>{{$setting->homepage_url}}</td>
                                </tr>
                                <tr>
                                    <th>Callback Url</th>
                                    <td>{{$setting->callback_url}}</td>
                                </tr>
                                <tr>
                                    <th>Client Id</th>
                                    <td>{{$setting->client_id}}</td>
                                </tr>
                                <tr>
                                    <th>Client Secret Key</th>
                                    <td>{{$setting->client_secret}}</td>
                                </tr>
                                <tr>
                                    <th>Grant Token</th>
                                    <td>{{$setting->grant_token}}</td>
                                </tr>
                                <tr>
                                    <th>Access Token</th>
                                    <td>{{$setting->access_token}}</td>
                                </tr>
                                <tr>
                                    <th>Refresh Token</th>
                                    <td>{{$setting->refresh_token}}</td>
                                </tr>
                                <tr>
                                    <th>Session Timeout</th>
                                    <td>{{$setting->session_timeout}}</td>
                                </tr>
                                <tr>
                                    <th>Frequency</th>
                                    <td>{{$setting->frequency}}</td>
                                </tr>
                            </table>
                        </div>
                        @else
                        <p>No Data Found!
                        @endif
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