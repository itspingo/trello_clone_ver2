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
                                                    <h4 class="card-title">{{ucwords($module_title,' ')}}- List</h4>
                                                </div>
                                            </div>
                                            <div class="col-6 text-left">
                                           
                                                @if(session('flash_success') != '')
                                                    <div class="alert alert-success">{{session('flash_success')}}</div>
                                                @endif
                                                @if(session('flash_failure') != '')
                                                    <div class="alert alert-danger">{{session('flash_failure')}}</div>
                                                @endif
                                               
                                            </div>
                                            <div class="col-3 text-end">
                                                <a href="{{route('backend.board_lists.create') }}" title="Add Record" class="btn btn-info btn-md" ><i class="fa fa-plus"></i> Add Record</a>
                                                <!-- <button title="Search" class="btn btn-info btn-md" data-bs-toggle="modal" data-bs-target=".bs-example-modal-center" ><i class="fa fa-search"></i></button> -->
                                            </div>
                                        </div>
                                    
                                       
        
                                        <div class="table-responsive">
                                        <table class="table table-bordered datatable" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>                                                
                                            <tr class="bg-info text-white">    
                                                
                                                <th>ID</th><th>BOARD</th><th>TITLE</th><th>VISIBILITY</th><th>ACTIVE</th>
                                           
                                               <th>Action</th>
                                            </tr>
                                            </thead>
        
                                            <tbody>
                                            
                                            @foreach($rows as $row)
                                            <tr>
                                                <td> {{ $row->id }}</td>
                                                <td>{{getfieldval("$row->board_id","boards","title")}}</td><td> {{ $row->title }}</td><td> {{ $row->visibility }}</td>
                                                <td>{{getfieldval("$row->active","active_status","is_active")}}</td>
                                                <td class="text-center"> 
                                                <div class="btn-group">
                                                    <a href="{{url('backend/board_lists/'.id2str($row->id).'/edit')}}" class="btn btn-info" ><i class="fas fa-edit"></i></a>
                                                    &nbsp;&nbsp;&nbsp;
                                                     <form action="{{ route('backend.board_lists.delete')}}" method="post">
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger rounded-right" onclick="return confirm('Are you sure?');">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                        <input type="hidden" name="delid" value="{{id2str($row->id)}}">
                                                    </form>
                                                    </div>
                                                </td>
                                            </tr> 
                                            @endforeach 
                                          
                                            </tbody>
                                        </table>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div> 
                        </div>
                      

                    </div>






                </div>
<script>
   
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