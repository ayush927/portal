<?php
extract( $config );
 function star_rating($stars){
    $render_ster = '<i style="color: #CFB53B;" class="fa fa-star" aria-hidden="true"></i>';
    $output = "";
    for($i = 0; $i < $stars;$i++){
        $output .= $render_ster;
    }
    return $output;
 }
?>

<style type="text/css">
    /*.modal{*/
        display: block !important; /* I added this to see the modal, you don't need this */
    /*}*/
    
    /* Important part */
    .modal-dialog{
        overflow-y: initial !important
    }
    .modal-body{
        /*min-height: 80vh;*/
        overflow-y: auto;
    }
    .center_link {
      margin: auto;
          float: right;
      border: 3px solid white;
      padding: 10px;
    }
    .center_link a
    {
       background-color:#FC9928;
       padding:10px;
       margin: auto;
      color: antiquewhite;
    }
    .center_link strong{
        background-color:black;
       padding:10px;
       margin: auto;
      color: white;
    }
    #slider {
    	position: relative;
    }
    
    .slider-container {
    	 width: 840px;
    	 padding-top: 50px;
    	 overflow-x: hidden;
    }
     .slider-container .slider {
    	 display: flex;
    }
     .slider-container .slider.animation {
    	 transition: 500ms ease-in-out;
    }
     .slider-container .slider .slider-item {
    	 min-width: 280px;
    	 padding: 20px;
    }
     .slider-container .slider .slider-item .slide {
    	 box-shadow: 0 0 20px #cdcddd;
    	 border-radius: 8px;
    	 display: flex;
    	 flex-direction: column;
    	 align-items: center;
    	 padding-bottom: 20px;
    }
     .slider-container .slider .slider-item .slide .slide-image {
    	 width: 100%;
    	 margin-top: -30%;
    	 padding: 10px;
    	 margin-bottom: 30px;
    	 pointer-events: none;
    }
     .slider-container .slider .slider-item .slide .slide-image > img {
    	 height: 150px;
    	 margin: 0 auto;
    	 display: block;
    }
     .slider-container .slider .slider-item .slide:hover {
    	 background-color: #ffbc43;
    }
     .slider-container .slider .slider-item .slide:hover .slide-name, .slider-container .slider .slider-item .slide:hover .custom-line, .slider-container .slider .slider-item .slide:hover .row, .slider-container .slider .slider-item .slide:hover .row strong, .slider-container .slider .slider-item .slide:hover .row.custom-row > p {
    	 color: #fff;
    }
     .slider-container .slider .slider-item .slide:hover .row.custom-row > a {
    	 background-color: #fff;
    	 color: #ffbc43;
    }
     .slider-container .slider .slider-item .slide:hover .slide-image > img {
    	 transform: scale(1.2);
    }
     .slider-container .slider .slider-item .slide, .slider-container .slider .slider-item .slide .slide-image > img, .slider-container .slider .slider-item .slide .slide-name, .slider-container .slider .slider-item .slide .custom-line, .slider-container .slider .slider-item .slide .row, .slider-container .slider .slider-item .slide .row strong, .slider-container .slider .slider-item .slide .row.custom-row > p, .slider-container .slider .slider-item .slide .row.custom-row > a {
    	 transition: 400ms;
    }
    .custom-btn {
      padding: 8px 5px;
      margin-top: -5px;
    }
    .slider-container .slider .slider-item .slide:hover > .custom-btn{
      background-color: white;
      color: #ec971f ;
    }
     .slider-container .slider .slider-item .slide .slide-name {
    	 font-size: 25px;
    	 margin-top: -20px;
    	 max-width: 60%;
    	 text-align: center;
    	 line-height: 26px;
    	 color: #8d8d8d;
    	 font-weight: 100;
    }
     .slider-container .slider .slider-item .slide .custom-line {
    	 width: 80%;
    	 height: 1px;
    	 margin: 10px 0;
    	 border: 1px solid #efefef;
    }
     .slider-container .slider .slider-item .slide .row {
    	 width: 80%;
    	 display: flex;
    	 justify-content: space-between;
    	 padding: 5px;
    	 color: #aaa;
    }
     .slider-container .slider .slider-item .slide .row strong {
    	 color: #fca60c;
    }
     .slider-container .slider .slider-item .slide .row.custom-row {
    	 font-weight: bold;
    	 align-items: center;
    }
     .slider-container .slider .slider-item .slide .row.custom-row > p {
    	 color: #222;
    	 font-size: 25px;
    }
     .slider-container .slider .slider-item .slide .row.custom-row > a {
    	 text-decoration: none;
    	 color: #fff;
    	 width: 30px;
    	 height: 30px;
    	 background-color: orange;
    	 text-align: center;
    	 line-height: 24px;
    	 border-radius: 10px;
    	 font-size: 20px;
    }
 
    
    .inner-header{
        background-size: 100% 100%;
        padding-bottom : 118px;
    }
    .listing{
        margin-left: 32% ;
    }
    .btn-right
    , .btn-left{
        display:none !important;
    }
@media only screen and (max-width: 479px){
    .btn-right
    , .btn-left{
        display:block !important;
    }
    .inner-header{
        background-image: none !important;
        background-size: 100% 100%;
        padding-bottom : 40px;
    }
    
    .listing{
        margin-left: 6% ;
    }
    .layer-overlay.overlay-theme-colored-7::before,.layer-overlay::before,.layer-overlay.overlay-theme-colored-7::before,.layer-overlay.overlay-theme-colored-7::before{
        background-color: none !important;
    }
    .container .pt-70{
        padding-top:70px !important;
        padding-bottom: 0px !important;
    }
    .text-theme-colored2.font-36{
        font-size:18px !important;
        color:#7a280c !important;
    }
    .container .mt-1{
        margin-top:1rem;
    }
    
    .divider{
        height: 130px !important;
    }
    
}
.collapse-area {
  background: #D7D8DC;
}
.panel {
  margin-top: 0px !important;
  border-radius: 0px !important;
  border: none;
  border-bottom-color: #D7D8DC;
  box-shadow: 0 0px 0px 0 transparent !important;
  -moz-box-shadow: 0 0px 0px 0 transparent !important;
  -webkit-box-shadow: 0 0px 0px 0 transparent !important;
  -o-box-shadow: 0 0px 0px 0 transparent !important;
}
.panel .panel-heading {
  border-radius: 0px !important;
  background: #f5f6f8;
  padding: 0px !important;
  border-bottom: 0px solid #DDDEE2;
}
.panel .panel-heading .panel-title a {
  text-decoration: none;
  font-weight: bold;
  display: block;
  padding: 23px 15px;
  font-weight: 300;
  color: #60626d;
  background-color: #ffffff;
  line-height: 29px;
  position: relative;
}
.panel .panel-heading .panel-title a:hover,
.panel .panel-heading .panel-title a:active {
  text-decoration: none;
  cursor: pointer;
  transition: all 0.4s;
  -moz-transition: all 0.4s;
  -webkit-transition: all 0.4s;
  -o-transition: all 0.4s;
  color: #9a4a5a;
}
.panel .panel-heading .panel-title a span {
  float: left;
  margin-top: 15px;
  margin-right: 30px;
  transition: all 0.4s;
  -moz-transition: all 0.4s;
  -webkit-transition: all 0.4s;
  -o-transition: all 0.4s;
}
.panel .panel-heading .panel-title a .bar,
.panel .panel-heading .panel-title a .bar:after {
  border-width: 1px;
  border-style: solid;
  width: 21px;
  border-radius: 10px;
  transition: all 0.4s;
  -moz-transition: all 0.4s;
  -webkit-transition: all 0.4s;
  -o-transition: all 0.4s;
}
.panel .panel-heading .panel-title a .bar:after {
  content: "";
  height: 0;
  position: absolute;
  top: 38px;
  left: 15px;
}
.panel .panel-heading .panel-title a.collapsed {
  background-color: #f5f6f8 !important;
  border-bottom: 1px solid #eeeef3;
  position: relative;
  transition: all 0.4s;
  -moz-transition: all 0.4s;
  -webkit-transition: all 0.4s;
  -o-transition: all 0.4s;
}
.panel .panel-heading .panel-title a.collapsed .bar {
  border-color: #75767F;
}
.panel .panel-heading .panel-title a.collapsed .bar:after {
  transform: rotate(90deg);
  -webkit-transform: rotate(90deg);
  -moz-transform: rotate(90deg);
  -o-transform: rotate(90deg);
  border-color: #75767F;
  transition: all 0.4s;
  -moz-transition: all 0.4s;
  -webkit-transition: all 0.4s;
  -o-transition: all 0.4s;
}
.panel-collapse {
  background-color: #ffffff;
}
.panel-collapse .panel-body {
  background-color: #ffffff;
  border: 0px solid !important;
  line-height: 26px;
  font-weight: 300;
  margin-left: 50px;
  padding-bottom: 20px;
  padding-top: 0px;
  color: #60626d;
}
.inner-header .container{
    padding-top:100px;
    /*padding-bottom:60px;*/
}

.slider-btn {
	 width: 50px;
	 height: 50px;
	 border-radius: 20px;
	 border: 0;
	 background-color: #fff;
	 box-shadow: 0 0 10px #ddd;
	 position: absolute;
	 top: 50%;
	 transform: translateY(0%);
	 font-size: 16px;
	 padding-bottom: 5px;
	 cursor: pointer;
}
 .slider-btn:active {
	 transform: translateY(0%) scale(0.9);
}
 .slider-btn.btn-right {
	 right: 0;
}
 .slider-btn.btn-left {
	 left: 0;
}

</style>
    <?php
        // echo "<pre>";
        // print_r( $resellerSeo );
        // die;
        foreach( $resellerSeo as $key => $value ){
            if( !empty( $serviceDetail ) ){
                if( $serviceDetail['serviceType'] ){
                    // echo "<pre>";
                // print_r( $serviceDetail );
                // print_r( $resellerSeo );
                // die;
                    $value['details'] = str_replace( '{service}', ucwords($serviceDetail['displayService']) , $value['details'] );
                    $value['details'] = str_replace( '{service-listing-txt}', ucwords($serviceDetail['faq_description']) , $value['details'] );
                    $value['details'] = str_replace( 'service-1-listing-txt', ucwords($serviceDetail['faq_description']) , $value['details'] );
                    $value['details'] = str_replace( 'service-2-listing-txt', ucwords($serviceDetail['faq_description']) , $value['details'] );
                    $value['details'] = str_replace( '{servers}', ucwords($serviceDetail['server']) , $value['details'] );
                    $value['details'] = str_replace( '{server}', ucwords($serviceDetail['server']) , $value['details'] );
                    $value['details'] = str_replace( '{rate}', ucwords($serviceDetail['price']) , $value['details'] );
                }
                elseif( $service_name != 'all-services'  &&  $service_name != 'other-services' && $service_name != null ){
                        // $value['details'] = str_replace( '{server}', ucwords($serviceDetail['server']) , $value['details'] );
                        // $value['details'] = str_replace( '{rate}', ucwords($serviceDetail['price']) , $value['details'] );
                        $value['details'] = str_replace( '{service}', ucwords(str_replace(  ' ' ,  '-' ,  $service_name )) , $value['details'] );
                }
            }
            else{
                // $value['details'] = str_replace( '{server}', ucwords($serviceDetail['server']) , $value['details'] );
                // $value['details'] = str_replace( '{rate}', ucwords($serviceDetail['price']) , $value['details'] );
                $value['details'] = str_replace( 'service-1-listing-txt', ucwords($serviceFirst['faq_description']) , $value['details'] );
                $value['details'] = str_replace( 'service-2-listing-txt', ucwords($serviceSecond['faq_description']) , $value['details'] );
            }
            if( $city != '' ){
                    $value['details'] = str_replace( '{in location}', ucwords($city) , $value['details'] );
                    $value['details'] = str_replace( '{location}', ucwords($city) , $value['details'] );
            }
            $seo[$value['category']][$value['sub_category']] = $value['details']; 
        }
        // print_r( $seo );
        // die;
    ?>
<body class="" data-new-gr-c-s-check-loaded="14.1062.0" data-gr-ext-installed="">
    <div id="wrapper" class="clearfix">
        <!-- Header -->
        <header id="header" class="header">
            <div class="header-top bg-theme-colored2 sm-text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="widget text-white">
                                <ul class="list-inline xs-text-center text-white">
                                    <li class="m-0 pl-10 pr-10"> <a href="#" class="text-white"><i
                                                class="fa fa-phone text-white"></i>
                                            <?php echo $contact_no;?></a> </li>
                                    <li class="m-0 pl-10 pr-10">
                                        <a href="#" class="text-white"><i
                                                class="fa fa-envelope-o text-white mr-5"></i><?php echo $email;?></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4 pr-0">
                            <div class="widget">
                                <ul class="styled-icons icon-sm pull-right flip sm-pull-none sm-text-center mt-5">
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <ul class="list-inline sm-pull-none sm-text-center text-right text-white mb-sm-20 mt-10">

                                <li class="m-0 pl-0 pr-10">
                                    <a href="https://users.respicite.com/BaseController/registration/bWVyYWs="
                                        class="text-white"><i class="fa fa-edit mr-5"></i><?php echo $msg['register'];?></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>            
        </header>

        <!-- Start main-content -->
        <div class="main-content">
            <!-- Section: inner-header -->
            <section class="inner-header divider "
                data-bg-img="<?php echo $img['data-bg'];?>"
                style="background-image: url(<?php echo $img['bg'];?>);">
                <div class="container">
                    <!-- Section Content -->
                    <div class="section-content">
                        <div class="row">
                            <div class="col-md-10">
                                <h1 class="text-theme-colored2 font-36"><?php echo $seo['banner']['h1'];?></h1>
                                <ol class="breadcrumb text-left mt-10 font-20 white">

                                    <li><a style='color : #7a280c !important;' href="#"><?php echo $seo['banner']['h2'];?></a></li>

                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- content #start -->

            <section>
                <div class="container mt-1">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="sidebar sidebar-left mt-sm-30">
                                <div class="widget border">
                                   
                                    <ul class="list list-divider list-border">
                                        <li>
                                            <a class="btn btn-sm relevant-education" href="<?php echo base_url("best-career-counsellor");?>">Filter Clear</a>                                            
                                        </li>
                                        <li>
                                            <p>Service Name</p>
                                            <select data-name="service" class="form-control filter-event">
                                                <option  value="">All Services</option>
                                                <?php foreach($s_lists as $v){ ?>
                                                    <option value="<?= strtolower( str_replace( ' ' , '-' , $v['alternate_name']) );?>" <?php echo urldecode($this->uri->segment(2)) == strtolower( str_replace( ' ' , '-' , $v['alternate_name'])) ? "selected":"";?>><?php echo $v['alternate_name'];?></option>                                                    
                                                <?php } ?>
                                                <option value="other-services" <?php echo urldecode($this->uri->segment(2)) == 'other-services' ? "selected":"";?>>Others Services</option>
                                            </select>
                                        </li>
                                       <li>
                                            <p>By City</p>
                                            <select data-name="city" class="form-control filter-event">
                                                <option value="">All Location</option>
                                                <?php
                                                    // echo "<pre>"; 
                                                    // print_r( $c_lists );
                                                    // die;
                                                    foreach($c_lists as $v){ ?>
                                                    <option value="<?php echo trim($v->name);?>" <?php echo (urldecode($this->uri->segment(3)) == trim($v->name))?"selected":"";?>><?php echo ucwords(trim($v->name));?></option>                                                    
                                                <?php } ?>                                                
                                            </select>
                                        </li>
                                        <!--  <li>
                                            <p>Day Availibility</p>
                                            <select data-name="days" class="form-control filter-event" >
                                                <option value="null">--select--</option>
                                                <?php foreach($days as $v){ ?>
                                                    <option value="<?php echo $v->day_name;?>" <?php echo (urldecode($this->uri->segment(5)) == $v->day_name)?"selected":"";?>><?php echo $v->day_name;?></option>                                                    
                                                <?php } ?>
                                            </select>
                                        </li>
                                        <li>
                                            <p>Channel</p>
                                            <select data-name="channel" class="form-control filter-event">
                                                <option value="null">--select--</option>
                                                <?php foreach($channels_lists as $v){ ?>
                                                    <option value="<?php echo $v->name;?>" <?php echo (urldecode($this->uri->segment(6)) == $v->name)?"selected":"";?>><?php echo $v->name;?></option>                                                    
                                                <?php } ?>                                                
                                            </select>
                                        </li> -->
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-9 blog-pull-right">
                                <?php if(empty( $seo_lists )){
                                    echo "<p class='filter-seo-mes bg-primary'>As we could not find as per your search criteria, we are displaying all our partners.</p>";
                                }?>
                                <?php
                                // echo "<pre>";
                                // print_r( $seo_lists );
                                // die;
                                // $this->db->where( 'user_id' , '15');
                                $calendly_data = $this->db->get('admin_calendly_event');
                                foreach($seo_lists as $v){
                                    $calendlyData = [];
                                    if( $calendly_data->num_rows() > 0 ){
                                        foreach( $calendly_data->result_array() as $event ){
                                            $calendlyData[] = [ 'name' => $event['event_name'] , 'id' => $event['id'], 'price' => $event['price'] , 'parentId' => $v['user_id'], 'desc' => $event['desc'], 'image' => $event['image'] ];
                                        }
                                    }
                                ?>
                                    <div class="course-list-block clearfix mb-30 hover-effect">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-8 border-right">
                                                    <div class="col-md-3">
                                                        <div class="pro-box">
                                                            <img src="<?php echo $v['profile_photo'];?>" class="pro-img" alt="Profile Image">
                                                            <div>
                                                                <p></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-9">  
                                                        <div class="details-box">
                                                            <!---->
                                                            <!--<a href="#"><strong><?php echo $v['fullname'];?></strong></a> -->
                                                             <a href="<?= base_url(); ?>counselors-view/<?=$v["profile_link"];?>"><strong><?php echo $v['fullname'];?></strong></a> 
                                                            <span>
                                                                <?= $v['star_rating']!= '' ? star_rating($v['star_rating']) : '';?>
                                                            </span>
                                                            <p>
                                                            <?php
                                                                $show = [];
                                                                $arr = [ 'Career Builder'=> 'Career Counselling','Career Explorer' => 'Career Counselling' ,'Career Excellence' => 'Corporate Coching','Positive Parenting' => 'Parenting Counselling', 'Overseas Companion' => 'Overseas Services' ];
                                                                    if( !empty( $v['services'] ) ){
                                                                        foreach( $v['services']   as $key => $value){
                                                                            if( array_key_exists($value  , $arr) ){
                                                                                $show[] = $arr[$value];
                                                                            }
                                                                            else{
                                                                                $show[] = $value;
                                                                            }
                                                                        }
                                                                        echo ucwords( implode( ', ' , array_unique($show) ) );
                                                                    }
                                                                ?></p>
                                                            <?php 
                                                            // print_r( $v['locations'] );
                                                            // die;
                                                            if( !empty($v['locations'][0]) ){
                                                                // print()
                                                                echo ucwords(implode(', ' , $v['locations'] ));
                                                            ?>
                                                                <br>
                                                            <?php
                                                            }
                                                            // else{
                                                            //     echo "<br>";
                                                            // }
                                                            ?>
                                                            
                                                            <?php
                                                            if( !empty($v['most_relevant_education'][0]) ){
                                                                for($v_i = 0; $v_i < sizeof($v["most_relevant_education"]);$v_i++){
                                                                    echo "<button class='btn btn-sm relevant-education'>".$v["most_relevant_education"][$v_i]."</button>";
                                                                }
                                                            ?>
                                                                <br>
                                                            <?php
                                                            
                                                            }
                                                            // else{
                                                            //     echo "";
                                                            // }
                                                            ?>
                                                            
                                                            Channel : <?= $v["channels"] != '' ? $v["channels"] : 'Face to Face, Audio Call, Video Call ';?>
                                                            <br>
                                                            <span>Experience : <?= $v["experience"] != '' ? ($v["experience"] == "0.0" ? '5+ years' : $v["experience"] ) : 'Not Addded' ;?></span> | <span>Counselling : <?= $v["counselling_sessions"] != '' ? $v["counselling_sessions"] : '200+';?></span>
                                                            <br>
                                                            <!--<span>Experience : <?= $v["experience"] != '' ? ($v["experience"] == "0.0" ? '5+ years' : $v["experience"] ) : 'Not Addded' ;?></span> | <span>Available On : <?= $v["available_days"] != '' ? $v["available_days"] : 'Not Added';?></span>-->
                                                            <!--<a href="#" class="see-more"> See More »</a> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="cart-righ-bottom-box">
                                                        <div>
                                                            <?php for($v_i = 0; $v_i < sizeof($v["top_skills"]);$v_i++){
                                                                    echo "<p>".$v["top_skills"][$v_i]."</p>";
                                                            }?>
                                                        </div>
                                                    <div>
                                                            <!-- <p class="btn btn-success d-block book-appoi btn-appointment" data-name="book_appointment" style="cursor:pointer" data-user-id="<?php echo $v["user_id"];?>">Book Appointment</p> -->
                                                            
                                                            <p class="btn btn-success d-block w-100 mb-5 mt-5 btn-appointment" data-name="interested_call_back" data-user-id="<?php echo $v["user_id"];?>">Interested for Call Back</p>
                                                            <!--<p class="btn btn-primary d-block w-100 mb-5 mt-5 btn-appointment" data-name="message" data-user-id="<?php echo $v["user_id"];?>">Message</p>-->
                                                            <a class="btn btn-primary d-block w-100 mb-5 mt-5" href='<?= base_url('') ?>BaseController/registration/<?= base64_encode($v["domain_id"]) ?>'>User Registration</a>
                                                            <p class="btn btn-info d-block w-100 mb-5 mt-5 btn-clandly" data-user-id="<?php echo $v["user_id"];?>" data-name='<?= isset( $calendlyData ) ? json_encode($calendlyData) : json_encode([]) ?>' data-user-id="<?php echo $v["user_id"];?>">Request Appointment</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                        </div>                        
                    </div>
                    <p class="center_link"><?php echo $links; ?></p>
                </div>
            </section>
            <section class='bg-white'>
                <div class='row'>
                       <?php
                            if( !empty( $seo['listing'] ) ){
                                foreach( $seo['listing'] as $key => $value ){
                                    $point = explode("," , $value);
                                    if( $point[0] != '' ){
                                        if( count($point) == 1 ){
                            ?>
                                            <div class='col-md-7 col-md-offset-2 listing' style="margin-top: 10px;">
                                                <h1 style='color : #7a280c !important;' class='font-20'><?= $point[0] ?></h1>
                            <?php
                                        }
                                        else{
                                            foreach( $point as $key1 => $value1 ){
                            ?>
                                                <h2 style='color : #7a280c !important; font-weight:none;' class='font-15' style="margin-left:15px;" ><span style='color:#000'>*</span> &nbsp;&nbsp;  <?=ucwords( trim($value1) )?></h2>
                                                
                            <?php
                                                
                                            }
                                            if( count($point) > 1  ){
                            ?>          
                                                </div>
                            <?php
                                            }
                                        }
                                    }
                                }
                            }
                       ?>
                </div>
            </section>
            <section class='bg-theme-colored2' style="margin-top: 20px;">
                <div class='container bg-theme-colored2'>
                    <div class='row'>
                        <div class='col-md-12'>
                            <h1 class='text-white font-25 text-center' style="margin-bottom:10px;"> How does it work? </h1>
                        </div>
                        <?php
                            $index = 1;
                            foreach( $seo['how_it_works'] as $key => $value ){
                        ?>
                            <div class='col-md-3'>
                                <div style="height:100px; width:100px; background-color:white; margin:0 auto; padding-top:30px; border-radius: 50%">
                                    <p class="text-center text-theme-colored2 font-25" ><?= $index++ ?></p>
                                </div>
                                <p class='text-white font-20 text-center'><?= $value ?></p>
                            </div>
                        <?php
                            }
                        ?>
                        <div >
                            
                        </div>
                        
                    </div>
                    
                </div>
            </section>
            <section class="collapse-area bg-white">
              <div class="container">
                <div class="row">
                  <div class="collapse-tab col-xs-12">
                    <div class="panel-group" id="accordion">
                       <?php
                            $index = 0;
                            foreach( $seo['faqs'] as $key => $value ){
                                if( $key == "description" ){
                        ?> 
                              <div class="row">
                                  <div class="col-md-12">
                                      <p class='text-theme-colored2 text-center font-30'><?= isset($serviceDetail['displayService']) ? ucwords($serviceDetail['displayService']).' - ' : ''?> Frequently Asked Question</p>
                                  </div>
                                  <div class='col-md-12'>
                                      <p class='text-justify font-20'><?= ucfirst( $value ) ?></p>
                                  </div>
                              </div>
                        <?php
                                }
                                else{
                                    // echo $key;
                                    if( $key == 'q'.($index+1) ){
                                     $index++;
                        ?>
                                    <div class="col-md-12 panel panel-default p-0"  id="panel1">
                                        <!-- Start: Tab-1 -->
                                        <div class="panel-heading bg-theme-colored2">
                                          <h4 class="panel-title">
                                            <a style='color : #7a280c !important;  font-weight:bold;'  data-toggle="collapse" data-parent="#accordion" href="#collapse<?= $index ?>" class="collapsed font-15">
                                              <?= ucwords($value) ?>
                                              <span style='color : #7a280c !important; font-weight:bold; border : 1px solid #7a280c !important; border-radius:50%' class="bar hidden-xs"></span>
                                            </a>
                                          </h4>
                                        </div>
                        <?php
                                    }
                                    else{
                        ?>
                                        <div id="collapse<?= $index ?>" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <?= $value ?>
                                            </div>
                                        </div>
                                    </div>
                        <?php
                                    }
                                }
                            } 
                       ?>
                      <!--<div class="panel panel-default" id="panel2">-->
                        <!-- Start: Tab-2 -->
                      <!--  <div class="panel-heading">-->
                      <!--    <h4 class="panel-title">-->
                      <!--      <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" class="collapsed">-->
                      <!--        Which payment methods do you accept?-->
                      <!--        <span class="bar hidden-xs"></span>-->
                      <!--      </a>-->
                      <!--    </h4>-->
                      <!--  </div>-->
                      <!--  <div id="collapseTwo" class="panel-collapse collapse">-->
                      <!--    <div class="panel-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.-->
                      <!--    </div>-->
                      <!--  </div>-->
                      <!--</div>-->
                      <!--<div class="panel panel-default" id="panel3">-->
                        <!-- Start: Tab-3 -->
                      <!--  <div class="panel-heading">-->
                      <!--    <h4 class="panel-title">-->
                      <!--      <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" class="collapsed">-->
                      <!--        I'd like to buy 5 tickets, is there bulk pricing?-->
                      <!--        <span class="bar hidden-xs"></span>-->
                      <!--      </a>-->
                      <!--    </h4>-->
                      <!--  </div>-->
                      <!--  <div id="collapseThree" class="panel-collapse collapse">-->
                      <!--    <div class="panel-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.-->
                      <!--    </div>-->
                      <!--  </div>-->
                      <!--</div>-->
                    </div>
                  </div>
                </div>
              </div>
            </section>
             <div class="modal fade" id="take_assessments_modal" aria-hidden="true" >
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h4 class="modal-title">Take assessments</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">×</span>
                              </button>
                          </div>
                          <div class="modal-body">
                              <input type="hidden" name="user_id" id="user_id">
                              <input type="hidden" name="data" id="data">
                              <div id="show_msg"></div>
                              <div class="form-group">
                                <label for="form_email">Email ID<small>*</small></label>
                                <input id="form_email" class="form-control required email" type="email" placeholder="Enter Email" aria-required="true">
                                <p id="email_error"></p>
                              </div>
                              <div id="select_input"></div>
                              <div id="new_input"></div>
                              <div id="input_password"></div>
                          </div>
                          <div class="modal-footer justify-content-between">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              <button type="button" id="btn_take_ass" class="btn btn-primary">Submit</button>
                          </div>
                      </div>
                  </div>
              </div>
            <!-- content #end -->
        </div>
        <!-- end main-content -->

        <!-- Footer -->
        <footer id="footer" class="footer" data-bg-color="#212331" style="background: rgb(33, 35, 49) !important;">
            <div class="container pt-70 pb-40">
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="widget dark">
                            <img class="mt-5 mb-20" alt="" src="https://respicite.com/images/logo-600x107.png">

                            <ul class="list-inline mt-5">

                                <li class="m-0 pl-10 pr-10"> <i class="fa fa-home text-theme-colored2 mr-5"></i>
                                    <a class="text-gray" href="#">
                                        Bhopal, Madhya Pradesh, India.
                                    </a>
                                </li>



                                <li class="m-0 pl-10 pr-10"> <i class="fa fa-phone text-theme-colored2 mr-5"></i> <a
                                        class="text-gray" href="#">Mobile - 9584675111</a> </li>
                                <li class="m-0 pl-10 pr-10"> <i class="fa fa-envelope-o text-theme-colored2 mr-5"></i>
                                    <a class="text-gray" href="#">sales@respicite.com</a>
                                </li>
                                <li class="m-0 pl-10 pr-10"> <i class="fa fa-globe text-theme-colored2 mr-5"></i> <a
                                        class="text-gray" href="/">respicite.com</a> </li>
                            </ul>
                            <ul class="styled-icons icon-sm icon-bordered icon-circled clearfix mt-10">
                                <li>
                                    <a href="https://www.facebook.com/respicite"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/RespiciteL"><i class="fa fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="https://www.linkedin.com/company/respicite-llp"><i
                                            class="fa fa-linkedin"></i></a>
                                </li>
                                <!--<li><a href="#"><i class="fa fa-instagram"></i></a></li>-->
                                <!--<li><a href="#"><i class="fa fa-google-plus"></i></a></li>-->
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="widget dark">
                            <h4 class="widget-title line-bottom-theme-colored-2">Useful Links</h4>
                            <ul class="angle-double-right list-border">
                                <li><a href="/">Home Page</a></li>
                                <!-- <li><a href="#">About Us</a></li> -->
                                <!-- <li><a href="#">Our Mission</a></li> -->
                                <li><a href="/terms-and-conditions.php" target="_black">Terms and Conditions</a></li>
                                <li><a href="/frequently-asked-questions.php" target="_black">FAQ</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-4">
                        <div class="widget dark">
                            <h4 class="widget-title line-bottom-theme-colored-2">Opening Hours</h4>
                            <div class="opening-hours">
                                <ul class="list-border">
                                    <li class="clearfix"> <span> Monday - Thursday : </span>
                                        <div class="value pull-right"> 9:30 am - 06.00 pm </div>
                                    </li>
                                    <li class="clearfix"> <span> Friday :</span>
                                        <div class="value pull-right"> 9:30 am - 06.00 pm </div>
                                    </li>
                                    <li class="clearfix"> <span> Saturday : </span>
                                        <div class="value pull-right"> 9:30 am - 06.00 pm </div>
                                    </li>
                                    <li class="clearfix"> <span> Sunday : </span>
                                        <div class="value pull-right bg-theme-colored2 text-white closed"> Closed </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </footer>
        <a class="scrollToTop" href="#" style="display: none;"><i class="fa fa-angle-up"></i></a>
    </div>
    <!-- Footer Scripts -->

    <div class="modal fade" id="appointment_modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
        <div class="modal-content p-30 pt-10">
            <h3 class="text-center text-theme-colored2 mb-20 title-show">Title</h3>
            <form id="appointment_book" method="post">
            <div class="row">
                <div class="col-md-12">
                <div class="form-group">
                    <label for="name">Name<small> *</small></label>
                    <input name="name" type="text" id="name" class="form-control" required>
                    <br>
                    <label for="email">Email ID.<small> *</small></label>
                    <input name="email" type="email" class="form-control" required>
                    <br>
                    <label for="phone_no">Phone Number<small> *</small></label>
                    <input name="phone_no" type="number" class="form-control" required>
                    <br>
                    <label for="location">Location<small> *</small></label>
                    <input name="location" type="text" class="form-control" required>
                    <br>                    
                    <label for="message">Message<small> *</small></label>
                    <textarea rows="3" name="message" id="message" class="form-control" required></textarea>
                   
                    <input type="hidden" name="user_id">
                    <input type="hidden" name="action_name">
                </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                    <button type="submit" class="btn btn-block btn-sm mt-20 pt-10 pb-10 btn-submit-modal" data-loading-text="Please wait...">Book Now</button>
                    </div>
                </div>
                </div>
            </form>
        </div>
        </div>
    </div>
    <div class="modal fade" style='magin-top:50px' id="calendly_modal" tabindex="-1" role="dialog">
        <div class="col-md-8 col-md-offset-2" style="margin-top:50px" role="document">
            <div class="modal-content p-30 pt-10">
                <h3 class="text-center text-theme-colored2 mb-20 title-show">Title</h3>
                <div class="row">
                    <main id="slider">
                    	<section class="slider-container">
                    		<div class="slider buttons">
                		    </div>
                    	</section>
                    </main>
                    <button class="slider-btn btn-left d-none">&leftarrow;</button>
                	<button class="slider-btn btn-right d-none">&rightarrow;</button>
                </div>
            </div>
        </div>
    </div>
    
    <input type="hidden" id="segment_0" value="<?php echo $this->uri->segment(2);?>">
    <input type="hidden" id="segment_1" value="<?php echo $this->uri->segment(3);?>">
    <!--<input type="hidden" id="segment_2" value="<?php echo $this->uri->segment(4);?>">-->
    <!--<input type="hidden" id="segment_3" value="<?php echo $this->uri->segment(5);?>">-->
    <!--<input type="hidden" id="segment_4" value="<?php echo $this->uri->segment(6);?>">-->
    <script>
        let segment0 = $("#segment_0").val();
        let segment1 = $("#segment_1").val();
        // let segment3 = $("#segment_3").val();
        // let segment4 = $("#segment_4").val();
        const BASE_URL = "<?php echo base_url();?>";
        $(document).on("change",".filter-event",function(){
            let sn = $(this).val();
            // console.log( sn );
            // return false;
            switch($(this).data("name")){
                case "service":
                    window.open(`${BASE_URL}best-counsellors-india/${sn == '' ? 'all-services' : sn }${(segment1 != "")?'/'+segment1:''}`,"_self");
                break;
                case "city":
                    window.open(`${BASE_URL}best-counsellors-india/${(segment0 != "")?segment0:'all-services'}/${(sn != '' ? sn : '')}`,"_self");
                break;
                // case "days":
                //     window.open(`${BASE_URL}best-career-counsellor/${(segment0 != "")?segment0:1}/${(segment1 != "")?segment1:null}/${(segment2 != "")?segment2:null}/${sn}/${(segment4 != "")?segment4:null}`,"_self");
                // break;
                // case "channel":
                //     window.open(`${BASE_URL}best-career-counsellor/${(segment0 != "")?segment0:1}/${(segment1 != "")?segment1:null}/${(segment2 != "")?segment2:null}/${(segment3 != "")?segment3:null}/${sn}`,"_self");
                // break;
            }
        });
        
        $('.center_link a').click( function (){
            // console.log( $('.center_link') )
            var pageNo = $(this).attr("data-ci-pagination-page");
            // console.log( this.href );
            let segment0 = $("#segment_0").val();
            let segment1 = $("#segment_1").val();
            fetch(`${BASE_URL}home/set_page_number/${pageNo}`,{
                method:"post",
            })
            .then((req)=>req.json())
            .then(res=>{
                console.log( res );
                window.open(`${BASE_URL}best-counsellors-india${ (segment0 != "") ? '/'+segment0 : ''}${ (segment1 != "") ? '/'+((segment0 == "" )? '/all-services/' : '')+segment1 : ''}`,"_self");
            })
            return false;
        } );
    </script>

    <script>
        let ap_modal = $("#appointment_modal");
        let c_modal = $("#calendly_modal");
        let take_modal = $("#take_assessments_modal");
        $(document).on("click",".btn-appointment",function(){
            let _this = $(this);
            let action_name = _this.data("name");
            let user_id     = _this.data("user-id");
            let title = "";
            
            if(action_name == "book_appointment")
            {
                title = "Book Appointment";
            }else if(action_name == "interested_call_back"){
                title = "Interested Call Back";
            }else if(action_name == "message"){
                title = "Message";
            }
            ap_modal.find("[name=user_id]").val(null);
            ap_modal.find("[name=user_id]").val(user_id);
            ap_modal.find("[name=action_name]").val(null);
            ap_modal.find("[name=action_name]").val(action_name);
            ap_modal.modal("show");
            ap_modal.find(".title-show").html(title);
        });
        let c_list = ''
        $(document).on("click",".btn-clandly",function(){
            let _this = $(this), listing = '';
            let user_id = _this.data("user-id");
            c_list = _this.data("name");
            take_modal.modal("show");
            take_modal.find("[name=data]").val(JSON.stringify(c_list));
            take_modal.find("[name=user_id]").val(user_id);
        });
        $("#btn_take_ass").click(function(){
            let email = $("#form_email");
            let otp = $("#form_otp");
            // let data = $("#data").val();
            let user_id = $("#user_id").val();
            console.log( data ); 
            // let fpass = $("#form_password");
            // let solutionCode = $('#assessmentSelect').val();
            // let solutionId = $("#solutionid");
            let email_err = $("#email_error");
            let otp_error = $("#otp_error");
            let show_msg = $("#show_msg");
            // let select_input = $("#select_input");
            let new_input = $("#new_input");
            // let input_password = $("#input_password");
            if( typeof otp.val() === "undefined" ){
              if(email.val() != ""){
                  let eid = btoa(email.val());
                  let sid = btoa(user_id);
                  let commanUrl = `Web_ajax/book-appointment/CHECK_USER?e=${eid}&s=${sid}`
                  $.get(`${BASE_URL}${commanUrl}`,function(res){
                      if(res.msg == "EMAIL_EMPTY"){
                          email_err.html("<b class='text-danger'>This field is required.</b>");
                      }
                      if(res.msg == "LOGIN"){
                        var option = '';
                        res.solutionList.forEach( e => {
                            option+=`<option value='${e.code}'>${e.solution} - ${e.code}</option>`
                        } )
                        select_input.html(
                          `<div class="form-group">
                            <label for="form_otp">Select The Assessment<small>*</small></label>
                            <select id='assessmentSelect' required onchange='getAssessmentSelect()' class="form-control" >
                              <option value=''>Select Any</option>
                              <option value='new'> New Assessment </option>
                              ${option}
                            </select>
                            <p id="otp_error"></p>
                          </div>`
                        )
                      }
                      if( res.msg == "LOGIN SUCCESS" ){
                        show_msg.html(`<div class="alert alert-info" role="alert">
                          <p>Login Successfully</p>
                         </div>`);
                        window.location = `${BASE_URL}UserController/login/${res.id}/${solutionCode}/isloggedIn`;
                      }
                      if(res.msg == "NEW LOGIN"){
                         email.attr('readonly' ,  true)
                         show_msg.html(`<div class="alert alert-info" role="alert">
                          <p>OTP Sent To your email, Verify OTP and Take Assassment</p>
                         </div>`);
                         new_input.html(
                           `<div class="form-group">
                             <label for="form_otp">Otp<small>*</small></label>
                             <input id="form_otp" class="form-control required" type="text" placeholder="Enter Otp" aria-required="true">
                             <p id="otp_error"></p>
                           </div>`
                         )
                      }
                      if(res.msg == "REGISTRATION"){
                        email.attr('readonly', true)
                         show_msg.html(`<div class="alert alert-info" role="alert">
                                          <p>You are not registered , Verfiy and Take Assessment</p>
                                        </div>`);
                        new_input.html(
                          `<div class="form-group">
                            <label for="form_otp">Otp<small>*</small></label>
                            <input id="form_otp" class="form-control required" type="text" placeholder="Enter Otp" aria-required="true">
                            <p id="otp_error"></p>
                          </div>`
                        )
                      }
                      if(res.msg == "NOT USER"){
                        // email.attr('readonly', true)
                         show_msg.html(`<div class="alert alert-info" role="alert">
                                          <p>This email id is already registered with us and can't be used to purchase assessments. Kindly use another email. For assistance, please write to us at "sales@respicite.com"</p>
                                        </div>`);
                        new_input.html(null)
                        select_input.html(null)
                      }
                  })
              }else{
                  email_err.html("<b class='text-danger'>This field is required.</b>");
              }
            }
            else{
              if(otp.val() != ""){
                let eid = btoa(email.val());
                let otpval = btoa(otp.val());
                let userid = btoa(user_id);
                  $.get(`${BASE_URL}Web_ajax/validate_otp/${eid}/${otpval}/${userid}`,function(res){
                    let show_msg = $("#show_msg");
                    let new_input = $("#new_input");
                    if(res.msg == "VERIFY"){
                        take_modal.modal("hide");
                    //   show_msg.html(`<div class="alert alert-info" role="alert">
                    //                       <p>OTP Is Verified You can Select Event Time Now</p>
                    //                     </div>`);
                        let title = "Select The Event Time Now", listing = '';
                        c_modal.find(".title-show").html(title);
                        c_modal.modal("show");
                        c_list.forEach( function(item){
                            // listing += `<div class='col-md-4'><a href="${BASE_URL}calendly/user_request_code_online/${item.id}/${eid}/${res.parent_email}"  class="btn btn-default">${item.name} For Rs ${item.price}/-</a></div>`
                            listing += `<div class="col-md-4">
                                			<div class="slider-item">
                                				<div class="slide">
                                					<figure class="slide-image">
                                						<img src="${BASE_URL}assets/${item.image}" alt="">
                                					</figure>
                                					<h4 class="slide-name">${item.name}</h4>
                                					<div class="custom-line"></div>
                                					<div class="row">
                                						<p>${item.desc}</p>
                                					</div>
                                					<div class="custom-line"></div>
                                					<div class="row">
                                						<p>Rs ${item.price}</p>
                                						<a class='btn btn-warning custom-btn' href="${BASE_URL}calendly/user_request_code_online/${item.id}/${eid}/${res.parent_email}"><span>Book Appointment</span></a>
                                					</div>
                                				</div>
                                			</div>
                                        </div>`
                        });
                        c_modal.find(".buttons").html(listing);
                    //   window.location = `${BASE_URL}BaseController/user_request_code_online/${email.val()}/${res.parent_email}/${solutionId.val()}/notloogedin`
                    }
                    if(res.msg == "NOT VERIFY"){
                        show_msg.html(`<div class="alert alert-info" role="alert">
                                          <p>OTP Is not correct, Enter correct otp</p>
                                        </div>`);
                    }
                  })
              }
              else{
                otp_error.html("<b class='text-danger'>This field is required.</b>");
              }
            }
        });
        
        
        $(function () {
        	const slider = document.getElementsByClassName("slider").item(0);
        
        	let isDrag = false,
        		startPos = 0,
        		curIndex = 0,
        		curTranslate = 0,
        		preTranslate = 0,
        		animationId = null;
        
        	$(".slider-item").on("mousedown mousemove mouseup mouseleave", (e) => {
        		e.preventDefault();
        	});
        
        	slider.onmousedown = startSlide;
        	slider.ontouchstart = startSlide;
        	slider.onmousemove = moveSlide;
        	slider.ontouchmove = moveSlide;
        	slider.onmouseup = endSlide;
        	slider.onmouseleave = endSlide;
        	slider.ontouchend = endSlide;
        
        	function getPositionX(event) {
        		return event.type.includes("mouse") ? event.pageX : event.touches[0].clientX;
        	}
        	function animation() {
        		if (isDrag) requestAnimationFrame(animation);
        		setSliderPosition();
        	}
        	function startSlide(event) {
        		startPos = getPositionX(event);
        		isDrag = true;
        		animationId = requestAnimationFrame(animation);
        		$(".slider").removeClass("animation").css("cursor", "grabbing");
        	}
        	function moveSlide() {
        		if (isDrag) {
        			const positionX = getPositionX(event);
        			curTranslate = preTranslate + positionX - startPos;
        		}
        	}
        	function endSlide() {
        		isDrag = false;
        		cancelAnimationFrame(animation);
        		const Moved = curTranslate - preTranslate;
        		if (Moved < -100 && curIndex < $(".slider-item").length - 1 - 1) curIndex++;
        		if (Moved > 100 && curIndex > 0) curIndex--;
        		setPositionByIndex();
        		$(".slider").addClass("animation").css("cursor", "grab");
        	}
        	function setPositionByIndex() {
        		curTranslate = ($(".slider-item").width() + 60) * curIndex * -1;
        		preTranslate = curTranslate;
        		setSliderPosition();
        	}
        	function setSliderPosition() {
        		$(".slider-container .slider").css(
        			"transform",
        			`translateX(${curTranslate}px)`
        		);
        	}
        	$(".btn-right").click(() => {
        		curIndex =
        			++curIndex < $(".slider-item").length - 1 - 1
        				? curIndex
        				: $(".slider-item").length - 1 - 1;
        		endSlide();
        	});
        	$(".btn-left").click(() => {
        		curIndex = --curIndex > 0 ? curIndex : 0;
        		endSlide();
        	});
        });
        
        
        $("#appointment_book").submit(function(event){
            event.preventDefault();
            let formData = new FormData(event.target);
            fetch(`${BASE_URL}home/work_ajax`,{
                method:"post",
                body:formData
            })
            .then((req)=>req.json())
            .then(res=>{               
                if(res.message_type == "book_succ"){
                    event.target.reset();
                    ap_modal.modal("hide");
                    swal("Thank You!", res.message, "success");
                }
            })
        });
    </script>
</body>