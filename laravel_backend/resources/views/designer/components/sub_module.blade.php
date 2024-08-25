@php

 $maxlength = isset($params->max) ? $params->max : '';
 $required = isset($params->isrequired) && $params->isrequired=='Y' ? 'required="required"': '';
 //pre($params);
 $vfldName = $params->field_name;
 @endphp

<div class="col-md-6 mt-3">
	<div class="form-group">
		<label class="form-label" for="@php echo $params->field_name; @endphp">@php echo $params->field_label; @endphp</label>
		<p>Has to work on it</p>
	</div>
	<div id="diverr_{{$params->field_name}}" text-danger></div>
</div>
