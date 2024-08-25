
<div class="col-md-6 mt-3">
	<div class="form-group">
    <label class="form-label" for="@php echo $params->field_name; @endphp">@php echo $params->field_label; @endphp</label>
    <br>
@php

    $vfldName = $params->field_name;
    
    if(!Empty($data_row)){ 
        // Array ( [0] => stdClass Object ( [id] => 9 [recdate] => 2
        //print_r($data_row); die();
        $selected = explode(',',$data_row->$vfldName); 
        
    }else{
        $selected = array();
    }

    $options = get_list_values($params->listmodulename, $params->listmoduleitem);

 @endphp

  @foreach ($options as $key => $value)
    <input class="form-check-input" type="radio" name="{{$params->field_name}}" id="{{$params->field_name}}" value="{{$key}}"
             @if(in_array($key,$selected))checked="checked" @endif 
    > 
    <label class='form-check-label' for='@php echo $params->field_name; @endphp'>{{$value}}</label>
    &nbsp;&nbsp;&nbsp;&nbsp;
  @endforeach    

  			<input
				type="hidden"
				id="@php $fldid = $params->field_name; echo 'h'.$fldid; @endphp"
				name="@php $fldnam = $params->field_name; echo 'h'.$fldnam; @endphp"
				value="@php if(!Empty($data_row)){ echo $data_row->$vfldName; } @endphp"
			/>

			
</div>
<div id="diverr_{{$params->field_name}}" text-danger></div>
</div>