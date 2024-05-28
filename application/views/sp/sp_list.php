<?php
// echo "<pre>";
// print_r($seo_lists);
// echo "</pre>";
// die;

$contact_no = '9584675111';
$email = 'sales@respicite.com';
$msg = [
    'register'=>'Register as a User',
    'banner-1'=>'Our Services Provider',
    'banner-2'=>'Browse, Choose, Get Counselling'
];
$img = [
    'bg'=>'https://respicite.com/images/1920x820-2.jpg',
    'data-bg'=>'https://respicite.com/images/1920x820-2.jpg'
];

?>
<?php
 function star_rating($stars){
     $render_ster = ' <i style="color: #CFB53B;" class="fa fa-star" aria-hidden="true"></i> ';
     $output = "";
    for($i = 0; $i < $stars;$i++){
        $output .= $render_ster;
    }
    return $output;
 }
?>
<style type="text/css">
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

</style>
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
            <section class="inner-header divider layer-overlay overlay-theme-colored-7"
                data-bg-img="<?php echo $img['data-bg'];?>"
                style="background-image: url(<?php echo $img['bg'];?>);">
                <div class="container pt-120 pb-60">
                    <!-- Section Content -->
                    <div class="section-content">
                        <div class="row">
                            <div class="col-md-6">
                                <h2 class="text-theme-colored2 font-36"><?php echo $msg['banner-1'];?></h2>
                                <ol class="breadcrumb text-left mt-10 white">

                                    <li><a href="#"><?php echo $msg['banner-2'];?></a></li>

                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- content #start -->

            <section>
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="sidebar sidebar-left mt-sm-30">
                                <div class="widget border">
                                   
                                    <ul class="list list-divider list-border">
                                        <li>
                                            <a class="btn btn-sm relevant-education" href="<?php echo base_url("SpController/marketplace_new");?>">Filter Clear</a>                                            
                                        </li>
                                        <!-- <li>
                                            <input type="text" name="name" class="form-control" placeholder="Search Text" id="keyword" onkeyup="searchFilter()">                                            
                                        </li> -->
                                        <form action="<?php echo base_url().'service-providers'; ?>"  id="form" method="post">
                                        <li>
                                            <p>Service Name</p>
                                            <select name="levelone" id="levelone" class="form-control">
                                                <option value="null">--Select--</option>
                                                <?php 
                                                  foreach ($lk->result() as $row)  
                                                  {  
                                                      ?>
                                                      <option value="<?php echo $row->id; ?>"><?php echo $row->l1; ?></option>
                                                      <?php
                                                  }
                                                  ?>
                                            </select>
                                        </li>
                                        <li>
                                            <p>Level Two</p>
                                            <select name="leveltwo" id="leveltwo" class="form-control " >
                                                <option value="null">--select--</option>                
                                            </select>
                                        </li>
                                        <li>
                                            <p>Level Three</p>
                                            <select name="levelthree" id="levelthree" class="form-control" >
                                                <option value="null">--select--</option>
                                            </select>
                                        </li>
                                        <li>
                                            <button type="submit" name="saveBtn" id="add" class="btn btn-primary btn-block">Search</button>                                            
                                        </li>
                                    </form>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-9 blog-pull-right">
                                <?php //if($seo_filter === true){
                                    //echo "<p class='filter-seo-mes bg-primary'>As we could not find as per your search criteria, we are displaying all our partners.</p>";
                                //}?>
                                <?php if (isset($l)) {
                                
              foreach ($l as $row)  
                {  
                  $e = $row->email;
                  $this->db->select('user_id');
                  $this->db->where('email',$e);
                  $domain = $this->db->get('user_details')->row()->user_id;
                  //echo $domain;die; 
                  $domain =(is_int($domain) or $domain='')?'':$domain; 
            ?>
<div class="course-list-block clearfix mb-30 hover-effect">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-8 border-right">
                                                    <div class="col-md-3">
                                                        <div class="pro-box">
                                                            <img src="<?php echo base_url().$row->profile_photo;?>" class="pro-img" alt="Profile Image">
                                                            <div><p></p></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="details-box">
                                                            <a href="https://<?php echo $domain;?>.respicite.com/" 
                                                            <!-- <a href="https://respicite.com/counselors-view.php?uid=<?php //echo base64_encode($v["user_id"]);?>" target="_blank"><strong><?php echo $row->fullname;?></strong></a> 
                                                            <span>
                                                                <?php //echo star_rating($v['star_rating']);?>
                                                            </span>
                                                            <p><?php $this->db->where('email',$e);
                                                      $l1=$this->db->get('provider_detail_first');
                                                      foreach($l1->result() as $l1)
                                                      {
                                                        $l=$l1->l1;
                                                        $this->db->where('id',$l);
                                                        $lev = $this->db->get('provider_level_one');
                                                     
                                                      foreach($lev->result() as $row2)  
                                                    {  
                                                       echo $row2->l1;
                                                      } 
                                                      }?></p><b>Services: </b> 
                                                            <?php
                                                      $this->db->where('email',$e);
                                                     $l2 = $this->db->get('provider_detail_sec');
                                                     foreach($l2->result() as $l2)
                                                     {
                                                         $l=$l2->l2;
                                                         $this->db->where('id',$l);
                                                         $leve = $this->db->get('provider_level_two');
                                                     
                                                    foreach($leve->result() as $row3)  
                                                    {  
                                                 ?>                
                                                      <?php   echo $row3->l2;?> 
                                                      <?php
                                                      }?><br>
                                                      <?php 
                                                     }
                                                      ?> 
                                                            <br>
                                                            <?php 
                    $this->db->where('email',$e);
                    $l3= $this->db->get('provider_detail_three');
                    foreach($l3->result() as $l3)
                    {
                        $l=$l3->l3;
                        $this->db->where('id',$l);
                        $m = $this->db->get('provider_level_three');
                     
                    foreach ($m->result() as $row4)  
                {  
                  

                  
                 ?>                
                      <?php echo $row4->alternate_name;?>
                      <?php
                     } }
                      ?> 
                                                            <!-- <br>
                                                            Channel : <?php //echo $v["channels"];?>
                                                            <br> -->
                                                            <!-- <span>Experience : <?php //echo $v["experience"];?></span> | <span>Counselling : <?php //echo $v["counselling_sessions"];?></span>
                                                            <br>
                                                            <span>Experience : <?php //echo $v["experience"];?></span> | <span>Available On : <?php //echo $v["available_days"];?></span> -->
                                                            <!-- <a href="#" class="see-more"> See More »</a> -->
                                                            <p class="text-muted text-sm"><b>About Us: </b> 
                      <?php
                      $this->db->where('email',$e);
                      $la = $this->db->get('sp_profile_detail');
                      $string = '';
                    foreach($la->result() as $la)
                     {
                         $string=$la->about_us;
                   
                    }  
                    
                  ?>
                  <?php
                   if($string!='')
                   {
                    if (strlen($string) > 150) {
                      $stringCut = substr($string, 0, 75);// change 15 top what ever text length you want to show.
                      $endPoint = strrpos($stringCut, ' ');
                      $string = $endPoint? substr($stringCut, 0, $endPoint):substr($stringCut, 0);
                      $string .= '... <a style="cursor: pointer;" href="'.base_url().'SpController/view_sp_full_detail_public/'.base64_encode($row->email).'" >Read More</a>';
                  }
                  echo $string;
                   }
                    
                  ?>  
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="cart-righ-bottom-box" style="margin-left: 17px;">
                                                        <div>
                                                            <?php //for($v_i = 0; $v_i < sizeof($v["top_skills"]);$v_i++){
                                                                    //echo "<p>".$v["top_skills"][$v_i]."</p>";
                                                            //}?>
                                                        </div>
                                                        <div>
                                                            <!-- <p class="text-right book-appoi btn-appointment" data-name="book_appointment" style="cursor:pointer" data-user-id="<?php //echo $v["user_id"];?>">Book Appointment</p> -->
                                                            
                                                           <!--  <p class="btn btn-success d-block w-100 mb-5 mt-5 btn-appointment" data-name="interested_call_back" data-user-id="<?php //echo $v["user_id"];?>">Interested for Call Back</p> -->
                                                            <!-- <a style="cursor: pointer;"  href="tel:<?php echo $row->mobile; ?>" class="btn btn-primary d-block w-100 mb-5 mt-5 btn-appointment" >
                                                              <i class="fas fa-phone"></i>Contact Us
                                                            </a> -->
                                                            <!-- <a style="cursor: pointer;" href="mailto:<?php echo $row->email; ?>" class="btn btn-success d-block w-100 mb-5 mt-5 btn-appointment" >
                                                              <i class="fas fa-envelope"></i>
                                                            Send Mail</a> https://-->
                                                            
                                                            <a style="cursor: pointer;" href="<?php echo base_url().'service-provider/'.$row->email; ?>" class="btn btn-primary d-block w-100 mb-5 mt-5 btn-appointment" >
                                                              
                                                            View Profile</a>
                                                            <button type="button" class="btn btn-success d-block w-100 mb-5 mt-5 btn-appointment" data-toggle="modal" data-target="#exampleModal">
                                                                  Send Mail
                                                                </button>
                                                             <?php  if($domain!=''){ ?>
                                                             <a style="cursor: pointer;" href="https://<?php echo $domain;?>.respicite.com/" class="btn btn-primary d-block w-100 mb-5 mt-5 btn-appointment" >
                                                              
                                                            View Link</a> 
                                                       <?php } ?>


                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
<?php } }?>

                        </div>                        
                    </div>
                    <p class="center_link"><?php echo $links; ?></p>

                </div>

            </section>

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
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
    
    <!-- <input type="hidden" id="segment_1" value="<?php echo $this->uri->segment(3);?>">
    <input type="hidden" id="segment_2" value="<?php echo $this->uri->segment(4);?>">
    <input type="hidden" id="segment_3" value="<?php echo $this->uri->segment(5);?>">
    <input type="hidden" id="segment_4" value="<?php echo $this->uri->segment(6);?>"> -->
    <script>
        let segment1 = $("#segment_1").val();
        let segment2 = $("#segment_2").val();
        let segment3 = $("#segment_3").val();
        let segment4 = $("#segment_4").val();
        const BASE_URL = "<?php echo base_url();?>";
        $(document).on("change",".filter-event",function(){
            let sn = $(this).val();
            switch($(this).data("name")){
                case "service":
                    window.open(`${BASE_URL}home/service-provider/${sn}/${(segment2 != "")?segment2:null}/${(segment3 != "")?segment3:null}/${(segment4 != "")?segment4:null}`,"_self");
                break;
                case "city":
                    window.open(`${BASE_URL}home/service-provider/${(segment1 != "")?segment1:null}/${sn}/${(segment3 != "")?segment3:null}/${(segment4 != "")?segment4:null}`,"_self");
                break;
                case "days":
                    window.open(`${BASE_URL}home/service-provider/${(segment1 != "")?segment1:null}/${(segment2 != "")?segment2:null}/${sn}/${(segment4 != "")?segment4:null}`,"_self");
                break;
                case "channel":
                    window.open(`${BASE_URL}home/service-provider/${(segment1 != "")?segment1:null}/${(segment2 != "")?segment2:null}/${(segment3 != "")?segment3:null}/${sn}`,"_self");
                break;
            }
        });
    </script>
<script>
function searchFilter() {

    //page_num = page_num?page_num:0;
    var keywords = $('#keyword').val();
    var BASE_URL = <?php echo base_url(); ?>;
    $.ajax({
        type: 'POST',
        url: '<?php echo base_url(); ?>SpController/marketplace_new/',
        data:'key='+keywords,
        beforeSend: function () {
            //$('.loading').show();
        },
        success: function (html) {

            //window.open(`${BASE_URL}SpController/marketplace_new/${(segment1 != "")?keywords    :null}/`,"_self");
        }
    });
}
</script>
    <script>
        let ap_modal = $("#appointment_modal");
        $(document).on("click",".btn-appointment",function(){
            // alert('dfdsfsdfdfs');
            // let _this = $(this);
            // let action_name = _this.data("name");
            // let user_id     = _this.data("user-id");
            // let title = "";
            
            // if(action_name == "book_appointment")
            // {
            //     title = "Book Appointment";
            // }else if(action_name == "interested_call_back"){
            //     title = "Interested Call Back";
            // }else if(action_name == "message"){
            //     title = "Message";
            // }
            // ap_modal.find(".title-show").html(title);
            // ap_modal.find("[name=user_id]").val(null);
            // ap_modal.find("[name=user_id]").val(user_id);
            // ap_modal.find("[name=action_name]").val(null);
            // ap_modal.find("[name=action_name]").val(action_name);
            $("#appointment_modal").modal("show");
            //alert('test');
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
                    swal("Good job!", res.message, "success");
                }
            })
        });
    </script>
     <script
  src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  
<script type=text/javascript>
    
   $(document).ready(function(){
 
    $('#levelone').change(function(){ 
                var id=$(this).val();
                $.ajax({
                    url : "<?php echo base_url().'AdminController/fetch_level_two';?>",
                    method : "POST",
                    data : {id: id},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                         
                        var htm = '';
                        var i;
                        htm += '<option value="">Select Level Two</option>';
                        for(i=0; i<data.length; i++){
                            htm += '<option value='+data[i].id+'>'+data[i].l2+'</option>';
                        }
                        $('#leveltwo').html(htm);
                        var ht = '';
                        
                        ht += '<option value="">Select Level Three</option>';
                       
                        $('#levelthree').html(ht);
 
                    }
                });
                return false;
            }); 
             
            $('#leveltwo').change(function(){ 
                var id=$(this).val();
                $.ajax({
                    url : "<?php echo base_url().'AdminController/fetch_level_three';?>",
                    method : "POST",
                    data : {id: id},
                    async : true,
                    dataType : 'json',
                    success: function(data){
                         
                        var ht = '';
                        var i;
                        ht += '<option value="">Select Level Three</option>';
                        if(data.length==0)
                        {
                          ht += '<option value="0">NA</option>';
                        }
                        for(i=0; i<data.length; i++){
                            ht += '<option value='+data[i].id+'>'+data[i].l3+'</option>';
                        }
                        $('#levelthree').html(ht);
 
                    }
                });
                return false;
            }); 
        });      
 
 
            
     
    </script> 

    
</body>


