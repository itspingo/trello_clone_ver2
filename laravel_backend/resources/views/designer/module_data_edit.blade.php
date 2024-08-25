@extends('layouts.app')
@section('content')
<div class="page-content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <!-- <h4 class="card-title">Form layouts</h4> -->

                                        <div class="row">
                                            <div class="col-3 text-start">
                                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                                    <h4 class="card-title">{{ucwords($module_info->module_name,' ')}} - Edit</h4>
                                                </div>
                                            </div>
                                            <div class="col-6 text-center">
                                                @if(session('msg_success') != '')
                                                    <div class="alert alert-success">{{session('msg_success')}}</div>
                                                @endif
                                                @if(session('msg_failure') != '')
                                                    <div class="alert alert-danger">{{session('msg_failure')}}</div>
                                                @endif
                                            </div>
                                            <div class="col-3 text-end">
                                                <button class="btn btn-info btn-md" onClick="go2listpage({{$module_info->id}})" >List Page</button>
                                            </div>
                                        </div>
                                        <hr class="bg-info"> 

                                        <div class="row">
                                            <div class="col-lg-12">
                                            <form action="update?mid={{$module_info->id}}&rid={{$row->id}}" method="POST" ENCTYPE="multipart/form-data" >
                                                    @csrf
                                                    <!-- <h5 class="font-size-14 mb-4"><i class="mdi mdi-arrow-right text-primary me-1"></i> Form groups</h5> -->
                                                    
                                                        <div class="row"> 

                                                                @foreach($module_fields as $module_field)
                                                                @php
                                                                    //print_r($row); die();
                                                                    $data2['data_row'] = $row;
                                                                    $data2['params'] = $module_field;
                                                                    
                                                                    $vfldType = $module_field->field_type;
                                                                     echo get_field_view($vfldType,$data2); 
                                                                    //echo $fldinfo;
                                                                    
                                                                @endphp
                                                                @endforeach
                                                           
                                                        </div>
                                                        <div class="row "> 
                                                            <div class="col-md-6 text-start mt-2">
                                                                <button type="submit" class="btn btn-primary waves-effect waves-light w-md">Submit</button>
                                                            </div>
                                                            <div class="col-md-6 text-end  mt-2">
                                                                <!--<button type="reset" class="btn btn-outline-danger waves-effect waves-light w-md">Reset</button>-->
                                                            </div>
                                                        </div>
                                                <input type="hidden" name="continue" id="continue" value="Y" />
                                                <input type="hidden" name="table_name" id="table_name" value="{{$module_info->table_name}}" />
                                            </form>
                                                    <!-- <input type="hidden" name="mid" id="mid" value="<?php //echo $module->id; ?>" /> -->
                                                    <input type="hidden" name="baseurl" id="baseurl" value="<?php //echo base_url(); ?>" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div> <!-- container-fluid -->
                </div>


<script>
    function recedit(vrecid){
        var rid = vrecid;
        var mid=document.getElementById('mid').value;
        var vbasurl = document.getElementById('baseurl').value;
        var newurl = vbasurl+'recedit?mid='+mid+'&rid='+rid;
        window.location = newurl;
        //alert('mid: '+mid+' , rid: '+rid);
    }
    function recadd(vmid){
        
        var vbasurl = document.getElementById('baseurl').value;
        var newurl = vbasurl+'recadd?mid='+vmid;
        window.location = newurl;
        //alert('mid: '+mid+' , rid: '+rid);
    }
    function recdel(vrecid){
        var rid = vrecid;
        var mid=document.getElementById('mid').value;
        alert('mid: '+mid+' , rid: '+rid);

        if(confirm('Are you sure ?')){
            var vbasurl = document.getElementById('baseurl').value;
            var newurl = vbasurl+'recdelete?mid='+mid+'&rid='+rid;
            window.location = newurl;
        }
    }
    function go2listpage(vmid){
        var newurl = 'module?mid='+vmid;
        window.location = newurl;
    }
</script> 



@endsection