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
                                                    <h4 class="card-title">Designer Modules - List</h4>
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
                                                <a title="Add a module" class="btn btn-info btn-md" href="designer_add"><i class="fa fa-plus"></i></a>
                                                <!-- <button title="Search" class="btn btn-info btn-md" data-bs-toggle="modal" data-bs-target=".bs-example-modal-center" ><i class="fa fa-search"></i></button> -->
                                            </div>
                                        </div>
                                    
                                        <!-- <h4 class="card-title">Default Datatable</h4>
                                        <p class="card-title-desc">DataTables has most features enabled by
                                            default, so all you need to do to use it with your own tables is to call
                                            the construction function: <code>$().DataTable();</code>.
                                        </p> -->
        
                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>                                                
                                                <tr class="bg-info text-white">
                                                    <th>ID</th> 
                                                    <th>Module Name</th> <th>Table Name</th>                                                
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
        
                                            <tbody> 
                                            
                                            @foreach($rows as $row)
                                            <tr>
                                                <td> {{$row->id}} </td> 
                                                <td> {{$row->module_name}} </td> 
                                                <td> {{$row->table_name}} </td> 
                                                   
                                                <td class="text-center"> 
                                                    <a class="btn btn-info" href="designer_edit?mid={{ $row->id }}" ><i class="fas fa-edit"></i></a>
                                                    &nbsp;&nbsp;&nbsp;
                                                    <button class="btn btn-danger"  onclick="javascript:recdel('{{ $row->id }}')" ><i class="fas fa-trash"></i></button>
                                                </td>
                                            </tr> 
                                            @endforeach 
                                          
                                            </tbody>
                                        </table>
                                        @if($rows->links())
                                            {{ $rows->links() }}
                                        @endif
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                      

                    </div> <!-- container-fluid -->



                    {{-- <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Search</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="search" >
                                        @csrf
                                        <div class="row">
                                            <div class="mb-3">
                                                <label class="form-label" for="formrow-Fullname-input">Waht to find?</label>
                                                <input type="text" class="form-control" id="srch_text" name="srch_text" placeholder="Enter text to search">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label class="col-form-label">Where to find?</label>
                                            <div class="">
                                                <select class="form-select" id="srch_field" name="srch_field">
                                                @foreach($module_fields as $field)
                                                    <option value="{{ $field->field_name }}">{{ $field->field_label }}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-3">
                                                <input type="submit" class="btn btn-success" value="Submit" />
                                            </div>
                                        </div>
                                        <input type="hidden" id="mid" name="mid" value="{{$module_info->id}}" />

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div> --}}






                </div>
 <script>
    function recedit(vmid){
        // var rid = vrecid;
        // var mid=document.getElementById('mid').value;
        //var vbasurl = ''; //document.getElementById('baseurl').value;
        var newurl = 'designer_edit?mid='+vmid;
        window.location = newurl;
        //alert('mid: '+mid+' , rid: '+rid);
    }
   
    function recdel(vrecid){
        var mid = vrecid;
        // var mid=document.getElementById('mid').value;
         //alert('mid: '+mid);

        if(confirm('Are you sure ?')){
            //var vbasurl = document.getElementById('baseurl').value;
            var newurl = 'dznr_delete?mid='+mid;
            window.location = newurl;
        }
    }
</script> 



@endsection