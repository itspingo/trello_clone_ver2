<div class="col-md-6 mt-3">
	<div class="form-group">
    <label class="form-label" for="@php echo $params->field_name; @endphp">@php echo $params->field_label; @endphp</label>
    
 @php
    $vfldName = $params->field_name;
    if(!Empty($data_row)){ 
        $selected = explode(',',$data_row->$vfldName); 
    }else{
        $selected = array();
    }
    if($params->staticlist != ''){
		$options = explode(',',$params->staticlist);
	}else{	
    	$options = get_list_values($params->listmodulename, $params->listmoduleitem);
	}
 @endphp

<select class="form-control select2 select2-multiple" multiple="multiple" name="{{$params->field_name.'[]'}}" id="{{$params->field_name}}">
  <option value="">--Select--</option>
  @if($params->staticlist != '')
    @foreach ($options as $key => $value)
        <option value="{{$value}}"  @if(in_array($value,$selected))selected="selected"@endif  > 
            {{$value}} 
        </option>
    @endforeach  
  @else
    @foreach ($options as $key => $value)
        <option value="{{$key}}"  @if(in_array($key,$selected))selected="selected"@endif  > 
            {{$value}} 
        </option>
    @endforeach  
  @endif
  </select>

		<input
			type="hidden"
			id="@php $fldid = $params->field_name; echo 'h'.$fldid; @endphp"
			name="@php $fldnam = $params->field_name; echo 'h'.$fldnam; @endphp"
			value="@php if(!Empty($data_row)){ echo $data_row->$vfldName; } @endphp"
		/>
		
 </div>
 <div id="diverr_{{$params->field_name}}" text-danger></div>
</div>
