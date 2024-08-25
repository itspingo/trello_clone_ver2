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

                                        <!-- <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="name">NAME</label>
                                                <input type="text" id="name" name="name" class="form-control" placeholder="" maxlength="" value="" />
                                            </div>
                                            <div id="diverr_name" text-danger></div>
                                        </div> -->



                                    </div>

                                    <div id="tab1">
                        <div class="section-header">
                            <h2 class="title"><br>Vehicle Information</h2>
                            <h5>Basic Information</h5>
                        </div>

                        

                        <div class="row" style="margin-left:10px;margin-right:10px;">
                            <div class="col-md-6 mt-3">
                                <div class="form-group">
                                    <label class="form-label" for="vehicle_year"> YEAR</label>
                                    <select class="form-control" name="vehicle_year" id="vehicle_year" onchange="javascript:getMakes();">
                                        <option>--Select--</option>
                                        <?php
                                        foreach ($vehicle_years as $vehicle_year) {
                                            echo '<option value="' . $vehicle_year->year . '">' . $vehicle_year->year . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div id="diverr_vehicle_year" text-danger></div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="form-group">
                                    <label class="form-label" for="vehicle_make_id"> MAKE</label>
                                    <div id="div_makes">
                                        <select class="form-control" name="vehicle_make_id" id="vehicle_make_id" onchange="javascript:getModels();">
                                            <option>--Select--</option>
                                        </select>
                                    </div>
                                </div>
                                <div id="diverr_vehicle_make_id" text-danger></div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="form-group">
                                    <label class="form-label" for="vehicle_model_id"> MODEL</label>
                                    <div id="div_models">
                                        <select class="form-control" name="vehicle_model_id" id="vehicle_model_id" onchange="javascript:getVarients();">
                                            <option>--Select--</option>
                                        </select>
                                    </div>
                                </div>
                                <div id="diverr_vehicle_model_id" text-danger></div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="form-group">
                                    <label class="form-label" for="vehicle_varient"> VARIENT</label>
                                    <div id="div_varients">
                                        <select class="form-control" name="vehicle_varient" id="vehicle_varient">
                                            <option>--Select--</option>
                                        </select>
                                    </div>
                                </div>
                                <div id="diverr_vehicle_varient" text-danger></div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="form-group">
                                    <label class="form-label" for="vehicle_color"> COLOR</label>
                                    <!-- <input type="text" id="vehicle_color" name="vehicle_color" class="form-control" placeholder="" maxlength="" value="" /> -->
                                    <select class="form-control" name="vehicle_color" id="vehicle_color">
                                        <option>--Select--</option>
                                        <?php
                                        foreach ($vehicle_colors as $vvehicle_color) {
                                            echo '<option value="' . $vvehicle_color->id . '">' . $vvehicle_color->vehicle_color . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div id="diverr_vehicle_color" text-danger></div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="form-group">
                                    <label class="form-label" for="vehicle_regno">VIN NUMBER (Optional)</label>
                                    <input type="text" id="vehicle_regno" name="vehicle_regno" class="form-control" placeholder="" maxlength="" value="" />
                                </div>
                                <div id="diverr_vehicle_regno" text-danger></div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="form-group">
                                    <label class="form-label" for="body_style_id">BODY STYLE</label>
                                    <select class="form-control" name="body_style_id" id="body_style_id">
                                        <option>--Select--</option>
                                        <?php
                                        foreach ($body_styles as $vbody_style) {
                                            echo '<option value="' . $vbody_style->id . '">' . $vbody_style->body_style . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div id="diverr_body_style_id" text-danger></div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="form-group">
                                    <label class="form-label" for="transmission_id">TRANSMISSION</label><br>
                                    <!-- <select class="form-control" name="transmission_id" id="transmission_id"> -->
                                    <!-- <option>--Select--</option> -->
                                    <?php
                                    foreach ($transmissions as $vtransmission) {
                                        echo '<span><input type="radio" name="transmission_id" value="' . $vtransmission->id . '" style="width:20px;height: 15px;" />' . $vtransmission->transmission . '&nbsp;&nbsp;</span>';
                                    }
                                    ?>
                                    <!-- </select> -->
                                </div>
                                <div id="diverr_transmission_id" text-danger></div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="form-group">
                                    <label for='miles' for="miles">MILEAGE</label>
                                    <!-- <input type="number" id="miles" name="miles" class="form-control" placeholder="" maxlength="" value="" /> -->
                                    <select class="form-control" name="miles" id="miles">
                                        <option>--Select--</option>
                                        <?php
                                        foreach ($mileage_ranges as $vmileage_range) {
                                            echo '<option value="' . $vmileage_range->id . '">' . $vmileage_range->mileage_range . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div id="diverr_miles" text-danger></div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="form-group">
                                    <label class="form-label" for="fuel_type_id">FUEL TYPE</label><br>
                                    <!-- <select class="form-control" name="fuel_type_id" id="fuel_type_id">
                                                <option>--Select--</option> -->
                                    <?php
                                    foreach ($fuel_types as $vfuel_types) {
                                        //echo '<option value="'.$vfuel_types->id.'">'.$vfuel_types->fuel_type.'</option>';
                                        echo '<input type="radio" name="fuel_type_id" id="fuel_type_id" value="' . $vfuel_types->id . '" style="width:20px;height: 15px;" />' . $vfuel_types->fuel_type . '&nbsp;&nbsp;';
                                    }
                                    ?>
                                    <!-- </select> -->
                                </div>
                                <div id="diverr_fuel_type_id" text-danger></div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="form-group">
                                    <label class="form-label" for="owners">OWNERS</label>
                                    <input type="text" id="owners" name="owners" class="form-control" placeholder="" maxlength="" value="" />
                                </div>
                                <div id="diverr_owners" text-danger></div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="form-group">
                                    <label for='expected_sell_price' for="expected_sell_price">EXPECTED SELL PRICE</label>
                                    <input type="number" id="expected_sell_price" name="expected_sell_price" class="form-control" placeholder="" maxlength="" value="" />
                                </div>
                                <div id="diverr_expected_sell_price" text-danger></div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="form-group">
                                    <label class="form-label" for="when_to_sell_id">HOW URGENT IS YOUR SALE?</label>
                                    <select class="form-control" name="when_to_sell_id" id="when_to_sell_id">
                                        <option>--Select--</option>
                                        <?php
                                        foreach ($when_to_sell_options as $vwhen_to_sell_option) {
                                            echo '<option value="' . $vwhen_to_sell_option->id . '">' . $vwhen_to_sell_option->when_to_sell_option . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div id="diverr_when_to_sell_id" text-danger></div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="form-group">
                                    <label class="form-label" for="alternative_contact_nos">ALTERNATIVE CONTACT NO.</label>
                                    <input type="text" id="alternative_contact_nos" name="alternative_contact_nos" class="form-control" placeholder="" maxlength="" value="" />
                                </div>
                                <div id="diverr_alternative_contact_nos" text-danger></div>
                            </div>
                            <div class="col-md-12 mt-3 mb-3">
                                <div class="row">
                                    <a href="#" class="btn btn-info btnBlock" onclick="show_tab('tab2')">Next</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="tab2" >
                        <div class="section-header">
                            <h2 class="title"><br>Vehicle Information</h2>
                            <h5>Extra Information</h5>
                        </div>
                        <div class="row" style="margin-left:10px;margin-right:10px;">
                            <div class="col-md-6 mt-3">
                                <div class="form-group">
                                    <label class="form-label" for="extra_features_ids">EXTRA FEATURES</label><br>
                                    <!-- <input type="text" id="extra_features_ids" name="extra_features_ids" class="form-control" placeholder="" maxlength="" value="" /> -->
                                    <!-- <select class="form-control select2"  name="extra_features_ids" id="extra_features_ids">
                                                <option>--Select--</option> -->
                                    <?php
                                    foreach ($extra_features as $vextra_feature) {
                                        echo '<input type="checkbox" id="extra_features_ids" name="extra_features_ids[]" value="' . $vextra_feature->id . '" style="width:20px;height:15px;" />' . $vextra_feature->extra_feature . '<br>';
                                    }
                                    ?>
                                    <!-- </select> -->
                                </div>
                                <div id="diverr_extra_features_ids" text-danger></div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="form-group">
                                    <label class="form-label" for="additional_features">ADDITIONAL FEATURES</label>
                                    <input type="text" name="additional_features" id="additional_features" value="" class="form-control" />
                                </div>
                                <div id="diverr_is_repaired_id" text-danger></div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="form-group">
                                    <label class="form-label" for="is_repaired_id">HAVE ANY REPAIRS BEEN DONE?</label><br>
                                    <!-- <select class="form-control" name="is_repaired_id" id="is_repaired_id">
                                                <option>--Select--</option> -->
                                    <?php
                                    foreach ($is_repairs as $vis_repaired) {
                                        // echo '<option value="'.$vis_repaired->id.'">'.$vis_repaired->is_repaired.'</option>';
                                        echo '<input type="radio" name="is_repaired_id" id="is_repaired_id" value="' . $vis_repaired->id . '" style="width:20px;height: 15px;" />' . $vis_repaired->is_repaired . '&nbsp;&nbsp;';
                                    }
                                    ?>
                                    <!-- </select> -->
                                </div>
                                <div id="diverr_is_repaired_id" text-danger></div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="form-group">
                                    <label class="form-label" for="repair_details">PREVIOUS REPAIR DETAILS</label>
                                    <input type="text" id="repair_details" name="repair_details" class="form-control" />
                                </div>
                                <div id="diverr_repair_details" text-danger></div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="form-group">
                                    <label for='estimated_repaire_cost' for="estimated_repaire_cost">ESTIMATED REPAIR COST</label>
                                    <input type="number" id="estimated_repaire_cost" name="estimated_repaire_cost" class="form-control" placeholder="" maxlength="" value="" />
                                </div>
                                <div id="diverr_estimated_repaire_cost" text-danger></div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="form-group">
                                    <label class="form-label" for="is_mech_issue_id">ANY MECHANICAL ISSUE?</label><br>
                                    <!-- <select class="form-control" name="is_mech_issue_id" id="is_mech_issue_id">
                                                <option>--Select--</option> -->
                                    <?php
                                    foreach ($is_mech_issues as $vis_mech_issue) {
                                        // echo '<option value="'.$vis_mech_issue->id.'">'.$vis_mech_issue->is_mech_issue.'</option>';
                                        echo '<input type="radio" name="is_mech_issue_id" id="is_mech_issue_id" value="' . $vis_mech_issue->id . '" style="width:20px;height: 15px;" />' . $vis_mech_issue->is_mech_issue . '&nbsp;&nbsp;';
                                    }
                                    ?>
                                    <!-- </select> -->
                                </div>
                                <div id="diverr_is_mech_issue_id" text-danger></div>
                            </div>
                            <div class="col-md-12 mt-3">
                                <div class="form-group">
                                    <label class="form-label" for="mechanical_issues">MECHANICAL ISSUES</label>
                                    <textarea id="mechanical_issues" name="mechanical_issues" class="form-control" placeholder="" maxlength=""></textarea>
                                </div>
                                <div id="diverr_mechanical_issues" text-danger></div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="form-group">
                                    <label class="form-label" for="service_history_option_id">SERVICE HISTORY</label>
                                    <select class="form-control" name="service_history_option_id" id="service_history_option_id">
                                        <option>--Select--</option>
                                        <?php
                                        foreach ($service_history_options as $vservice_history_option) {
                                            echo '<option value="' . $vservice_history_option->id . '">' . $vservice_history_option->service_history_option . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div id="diverr_service_history_option_id" text-danger></div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="form-group">
                                    <label class="form-label" for="is_spare_key_id">DO YOU HAVE SPARE KEYS?</label><br>
                                    <!-- <select class="form-control" name="is_spare_key_id" id="is_spare_key_id">
                                                <option>--Select--</option> -->
                                    <?php
                                    foreach ($is_spare_keys as $vis_spare_key) {
                                        // echo '<option value="'.$vis_spare_key->id.'">'.$vis_spare_key->is_spare_key.'</option>';
                                        echo '<input type="radio" name="is_spare_key_id" id="is_spare_key_id" value="' . $vis_spare_key->id . '" style="width:20px;height: 15px;" />' . $vis_spare_key->is_spare_key . '&nbsp;&nbsp;';
                                    }
                                    ?>
                                    <!-- </select> -->
                                </div>
                                <div id="diverr_is_spare_key_id" text-danger></div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="form-group">
                                    <label class="form-label" for="maintenance_plan">MAINTENANCE PLAN</label>
                                    <input type="text" id="maintenance_plan" name="maintenance_plan" class="form-control" placeholder="" maxlength="" value="" />
                                </div>
                                <div id="diverr_maintenance_plan" text-danger></div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="form-group">
                                    <label class="form-label" for="is_under_warranty_id">IS YOUR VEHICLE UNDER WARRANTY?</label><br>
                                    <!-- <select class="form-control" name="is_under_warranty_id" id="is_under_warranty_id">
                                                <option>--Select--</option> -->
                                    <?php
                                    foreach ($under_warranty_options as $vunder_warranty_option) {
                                        // echo '<option value="'.$vunder_warranty->id.'">'.$vunder_warranty->is_under_warranty.'</option>';
                                        echo '<input type="radio" name="is_under_warranty_id" id="is_under_warranty_id" value="' . $vunder_warranty_option->id . '" style="width:20px;height: 15px;" />' . $vunder_warranty_option->under_warranty_option . '&nbsp;&nbsp;';
                                    }
                                    ?>
                                    <!-- </select> -->
                                </div>
                                <div id="diverr_is_under_warranty_id" text-danger></div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="form-group">
                                    <label class="form-label" for="is_financed_id">IS YOUR VEHICLE FINANCED?</label><br>
                                    <!-- <select class="form-control" name="is_financed_id" id="is_financed_id">
                                                <option>--Select--</option> -->
                                    <?php
                                    foreach ($isfinanced as $vis_financed) {
                                        // echo '<option value="'.$vis_financed->id.'">'.$vis_financed->is_financed.'</option>';
                                        echo '<input type="radio" name="is_financed_id" id="is_financed_id" value="' . $vis_financed->id . '" style="width:20px;height: 15px;" />' . $vis_financed->is_financed . '&nbsp;&nbsp;';
                                    }
                                    ?>
                                    <!-- </select> -->
                                </div>
                                <div id="diverr_is_financed_id" text-danger></div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="form-group">
                                    <label class="form-label" for="financial_institution_id">FINANCIAL INSTITUTION</label>
                                    <input type="text" id="financial_institution_id" name="financial_institution_id" class="form-control" placeholder="" maxlength="" value="" />
                                </div>
                                <div id="diverr_financial_institution_id" text-danger></div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="form-group">
                                    <label for='outstanding_amount_owed' for="outstanding_amount_owed">OUTSTANDING AMOUNT OWED?</label>
                                    <input type="number" id="outstanding_amount_owed" name="outstanding_amount_owed" class="form-control" placeholder="" maxlength="" value="" />
                                </div>
                                <div id="diverr_outstanding_amount_owed" text-danger></div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="form-group">
                                    <label class="form-label" for="have_reg_docs">DO YOU HAVE REG. DOCS?</label><br>
                                    <!-- <input type="text" id="have_reg_docs" name="have_reg_docs" class="form-control" placeholder="" maxlength="" value="" /> -->
                                    <?php
                                    foreach ($reg_docs_options as $vreg_docs_option) {
                                        echo '<input type="radio" name="have_reg_docs" id="have_reg_docs" value="' . $vreg_docs_option->id . '" style="width:20px;height: 15px;" />' . $vreg_docs_option->reg_docs_option . '&nbsp;&nbsp;';
                                    }
                                    ?>
                                </div>
                                <div id="diverr_have_reg_docs" text-danger></div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="form-group">
                                    <label class="form-label" for="baught_from_where">BOUGHT FROM WHERE?</label><br>
                                    <!-- <input type="text" id="baught_from_where" name="baught_from_where" class="form-control" placeholder="" maxlength="" value="" /> -->
                                    <?php
                                    foreach ($bought_from_options as $vbought_from_option) {
                                        // echo '<option value="'.$vunder_warranty->id.'">'.$vunder_warranty->is_under_warranty.'</option>';
                                        echo '<input type="radio" name="baught_from_where" id="baught_from_where" value="' . $vbought_from_option->id . '" style="width:20px;height: 15px;" />' . $vbought_from_option->bought_from_option . '&nbsp;&nbsp;';
                                    }
                                    ?>
                                </div>
                                <div id="diverr_baught_from_where" text-danger></div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="form-group">
                                    <label for='how_long_kept' for="how_long_kept">HOW LONG HAVE YOU OWNED THE VEHICLE?</label>
                                    <!-- <input type="number" id="how_long_kept" name="how_long_kept" class="form-control" placeholder="" maxlength="" value="" /> -->
                                    <select class="form-control" name="how_long_kept" id="how_long_kept">
                                        <option>--Select--</option>
                                        <?php
                                        foreach ($kept_duration_options as $vkept_duration_option) {
                                            echo '<option value="' . $vkept_duration_option->id . '">' . $vkept_duration_option->kept_duration_option . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div id="diverr_how_long_kept" text-danger></div>
                            </div>
                            <div class="col-md-12 mt-3  mb-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <a href="#" class="btn btn-info btnBlock" onclick="show_tab('tab1')">Previous</a>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="#" class="btn btn-info btnBlock" onclick="show_tab('tab3')">Next</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="tab3" >
                        <div class="section-header">
                            <h2 class="title"><br>Vehicle Information</h2>
                            <h5>Conditions</h5>
                        </div>
                        <div class="row" style="margin-left:10px;margin-right:10px;">
                            <div class="col-md-6 mt-3">
                                <div class="form-group">
                                    <label class="form-label" for="tyres_condition_id">TYRES CONDITION</label><br>
                                    <!-- <select class="form-control" name="tyres_condition_id" id="tyres_condition_id">
                                                <option>--Select--</option> -->
                                    <?php
                                    foreach ($tyre_conditions as $vtyre_condition) {
                                        // echo '<option value="'.$vtyre_condition->id.'">'.$vtyre_condition->tyre_condition.'</option>';
                                        echo '<input type="radio" name="tyres_condition_id" id="tyres_condition_id" value="' . $vtyre_condition->id . '" style="width:20px;height: 15px;" />' . $vtyre_condition->tyre_condition . '&nbsp;&nbsp;';
                                    }
                                    ?>
                                    <!-- </select> -->
                                </div>
                                <div id="diverr_tyres_condition_id" text-danger></div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="form-group">
                                    <label class="form-label" for="wind_screen_condition_id">WIND SCREEN CONDITION</label><br>
                                    <!-- <select class="form-control" name="wind_screen_condition_id" id="wind_screen_condition_id">
                                                <option>--Select--</option> -->
                                    <?php
                                    foreach ($wind_screen_conditions as $vwind_screen_condition) {
                                        // echo '<option value="'.$vwind_screen_condition->id.'">'.$vwind_screen_condition->wind_screen_condition.'</option>';
                                        echo '<input type="radio" name="wind_screen_condition_id" id="wind_screen_condition_id" value="' . $vwind_screen_condition->id . '" style="width:20px;height: 15px;" />' . $vwind_screen_condition->wind_screen_condition . '&nbsp;&nbsp;';
                                    }
                                    ?>
                                    <!-- </select> -->
                                </div>
                                <div id="diverr_wind_screen_condition_id" text-danger></div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="form-group">
                                    <label class="form-label" for="interior_condition">OVERALL INTERIOR CONDITION</label><br>
                                    <?php
                                    foreach ($interior_conditions as $vinterior_condition) {
                                        // echo '<input type="text" id="interior_condition" name="interior_condition" class="form-control" placeholder="" maxlength="" value="" />';
                                        echo '<input type="radio" name="interior_condition" id="interior_condition" value="' . $vinterior_condition->id . '" style="width:20px;height: 15px;" />' . $vinterior_condition->interior_condition . '&nbsp;&nbsp;';
                                    }
                                    ?>
                                </div>
                                <div id="diverr_interior_condition" text-danger></div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="form-group">
                                    <label class="form-label" for="exterior_condition">OVERALL EXTERIOR CONDITION</label><br>
                                    <?php
                                    foreach ($exterior_conditions as $vexterior_condition) {
                                        // echo '<input type="text" id="exterior_condition" name="exterior_condition" class="form-control" placeholder="" maxlength="" value="" />';
                                        echo '<input type="radio" name="exterior_condition" id="exterior_condition" value="' . $vexterior_condition->id . '" style="width:20px;height: 15px;" />' . $vexterior_condition->exterior_condition . '&nbsp;&nbsp;';
                                    }
                                    ?>
                                </div>
                                <div id="diverr_exterior_condition" text-danger></div>
                            </div>
                            <div class="col-md-12 mt-3  mb-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <a href="#" class="btn btn-info btnBlock" onclick="show_tab('tab2')">Previous</a>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="#" class="btn btn-info btnBlock" onclick="show_tab('tab4')">Next</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="tab4" >
                        <div class="section-header">
                            <h2 class="title"><br>Vehicle Information</h2>
                            <h5>Images</h5>
                        </div>
                        <div class="row" style="margin-left:10px;margin-right:10px;">
                            <div class="col-md-6 mt-3">
                                <div class="form-group">
                                    <label class="form-label" for="front_pictures">FRONT PICTURES</label>
                                    <input type="file" id="front_pictures" name="front_pictures" class="form-control">
                                </div>
                                <div id="diverr_front_pictures" text-danger></div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="form-group">
                                    <label class="form-label" for="back_pictures">BACK PICTURES</label>
                                    <input type="file" id="back_pictures" name="back_pictures" class="form-control">
                                </div>
                                <div id="diverr_back_pictures" text-danger></div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="form-group">
                                    <label class="form-label" for="right_pictures">RIGHT PICTURES</label>
                                    <input type="file" id="right_pictures" name="right_pictures" class="form-control">
                                </div>
                                <div id="diverr_right_pictures" text-danger></div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="form-group">
                                    <label class="form-label" for="left_pictures">LEFT PICTURES</label>
                                    <input type="file" id="left_pictures" name="left_pictures" class="form-control">
                                </div>
                                <div id="diverr_left_pictures" text-danger></div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="form-group">
                                    <label class="form-label" for="engine_pictures">ENGINE PICTURES</label>
                                    <input type="file" id="engine_pictures" name="engine_pictures" class="form-control">
                                </div>
                                <div id="diverr_engine_pictures" text-danger></div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="form-group">
                                    <label class="form-label" for="interior_front_pictures">INTERIOR FRONT PICTURES</label>
                                    <input type="file" id="interior_front_pictures" name="interior_front_pictures" class="form-control">
                                </div>
                                <div id="diverr_interior_front_pictures" text-danger></div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="form-group">
                                    <label class="form-label" for="interior_back_pictures">INTERIOR BACK PICTURES</label>
                                    <input type="file" id="interior_back_pictures" name="interior_back_pictures" class="form-control">
                                </div>
                                <div id="diverr_interior_back_pictures" text-danger></div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="form-group">
                                    <label class="form-label" for="other_pictures">OTHER PICTURES</label>
                                    <input type="file" id="other_pictures" name="other_pictures[]" class="form-control" multiple="multiple">
                                </div>
                                <div id="diverr_other_pictures" text-danger></div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="form-group">
                                    <label class="form-label" for="how_know_aboutus_id">HOW DID YOU FIND OUT ABOUTUS?</label>
                                    <select class="form-control" name="how_know_aboutus_id" id="how_know_aboutus_id">
                                        <option>--Select--</option>
                                        <?php
                                        foreach ($know_aboutus_options as $vknow_aboutus_option) {
                                            echo '<option value="' . $vknow_aboutus_option->id . '">' . $vknow_aboutus_option->know_aboutus_option . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div id="diverr_how_know_aboutus_id" text-danger></div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <div class="form-group">
                                    <label class="form-label" for="referral_no">REFFERAL NUMBER</label>
                                    <input type="text" id="referral_no" name="referral_no" class="form-control" value="" />
                                </div>
                                <div id="diverr_how_know_aboutus_id" text-danger></div>
                            </div>
                            <div class="col-md-12 mt-3 mb-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <a href="#" class="btn btn-info btnBlock" onclick="show_tab('tab3')">Previous</a>
                                    </div>
                                    <div class="col-md-6">
                                        <button class="btn btn-info btnBlock">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
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