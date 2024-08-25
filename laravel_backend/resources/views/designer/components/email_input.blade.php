@php
 $maxlength = isset($max) ? $max : '';
 $required = isset($params->required) && $params->isrequired=='Y' ? 'required="required"': '';
 $vfldName = $params->field_name;
 @endphp

<div class="col-md-6 mt-3">
	<div class="form-group">
        <label for='@php echo $params->field_name; @endphp'>@php echo $params->field_label; @endphp</label>
        <input
            type="email"
            id="@php echo $params->field_name; @endphp"
            name="@php echo $params->field_name; @endphp"
            class="form-control"
            
            maxlength="@php echo $maxlength; @endphp"
            value="@php if(!Empty($data_row)){ echo $data_row->$vfldName; } @endphp"required
            @php echo $required; @endphp>
    </div>
	<input
		type="hidden"
		id="@php $fldid = $params->field_name; echo 'h'.$fldid; @endphp"
		name="@php $fldnam = $params->field_name; echo 'h'.$fldnam; @endphp"
		value="@php if(!Empty($data_row)){ echo $data_row->$vfldName; } @endphp"
	/>
    <div id="diverr_{{$params->field_name}}" text-danger></div>
</div>