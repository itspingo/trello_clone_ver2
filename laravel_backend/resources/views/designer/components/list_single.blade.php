<div class="col-md-6 mt-3">
	<div class="form-group">
    <label class="form-label" for="@php echo $params->field_name; @endphp">@php echo $params->field_label; @endphp</label>

@php
    $vfldName = $params->field_name;
	
    if(!Empty($data_row)){ 
        $selected = $data_row->$vfldName; 
    }else{
        $selected = '';
    }
	//dd($selected);
	if($params->staticlist != ''){
		$options = explode(',',$params->staticlist);
	}else{	
    	$options = get_list_values($params->listmodulename, $params->listmoduleitem);
	}
    //pre($options);
 @endphp

		 <select class="form-control" name="{{$params->field_name}}" id="{{$params->field_name}}"> 
		   <option value="">--Select--</option>
		  
			@if($params->staticlist != '')
				@foreach ($options as $option)
				<option value="{{$option}}" {{ ( $option == $selected) ? ' selected ' : '' }}> 
					{{ $option }} 
				</option>
				@endforeach    
			@else
				@foreach ($options as $key => $value)
				<option value="{{$key}}" {{ ( $key == $selected) ? ' selected ' : '' }}> 
					{{ $value }} 
				</option>
				@endforeach    
			@endif
		</select>

 </div>
 <div id="diverr_{{$params->field_name}}" text-danger></div>
</div>