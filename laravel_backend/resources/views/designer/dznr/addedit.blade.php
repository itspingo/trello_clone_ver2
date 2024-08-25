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
                                                    <h4 class="card-title">Designer - Add </h4>
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
                                        <form action="designer_add/save" method="POSt" >                                        
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
                                                    <div class="row" >
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="module_name form-label">Module Name</label>
                                                            <input type="text" class="form-control" required="required" id="module_name"  name="module_name" style="width: 100%;height:36px;" value=""  />
                                                            <input type="hidden" name="module_id" id="module_id"  />
                                                            <div id="diverr_module_name" class="text-danger"></div>
                                                        </div>
                                                        
                                                    </div>
                                                    

                                                    

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="timing_code_id form-label">Existing DB Table (optional)</label>
                                                            <select class="form-control" id="module_table"
                                                                style="width: 100%;height:36px;" name="module_table" 
                                                                onChange="show_module_fields(this)"
                                                                >
                                                                <option value="">Select</option>
                                                                @php foreach($dbtables as $tbl){ 
                                                                    echo '<option value="'.$tbl->TABLE_NAME.'" ';
                                                                    
                                                                    echo '>'.$tbl->TABLE_NAME.'</option>';
                                                                } @endphp 

                                                            </select>
                                                        </div>
                                                    </div>
                                                    </div>

                                                    <div class="row" >
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="module_type form-label">Module Type</label>
                                                                <select class="form-control" 
                                                                    style="width: 100%;height:36px;" name="module_type" id="module_type"
                                                                >
                                                                    <option value="">Select</option>
                                                                    <option value="main_module">Main Module</option>
                                                                    <option value="lookup">Lookup</option>
                                                                    <!-- <option value="sub_module">Sub Module</option> -->

                                                                </select>
                                                                <div id="diverr_module_type" class="text-danger"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="module_name form-label">Hide on Menu</label>
                                                                <select class="form-control" 
                                                                    style="width: 100%;height:36px;" name="is_hidden" id="is_hidden"
                                                                >
                                                                    <option value="">Select</option>
                                                                    <option value="Y">Yes</option>
                                                                    <option value="N" selected >No</option>

                                                                </select>
                                                                <div id="diverr_is_hidden" class="text-danger"></div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="row" >
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="module_name form-label">Icon</label>
                                                                <input type="text" class="form-control" required="required" id="module_icon"  name="module_icon"  value=""  />
                                                                <div id="diverr_module_icon" class="text-danger"></div>                                                                
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                        <div class="form-group">
                                                                <label for="module_name form-label">Parent Menu</label>
                                                                <select class="form-control" 
                                                                    style="width: 100%;height:36px;" name="parent_module" id="parent_module">
                                                                    @foreach($parent_menues as $parent_menue)
                                                                        <option value="{{$parent_menue->id}}">{{$parent_menue->module_name}}</option>
                                                                    @endforeach
                                                                    <!-- <option value="lookups">Lookups</option> -->

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
                                                        <tr>
                                                            <td colspan="10">
                                                               Please select table name first 
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                </div>
                                                
                                            </div>

                                            <button name="btn_submit" id="btn_submit" class="btn btn-info btn-submit" >Submit</button>


                                        </form>
                                    </div>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                      

                    </div> <!-- container-fluid -->


                </div>

<script>
    function show_table_cols(pthat){ 
        //alert('you are here');
        var vtblname = pthat.value;
        var fldname = pthat.id;
        var recno = fldname.replace('listmodulename','');
        //alert('recno: '+recno);
        $.ajax({
            type: 'GET',
            data: { 
                tblnam: vtblname,
                rno: recno,
            },
            url: '/backend/designer_add/ajax_table_fields',
            success: function(result) {
                //console.log(result);
                $('#div_listmoduleitem'+recno).html(result);
            }
    
        });

    }

    function show_module_fields(that){
        var vtblname = that.value;
        // alert('urlPatch: '+urlPatch);
        $.ajax({
            type: 'GET',
            data: {
                tblnam: vtblname,
            },
            url: '/backend/designer_add/ajax_module_fields',
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
