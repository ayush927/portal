<?php 
class Home_model extends CI_Model{
    
    function services_list(){
        $this->db->select("c_group");
        $this->db->distinct();
        $q = $this->db->get("solutions");
        return $q->result();
    }
    
    function services_list_2(){
        $this->db->select("alternate_name");
        $this->db->distinct("alternate_name");
        $this->db->where("alternate_name !=" , '');
        $this->db->where("alternate_name !=" , 'Test');
        $this->db->where("alternate_name !=" , 'test');
        $this->db->order_by("alternate_name" , 'ASC');
        $q = $this->db->get("provider_level_three");
        return $q->result_array();
    }

    function cities_list(){
        $this->db->distinct();
        $this->db->select("name");
        $this->db->order_by("name","asc");
        $q = $this->db->get("user_cities_all");
        return $q->result();
    }
    
    function getResellerServiceDetail( $where ){
        $this->db->select("*");
        $this->db->where( $where );
        $q = $this->db->get( "reseller_services" );
        return $q->row_array();
    }
    
    function getResellerSeo($where){
        $this->db->select("*");
        $this->db->where( $where );
        $q = $this->db->get( "counsellor_seo" );
        return $q->result_array();
    }

    function days(){
        $this->db->select("*");
        $q = $this->db->get("days");
        return $q->result();        
    }

    function u_seo_channels_lists(){
        $this->db->select("*");
        $q = $this->db->get("user_details_seo_channels");
        return $q->result();
    }
    function top_skills($ids){
        $this->db->select("skill");
        $this->db->where_in("id",$ids);
        $q = $this->db->get("user_details_seo_top_skills");
        $output = [];
        foreach($q->result_array() as $v){
            $output[] = $v["skill"];
        }
        return $output;
    }
    
    function user_seo_lists($page, $service_name,$city){ 
        // $this->db->where('iam IN ('sp' , 'reseller')  `b`.`status` != 0 ]);
        $this->db->where_in('iam', [ 'sp', 'reseller' ]);
        $this->db->where('b.status !=', 0);
        $this->db->where('a.status !=', 'inactive');
        if( !is_array($service_name) ){
            if( $service_name == 'Other Services' ){
                $this->db->where('a.services', '');
            }
        }
        $this->db->select("b.user_id as domain_id, b.profile_link , b.fullname,b.email,b.mobile,b.profile_photo,a.*");
        $this->db->order_by("b.id");
        
        $w_service_name = [];
        $w_city = [];
        $w_days = [];
        $w_channel = [];
        $like = [];
        // echo $service_name;
            // print_r($service_name );
            // die;
        if( !is_array( $service_name ) ){
            if($service_name != "null" &&  $service_name  != '' ){
                if( $service_name == 'Career Counselling' ){
                    $this->db->like("a.services" , 'career Explorer');
                }
                elseif( $service_name == 'Parenting Counselling' ){
                    $this->db->like("a.services" , 'Positive Parenting');
                }
                elseif( $service_name == 'Overseas Services' ){
                    $this->db->like("a.services" , 'Overseas Companion');
                }
                elseif($service_name != 'Other Services'){
                    $this->db->like("a.services" , $service_name);
                }
            }
        }
        else{
            foreach( $service_name as $key=>$value ){
                if( $value == 'Career Counselling' ){
                    $this->db->like("a.services" , 'career Explorer');
                }
                elseif( $value == 'Parenting Counselling' ){
                    $this->db->or_like("a.services" , 'Positive Parenting');
                }
                elseif( $value == 'Overseas Services' ){
                    $this->db->or_like("a.services" , 'Overseas Companion');
                }
                elseif($value != 'Other services'){
                    $this->db->or_like("a.services" , $value);
                }
                // elseif($value == 'Other services'){
                //     $this->db->like('a.services', '');
                // }
                // else{
                //     $this->db->like('a.services', $value);
                // }
            }
        }
        
        if($city != "null" &&  $city  != ''  ){                
            $this->db->where('find_in_set("'.trim($city).'", a.locations ) <> 0');
            // $this->db->like("a.locations" , );
        }

        // if($days != "null" &&  $days  != ''  ){
        //     $this->db->like("a.available_days", $days);
        // }

        // if($channel != "null" &&  $channel  != ''  ){
        //     $this->db->like("a.channels" , $channel);
        // }
        
        $this->db->join("user_details b","b.id = a.user_id" , 'right');

        if( !empty( $like ) ){
            // print_r( $like );
            $this->db->like($like);
        }
        if( $page != null ){
            $this->db->limit(10, ($page-1)*10);
        }
        $q = $this->db->get("user_details_seo a");
        // echo $this->db->last_query();
        // die;
        return $q->result_array();
    }
}
?>