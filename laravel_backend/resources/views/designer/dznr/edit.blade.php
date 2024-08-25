@extends('layouts.app')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">


                        <div class="row">
                            <div class="col-3 text-start">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="card-title">Designer - Edit</h4>
                                </div>
                            </div>
                            <div class="col-6 text-left">

                                @if(session('msg_success') != '')
                                <div class="alert alert-success">{{session('msg_success')}}</div>
                                @endif
                                @if(session('msg_failure') != '')
                                <div class="alert alert-danger">{{session('msg_failure')}}</div>
                                @endif

                            </div>
                            <div class="col-3 text-end">
                                <a title="Go to list page" class="btn btn-info btn-md" href="designer"><i class="fa fa-list"></i></a>
                                <!-- <button title="Search" class="btn btn-info btn-md" data-bs-toggle="modal" data-bs-target=".bs-example-modal-center" ><i class="fa fa-search"></i></button> -->
                            </div>
                        </div>
                        <hr class="txt-info">

                        <div class="row">
                            <form action="designer_edit" method="POSt">
                                @csrf
                               
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#navtabs_module_info" role="tab">
                                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                            <span class="d-none d-sm-block">Module Info</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#navtabs_module_fields" role="tab">
                                            <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                            <span class="d-none d-sm-block">Module Fields</span>
                                        </a>
                                    </li>

                                </ul>

                                <!-- Tab panes -->
                                 <div class="tab-content p-3 text-muted">
                                    <div class="tab-pane active" id="navtabs_module_info" role="tabpanel">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="module_name form-label">Module Name</label>
                                                    <input type="text" class="form-control" required="required" id="module_name" name="module_name" style="width: 100%;height:36px;" value="@php echo $dznr_module[0]->module_name; @endphp" />
                                                    <input type="hidden" name="module_id" id="module_id" value="@php echo $dznr_module[0]->id; @endphp" />
                                                    <div id="diverr_module_name" class="text-danger"></div>
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="timing_code_id form-label">Existing DB Table (optional)</label>
                                                    <input type="text" class="form-control" id="module_table" name="module_table" style="width: 100%;height:36px;" value="@php echo $dznr_module[0]->table_name; @endphp" readonly />
                                                    {{-- <select class="form-control" id="module_table" style="width: 100%;height:36px;" name="module_table"  readonly>
                                                        <option value="">Select</option>
                                                        @php foreach($dbtables as $tbl){
                                                        echo '<option value="'.$tbl->TABLE_NAME.'" ';
                                                                   
                                                                        if($tbl->TABLE_NAME == $dznr_module[0]->table_name){
                                                                            echo ' selected ';
                                                                        }
                                                                  
                                                                    echo '>'.$tbl->TABLE_NAME.'</option>';
                                                        } @endphp

                                                    </select> --}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="module_icon form-label">Icon</label>
                                                    <input type="text" class="form-control" required="required" id="module_icon" name="module_icon" value="@php echo $dznr_module[0]->table_name; @endphp" />
                                                    <div id="diverr_module_icon" class="text-danger"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="module_type form-label">Module Type</label>
                                                    <select class="form-control"  style="width: 100%;height:36px;" name="module_type" id="module_type">
                                                        <option value="">Select</option>
                                                        <option value="main_module"
                                                        @php if($dznr_module[0]->module_type=='main_module'){ echo ' selected '; } @endphp
                                                        >Main Module</option>
                                                        <option value="sub_module"
                                                        @php if($dznr_module[0]->module_type=='sub_module'){ echo ' selected '; } @endphp
                                                        >Sub Module</option>
                                                    </select>
                                                    <div id="diverr_module_type" class="text-danger"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row" >
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label for="module_name form-label">Menu Heading</label>
                                                    <select class="form-control" 
                                                        style="width: 100%;height:36px;" name="parent_module" id="parent_module"
                                                    >
                                                        <option value="">Select</option>
                                                        @php foreach($menu_headings as $menu_heading){ 
                                                        echo '<option value="'.$menu_heading->id.'" '; 
                                                        if($dznr_module[0]->parent_module==$menu_heading->id){ echo ' selected '; }
                                                        echo '>'.$menu_heading->module_name.'</option>';
                                                    } @endphp 

                                                    </select>
                                                    <div id="diverr_parent_module" class="text-danger"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                    <label for="module_name form-label">Hide on Menu</label>
                                                    <select class="form-control" 
                                                        style="width: 100%;height:36px;" name="is_hidden" id="is_hidden"
                                                    >
                                                        <option value="">Select</option>
                                                        <option value="Y"
                                                        @php if($dznr_module[0]->is_hidden=='Y'){ echo ' selected '; } @endphp
                                                        >Yes</option>
                                                        <option value="N" selected 
                                                        @php if($dznr_module[0]->is_hidden=='N'){ echo ' selected '; } @endphp
                                                        >No</option>

                                                    </select>
                                                    <div id="diverr_is_hidden" class="text-danger"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>










                                    <div class="tab-pane" id="navtabs_module_fields" role="tabpanel">
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
                                                @php   $nrecs_form_to_table = 0; @endphp
                                                @foreach($dznr_fields as $tblcol)
                                                    @php  $nrecs_form_to_table++; @endphp
                                                <tr>

                                                    <td>
                                                        <input type="text" name="field_name[]" id="field_name@php echo $nrecs_form_to_table; @endphp" class="form-control" value="@php echo $tblcol->field_name; @endphp" />
                                                        <input type="hidden" name="field_id[]" id="'field_id'+index" value="@php echo $tblcol->id; @endphp" />
                                                    </td>
                                                    <td>
                                                        <input type="text" name="field_label[]" id="field_label@php echo $nrecs_form_to_table; @endphp" class="form-control" value="@php echo $tblcol->field_label; @endphp" />
                                                    </td>
                                                    <td>
                                                        <select name="field_type[]" id="field_type@php echo $nrecs_form_to_table; @endphp" class="form-control">
                                                            <option value="">--Select 3 --</option>
                                                            <option value="text_input" @php if($tblcol->field_type == 'text_input'){echo ' selected '; } @endphp>Text</option>
                                                            <!-- <option value="date_input" @php if($tblcol->field_type == 'date_input'){echo ' selected '; } @endphp>Date</option>
                                                            <option value="number_input" @php if($tblcol->field_type == 'number_input'){echo ' selected '; } @endphp>Number</option>
                                                            <option value="text_area" @php if($tblcol->field_type == 'text_area'){echo ' selected '; } @endphp >Text Area</option>
                                                            <option value="hidden_input" @php if($tblcol->field_type == 'hidden_input'){echo ' selected '; } @endphp >Hidden</option>
                                                            <option value="single_image" @php if($tblcol->field_type == 'single_image'){echo ' selected '; } @endphp >Single Image</option>
                                                            <option value="muliti_images" @php if($tblcol->field_type == 'muliti_images'){echo ' selected '; } @endphp >Multiple Images</option>
                                                            <option value="single_file" @php if($tblcol->field_type == 'single_file'){echo ' selected '; } @endphp >Single File</option>
                                                            <option value="multi_files" @php if($tblcol->field_type == 'multi_files'){echo ' selected '; } @endphp >Multiple Files</option>
                                                            <option value="list_single" @php if($tblcol->field_type == 'list_single'){echo ' selected '; } @endphp >List (Single Choice)</option>
                                                            <option value="list_multiple" @php if($tblcol->field_type == 'list_multiple'){echo ' selected '; } @endphp >List (Multi Choice)</option>
                                                            <option value="radio_button" @php if($tblcol->field_type == 'radio_button'){echo ' selected '; } @endphp >Radio Button</option>
                                                            <option value="check_box" @php if($tblcol->field_type == 'check_box'){echo ' selected '; } @endphp >Check Box</option>
                                                            <option value="date_time" @php if($tblcol->field_type == 'date_time'){echo ' selected '; } @endphp >Date & Time</option>
                                                            <option value="email_input" @php if($tblcol->field_type == 'email_input'){echo ' selected '; } @endphp >Email Address</option>
                                                            <option value="password_input" @php if($tblcol->field_type == 'password_input'){echo ' selected '; } @endphp >Password</option>
                                                            <option value="display_item" @php if($tblcol->field_type == 'display_item'){echo ' selected '; } @endphp >Display Item</option>
                                                            <option value="text_editor" @php if($tblcol->field_type == 'text_editor'){echo ' selected '; } @endphp >Text Editor</option>
                                                            <option value="url_input" @php if($tblcol->field_type == 'url_input'){echo ' selected '; } @endphp >URL</option>
                                                            <option value="sub_module" @php if($tblcol->field_type == 'sub_module'){echo ' selected '; } @endphp >Sub-module</option> -->

                                                        </select>
                                                    </td>
                                                   
                                                    <td>
                                                        <select name="isrequired[]" id="isrequired@php echo $nrecs_form_to_table; @endphp" class="form-control">
                                                            <option value="">--Select--</option>
                                                            <option value="Y" @php if($tblcol->isrequired == 'Y'){echo ' selected '; } @endphp>Yes</option>
                                                            <option value="N" @php if($tblcol->isrequired == 'N'){echo ' selected '; } @endphp>No</option>
                                                        </select>
                                                    </td>

                                                    <td>
                                                        <select name="listmodulename[]" id="listmodulename@php echo $nrecs_form_to_table; @endphp" class="form-control" onChange="show_table_cols(this)">
                                                            <option value="">--Select--</option>
                                                            @php
                                                          
                                                            foreach($dbtables as $tbl2){
                                                            echo '<option value="'.$tbl2->TABLE_NAME.'" ';
                                                                            if($tbl2->TABLE_NAME == $tblcol->listmodulename ){ echo ' selected '; }
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
                                                      
                                                                for($i=0; $i < count($listTblCols); $i++){
                                                                    $arlstcols = $listTblCols[$i];
                                                                    for($j=0; $j < count($arlstcols); $j++){
                                                                        if($arlstcols[$j]->table_name == $tblcol->listmodulename){
                                                                            echo '<option value="'.$arlstcols[$j]->COLUMN_NAME.'"';
                                                                            if($arlstcols[$j]->COLUMN_NAME == $tblcol->listmoduleitem){
                                                                                echo ' selected ';
                                                                            }
                                                                            echo '>'.$arlstcols[$j]->COLUMN_NAME.'</option>';
                                                                        }
                                                                    }
                                                                }
                                                                
                                                                @endphp

                                                            </select>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <input type="text" name="staticlist[]" id="staticlist@php echo $nrecs_form_to_table; @endphp" class="form-control" value="@php echo $tblcol->staticlist; @endphp" style="width:100px;" />
                                                    </td>

                                                    <td>
                                                        <select name="onlistpag[]" id="onlistpag@php echo $nrecs_form_to_table; @endphp" class="form-control">
                                                            <option value="">--Select--</option>
                                                            <option value="Y" @php if($tblcol->onlistpag == 'Y'){echo ' selected '; } @endphp >Yes</option>
                                                            <option value="N" @php if($tblcol->onlistpag == 'N'){echo ' selected '; } @endphp>No</option>
                                                        </select>
                                                    </td>

                                                    <td>
                                                        <input type="text" name="display_seq[]" id="display_seq@php echo $nrecs_form_to_table; @endphp" class="form-control" value="@php echo $tblcol->display_seq; @endphp" style="width:100px;" />
                                                    </td>

                                                </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>

                                </div> 

                                <button name="btn_submit" id="btn_submit" class="btn btn-info btn-submit">Submit</button>


                            </form>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->


    </div> <!-- container-fluid -->


</div>

<script>
    function show_table_cols(pthat) {
        //alert('you are here');
        var vtblname = pthat.value;
        var fldname = pthat.id;
        var recno = fldname.replace('listmodulename', '');
        //alert('recno: '+recno);
        $.ajax({
            type: 'GET',
            data: {
                tblnam: vtblname,
                rno: recno,
            },
            url: '/designer_add/ajax_table_fields',
            success: function(result) {
                //console.log(result);
                $('#div_listmoduleitem' + recno).html(result);
            }

        });

    }

    function show_module_fields(that) {
        var vtblname = that.value;
        //alert('vtblname: '+vtblname);
        $.ajax({
            type: 'GET',
            data: {
                tblnam: vtblname,
            },
            url: '/designer_add/ajax_module_fields',
            success: function(result) {
                //console.log(result);
                $('#navtabs_module_fields').html(result);
            }

        });
    }
    // function show_table_fields(){

    // }
</script>


@endsection