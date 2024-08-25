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
			type="file"
			id="@php echo $params->field_name; @endphp"
			name="@php echo $params->field_name; @endphp"
			class="form-control"
			@php echo $required; @endphp
			>
			<div>			   
			    @if(!Empty($data_row)){ 

					<a href="{{asset('storage/'.$data_row->$vfldName)}}" target="_blank" >{{$data_row->$vfldName}}</a>
						
					} 
				@endif
			</div>
			<input
				type="hidden"
				id="@php $fldid = $params->field_name; echo 'h'.$fldid; @endphp"
				name="@php $fldnam = $params->field_name; echo 'h'.$fldnam; @endphp"
				value="@php if(!Empty($data_row)){ echo $data_row->$vfldName; } @endphp"
			/>
	</div>
	<div id="diverr_{{$params->field_name}}" text-danger></div>
</div>
