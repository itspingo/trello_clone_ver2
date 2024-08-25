@php

 $maxlength = isset($params->max) ? $params->max : '';
 $required = isset($params->isrequired) && $params->isrequired=='Y' ? 'required="required"': '';
 //pre($params);
 $vfldName = $params->field_name;
 @endphp
<div class="col-md-12 mt-3">
	<div class="form-group">
		<label class="form-label" for="@php echo $params->field_name; @endphp">@php echo $params->field_label; @endphp</label>
		
		<textarea
			id="@php echo $params->field_name; @endphp"
			name="@php echo $params->field_name; @endphp"
			class="form-control"
			placeholder="@php echo $params->placeholder; @endphp"
			maxlength="@php echo $maxlength; @endphp"
			@php echo $required; @endphp
			>@if(!Empty($data_row))
			{!!$data_row->$vfldName!!}
			@endif</textarea>
			<script>
				CKEDITOR.replace('@php echo $params->field_name; @endphp');				
			</script>

	</div>
	<div id="diverr_{{$params->field_name}}" text-danger></div>
</div>
