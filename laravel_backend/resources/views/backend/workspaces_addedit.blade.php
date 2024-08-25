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
                        <form action="{{route('backend.workspaces.'.$submit_path)}}" method="POST" ENCTYPE="multipart/form-data">
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
                                    <a href="{{route('backend.workspaces')}}" class="btn btn-info btn-md"  >List Page</a>
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
		



<div class="col-md-6 mt-3">
	<div class="form-group">
    <label class="form-label" for="user_id">USER</label>

@php
    
    if(!Empty($row)){ 
        $selected = $row->user_id; 
    }else{
        $selected = '';
    }
    $options = get_list_values('users','name');
    //pre($options);
	//$options = $user_id;
 @endphp

		 <select class="form-control" name="user_id" id="user_id"> 
		   <option value="">--Select--</option>
		   @foreach ($options as $key => $value)
			<option value="{{$key}}" {{($key == $selected) ? 'selected' : '' }}> 
				{{$value}} 
			</option>
		  @endforeach    
		</select>

 </div>
 <div id="diverr_user_id" text-danger></div>
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
		<label class="form-label" for="short_name">SHORT NAME</label>
		<input
			type="text"
			id="short_name"
			name="short_name"
			class="form-control"
			value="@if(isset($row->short_name)){{$row->short_name}}@endif"
			
		/>
	</div>
	<div id="diverr_short_name" text-danger></div>
</div>



<div class="col-md-6 mt-3">
	<div class="form-group">
		<label class="form-label" for="website">WEBSITE</label>
		<input
			type="text"
			id="website"
			name="website"
			class="form-control"
			value="@if(isset($row->website)){{$row->website}}@endif"
			
		/>
	</div>
	<div id="diverr_website" text-danger></div>
</div>



<div class="col-md-12 mt-3">
	<div class="form-group">
		<label class="form-label" for="description">DESCRIPTION</label>
		
		<textarea
			id="description"
			name="description"
			class="form-control"			
			
			>@if(isset($row->description)){{$row->description}}@endif</textarea>
			<script>
				CKEDITOR.replace('description');				
			</script>
	</div>
	<div id="diverr_description" text-danger></div>
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
    <label class="form-label" for="visibility">VISIBILITY</label>

@php
    
    if(!Empty($row)){ 
        $selected = $row->visibility; 
    }else{
        $selected = '';
    }
    $options = explode(',','Private,Public');
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
    <label class="form-label" for="membership_rule">MEMBERSHIP RULE</label>

@php
    
    if(!Empty($row)){ 
        $selected = $row->membership_rule; 
    }else{
        $selected = '';
    }
    //$options = get_list_values('active_status','is_active');
    $options = explode(',','Private,Public');
    //pre($options);
	//$options = $membership_rule;
 @endphp

		 <select class="form-control" name="membership_rule" id="membership_rule"> 
		   <option value="">--Select--</option>
		   @foreach ($options as $key => $value)
			<option value="{{$key}}" {{($key == $selected) ? 'selected' : '' }}> 
				{{$value}} 
			</option>
		  @endforeach    
		</select>

 </div>
 <div id="diverr_membership_rule" text-danger></div>
</div>

<div class="col-md-6 mt-3">
	<div class="form-group">
    <label class="form-label" for="board_creation_rule">BOARD CREATION RULE</label>

@php
    
    if(!Empty($row)){ 
        $selected = $row->board_creation_rule; 
    }else{
        $selected = '';
    }
    //$options = get_list_values('active_status','is_active');
    $options = explode(',','Workspace,Private,Public');
    //pre($options);
	//$options = $board_creation_rule;
 @endphp

		 <select class="form-control" name="board_creation_rule" id="board_creation_rule"> 
		   <option value="">--Select--</option>
		   @foreach ($options as $key => $value)
			<option value="{{$key}}" {{($key == $selected) ? 'selected' : '' }}> 
				{{$value}} 
			</option>
		  @endforeach    
		</select>

 </div>
 <div id="diverr_board_creation_rule" text-danger></div>
</div>

<div class="col-md-6 mt-3">
	<div class="form-group">
    <label class="form-label" for="board_deletion_rule">BOARD DELETION RULE</label>

@php
    
    if(!Empty($row)){ 
        $selected = $row->board_deletion_rule; 
    }else{
        $selected = '';
    }
    //$options = get_list_values('active_status','is_active');
    $options = explode(',','Workspace,Private,Public');
    //pre($options);
	//$options = $board_deletion_rule;
 @endphp

		 <select class="form-control" name="board_deletion_rule" id="board_deletion_rule"> 
		   <option value="">--Select--</option>
		   @foreach ($options as $key => $value)
			<option value="{{$key}}" {{($key == $selected) ? 'selected' : '' }}> 
				{{$value}} 
			</option>
		  @endforeach    
		</select>

 </div>
 <div id="diverr_board_deletion_rule" text-danger></div>
</div>

<div class="col-md-6 mt-3">
	<div class="form-group">
    <label class="form-label" for="board_sharing_rule">BOARD SHARING RULE</label>

@php
    
    if(!Empty($row)){ 
        $selected = $row->board_sharing_rule; 
    }else{
        $selected = '';
    }
    //$options = get_list_values('active_status','is_active');
    $options = explode(',','Workspace,Private,Public');
    //pre($options);
	//$options = $board_sharing_rule;
 @endphp

		 <select class="form-control" name="board_sharing_rule" id="board_sharing_rule"> 
		   <option value="">--Select--</option>
		   @foreach ($options as $key => $value)
			<option value="{{$key}}" {{($key == $selected) ? 'selected' : '' }}> 
				{{$value}} 
			</option>
		  @endforeach    
		</select>

 </div>
 <div id="diverr_board_sharing_rule" text-danger></div>
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
