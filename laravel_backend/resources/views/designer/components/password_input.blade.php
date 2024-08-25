@php

 $maxlength = isset($params->max) ? $params->max : '';
 $required = isset($params->isrequired) && $params->isrequired=='Y' ? 'required="required"': '';
 //pre($params);
 $vfldName = $params->field_name;
 @endphp

<div class="col-md-6 mt-3">
	<div class="form-group">
		<label class="form-label" for="@php echo $params->field_name; @endphp">@php echo $params->field_label; @endphp</label>
		<input
			type="password"
			id="@php echo $params->field_name; @endphp"
			name="@php echo $params->field_name; @endphp"
			class="form-control"
			placeholder="@php echo $params->placeholder; @endphp"
			maxlength="@php echo $maxlength; @endphp"
			value="@php if(!Empty($data_row)){ echo $data_row->$vfldName; } @endphp"
			@php echo $required; @endphp
		>
		<input
			type="hidden"
			id="@php $fldid = $params->field_name; echo 'h'.$fldid; @endphp"
			name="@php $fldnam = $params->field_name; echo 'h'.$fldnam; @endphp"
			value="@php if(!Empty($data_row)){ echo $data_row->$vfldName; } @endphp"
		/>
	</div>
	<div id="diverr_{{$params->field_name}}" text-danger></div>
</div>
