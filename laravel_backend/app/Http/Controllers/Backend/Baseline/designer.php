<?php

namespace App\Http\Controllers\Backend\Baseline;
use App\Http\Controllers\Controller;
use App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\dbmodule;
use Illuminate\Support\Facades\DB;

class designer extends Controller
{
	


	public function index()
	{
		// $sqltables = "SELECT TABLE_NAME  FROM INFORMATION_SCHEMA.tables where TABLE_SCHEMA='snoobix3'";
		// $data['dbtables'] = $DBModel->userQuery($sqltables);

		$data['rows'] =   DB::table('dznr_modules')
									->selectRaw(' * ')
									//->where('dznr_moduleid', '=', $mdlsid)
									//->groupBy('status')
									->simplePaginate(50);
		
		return view('designer/dznr/list',$data);
	}
	/*
	public function getDBtables(){
		$sqltables = "SELECT TABLE_NAME FROM INFORMATION_SCHEMA.tables where TABLE_SCHEMA='snoobix3'";
		$result['rows'] = $DBModel->userQuery($sqltables);
		$result['sql_query'] = $db->last_query();

		echo json_encode($result);
	}
	*/
	/*
	function ajax_table_fields(){
		
		$vtblname = $input->get('tblnam');
		//echo 'vtblname: '.$vtblname;
		
		$sqlschema = "select DATABASE() as dbname";
		$reschema_names = $DBModel->userQuery($sqlschema);
		
		foreach($reschema_names as $vreschema_name){
			$schema_name = $vreschema_name->dbname;
		}
		//echo "schema name: ".$schema_name."<br>";
		
		$sqlcolnames = "SELECT column_name AS field_name, UPPER(REPLACE(column_name,'_',' ')) AS field_label, data_type,is_nullable, character_maximum_length, column_type, ordinal_position
							FROM INFORMATION_SCHEMA.COLUMNS 
							WHERE TABLE_SCHEMA='".$schema_name."' 
								AND TABLE_NAME='".$vtblname."';";
		//echo $sqlcolnames;
		$result['sql_query'] = $sqlcolnames;
		$result['table_columns'] = $DBModel->userQuery($sqlcolnames);
		
		echo json_encode($result);
		
	}
	*/
	/*
	public function getRefTableData(){
		$refTblName = $_GET['tnam'];
		$refTblField = $_GET['cnam'];
		
		$sqlref = "select id,".$refTblField." from ".$refTblName." where active='Y'";
		$result['sql_query'] = $sqlref;
		$rows = $DBModel->userQuery($sqlref);

		$ref_table_data = array();
		//$rows2 = ['table_a','table_b','table_c','table_d'];
		$ref_table_data[$refTblName] = $rows;

		$result['ref_table_data'] = $ref_table_data;
		//pre($result);
		echo json_encode($result);
	}
	*/
	/*
	function get_table_fields(){
		$module_id = $input->get('module_id');
		$cond = array(
					'dznr_moduleid'=>$module_id
				);
		
		$result['table_columns'] = $DBModel->getCondData('dznr_module_fields',$cond);
		$result['sql_query'] = $db->last_query();
		echo json_encode($result);
	}
	*/
	/*
	public function load_form(){
		$recid = $_GET['id'];
		$data = array(); $data['curnt_table_columns'] = array();
		//echo 'recid: '.$recid;
		if($recid != ''){
			$currow = $DBModel->getRow('dznr_modules',['id'=>$recid]);
			//echo $db->last_query();
			$data['row'] = $currow;

			$condflds = array(
							'dznr_moduleid'=>$currow->id
						);
			$data['curnt_table_columns'] = $DBModel->getCondData('dznr_module_fields',$condflds);
			
		}

		$sqltables = "SELECT TABLE_NAME FROM INFORMATION_SCHEMA.tables where TABLE_SCHEMA='snoobix3'";
		$data['dbtables'] = $DBModel->userQuery($sqltables);
		
		$load->view('dznr/code_generator_addedit',$data);
	}
	*/
	/*
	function ajax_curTable_fields(){
		$vtblname = $_GET['tblnam'];
		$sqlschema = "select DATABASE() as dbname";
		$reschema_names = $DBModel->userQuery($sqlschema);
		
		foreach($reschema_names as $vreschema_name){
			$schema_name = $vreschema_name->dbname;
		}
		$sqlcolnames = "SELECT column_name AS field_name, UPPER(REPLACE(column_name,'_',' ')) AS field_label, data_type as field_type ,is_nullable as isrequired, character_maximum_length as input_length, column_type as field_type, ordinal_position
							FROM INFORMATION_SCHEMA.COLUMNS 
							WHERE TABLE_SCHEMA='".$schema_name."' 
								AND TABLE_NAME='".$vtblname."';";
		//echo $sqlcolnames;
		$data['sql_query'] = $sqlcolnames;
		$data['curnt_table_columns'] = $DBModel->userQuery($sqlcolnames);

		$sqltables = "SELECT TABLE_NAME FROM INFORMATION_SCHEMA.tables where TABLE_SCHEMA='".$schema_name."'";
		$data['dbtables'] = $DBModel->userQuery($sqltables);
		

		return($load->view('dznr/ajax_curtable_fields',$data));
	}
	*/

// ------------------------ new module ----------------- //

/*
	public function new_module(){
		
		
		$modules = $DBModel->getAllData($tblname);
		//$applications = $DBModel->getAllData('applications');

		$sqltables = "SHOW TABLES FROM snoobix3";
		$dbtables = $DBModel->userQuery($sqltables);

		//$row = $DBModel->getSingleRow($tblname, ['id'=>$id]);
		$field_rows = $DBModel->getCondData('dznr_module_fields', ['dznr_moduleid'=>$id]);

		$sqlschema = "select DATABASE() as dbname";
		$reschema_names = $DBModel->userQuery($sqlschema);
		
		
		foreach($reschema_names as $vreschema_name){
			$schema_name = $vreschema_name->dbname;
		}


		//echo "schema name: ".$schema_name."<br>";
		/*
		$sqlcolnames = "SELECT COLUMN_NAME 
							FROM INFORMATION_SCHEMA.COLUMNS 
							WHERE TABLE_SCHEMA='".$schema_name."' 
								AND TBLNAME='".$vtblname."';";
		//echo $sqlcolnames;
		$data['table_columns'] = $DBModel->userQuery($sqlcolnames);
		* /
		//print_r($table_columns);


		$sqltables = "SHOW TABLES FROM snoobix3";
		$dbtables = $DBModel->userQuery($sqltables);
		
		$prnt_menu_cond = array(
						'parent' => '0'
						);
		$parent_menus = $DBModel->getCondData('sys_modules', $prnt_menu_cond);
		
		$result = ['title'		=>'Modules',
				 'page'			=> $page,
				 'template'		=> 'update',
				 'moduleid'		=> $moduleid,
				 'row'			=> $row,
				 'field_rows'	=> $field_rows,
				 'modules'		=> $modules,
				 'dbtables'		=> $dbtables,
				 'parent_menus' => $parent_menus,
				 'applications'	=> $applications
				];

		echo json_encode($result);
	}
	*/
	// --------------------------------- read ---------------------------- //
	/*
	public function read(){
		
		$vlimit = $_GET['recs'];
		$curPage = $_GET['page'];
		
		$srchText = $_GET['srchtxt'];
		$srchfld = $_GET['srchfld'];
		
		$sorton = $_GET['srton'];
		$sortby = $_GET['srtby'];
		
		$result['message'] = "";
		$result['error'] = false;
		
		$voffset = $vlimit * $curPage;
		$voffset = $voffset - $vlimit;
		
		$sql_cond=''; $sql_sort=''; $sql_limit='';
		
		$sql_rec = ' select * from dznr_modules  where 1 ';
		if($srchText != '' and $srchfld != ''){
			$sql_cond = ' and '.$srchfld.' like "%'.$srchText.'%" ';
		}
		if($sorton != '' and $sortby != ''){
			$sql_sort = ' order by '.$sorton.' '.$sortby;
		}
		if($vlimit != '' and $curPage != ''){
			$sql_limit = ' limit '.$vlimit.' offset '.$voffset;
		}
		
		$sqllist = $sql_rec.$sql_cond.$sql_sort.$sql_limit;
		
		//$result['sql_query'] = $sqllist;
		$result['rows'] = $DBModel->userQuery($sqllist);
		
		$sqlnrecs = 'select count(1) as ncnts from dznr_modules where 1';
		$sqlnrecs .= $sql_cond;
		
		$rownrecs = $DBModel->userQuery($sqlnrecs);
		//$result['queryResult'] = $rownrecs;
		$result['sql_query'] = $db->last_query();
		$result['nrows'] = $rownrecs[0]->ncnts;
		
		echo json_encode($result);
		
	}
	*/
	
	// --------------------------------- save ---------------------------- //
	/*
	public function save(){

		//pre($_POST); //die();

		$result['error'] = false;
		if($input->post('table_name') != ''){
			$vtable_name = $input->post('table_name');
		}else{
			$vtable_name = str_replace(' ','_',strtolower($input->post('module_name')));
		}
		
		$module_rec = array(
						'active' => 'Y',
						'module_name' => $input->post('module_name'),
						'table_name' => $vtable_name
					);
	  
		if($input->post('id') != ''){
			$id = $input->post('id');
			//echo 'id= '.$id;
			$cond = array('id'=>$id);
			$DBModel->updateData('dznr_modules', $module_rec, $cond);
			$DBModel->deleteData('dznr_module_fields',['dznr_moduleid'=>$id]);
		}else{
			$id = $DBModel->insertData('dznr_modules', $module_rec);
		}


        
		//echo $db->last_query();  die();
        if( $id ) {
			if(count($_POST['field_label'])>0){
				for($i=0; $i<count($_POST['field_label']); $i++){
					
					if($_POST['field_name'][$i] != ''){
						$vfield_name = $_POST['field_name'][$i];
					}else{
						$vfield_name = str_replace(' ','_',strtolower($_POST['field_label'][$i]));
					}
					
					$fields_rec = array(
						'dznr_moduleid' => $id,
						'field_label' => $_POST['field_label'][$i],
						'field_name' => $vfield_name,
						'field_type' => $_POST['field_type'][$i],
						'isrequired' => $_POST['isrequired'][$i],
						'list_type' => $_POST['list_type'][$i],
						'staticlist' => $_POST['staticlist'][$i],
						'listmodulename' => $_POST['listmodulename'][$i],
						'listmoduleitem' => $_POST['listmoduleitem'][$i],
						'onlistpag' => $_POST['onlistpage'][$i]
					);	
					$DBModel->insertData('dznr_module_fields', $fields_rec);
				}

				$result['message'] = "Record is saved successfully";
				//$result['sql_query'] = $db->last_query();
			}
			
			//generate($id);
			
        	//$redirect = base_url('code_generator/modules');
            //echo retrun_success_json("Record Added with ID: {$id}", $redirect);
			//redirect($redirect);

        }else{
            $result['error'] = true;
			$result['message'] = "Unable to save the record";
			$result['sql_query'] = $db->last_query();
        }

		//pre($result); die();

		echo json_encode($result);
		
	}
	*/
	// --------------------------------- delete ---------------------------- //
	/*
	public function delrec(){
		
		$recid = $_GET['id'];
		$idx = $_GET['idx'];
		$result['rowIndex'] = $idx;
		$result['error'] = false;
		
		$cond = array(
					'id' => $recid
				);
		if($DBModel->deleteData($tblName,$cond)){
			$result['message'] = "Record deleted successfully";
		}else{
			$result['error'] = true;
			$result['message'] = "Failed to deelte record";
		}	
		
		$result['message'] = "Record deleted successfully";
		echo json_encode($result);
		
	}
	*/
	/*
	public function deleteRecords(){
		//$load->model('DBModel');
		$result['error'] = false;
		$ids = $_GET['ids'];
		$sqldelt = "delete from ".$tblName." where id in (".$ids.") ";
		//$result['message'] = $sqldelt;
		
		if($sqlerr = $DBModel->userQuery($sqldelt,false)){
			$result['message'] = "Records deleted successfully";
		}else{
			$result['error'] = true;
			$result['message'] = "Unable to delete records, error: ".$sqlerr;
		}
		
		echo json_encode($result);
	}
	*/
	// ----------------------------- validate -------------------------------------- //	
	/*
	public function validate(){
		$result['error'] = false;
		$fldnam = $_GET['fldnam'];
		$fldval = $_GET['fldval'];
		
		$sqlnrecs = 'select count(1) as ncnts from '.$tblName.' where 1 and '.$fldnam.' = "'.$fldval.'"';
		$rownrecs = $DBModel->userQuery($sqlnrecs);
		$nrecs = $rownrecs[0]->ncnts;
		$result['nrows'] = $nrecs;
		if($nrecs > 0){
			$result['message'] = "Record aleady exists with same values";
		}else{
			$result['message'] = "No Record is found";
		}
		echo json_encode($result);
	}
	

	*/
	
	/*
	public function ajax_listTable_fields(){
		$vtblname = $input->get('tblnam');
		$recno =  $input->get('recno');
		//echo 'vtblname: '.$vtblname."<br>";
		
		$sqlschema = "select DATABASE() as dbname";
		$reschema_names = $DBModel->userQuery($sqlschema);
		
		
		foreach($reschema_names as $vreschema_name){
			$schema_name = $vreschema_name->dbname;
		}
		//echo "schema name: ".$schema_name."<br>";
		
		$sqlcolnames = "SELECT COLUMN_NAME 
							FROM INFORMATION_SCHEMA.COLUMNS 
							WHERE TABLE_SCHEMA='".$schema_name."' 
								AND TABLE_NAME='".$vtblname."';";
		$result['sql_query'] = $sqlcolnames;
		$list_table_columns = $DBModel->userQuery($sqlcolnames);
		
		//echo json_encode($result);

		echo '<select name="listmoduleitem[]" id="listmoduleitem" class="form-control">';
			echo '<option value="">--Select--</option>';
				foreach($list_table_columns as $vmodlitm){
					echo '<option value="'.$vmodlitm->COLUMN_NAME.'"';
					echo ' >'.$vmodlitm->COLUMN_NAME.'</option>';
				}
		echo '</select>';


	}
	*/
	/*
	public function delete($id){

	    $where = array('id' => $id);
	    $result = $DBModel->deleteData($tblname, $where);
        if( $result ) {
        	$redirect = base_url('DBModel');
            echo retrun_success_json("Record  Deleted with ID: {$id}", $redirect);
        }else{
            echo retrun_error_json("Unable to Delete record, child record exists.");
        }
	}
	*/

/*
	public function update(){
		$post_data = $input->post();
		
		//echo 'nfields: '.count($post_data);
		
		for($i=0; $i<count($post_data); $i++){
			
			$where_cond = ['id'=> $post_data['recid'][$i]];
			$data_rec = array(
							'field_label' => $post_data['field_label'][$i],
							'field_name' => $post_data['field_name'][$i],
							'field_type' => $post_data['field_type'][$i],
							'isrequired' => $post_data['isrequired'][$i],
							'list_type' => $post_data['list_type'][$i],
							'input_length' => $post_data['input_length'][$i],
							'staticlist' => $post_data['staticlist'][$i],
							'listmodulename' => $post_data['listmodulename'][$i],
							'listmoduleitem' => $post_data['listmoduleitem'][$i],
							'onlistpag' => $post_data['onlistpag'][$i]
						);
						
			if($post_data['recid'][$i] != ''){
				$result = $DBModel->updateData('dznr_module_fields', $data_rec, $where_cond);
			}else{
				$result = $DBModel->insertData('dznr_module_fields', $data_rec);
			}
		}
		
		/*
		if( $result ) {
			$redirect = base_url('code_generator/modules');
            echo retrun_success_json("Record Updated Successfully", $redirect);
			redirect($redirect);
        }else{
            echo retrun_error_json("Error while updating, try again.");
        } 
		* /

		//redirect('code_generator/modules');
		
	}
*/
	




}
?>