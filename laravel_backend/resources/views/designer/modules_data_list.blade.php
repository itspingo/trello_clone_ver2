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
                                                    <h4 class="card-title">{{ucwords($module_info->module_name,' ')}} - List</h4>
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
                                                <button title="Add Record" class="btn btn-info btn-md" onClick="recadd()"><i class="fa fa-plus"></i></button>
                                                <button title="Search" class="btn btn-info btn-md" data-bs-toggle="modal" data-bs-target=".bs-example-modal-center" ><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                    
                                        <!-- <h4 class="card-title">Default Datatable</h4>
                                        <p class="card-title-desc">DataTables has most features enabled by
                                            default, so all you need to do to use it with your own tables is to call
                                            the construction function: <code>$().DataTable();</code>.
                                        </p> -->
        
                                        <div class="table-responsive">
                                        <table id="datatable" class="table table-bordered" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>                                                
                                            <tr class="bg-info text-white">

                                            @foreach($module_fields as $field)
                                            
                                                @if($field->onlistpag == 'Y' && $field->field_type != 'text_area' && $field->field_type != 'text_editor')
                                                <th>
                                                    {{ $field->field_label }}
                                                </th> 
                                                @endif
                                            @endforeach 

                                               <th>Action</th>
                                            </tr>
                                            </thead>
        
                                            <tbody>
                                            
                                            @foreach($rows as $row)
                                            <tr>
                                                @foreach($module_fields as $field)
                                                    @php
                                                        $vfldname = $field->field_name; 
                                                        $vfldtype = $field->field_type;

                                                    @endphp

                                                    @if($field->onlistpag == 'Y' && $vfldtype != 'text_area' && $vfldtype != 'text_editor' )
                                                    <td> 
                                                        {{-- if field_type == 'list_single' || 'list multiple' use getfieldval() function  --}}
                                                        @if($vfldtype == 'list_single')
                                                            @php
                                                                if($field->staticlist != ''){
                                                                    echo $row->$vfldname;
                                                                }else{
                                                                    echo getfieldval($row->$vfldname,$field->listmodulename,$field->listmoduleitem);
                                                                }
                                                                //echo $vfldtype.' - '.$row->$vfldname.' - '.$field->listmodulename.' - '.$field->listmoduleitem;
                                                            @endphp

                                                        @elseif($vfldtype == 'list_multiple')
                                                            @php
                                                                
                                                                $fldvals = '';
                                                                $arflvals = explode(',',$row->$vfldname);
                                                                
                                                                for($i=0; $i < count($arflvals); $i++){
                                                                    
                                                                    $tmpval = getfieldval($arflvals[$i], $field->listmodulename, $field->listmoduleitem);
                                                                    $fldvals .= $tmpval.', ';
                                                                }
                                                                $fldvals = substr($fldvals,0,strlen($fldvals)-2);
                                                                echo $fldvals;
                                                            @endphp

                                                        @else
                                                            {{ $row->$vfldname }}
                                                        @endif
                                                    </td> 
                                                    @endif
                                                @endforeach 
                                                <td class="text-center"> 
                                                    <button class="btn btn-info" onclick="javascript:recedit('{{ $row->id }}')" ><i class="fas fa-edit"></i></button>
                                                    &nbsp;&nbsp;&nbsp;
                                                    <button class="btn btn-danger"  onclick="javascript:recdel('{{ $row->id }}')" ><i class="fas fa-trash"></i></button>
                                                </td>
                                            </tr> 
                                            @endforeach 
                                          
                                            </tbody>
                                        </table>
                                        </div>
                                        @if($rows->links())
                                            {{ $rows->links() }}
                                        @endif
                                            <input type="hidden" name="mid" id="mid" value="{{ $module_info->id }}" />
                                            <input type="hidden" name="baseurl" id="baseurl" value="<?php //echo base_url(); ?>" />
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                      

                    </div> <!-- container-fluid -->



                    <div class="modal fade bs-example-modal-center " tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                        <form method="post" action="search" >
                                        @csrf
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Search</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    </button>
                                </div>
                                <div class="modal-body">
                                   
                                        <div class="row"> 
                                            @php
                                                //print_r($module_fields); die();
                                            @endphp

                                                @foreach($module_fields as $module_field)
                                                @php
                                                    //print_r($row); die();
                                                    $row = array();
                                                    $data2['data_row'] = $row;
                                                    $data2['params'] = $module_field;
                                                    
                                                    $vfldType = $module_field->field_type;
                                                    if( $vfldType != 'single_image' &&
                                                        $vfldType != 'muliti_images' &&
                                                        $vfldType != 'single_file' &&
                                                        $vfldType != 'multi_files' &&
                                                        $vfldType != 'password_input' &&
                                                        $vfldType != 'sub_module' 
                                                        && $vfldType != 'hidden_input'
                                                    ){
                                                        $field_view = get_field_view($vfldType,$data2);
                                                        echo str_replace('required','',$field_view);
                                                        //echo $fldinfo;
                                                    }
                                                    
                                                @endphp
                                                @endforeach
                                            
                                        </div>
                                               
                                </div>
                                <div class="modal-footer">
                                <div class="row">
                                    <div class="mb-3">
                                        <input type="submit" class="btn btn-success" value="Submit" />
                                    </div>
                                </div>
                                <input type="hidden" name="mid" id="mid" value="{{ $module_info->id }}" />
                                </div>
                            </div><!-- /.modal-content -->
                            </form>
                        </div><!-- /.modal-dialog -->
                    </div>






                </div>
<script>
    function recedit(vrecid){
        var rid = vrecid;
        var mid=document.getElementById('mid').value;
        //var vbasurl = ''; //document.getElementById('baseurl').value;
        var newurl = 'edit?mid='+mid+'&rid='+rid;
        window.location = newurl;
        //alert('mid: '+mid+' , rid: '+rid);
    }
    function recadd(){
        
        var vmid=document.getElementById('mid').value;
        var newurl = 'add?mid='+vmid;
        window.location = newurl;
        //alert('mid: '+mid+' , rid: '+rid);
    }
    function recdel(vrecid){
        var rid = vrecid;
        var mid=document.getElementById('mid').value;
        //alert('mid: '+mid+' , rid: '+rid);

        if(confirm('Are you sure ?')){
            //var vbasurl = document.getElementById('baseurl').value;
            var newurl = 'delete?mid='+mid+'&rid='+rid;
            window.location = newurl;
        }
    }
</script> 



@endsection