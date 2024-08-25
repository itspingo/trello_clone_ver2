@php $vfldName = $params->field_name; @endphp
		<input
			type="hidden"
			id="@php echo $params->field_name; @endphp"
			name="@php echo $params->field_name; @endphp"
			value="@php if(!Empty($data_row)){ echo $data_row->$vfldName; } @endphp"
		/>
		<input
			type="hidden"
			id="@php $fldid = $params->field_name; echo 'h'.$fldid; @endphp"
			name="@php $fldnam = $params->field_name; echo 'h'.$fldnam; @endphp"
			value="@php if(!Empty($data_row)){ echo $data_row->$vfldName; } @endphp"
		/>

