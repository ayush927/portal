<?php
    class CreateReport extends CI_Controller
    {   
        
        public function __construct()
        {
            parent::__construct();
            $this->load->model('Base_model');
            $this->url =  'http://staging.respicite.com/users/OtherAjax/download_report.php?code=';
            // http://staging.respicite.com/users/OtherAjax/download_report.php?code=QW1pbnpvcjQ1Nzk4OA==
        }
        
        public function index(){
            $data = [
                'data' => rand(00000000000 , 9999999999)." Hello",
            ];
            $this->Base_model->test_cron($data);
            // echo $this->db->last_query();
            // die;
            $allRequest = $this->Base_model->getAllRequest();
            if( !empty( $allRequest ) ){
                foreach( $allRequest as $key  => $value ){
                    $unparsed_json = file_get_contents('"'.$this->url.base64_encode($value['code']).'"');
                    // Closing
                    if( $unparsed_json == "SUCCESS" ){
                        $this->Base_model->update_report_status(['code' => $value['code']] , [ 'status' => 1 , 'file_name' => $value['code'].'.pdf' ]);
                    }
                }
            }
        }
    }

?>