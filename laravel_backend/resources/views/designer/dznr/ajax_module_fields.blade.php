<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
        <tr class="bg-info text-white">
            <th> Field Name </th>
            <th> Field Label </th>
            <th> Field Type </th>
            <th> Is Required </th>
            <th> List Table </th>
            <th> Table Column </th>
            <th> Static Values </th>
            <th> On Listing Page </th>
            <th> Disp Seq </th>
        </tr>
    </thead>

    <tbody>
        @php
            $nrecs_form_to_table = -1;
            $vdisp_seq = 0;
        @endphp
        @foreach($curnt_table_columns as $tblcol)
        
        @php
            $nrecs_form_to_table++;
            $vdisp_seq++; 
        @endphp
        <tr>
 
            <td>
                <input type="text" name="field_name[]" id="field_name@php echo $nrecs_form_to_table; @endphp" class="form-control" value="@php echo $tblcol->COLUMN_NAME; @endphp" />
                <input type="hidden" name="field_id[]" id="'field_id'+index" value="" />
            </td>
            <td>
                <input type="text" name="field_label[]" id="field_label@php echo $nrecs_form_to_table; @endphp" class="form-control" value="@php echo strtoupper(str_replace('_',' ',str_replace('_id','',$tblcol->COLUMN_NAME))); @endphp" />
            </td>
            <td>
                <select name="field_type[]" id="field_type@php echo $nrecs_form_to_table; @endphp" class="form-control">
                    <option value="">--Select 2--</option>
                    <option value="text_input" @php if($tblcol->DATA_TYPE == 'varchar'){echo ' selected '; } @endphp>Text</option>
                    <option value="date_input" @php if($tblcol->DATA_TYPE == 'date'){echo ' selected '; } @endphp>Date</option>
                    <option value="number_input" @php if($tblcol->DATA_TYPE == 'int'){echo ' selected '; } @endphp>Number</option>
                    <option value="text_area" @php if($tblcol->DATA_TYPE == 'text'){echo ' selected '; } @endphp >Text Area</option>
                    <option value="hidden_input" @php if($tblcol->DATA_TYPE == 'hidden_input' ||   $tblcol->COLUMN_NAME == 'id' ||  $tblcol->COLUMN_NAME == 'recdate' ){echo ' selected '; } @endphp >Hidden</option>
                    <option value="single_image" @php if($tblcol->DATA_TYPE == 'single_image'){echo ' selected '; } @endphp >Single Image</option>
                    <option value="muliti_images" @php if($tblcol->DATA_TYPE == 'muliti_images'){echo ' selected '; } @endphp >Multiple Images</option>
                    <option value="single_file" @php if($tblcol->DATA_TYPE == 'single_file'){echo ' selected '; } @endphp >Single File</option>
                    <option value="multi_files" @php if($tblcol->DATA_TYPE == 'multi_files'){echo ' selected '; } @endphp >Multiple Files</option>
                    <option value="list_single" @php if($tblcol->DATA_TYPE == 'list_single'){echo ' selected '; } @endphp >List Single</option>
                    <option value="list_multiple" @php if($tblcol->DATA_TYPE == 'list_multiple'){echo ' selected '; } @endphp >List Multiple</option>
                    <option value="radio_button" @php if($tblcol->DATA_TYPE == 'radio_button'){echo ' selected '; } @endphp >Radio Button</option>
                    <option value="check_box" @php if($tblcol->DATA_TYPE == 'check_box'){echo ' selected '; } @endphp >Check Box</option>
                    <option value="date_time" @php if($tblcol->DATA_TYPE == 'timestamp'){echo ' selected '; } @endphp >Date & Time</option>
                    <option value="email_input" @php if($tblcol->DATA_TYPE == 'email_input'){echo ' selected '; } @endphp >Email Address</option>
                    <option value="password_input" @php if($tblcol->DATA_TYPE == 'password_input'){echo ' selected '; } @endphp >Password</option>
                    <option value="color" @php if($tblcol->DATA_TYPE == 'color'){echo ' selected '; } @endphp >Color</option>
                    <option value="display_item" @php if($tblcol->DATA_TYPE == 'display_item'){echo ' selected '; } @endphp >Display Item</option>
                    <option value="text_editor" @php if($tblcol->DATA_TYPE == 'text_editor'){echo ' selected '; } @endphp >Text Editor</option>
                    <option value="url_input" @php if($tblcol->DATA_TYPE == 'url_input'){echo ' selected '; } @endphp >URL</option>
                    <option value="sub_module" @php if($tblcol->DATA_TYPE == 'sub_module'){echo ' selected '; } @endphp >Sub-module</option>

                </select>
            </td>
           
            <td>
                <select name="isrequired[]" id="isrequired@php echo $nrecs_form_to_table; @endphp" class="form-control">
                    <option value="">--Select--</option>
                    <option value="Y" @php if($tblcol->IS_NULLABLE == 'NO'){echo ' selected '; } @endphp>Yes</option>
                    <option value="N" @php if($tblcol->IS_NULLABLE == 'YES'){echo ' selected '; } @endphp>No</option>
                </select>
            </td>

            <td>
                <select name="listmodulename[]" id="listmodulename@php echo $nrecs_form_to_table; @endphp" class="form-control" 
                onChange="show_table_cols(this)">
                    <option value="">--Select--</option>
                    @php
                    foreach($dbtables as $tbl2){
                    echo '<option value="'.$tbl2->TABLE_NAME.'" ';
                                                
                            echo '>'.$tbl2->TABLE_NAME.'</option>';
                    }
                    @endphp
                </select>
            </td>
            <td>
                <div id="div_listmoduleitem@php echo $nrecs_form_to_table; @endphp">

                    <select name="listmoduleitem[]" id="listmoduleitem@php echo $nrecs_form_to_table; @endphp" class="form-control">
                        <option value="">--Select--</option>
                        @php
                        /*
                        foreach($modlitms as $vmodlitm){
                        echo '<option value="'.$vmodlitm->column_name.'"';
                                                
                                echo '>'.$vmodlitm->column_name.'</option>';
                        }
                        */
                        @endphp

                    </select>
                </div>
            </td>

            <td>
                <input type="text" name="staticlist[]" id="staticlist@php echo $nrecs_form_to_table; @endphp" class="form-control" value="{{$tblcol->staticlist ?? ''}}" style="width:100px;" />
            </td>

            <td>
                <select name="onlistpag[]" id="onlistpag@php echo $nrecs_form_to_table; @endphp" class="form-control">
                    <option value="">--Select--</option>
                    <option value="Y"
                    @php
                        if($tblcol->COLUMN_NAME == 'id'){
                            echo ' selected ';
                        }
                    @endphp
                    >Yes</option>
                    <option value="N">No</option>
                </select>
            </td>

            <td>
                <input type="text" name="display_seq[]" id="display_seq@php echo $nrecs_form_to_table; @endphp" class="form-control" value="@php echo $vdisp_seq; @endphp" style="width:50px;" />
            </td>

        </tr>
        
        @endforeach

    </tbody>
</table>