<?php $nrecs_form_to_table = -1; ?>
    <div id="divCurTableFields">
    <table width="100%" id="table_form_to_table">
        <thead>
            <tr>
                <th> Field Name </th>
                <th> Field Label </th>
                <th> Field Type </th>
                <th> Is Required </th>
                <th> List Table </th>
                <th> Table Column </th>
                <th> Static Values </th>
                <th> On Listing Page </th>
                <th> Options </th>
            </tr>
        </thead>

        <tbody>
<?php foreach($curnt_table_columns as $tblcol){ 
        $nrecs_form_to_table++;    
?>
<tr >
    
    <td>
        <input type="text" name="field_name[]"
            id="field_name<?php echo $nrecs_form_to_table; ?>"
            class="form-control" value="<?php echo $tblcol->field_name; ?>" />
        <input type="hidden" name="field_id[]"  id="'field_id'+index" value="<?php echo $tblcol->id; ?>" />
    </td>
    <td>
        <input type="text" name="field_label[]"
            id="field_label<?php echo $nrecs_form_to_table; ?>"
            class="form-control" value="<?php echo $tblcol->field_label; ?>" />
    </td>
    <td> 
        <select name="field_type[]"
            id="field_type<?php echo $nrecs_form_to_table; ?>"
            class="form-control">
            <option value="">--Select 1--</option>
            <option value="text_input" <?php if($tblcol->field_type == 'text_input'){echo ' selected '; } ?>>Text</option>
            <!-- <option value="date_input" <?php if($tblcol->field_type == 'date_input'){echo ' selected '; } ?>>Date</option>
            <option value="number_input"  <?php if($tblcol->field_type == 'number_input'){echo ' selected '; } ?>>Number</option>
            <option value="text_area" <?php if($tblcol->field_type == 'text_area'){echo ' selected '; } ?> >Text Area</option>
            <option value="hidden_input" <?php if($tblcol->field_type == 'hidden_input'){echo ' selected '; } ?> >Hidden</option>
            <option value="single_image" <?php if($tblcol->field_type == 'single_image'){echo ' selected '; } ?> >Simgle Image</option>
            <option value="muliti_images" <?php if($tblcol->field_type == 'muliti_images'){echo ' selected '; } ?> >Multiple Images</option>
            <option value="single_file" <?php if($tblcol->field_type == 'single_file'){echo ' selected '; } ?> >Single File</option>
            <option value="multi_files" <?php if($tblcol->field_type == 'multi_files'){echo ' selected '; } ?> >Multiple Files</option>
            <option value="list_single" <?php if($tblcol->field_type == 'list_single'){echo ' selected '; } ?> >List Single</option>
            <option value="list_multiple" <?php if($tblcol->field_type == 'list_multiple'){echo ' selected '; } ?> >List Multi</option>
            <option value="radio_button" <?php if($tblcol->field_type == 'radio_button'){echo ' selected '; } ?> >Radio Button</option>
            <option value="check_box" <?php if($tblcol->field_type == 'check_box'){echo ' selected '; } ?> >Check Box</option>
            <option value="date_time" <?php if($tblcol->field_type == 'date_time'){echo ' selected '; } ?> >Date & Time</option>
            <option value="email_input" <?php if($tblcol->field_type == 'email_input'){echo ' selected '; } ?> >Email Address</option>
            <option value="password_input" <?php if($tblcol->field_type == 'password_input'){echo ' selected '; } ?> >Password</option>
            <option value="color" <?php if($tblcol->field_type == 'color'){echo ' selected '; } ?> >Color</option>
            <option value="display_item" <?php if($tblcol->field_type == 'display_item'){echo ' selected '; } ?> >Display Item</option>
            <option value="textareaweditor" <?php if($tblcol->field_type == 'textareaweditor'){echo ' selected '; } ?> >Rich Text Area</option>
            <option value="url_input" <?php if($tblcol->field_type == 'url_input'){echo ' selected '; } ?> >URL</option>
            <option value="sub_module" <?php if($tblcol->field_type == 'sub_module'){echo ' selected '; } ?> >Sub-module</option> -->

        </select>
    </td>
   
    <td>
        <select name="isrequired[]"
            id="isrequired<?php echo $nrecs_form_to_table; ?>"
            class="form-control">
            <option value="" >--Select--</option>
            <option value="Y" <?php if($tblcol->isrequired == 'Y'){echo ' selected '; } ?>>Yes</option>
            <option value="N" <?php if($tblcol->isrequired == 'N'){echo ' selected '; } ?>>No</option>
        </select>
    </td>
    
    <td>
        <select name="listmodulename[]"
            id="listmodulename<?php echo $nrecs_form_to_table; ?>"
            class="form-control"
            onChange="ajaxSetListTableFields(this)">
            <option value="">--Select--</option>
            <?php
                    foreach($dbtables as $dbtable){
                        echo '<option value="'.$dbtable->TABLE_NAME.'"';
                        if($dbtable->TABLE_NAME == $tblcol->listmodulename){ echo ' selected '; }
                        echo ' >'.$dbtable->TABLE_NAME.'</option>';
                    }
                ?>
        </select>
    </td>
    <td>
        <div id="div_listmoduleitem<?php echo $nrecs_form_to_table; ?>">
                <?php if($tblcol->listmodulename != '') { $modlitms = show_table_cols($this, $tblcol->listmodulename); } else {  $modlitms = array();} ?>
            <select name="listmoduleitem[]"
                
                id="listmoduleitem<?php echo $nrecs_form_to_table; ?>"
                class="form-control">
                <option value="">--Select--</option>
                <?php
                    foreach($modlitms as $vmodlitm){
                        echo '<option value="'.$vmodlitm->column_name.'"';
                        if($vmodlitm->column_name == $tblcol->listmoduleitem){ echo ' selected '; }
                        echo ' >'.$vmodlitm->column_name.'</option>';
                    }
                ?>

            </select>
        </div>
    </td>

    <td>
        <input type="text" name="staticlist[]" id="staticlist@php echo $nrecs_form_to_table; @endphp" class="form-control" value="@php echo $tblcol->staticlist; @endphp" style="width:100px;" />
    </td>

    <td>
        <select name="onlistpage[]"
            id="onlistpage<?php echo $nrecs_form_to_table; ?>"
            class="form-control">
            <option value="">--Select--</option>
            <option value="Y" <?php if($tblcol->onlistpag == 'Y'){echo ' selected '; } ?> >Yes</option>
            <option value="N" <?php if($tblcol->onlistpag == 'N'){echo ' selected '; } ?>>No</option>
        </select>
    </td>

    <td>
        <a href="#" class="text-danger">
            
            <i class="fas fa-trash"></i>
        </a>
    </td>

</tr>
<?php } ?>
</tbody>
</table>