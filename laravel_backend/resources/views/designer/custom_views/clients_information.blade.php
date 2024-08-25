@extends('layouts.app')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <form action="save?mid={{$module_info->id}}" method="POST" ENCTYPE="multipart/form-data">
                        @csrf
                        <div class="card-header">
                            <div class="row">
                                <div class="col-3 text-start">
                                    <div class="page-title-box d-flex align-items-center justify-content-between">
                                        <h4 class="card-title">{{ucwords($module_info->module_name,' ')}} - add (Customized) </h4>
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
                                    <button class="btn btn-info btn-md" onClick="go2listpage({{$module_info->id}})">List Page</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-lg-12">

                                    <!-- <h5 class="font-size-14 mb-4"><i class="mdi mdi-arrow-right text-primary me-1"></i> Form groups</h5> -->

                                    <div class="row">

                                        <input type="hidden" id="id" name="id" value="" />

                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="name">NAME</label>
                                                <input type="text" id="name" name="name" class="form-control" placeholder="" maxlength="" value="" />
                                            </div>
                                            <div id="diverr_name" text-danger></div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="occupation">OCCUPATION</label>
                                                <input type="text" id="occupation" name="occupation" class="form-control" placeholder="" maxlength="" value="" />
                                            </div>
                                            <div id="diverr_occupation" text-danger></div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="address">ADDRESS</label>
                                                <input type="text" id="address" name="address" class="form-control" placeholder="" maxlength="" value="" />
                                            </div>
                                            <div id="diverr_address" text-danger></div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="phone">PHONE</label>
                                                <input type="text" id="phone" name="phone" class="form-control" placeholder="" maxlength="" value="" />
                                            </div>
                                            <div id="diverr_phone" text-danger></div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="dob">DOB</label>
                                                <input type="date" id="dob" name="dob" class="form-control" placeholder="" maxlength="" value="">
                                            </div>
                                            <div id="diverr_dob" text-danger></div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="plot_no">PLOT NO</label>
                                                <input type="text" id="plot_no" name="plot_no" class="form-control" placeholder="" maxlength="" value="" />
                                            </div>
                                            <div id="diverr_plot_no" text-danger></div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="lifted">LIFTED</label>
                                                <input type="text" id="lifted" name="lifted" class="form-control" placeholder="" maxlength="" value="" />
                                            </div>
                                            <div id="diverr_lifted" text-danger></div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="layout">LAYOUT</label>
                                                <input type="text" id="layout" name="layout" class="form-control" placeholder="" maxlength="" value="" />
                                            </div>
                                            <div id="diverr_layout" text-danger></div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="amount">AMOUNT</label>
                                                <input type="text" id="amount" name="amount" class="form-control" placeholder="" maxlength="" value="" />
                                            </div>
                                            <div id="diverr_amount" text-danger></div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="agent_name">AGENT NAME</label>
                                                <input type="text" id="agent_name" name="agent_name" class="form-control" placeholder="" maxlength="" value="" />
                                            </div>
                                            <div id="diverr_agent_name" text-danger></div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="agent_address">AGENT ADDRESS</label>
                                                <input type="text" id="agent_address" name="agent_address" class="form-control" placeholder="" maxlength="" value="" />
                                            </div>
                                            <div id="diverr_agent_address" text-danger></div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="agent_occupation">AGENT OCCUPATION</label>
                                                <input type="text" id="agent_occupation" name="agent_occupation" class="form-control" placeholder="" maxlength="" value="" />
                                            </div>
                                            <div id="diverr_agent_occupation" text-danger></div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="agent_phone">AGENT PHONE</label>
                                                <input type="text" id="agent_phone" name="agent_phone" class="form-control" placeholder="" maxlength="" value="" />
                                            </div>
                                            <div id="diverr_agent_phone" text-danger></div>
                                        </div>
                                        <input type="hidden" id="active" name="active" value="" />

                                        <input type="hidden" id="create_date" name="create_date" value="" />


                                    </div>

                                    <input type="hidden" name="continue" id="continue" value="Y" />
                                    <!-- <input type="hidden" name="mid" id="mid" value="<?php //echo $module->id; 
                                                                                            ?>" /> -->
                                    <input type="hidden" name="baseurl" id="baseurl" value="<?php //echo base_url(); 
                                                                                            ?>" />
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <div class="row ">
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
    function go2listpage(vmid) {
        var newurl = 'module?mid=' + vmid;
        window.location = newurl;
    }
</script>



@endsection