<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	function backdoor( $pageName ){
		if( ! isset($_SESSION['isLoggedIn']) ){
			redirect( $pageName );
		}
	}
	
	function beforeBackdoor($pageName){
		if( isset( $_SESSION['isLoggedIn'] ) ){
			redirect( $pageName );
		}
	}

	// Reponse Code for reponsing
  	function code($code){
    		$codes = [
				'200'=>'deleted' ,
				'201'=>'created' ,
				'203'=>'updated' ,
				'204'=>'no content' ,
				'205'=>'update remain\'s same' ,
				'206'=>'delete successfully' ,
				'301'=>'Validation Error', 
				'302'=>'Parameter Missing Or Invalid Argument' ,
				'303'=>'No Data Found' ,
				'401'=>'Invalid request' ,
				'402'=>'unsupported response type' ,
				'403'=>'invalid scope' ,
				'404'=>'temporarily unavailable' ,
				'405'=>'invalid grant' ,
				'406'=>'invalid credentials' ,
				'407'=>'invalid refresh' ,
				'408'=>'no data' ,
				'409'=>'invalid data' ,
				'410'=>'access denied' ,
				'411'=>'unauthorized' ,
				'412'=>'invalid client' ,
				'413'=>'forbidden',
				'414'=>'resource not found' ,
				'416'=>'not acceptable' ,
				'419'=>'resource exists' ,
				'420'=>'conflict' ,
				'425'=>'resource gone' ,
				'445'=>'payload too large' ,
				'455'=>'unsupported media type' ,
				'499'=>'too many requests' ,
				'500'=>'server error' ,
				'501'=>'unsupported grant type' ,
				'502'=>'not implemented' ,
				'503'=>'Image Not Uploaded'
    	];
    	return $codes[$code];
	}
	// Dynamic Select Query which having select where, join, order, groupby ects.
	
	function getQuery($option){
		$ci =& get_instance();
		return $ci->core_model->joinQuery($option); 
	}

	function insert($table , $data){
		$ci =& get_instance();
		$ci->core_model->insert_data($table , $data);
		return $ci->db->insert_id();
	}

	// LQ stands for Last Query which is return the Query which is last called
	function lQ($id = ''){
		$ci =& get_instance();
		echo $ci->db->last_query();
		if($id != ''){
			die();
		}
	}

	// Update function is used for updating the row by where condition 
	function update($update){
		extract($update);
		$ci =& get_instance();
		if( !isset($where) ){
			$ci->core_model->update_data($table, $data);
		}
		else{
			$ci->core_model->update_data_by_where($table, $data, $where);
		}

	}

	// Delete Function basically deletes a array by where condition
	function delete($data){
		extract($data);
		$ci =& get_instance();
		$ci->core_model->delete_data_by_where($table, $where);
	}

	// Pre is using beautify the print of an array
	function pre($data, $n = '')
	{
		echo '<pre>';print_r($data);echo '</pre>';if($n != ''){ die(); }
	}

	// View function is used to reduce code line $pageName which of the page will be called
	// $data is array which having value of what is passing through 
	function view($pageName, $data = array())
	{
		$ci =& get_instance();
		if(empty($data)){
			$ci->load->view($pageName);
		}
		else{
			$ci->load->view($pageName, $data);
	 	}
	}

	function adminData($id = ''){
		$ci =& get_instance();
		return getQuery([
			'where' => [
				'id' => $id != '' ? $id : $_SESSION['adminId']
			],
			'table' => 'users',
			'single' => true
		]);
	}

	function admin($id = '' , $columnName = ''){
		$ci =& get_instance();
		$id = getQuery([
			'where' => [
				'id' => $id != '' ? $id : (isset($_SESSION['adminId']) ?  $_SESSION['adminId'] : 1 )
			],
			'table' => 'admin',
			'single' => true
		]);
		if( $columnName != '' ){
			return $id[$columnName];
		}
		else{
			return $id;
		}
	}

	// Set A Variable In Session 
	function setVariable( $data ){
		$ci =& get_instance();
		foreach( $data as $key =>$value ){
			$ci->session->set_userdata( $key , $value );
		}
	}

	// Checking Post Array Having Value
	function isPost(){
		if(empty($_POST)){
			return false;
		}
		else{
			return true ;
		}
	}
	
	// Setting Multiple Flash Data

	function setFlashData($array, $redirect = ''){
		$ci =& get_instance();
		foreach($array as $key =>$value){
			$ci->session->set_flashdata($key , $value);
		}
		if($redirect != ''){
			redirect($redirect);
		}
	}

	// Check Variable in flashdata return if exist
	function checkVariable($key){
		$ci =& get_instance();
		if($ci->session->flashdata($key) != null){
			return $ci->session->flashdata($key);
		}
		else{
			return false;
		}
	}

	// Getting flashdata by key
	function getFlastData($key){
		$ci =& get_instance();
		return $ci->session->flashdata($key);
	}

	// Check Validation Error and Return array of errors 
	function validations($setRules){
		$ci =& get_instance();
		$error = array();
		foreach ($setRules as &$rules){
			$ci->form_validation->set_rules($rules[0], $rules[1], $rules[2]);
			if($ci->form_validation->run() == FALSE){
				 if(isset($error)){
				 	unset($error);
				 }
				$error = $ci->form_validation->error_array();
			}
		}
		return $error;
	}


	// Set data in this array if any error occur in form values
	function setData($key){
		if(isset($_SESSION['formData'][$key])){
			return $_SESSION['formData'][$key];
		}
		return "";
	}

	// Setting Error Of Form Field
	function setError($key){
		if(isset($_SESSION['formError'][$key])){
			return $_SESSION['formError'][$key];
		}
		return "";
	}

  // Set Message On Form Error
	function setMessage($variable)
  {
    if(isset($_SESSION['formError'][$variable])){
      return '<span class="error invalid-feedback">'.ucwords($_SESSION['formError'][$variable]).'</span>';
    }
    else{
      return '';
    }
  }

  // Return Any affected Row On Update
	function affected(){
		$ci =& get_instance();
		return $ci->db->affected_rows();
	}

	// Sending Message From Mobile Number
	// function sendMessage(int $number, string $sms){
	// 	$data = file_get_contents(API.'mobiles='.$number.'&sms='.$sms);
	// 	return json_decode($data);
	// }

	function checkOperator( int $userId , int $operatorId ){
		return  getQuery(
			[
				'where' => [ 'userId' => $userId, 'operatorId' => $operatorId ], 'table' => 'user_api', 'single' => true,
			]
		);
	}

	function paginate($item_per_page,$current_page,$total_records, $addPerPage = '', $addSearch = '',$page_url , $attribute = ''){
  	$total_pages = ceil( $total_records/$item_per_page );
		if($addPerPage != ''){
			if($addSearch != ''){
				$addSearch = "&search=".$addSearch;
			}
			$addSearch = "?perPage=".$addPerPage.$addSearch;
		}
		if( $attribute != '' ){
			$page_url."/".$attribute;
		}
    $pagination = '';
    if($total_pages > 0 && $total_pages != 1 && $current_page <= $total_pages){ //verify total pages and current page number
        $pagination .= '<ul class="pagination pagination-sm float-right" style="margin-top:10px;">';
        $right_links    = $current_page + 3; 
        if($current_page == 1){
          $right_links    = $current_page + 5; 
        }
        $previous       = $current_page - 3; //previous link 
        $next           = $current_page + 1; //next link
        $first_link     = true; //boolean var to decide our first link
        
        if($current_page > 1){
					$previous_link = ($previous==0)?1:$previous;
          $pagination .= '<li class="page-item"><a class="page-link" href="'.$page_url.'/1'.$addSearch.'" title="First">«</a></li>'; //first link
          $pagination .= '<li class="page-item" ><a class="page-link" href="'.$page_url.'/'.$previous_link.'" title="Previous"><</a></li>'; //previous link
              for($i = ($current_page-2); $i < $current_page; $i++){ //Create left-hand side links
                  if($i > 0){
                      $pagination .= '<li class="page-item" ><a class="page-link" href="'.$page_url.'/'.$i.$addSearch.'">'.$i.'</a></li>';
                  }
              }   
          $first_link = false; //set first link to false
        }
        
        if($first_link){ //if current active page is first link
            $pagination .= '<li class="page-item active"><a class="page-link" href="'.$page_url.'/'.$current_page.$addSearch.'">'.$current_page.'</a></li>';
        }elseif($current_page == $total_pages){ //if it's the last active link
            $pagination .= '<li class="page-item active"><a class="page-link" href="'.$page_url.'/'.$current_page.$addSearch.'">'.$current_page.'</a></li>';
        }else{ //regular current link
					$pagination .= '<li class="page-item active"><a class="page-link" href="'.$page_url.'/'.$current_page.$addSearch.'">'.$current_page.'</a></li>';
        }
                
        for( $i = $current_page+1; $i < $right_links ; $i++ ){ //create right-hand side links
            if($i<=$total_pages){
                $pagination .= '<li class="page-item" ><a class="page-link" href="'.$page_url.'/'.$i.$addSearch.'">'.$i.'</a></li>';
            }
        }
        if($current_page < $total_pages){ 
				  $next_link = ($i > $total_pages)? $total_pages : $i;
					$pagination .= '<li class="page-item" ><a class="page-link" href="'.$page_url.'/'.$next_link.$addSearch.'" >></a></li>'; //next link
					$pagination .= '<li class="page-item last"><a class="page-link" href="'.$page_url.'/'.$total_pages.$addSearch.'" title="Last">»</a></li>'; //last link
        }
        
        $pagination .= '</ul>'; 
    }
		else{
    	$pagination .=  '<ul class="pagination pagination-sm float-right" style="margin-top:10px;">';
    	$pagination .=  '<li class="page-item"><a class="page-link" href="'.$page_url.'/1'.$addSearch.'" title="First">«</a></li>';
    	$pagination .=  '<li class="page-item active"><a class="page-link" href="'.$page_url.'/'.$current_page.$addSearch.'">'.$current_page.'</a></li>';
    	$pagination .=  '<li class="page-item last"><a class="page-link" href="'.$page_url.'/'.$total_pages.$addSearch.'" title="Last">»</a></li>';
    	$pagination .=  '</ul>';
    }
    return $pagination; //return pagination links
	}