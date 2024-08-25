<select name="listmoduleitem[]" id="listmoduleitem@php echo $recno; @endphp" class="form-control">
        <option value="">--Select--</option>
        @php
        
        foreach($list_table_columns as $tblcol){
        echo '<option value="'.$tblcol->COLUMN_NAME.'"';
        echo '>'.$tblcol->COLUMN_NAME.'</option>';
        }
        
        @endphp

</select>