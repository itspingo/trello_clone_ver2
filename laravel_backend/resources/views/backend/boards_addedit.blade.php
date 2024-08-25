@extends('layouts.app')
@section('content')

        {{-- ************************************************
         This file is generated by SNOOBIX on Jun 01, 2024
         Please visit snoobix.com for more details
         *********************************************** --}}

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <form action="{{route('backend.boards.'.$submit_path)}}" method="POST" ENCTYPE="multipart/form-data">
                        @csrf
                        <div class="card-header">
                            <div class="row" >
                                <div class="col-3 text-start">
                                    <div class="page-title-box d-flex align-items-center justify-content-between">
                                        <h4 class="card-title">{{ucwords($module_title)}} </h4>
                                    </div>
                                </div>
                                <div class="col-6 text-center">
                                    @if(session('flash_success') != '')
                                        <div class="alert alert-success">{{session('flash_success')}}</div>
                                    @endif
                                    @if(session('flash_failure') != '')
                                        <div class="alert alert-danger">{{session('flash_failure')}}</div>
                                    @endif
                                </div>
                                <div class="col-3 text-end">
                                    <a href="{{route('backend.boards')}}" class="btn btn-info btn-md"  >List Page</a>
                                </div> 
                            </div>
                        </div>
                        <div class="card-body">
                            
                            <div class="row">
                                <div class="col-lg-12">
                                
                                        
                                            <div class="row"> 

                                                    
		<input
			type="hidden"
			id="id"
			name="id"
			value="@if(isset($row->id)) {{ $row->id }} @endif"
		/>
		




		<input
			type="hidden"
			id="user_id"
			name="user_id"
			value="@if(isset($row->user_id)) {{ $row->user_id }} @endif"
		/>
		



<div class="col-md-6 mt-3">
	<div class="form-group">
    <label class="form-label" for="workspace_id">WORKSPACE</label>

@php
    
    if(!Empty($row)){ 
        $selected = $row->workspace_id; 
    }else{
        $selected = '';
    }
    $options = get_list_values('workspaces','title');
    //pre($options);
	//$options = $workspace_id;
 @endphp

		 <select class="form-control" name="workspace_id" id="workspace_id"> 
		   <option value="">--Select--</option>
		   @foreach ($options as $key => $value)
			<option value="{{$key}}" {{($key == $selected) ? 'selected' : '' }}> 
				{{$value}} 
			</option>
		  @endforeach    
		</select>

 </div>
 <div id="diverr_workspace_id" text-danger></div>
</div>


<div class="col-md-6 mt-3">
	<div class="form-group">
		<label class="form-label" for="title">TITLE</label>
		<input
			type="text"
			id="title"
			name="title"
			class="form-control"
			value="@if(isset($row->title)){{$row->title}}@endif"
			
		/>
	</div>
	<div id="diverr_title" text-danger></div>
</div>



<div class="col-md-6 mt-3">
	<div class="form-group">
		<label class="form-label" for="background_color">BACKGROUND COLOR</label>
		<input
			type="color"
			id="background_color"
			name="background_color"
			class="form-control"
			value="@if(isset($row->background_color)){{$row->background_color}}@endif"
			
		/>
	</div>
	<div id="diverr_background_color" text-danger></div>
</div>



<div class="col-md-6 mt-3">
	<div class="form-group">
		<label class="form-label" for="background_image">BACKGROUND IMAGE</label>
		<input
			type="file"
			id="background_image"
			name="background_image"
			class="form-control"
			
			>

			<div>
				@if(isset($row) && !Empty($row))
					<img src="{{url('storage/'.str_replace('public/','',$row->background_image))}}" width="200px" height="250px" />                                                    
				@endif
			</div>

	</div>
	<div id="diverr_background_image" text-danger></div>
</div>


<div class="col-md-6 mt-3">
	<div class="form-group">
    <label class="form-label" for="visibility">VISIBILITY</label>

@php
    
    if(!Empty($row)){ 
        $selected = $row->visibility; 
    }else{
        $selected = '';
    }
    $options = explode(',','Workspace,Private,Public');
    //pre($options);
	//$options = $visibility;
 @endphp

		 <select class="form-control" name="visibility" id="visibility"> 
		   <option value="">--Select--</option>
		   @foreach ($options as $option)
			<option value="{{$option}}" {{($option == $selected) ? 'selected' : '' }}> 
				{{$option}} 
			</option>
		  @endforeach    
		</select>

 </div>
 <div id="diverr_visibility" text-danger></div>
</div>

<div class="col-md-6 mt-3">
	<div class="form-group">
    <label class='form-check-label' for='is_template'></label> &nbsp;&nbsp;
        <div class='form-check'>

            <input class="form-check-input" type="checkbox" name="is_template" id="is_template" value="Y"
            @if(!Empty($row)) 
                @if($row->is_template=='Y')
                    checked="checked" 
                @endif
            @endif
            > 
            <label class='form-check-label' for='is_template'>TEMPLATE</label>

        </div>
        <div id="diverr_is_template" text-danger></div>
    </div>
</div>


<div class="col-md-6 mt-3">
	<div class="form-group">
		<label class="form-label" for="logo">LOGO</label>
		<input
			type="file"
			id="logo"
			name="logo"
			class="form-control"
			
			>

			<div>
				@if(isset($row) && !Empty($row))
					<img src="{{url('storage/'.str_replace('public/','',$row->logo))}}" width="200px" height="250px" />                                                    
				@endif
			</div>

	</div>
	<div id="diverr_logo" text-danger></div>
</div>


<div class="col-md-6 mt-3">
	<div class="form-group">
    <label class="form-label" for="member_ids">MEMBERS</label>
    
    @php
        
        if(!Empty($row)){ 
            $selected = explode(',',$row->member_ids); 
        }else{
            $selected = array();
        }
        $options = get_list_values('users', 'name');
        //$options = $[[list_name]];
    @endphp

    <select class="form-control select2 select2-multiple" multiple="multiple" name="member_ids[]" id="member_ids">
        <!-- <option value="">--Select--</option> -->
        @foreach ($options as $key => $value)
            <option value="{{$key}}" @if(in_array($key,$selected)) selected="selected" @endif > 
                {{$value}} 
            </option>
        @endforeach    
    </select>


    </div>
    <div id="diverr_member_ids" text-danger></div>
</div>

<div class="col-md-6 mt-3">
	<div class="form-group">
    <label class="form-label" for="active">ACTIVE</label>

@php
    
    if(!Empty($row)){ 
        $selected = $row->active; 
    }else{
        $selected = '';
    }
    $options = get_list_values('active_status','is_active');
    //pre($options);
	//$options = $active;
 @endphp

		 <select class="form-control" name="active" id="active"> 
		   <option value="">--Select--</option>
		   @foreach ($options as $key => $value)
			<option value="{{$key}}" {{($key == $selected) ? 'selected' : '' }}> 
				{{$value}} 
			</option>
		  @endforeach    
		</select>

 </div>
 <div id="diverr_active" text-danger></div>
</div>


                                                
                                            </div>
                                            
                                            <input type="hidden" name="continue" id="continue" value="Y" />
                                            <input type="hidden" name="id" id="id" value="@if(isset($row->id)) {{id2str($row->id)}} @endif" />
                                            
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <div class="row " > 
                                <div class="col-md-6 text-start mt-2">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light w-md">Submit</button>
                                </div>
                                <div class="col-md-6 text-end  mt-2">
                                    <button type="reset" class="btn btn-outline-danger waves-effect waves-light w-md">Reset</button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

        </div> 
    </div>


@endsection