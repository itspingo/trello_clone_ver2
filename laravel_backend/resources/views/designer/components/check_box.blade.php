<div class="col-md-6 mt-3">
	<div class="form-group">
    <label class='form-check-label' for='@php echo $params->field_name; @endphp'></label> &nbsp;&nbsp;
        <div class='form-check'>

            @php 
            $vfldName = $params->field_name;
            //$rowdata = $data_row->$vfldName; 
            @endphp
            <input class="form-check-input" type="checkbox" name="{{$params->field_name}}" id="{{$params->field_name}}" value="Y"
            @if(!Empty($data_row)) 
                @if($data_row->$vfldName=='Y')
                    checked="checked" 
                @endif
            @endif
            > 
            <label class='form-check-label' for='@php echo $params->field_name; @endphp'>{{$params->field_label}}</label>
            
			<input
				type="hidden"
				id="@php $fldid = $params->field_name; echo 'h'.$fldid; @endphp"
				name="@php $fldnam = $params->field_name; echo 'h'.$fldnam; @endphp"
				value="@php if(!Empty($data_row)){ echo $data_row->$vfldName; } @endphp"
			/>
        </div>
        <div id="diverr_{{$params->field_name}}" text-danger></div>
    </div>
</div>