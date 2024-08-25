@extends('layouts.app')
@section('content')
@php 
    if(!empty($row)){
        $hmpg = $row[0]; 
    }else{
        $hmpg = $row;
    }
@endphp
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <form action="{{ $action }}" method="POST" ENCTYPE="multipart/form-data">
                        @csrf
                        <div class="card-header">
                            <div class="row">
                                <div class="col-3 text-start">
                                    <div class="page-title-box d-flex align-items-center justify-content-between">
                                        <h4 class="card-title">Home Page </h4>
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
                                        <div class="col-md-12 mt-3" align="center" style="background-color:lightgray">
                                            <h3>Section 1</h3>
                                        </div>
                                        <input type="hidden" id="id" name="id" value="@if(!empty($hmpg)) {{ $hmpg->id }} @endif" />
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="header1_image">IMAGE1</label>
                                                <input type="file" id="header1_image" name="header1_image" class="form-control">
                                                <div>@if(!empty($hmpg)) {{ $hmpg->header1_image }} @endif</div>
                                            </div>
                                            <div id="diverr_header1_image" text-danger></div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="header1_line1">HEADER1 LINE1</label>
                                                <input type="text" id="header1_line1" name="header1_line1" class="form-control" placeholder="" maxlength="" value="@if(!empty($hmpg)) {{ $hmpg->header1_line1 }} @endif" />
                                            </div>
                                            <div id="diverr_header1_line1" text-danger></div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="header1_line2">HEADER1 LINE2</label>
                                                <input type="text" id="header1_line2" name="header1_line2" class="form-control" placeholder="" maxlength="" value="@if(!empty($hmpg)) {{ $hmpg->header1_line2 }} @endif" />
                                            </div>
                                            <div id="diverr_header1_line2" text-danger></div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="header2_image">HEADER2 IMAGE</label>
                                                <input type="file" id="header2_image" name="header2_image" class="form-control">
                                                <div>@if(!empty($hmpg)) {{ $hmpg->header2_image }}  @endif</div>
                                            </div>
                                            <div id="diverr_header2_image" text-danger></div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="header2_line1">HEADER2 LINE1</label>
                                                <input type="text" id="header2_line1" name="header2_line1" class="form-control" placeholder="" maxlength="" value="@if(!empty($hmpg)) {{ $hmpg->header2_line1 }} @endif" />
                                            </div>
                                            <div id="diverr_header2_line1" text-danger></div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="header2_line2">HEADER2 LINE2</label>
                                                <input type="text" id="header2_line2" name="header2_line2" class="form-control" placeholder="" maxlength="" value="@if(!empty($hmpg)) {{ $hmpg->header2_line2 }} @endif" />
                                            </div>
                                            <div id="diverr_header2_line2" text-danger></div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="header3_image">HEADER3 IMAGE</label>
                                                <input type="file" id="header3_image" name="header3_image" class="form-control">
                                                <div>@if(!empty($hmpg)) {{ $hmpg->header3_image }} @endif</div>
                                            </div>
                                            <div id="diverr_header3_image" text-danger></div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="header3_line1">HEADER3 LINE1</label>
                                                <input type="text" id="header3_line1" name="header3_line1" class="form-control" placeholder="" maxlength="" value="@if(!empty($hmpg)) {{ $hmpg->header3_line1 }} @endif" />
                                            </div>
                                            <div id="diverr_header3_line1" text-danger></div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="header3_line2">HEADER3 LINE2</label>
                                                <input type="text" id="header3_line2" name="header3_line2" class="form-control" placeholder="" maxlength="" value="@if(!empty($hmpg)) {{ $hmpg->header3_line2 }} @endif" />
                                            </div>
                                            <div id="diverr_header3_line2" text-danger></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 mt-3" align="center" style="background-color:lightgray">
                                            <h3>Section 2</h3>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="section2_right_icon">SECTION2 RIGHT ICON</label>
                                                <input type="file" id="section2_right_icon" name="section2_right_icon" class="form-control">
                                                <div>@if(!empty($hmpg)) {{ $hmpg->section2_right_icon }} @endif</div>
                                            </div>
                                            <div id="diverr_section2_right_icon" text-danger></div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="section2_right_heading">SECTION2 RIGHT HEADING</label>
                                                <input type="text" id="section2_right_heading" name="section2_right_heading" class="form-control" placeholder="" maxlength="" value="@if(!empty($hmpg)) {{ $hmpg->section2_right_heading }} @endif" />
                                            </div>
                                            <div id="diverr_section2_right_heading" text-danger></div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="section2_right_text">SECTION2 RIGHT TEXT</label>
                                                <input type="text" id="section2_right_text" name="section2_right_text" class="form-control" placeholder="" maxlength="" value="@if(!empty($hmpg)) {{ $hmpg->section2_right_text }} @endif" />
                                            </div>
                                            <div id="diverr_section2_right_text" text-danger></div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="section2_center_icon">SECTION2 CENTER ICON</label>
                                                <input type="file" id="section2_center_icon" name="section2_center_icon" class="form-control">
                                                <div>@if(!empty($hmpg)) {{ $hmpg->section2_center_icon }} @endif</div>
                                            </div>
                                            <div id="diverr_section2_center_icon" text-danger></div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="section2_center_heading">SECTION2 CENTER HEADING</label>
                                                <input type="text" id="section2_center_heading" name="section2_center_heading" class="form-control" placeholder="" maxlength="" value="@if(!empty($hmpg)) {{ $hmpg->section2_center_heading }} @endif" />
                                            </div>
                                            <div id="diverr_section2_center_heading" text-danger></div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="section2_center_text">SECTION2 CENTER TEXT</label>
                                                <input type="text" id="section2_center_text" name="section2_center_text" class="form-control" placeholder="" maxlength="" value="@if(!empty($hmpg)) {{ $hmpg->section2_center_text }} @endif" />
                                            </div>
                                            <div id="diverr_section2_center_text" text-danger></div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="section2_left_icon">SECTION2 LEFT ICON</label>
                                                <input type="file" id="section2_left_icon" name="section2_left_icon" class="form-control">
                                                <div>@if(!empty($hmpg)) {{ $hmpg->section2_left_icon }} @endif</div>
                                            </div>
                                            <div id="diverr_section2_left_icon" text-danger></div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="section2_left_heading">SECTION2 LEFT HEADING</label>
                                                <input type="text" id="section2_left_heading" name="section2_left_heading" class="form-control" placeholder="" maxlength="" value="@if(!empty($hmpg)) {{ $hmpg->section2_left_heading }} @endif" />
                                            </div>
                                            <div id="diverr_section2_left_heading" text-danger></div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="section2_left_text">SECTION2 LEFT TEXT</label>
                                                <input type="text" id="section2_left_text" name="section2_left_text" class="form-control" placeholder="" maxlength="" value="@if(!empty($hmpg)) {{ $hmpg->section2_left_text }} @endif" />
                                            </div>
                                            <div id="diverr_section2_left_text" text-danger></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 mt-3" align="center" style="background-color:lightgray">
                                            <h3>Section 3</h3>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="section3_right_image">SECTION3 RIGHT IMAGE</label>
                                                <input type="file" id="section3_right_image" name="section3_right_image" class="form-control">
                                                <div>@if(!empty($hmpg)) {{ $hmpg->section3_right_image }} @endif</div>
                                            </div>
                                            <div id="diverr_section3_right_image" text-danger></div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="section3_left_image">SECTION3 LEFT IMAGE</label>
                                                <input type="file" id="section3_left_image" name="section3_left_image" class="form-control">
                                                <div>@if(!empty($hmpg)) {{ $hmpg->section3_left_image }} @endif</div>
                                            </div>
                                            <div id="diverr_section3_left_image" text-danger></div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="section3_center_heading">SECTION3 CENTER HEADING</label>
                                                <input type="text" id="section3_center_heading" name="section3_center_heading" class="form-control" placeholder="" maxlength="" value="@if(!empty($hmpg)) {{ $hmpg->section3_center_heading }} @endif" />
                                            </div>
                                            <div id="diverr_section3_center_heading" text-danger></div>
                                        </div>
                                        <div class="col-md-12 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="section3_center_text">SECTION3 CENTER TEXT</label>
                                                <textarea id="section3_center_text" name="section3_center_text" class="form-control" placeholder="" maxlength="">@if(!empty($hmpg)) {{ $hmpg->section3_center_text }} @endif</textarea>
                                            </div>
                                            <div id="diverr_section3_center_text" text-danger></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 mt-3" align="center" style="background-color:lightgray">
                                            <h3>Section 4</h3>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="section4_heading">SECTION4 HEADING</label>
                                                <input type="text" id="section4_heading" name="section4_heading" class="form-control" placeholder="" maxlength="" value="@if(!empty($hmpg)) {{ $hmpg->section4_heading }} @endif" />
                                            </div>
                                            <div id="diverr_section4_heading" text-danger></div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="section4_text">SECTION4 TEXT</label>
                                                <input type="text" id="section4_text" name="section4_text" class="form-control" placeholder="" maxlength="" value="@if(!empty($hmpg)) {{ $hmpg->section4_text }} @endif" />
                                            </div>
                                            <div id="diverr_section4_text" text-danger></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 mt-3" align="center" style="background-color:lightgray">
                                            <h3>Section 5</h3>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="section5_heading">SECTION5 HEADING</label>
                                                <input type="text" id="section5_heading" name="section5_heading" class="form-control" placeholder="" maxlength="" value="@if(!empty($hmpg)) {{ $hmpg->section5_heading }} @endif" />
                                            </div>
                                            <div id="diverr_section5_heading" text-danger></div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="section5_text">SECTION5 TEXT</label>
                                                <input type="text" id="section5_text" name="section5_text" class="form-control" placeholder="" maxlength="" value="@if(!empty($hmpg)) {{ $hmpg->section5_text }} @endif" />
                                            </div>
                                            <div id="diverr_section5_text" text-danger></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 mt-3" align="center" style="background-color:lightgray">
                                            <h3>Section 6</h3>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="section6_image1">SECTION6 IMAGE1</label>
                                                <input type="file" id="section6_image1" name="section6_image1" class="form-control">
                                                <div>@if(!empty($hmpg)) {{ $hmpg->section6_image1 }} @endif</div>
                                            </div>
                                            <div id="diverr_section6_image1" text-danger></div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="section6_heading1">SECTION6 HEADING1</label>
                                                <input type="text" id="section6_heading1" name="section6_heading1" class="form-control" placeholder="" maxlength="" value="@if(!empty($hmpg)) {{ $hmpg->section6_heading1 }} @endif" />
                                            </div>
                                            <div id="diverr_section6_heading1" text-danger></div>
                                        </div>
                                        <div class="col-md-12 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="section6_text1">SECTION6 TEXT1</label>
                                                <textarea id="section6_text1" name="section6_text1" class="form-control" placeholder="" maxlength="">@if(!empty($hmpg)) {{ $hmpg->section6_text1 }} @endif</textarea>
                                            </div>
                                            <div id="diverr_section6_text1" text-danger></div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="section6_url1">SECTION6 URL1</label>
                                                <input type="text" id="section6_url1" name="section6_url1" class="form-control" placeholder="" maxlength="" value="@if(!empty($hmpg)) {{ $hmpg->section6_url1 }} @endif" />
                                            </div>
                                            <div id="diverr_section6_url1" text-danger></div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="section6_image2">SECTION6 IMAGE2</label>
                                                <input type="file" id="section6_image2" name="section6_image2" class="form-control">
                                                <div>@if(!empty($hmpg)) {{ $hmpg->section6_image2 }} @endif</div>
                                            </div>
                                            <div id="diverr_section6_image2" text-danger></div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="section6_heading2">SECTION6 HEADING2</label>
                                                <input type="text" id="section6_heading2" name="section6_heading2" class="form-control" placeholder="" maxlength="" value="@if(!empty($hmpg)) {{ $hmpg->section6_heading2 }} @endif" />
                                            </div>
                                            <div id="diverr_section6_heading2" text-danger></div>
                                        </div>
                                        <div class="col-md-12 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="section6_text2">SECTION6 TEXT2</label>
                                                <textarea id="section6_text2" name="section6_text2" class="form-control" placeholder="" maxlength="">@if(!empty($hmpg)) {{ $hmpg->section6_text2 }} @endif</textarea>
                                            </div>
                                            <div id="diverr_section6_text2" text-danger></div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="section6_url2">SECTION6 URL2</label>
                                                <input type="text" id="section6_url2" name="section6_url2" class="form-control" placeholder="" maxlength="" value="@if(!empty($hmpg)) {{ $hmpg->section6_url2 }} @endif" />
                                            </div>
                                            <div id="diverr_section6_url2" text-danger></div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="section6_image3">SECTION6 IMAGE3</label>
                                                <input type="file" id="section6_image3" name="section6_image3" class="form-control">
                                                <div>@if(!empty($hmpg)) {{ $hmpg->section6_image3 }} @endif</div>
                                            </div>
                                            <div id="diverr_section6_image3" text-danger></div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="section6_heading3">SECTION6 HEADING3</label>
                                                <input type="text" id="section6_heading3" name="section6_heading3" class="form-control" placeholder="" maxlength="" value="@if(!empty($hmpg)) {{ $hmpg->section6_heading3 }} @endif" />
                                            </div>
                                            <div id="diverr_section6_heading3" text-danger></div>
                                        </div>
                                        <div class="col-md-12 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="section6_text3">SECTION6 TEXT3</label>
                                                <textarea id="section6_text3" name="section6_text3" class="form-control" placeholder="" maxlength="">@if(!empty($hmpg)) {{ $hmpg->section6_text3 }} @endif</textarea>
                                            </div>
                                            <div id="diverr_section6_text3" text-danger></div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="section6_url3">SECTION6 URL3</label>
                                                <input type="text" id="section6_url3" name="section6_url3" class="form-control" placeholder="" maxlength="" value="@if(!empty($hmpg)) {{ $hmpg->section6_url3 }} @endif" />
                                            </div>
                                            <div id="diverr_section6_url3" text-danger></div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="section6_image4">SECTION6 IMAGE4</label>
                                                <input type="file" id="section6_image4" name="section6_image4" class="form-control">
                                                <div>@if(!empty($hmpg)) {{ $hmpg->section6_image4 }} @endif</div>
                                            </div>
                                            <div id="diverr_section6_image4" text-danger></div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="section6_heading4">SECTION6 HEADING4</label>
                                                <input type="text" id="section6_heading4" name="section6_heading4" class="form-control" placeholder="" maxlength="" value="@if(!empty($hmpg)) {{ $hmpg->section6_heading4 }} @endif" />
                                            </div>
                                            <div id="diverr_section6_heading4" text-danger></div>
                                        </div>
                                        <div class="col-md-12 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="section6_text4">SECTION6 TEXT4</label>
                                                <textarea id="section6_text4" name="section6_text4" class="form-control" placeholder="" maxlength="">@if(!empty($hmpg)) {{ $hmpg->section6_text4 }} @endif</textarea>
                                            </div>
                                            <div id="diverr_section6_text4" text-danger></div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="section6_url4">SECTION6 URL4</label>
                                                <input type="text" id="section6_url4" name="section6_url4" class="form-control" placeholder="" maxlength="" value="@if(!empty($hmpg)) {{ $hmpg->section6_url4 }} @endif" />
                                            </div>
                                            <div id="diverr_section6_url4" text-danger></div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="section6_image5">SECTION6 IMAGE5</label>
                                                <input type="file" id="section6_image5" name="section6_image5" class="form-control">
                                                <div>@if(!empty($hmpg)) {{ $hmpg->section6_image5 }} @endif</div>
                                            </div>
                                            <div id="diverr_section6_image5" text-danger></div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="section6_heading5">SECTION6 HEADING5</label>
                                                <input type="text" id="section6_heading5" name="section6_heading5" class="form-control" placeholder="" maxlength="" value="@if(!empty($hmpg)) {{ $hmpg->section6_heading5 }} @endif" />
                                            </div>
                                            <div id="diverr_section6_heading5" text-danger></div>
                                        </div>
                                        <div class="col-md-12 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="section6_text5">SECTION6 TEXT5</label>
                                                <textarea id="section6_text5" name="section6_text5" class="form-control" placeholder="" maxlength="">@if(!empty($hmpg)) {{ $hmpg->section6_text5 }} @endif</textarea>
                                            </div>
                                            <div id="diverr_section6_text5" text-danger></div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="section6_url5">SECTION6 URL5</label>
                                                <input type="text" id="section6_url5" name="section6_url5" class="form-control" placeholder="" maxlength="" value="@if(!empty($hmpg)) {{ $hmpg->section6_url5 }} @endif" />
                                            </div>
                                            <div id="diverr_section6_url5" text-danger></div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="section6_image6">SECTION6 IMAGE6</label>
                                                <input type="file" id="section6_image6" name="section6_image6" class="form-control">
                                                <div>@if(!empty($hmpg)) {{ $hmpg->section6_image6 }} @endif</div>
                                            </div>
                                            <div id="diverr_section6_image6" text-danger></div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="section6_heading6">SECTION6 HEADING6</label>
                                                <input type="text" id="section6_heading6" name="section6_heading6" class="form-control" placeholder="" maxlength="" value="@if(!empty($hmpg)) {{ $hmpg->section6_heading6 }} @endif" />
                                            </div>
                                            <div id="diverr_section6_heading6" text-danger></div>
                                        </div>
                                        <div class="col-md-12 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="section6_text6">SECTION6 TEXT6</label>
                                                <textarea id="section6_text6" name="section6_text6" class="form-control" placeholder="" maxlength="">@if(!empty($hmpg)) {{ $hmpg->section6_text6 }} @endif</textarea>
                                            </div>
                                            <div id="diverr_section6_text6" text-danger></div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="section6_url6">SECTION6 URL6</label>
                                                <input type="text" id="section6_url6" name="section6_url6" class="form-control" placeholder="" maxlength="" value="@if(!empty($hmpg)) {{ $hmpg->section6_url6 }} @endif" />
                                            </div>
                                            <div id="diverr_section6_url6" text-danger></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 mt-3" align="center" style="background-color:lightgray">
                                            <h3>Section 7</h3>
                                        </div>    
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="section7_image">SECTION7 IMAGE</label>
                                                <input type="file" id="section7_image" name="section7_image" class="form-control">
                                                <div>@if(!empty($hmpg)) {{ $hmpg->section7_image }} @endif</div>
                                            </div>
                                            <div id="diverr_section7_image" text-danger></div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="section7_heading">SECTION7 HEADING</label>
                                                <input type="text" id="section7_heading" name="section7_heading" class="form-control" placeholder="" maxlength="" value="@if(!empty($hmpg)) {{ $hmpg->section7_heading }} @endif" />
                                            </div>
                                            <div id="diverr_section7_heading" text-danger></div>
                                        </div>
                                        <div class="col-md-12 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="section7_text">SECTION7 TEXT</label>
                                                <textarea id="section7_text" name="section7_text" class="form-control" placeholder="" maxlength="">@if(!empty($hmpg)) {{ $hmpg->section7_text }} @endif</textarea>
                                            </div>
                                            <div id="diverr_section7_text" text-danger></div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="section7_url">SECTION7 URL</label>
                                                <input type="text" id="section7_url" name="section7_url" class="form-control" placeholder="" maxlength="" value="@if(!empty($hmpg)) {{ $hmpg->section7_url }} @endif" />
                                            </div>
                                            <div id="diverr_section7_url" text-danger></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 mt-3" align="center" style="background-color:lightgray">
                                            <h3>Section 8</h3>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="section8_heading">SECTION8 HEADING</label>
                                                <input type="text" id="section8_heading" name="section8_heading" class="form-control" placeholder="" maxlength="" value="@if(!empty($hmpg)) {{ $hmpg->section8_heading }} @endif" />
                                            </div>
                                            <div id="diverr_section8_heading" text-danger></div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="section8_text">SECTION8 TEXT</label>
                                                <input type="text" id="section8_text" name="section8_text" class="form-control" placeholder="" maxlength="" value="@if(!empty($hmpg)) {{ $hmpg->section8_text }} @endif" />
                                            </div>
                                            <div id="diverr_section8_text" text-danger></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 mt-3" align="center" style="background-color:lightgray">
                                            <h3>Section 9</h3>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="section9_image1">SECTION9 IMAGE1</label>
                                                <input type="file" id="section9_image1" name="section9_image1" class="form-control">
                                                <div>@if(!empty($hmpg)) {{ $hmpg->section9_image1 }} @endif</div>
                                            </div>
                                            <div id="diverr_section9_image1" text-danger></div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="section9_heading1">SECTION9 HEADING1</label>
                                                <input type="text" id="section9_heading1" name="section9_heading1" class="form-control" placeholder="" maxlength="" value="@if(!empty($hmpg)) {{ $hmpg->section9_heading1 }} @endif" />
                                            </div>
                                            <div id="diverr_section9_heading1" text-danger></div>
                                        </div>
                                        <div class="col-md-12 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="section9_text1">SECTION9 TEXT1</label>
                                                <textarea id="section9_text1" name="section9_text1" class="form-control" placeholder="" maxlength="">@if(!empty($hmpg)) {{ $hmpg->section9_text1 }} @endif</textarea>
                                            </div>
                                            <div id="diverr_section9_text1" text-danger></div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="section9_url1">SECTION9 URL1</label>
                                                <input type="text" id="section9_url1" name="section9_url1" class="form-control" placeholder="" maxlength="" value="@if(!empty($hmpg)) {{ $hmpg->section9_url1 }} @endif" />
                                            </div>
                                            <div id="diverr_section9_url1" text-danger></div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="section9_image2">SECTION9 IMAGE2</label>
                                                <input type="file" id="section9_image2" name="section9_image2" class="form-control">
                                                <div>@if(!empty($hmpg)) {{ $hmpg->section9_image2 }} @endif</div>
                                            </div>
                                            <div id="diverr_section9_image2" text-danger></div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="section9_heading2">SECTION9 HEADING2</label>
                                                <input type="text" id="section9_heading2" name="section9_heading2" class="form-control" placeholder="" maxlength="" value="@if(!empty($hmpg)) {{ $hmpg->section9_heading2 }} @endif" />
                                            </div>
                                            <div id="diverr_section9_heading2" text-danger></div>
                                        </div>
                                        <div class="col-md-12 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="section9_text2">SECTION9 TEXT2</label>
                                                <textarea id="section9_text2" name="section9_text2" class="form-control" placeholder="" maxlength="">@if(!empty($hmpg)) {{ $hmpg->section9_text2 }} @endif</textarea>
                                            </div>
                                            <div id="diverr_section9_text2" text-danger></div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="section9_url2">SECTION9 URL2</label>
                                                <input type="text" id="section9_url2" name="section9_url2" class="form-control" placeholder="" maxlength="" value="@if(!empty($hmpg)) {{ $hmpg->section9_url2 }} @endif" />
                                            </div>
                                            <div id="diverr_section9_url2" text-danger></div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="section9_image3">SECTION9 IMAGE3</label>
                                                <input type="file" id="section9_image3" name="section9_image3" class="form-control">
                                                <div>@if(!empty($hmpg)) {{ $hmpg->section9_image3 }} @endif</div>
                                            </div>
                                            <div id="diverr_section9_image3" text-danger></div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="section9_heading3">SECTION9 HEADING3</label>
                                                <input type="text" id="section9_heading3" name="section9_heading3" class="form-control" placeholder="" maxlength="" value="@if(!empty($hmpg)) {{ $hmpg->section9_heading3 }} @endif" />
                                            </div>
                                            <div id="diverr_section9_heading3" text-danger></div>
                                        </div>
                                        <div class="col-md-12 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="section9_text3">SECTION9 TEXT3</label>
                                                <textarea id="section9_text3" name="section9_text3" class="form-control" placeholder="" maxlength="">@if(!empty($hmpg)) {{ $hmpg->section9_text3 }} @endif</textarea>
                                            </div>
                                            <div id="diverr_section9_text3" text-danger></div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="section9_url3">SECTION9 URL3</label>
                                                <input type="text" id="section9_url3" name="section9_url3" class="form-control" placeholder="" maxlength="" value="@if(!empty($hmpg)) {{ $hmpg->section9_url3 }} @endif" />
                                            </div>
                                            <div id="diverr_section9_url3" text-danger></div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="section9_image4">SECTION9 IMAGE4</label>
                                                <input type="file" id="section9_image4" name="section9_image4" class="form-control">
                                                <div>@if(!empty($hmpg)) {{ $hmpg->section9_image4 }} @endif</div>
                                            </div>
                                            <div id="diverr_section9_image4" text-danger></div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="section9_heading4">SECTION9 HEADING4</label>
                                                <input type="text" id="section9_heading4" name="section9_heading4" class="form-control" placeholder="" maxlength="" value="@if(!empty($hmpg)) {{ $hmpg->section9_heading4 }} @endif" />
                                            </div>
                                            <div id="diverr_section9_heading4" text-danger></div>
                                        </div>
                                        <div class="col-md-12 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="section9_text4">SECTION9 TEXT4</label>
                                                <textarea id="section9_text4" name="section9_text4" class="form-control" placeholder="" maxlength="">@if(!empty($hmpg)) {{ $hmpg->section9_text4 }} @endif</textarea>
                                            </div>
                                            <div id="diverr_section9_text4" text-danger></div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="section9_url4">SECTION9 URL4</label>
                                                <input type="text" id="section9_url4" name="section9_url4" class="form-control" placeholder="" maxlength="" value="@if(!empty($hmpg)) {{ $hmpg->section9_url4 }} @endif" />
                                            </div>
                                            <div id="diverr_section9_url4" text-danger></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 mt-3" align="center" style="background-color:lightgray">
                                            <h3>Section 10</h3>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="section10_heading">SECTION10 HEADING</label>
                                                <input type="text" id="section10_heading" name="section10_heading" class="form-control" placeholder="" maxlength="" value="@if(!empty($hmpg)) {{ $hmpg->section10_heading }} @endif" />
                                            </div>
                                            <div id="diverr_section10_heading" text-danger></div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="section10_text">SECTION10 TEXT</label>
                                                <input type="text" id="section10_text" name="section10_text" class="form-control" placeholder="" maxlength="" value="@if(!empty($hmpg)) {{ $hmpg->section10_text }} @endif" />
                                            </div>
                                            <div id="diverr_section10_text" text-danger></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 mt-3" align="center" style="background-color:lightgray">
                                            <h3>Section 11</h3>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="section11_icon1">SECTION11 ICON1</label>
                                                <input type="file" id="section11_icon1" name="section11_icon1" class="form-control">
                                                <div>@if(!empty($hmpg)) {{ $hmpg->section11_icon1 }} @endif</div>
                                            </div>
                                            <div id="diverr_section11_icon1" text-danger></div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="section11_text1">SECTION11 TEXT1</label>
                                                <input type="text" id="section11_text1" name="section11_text1" class="form-control" placeholder="" maxlength="" value="@if(!empty($hmpg)) {{ $hmpg->section11_text1 }} @endif" />
                                            </div>
                                            <div id="diverr_section11_text1" text-danger></div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="section11_icon2">SECTION11 ICON2</label>
                                                <input type="file" id="section11_icon2" name="section11_icon2" class="form-control">
                                                <div>@if(!empty($hmpg)) {{ $hmpg->section11_icon2 }} @endif</div>
                                            </div>
                                            <div id="diverr_section11_icon2" text-danger></div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="section11_text2">SECTION11 TEXT2</label>
                                                <input type="text" id="section11_text2" name="section11_text2" class="form-control" placeholder="" maxlength="" value="@if(!empty($hmpg)) {{ $hmpg->section11_text2 }} @endif" />
                                            </div>
                                            <div id="diverr_section11_text2" text-danger></div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="section11_icon3">SECTION11 ICON3</label>
                                                <input type="file" id="section11_icon3" name="section11_icon3" class="form-control">
                                                <div>@if(!empty($hmpg)) {{ $hmpg->section11_icon3 }} @endif</div>
                                            </div>
                                            <div id="diverr_section11_icon3" text-danger></div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="section11_text3">SECTION11 TEXT3</label>
                                                <input type="text" id="section11_text3" name="section11_text3" class="form-control" placeholder="" maxlength="" value="@if(!empty($hmpg)) {{ $hmpg->section11_text3 }} @endif" />
                                            </div>
                                            <div id="diverr_section11_text3" text-danger></div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="section11_icon4">SECTION11 ICON4</label>
                                                <input type="file" id="section11_icon4" name="section11_icon4" class="form-control">
                                                <div>@if(!empty($hmpg)) {{ $hmpg->section11_icon4 }} @endif</div>
                                            </div>
                                            <div id="diverr_section11_icon4" text-danger></div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="section11_text4">SECTION11 TEXT4</label>
                                                <input type="text" id="section11_text4" name="section11_text4" class="form-control" placeholder="" maxlength="" value="@if(!empty($hmpg)) {{ $hmpg->section11_text4 }} @endif" />
                                            </div>
                                            <div id="diverr_section11_text4" text-danger></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 mt-3" align="center" style="background-color:lightgray">
                                            <h3>Section 12</h3>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="section12_heading">SECTION12 HEADING</label>
                                                <input type="text" id="section12_heading" name="section12_heading" class="form-control" placeholder="" maxlength="" value="@if(!empty($hmpg)) {{ $hmpg->section12_heading }} @endif" />
                                            </div>
                                            <div id="diverr_section12_heading" text-danger></div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="section12_text">SECTION12 TEXT</label>
                                                <input type="text" id="section12_text" name="section12_text" class="form-control" placeholder="" maxlength="" value="@if(!empty($hmpg)) {{ $hmpg->section12_text }} @endif" />
                                            </div>
                                            <div id="diverr_section12_text" text-danger></div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="active">ACTIVE</label>
                                                <select class="form-control" name="active" id="active">
                                                    <option value="">--Select--</option>
                                                    <option value="1">
                                                        Yes
                                                    </option>
                                                    <option value="2">
                                                        No
                                                    </option>
                                                </select>
                                            </div>
                                            <div id="diverr_active" text-danger></div>
                                        </div> 
                                    </div>
                                    <input type="hidden" name="continue" id="continue" value="Y" />
                                    
                                    <input type="hidden" name="baseurl" id="baseurl" value="" />
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