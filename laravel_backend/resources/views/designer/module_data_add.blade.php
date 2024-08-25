@extends('layouts.app')
@section('content')
<div class="page-content">
                    <div class="container-fluid">
 
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                <form action="save?mid={{$module_info->id}}" method="POST" ENCTYPE="multipart/form-data" >
                                    @csrf
                                <div class="card-header">
                                    <div class="row" >
                                        <div class="col-3 text-start">
                                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                                <h4 class="card-title">{{ucwords($module_info->module_name,' ')}} - Add</h4>
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
                                            <!-- <button class="btn btn-info btn-md" onClick="go2listpage({{$module_info->id}})" >List Page</button> -->
                                            <a class="btn btn-info btn-md" href="{{'module?mid='.$module_info->id}}" >List Page</a>
                                        </div>
                                    </div>
                                </div>
                                    <div class="card-body">
                                       
                                        <div class="row">
                                            <div class="col-lg-12">
                                             
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
                                                        
                                                        <input type="hidden" name="continue" id="continue" value="Y" />
                                                        <!-- <input type="hidden" name="mid" id="mid" value="<?php //echo $module->id; ?>" /> -->
                                                        <input type="hidden" name="baseurl" id="baseurl" value="<?php //echo base_url(); ?>" />
                                                        <input type="hidden" name="table_name" id="table_name" value="{{$module_info->table_name}}" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-footer">
                                        <div class="row " > 
                                            <div class="col-md-6 text-start mt-2">
                                                <button type="submit" class="btn btn-primary waves-effect waves-light w-md">Submit</button>
                                            </div>
                                            <div class="col-md-6 text-end  mt-2">
                                                <button type="reset" class="btn btn-outline-danger waves-effect waves-light w-md">Reset</button>
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div> <!-- container-fluid -->
                </div>


<script>
    function go2listpage(vmid){
        var newurl = 'module?mid='+vmid;
        window.location = newurl;
    }
</script> 



@endsection