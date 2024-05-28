<!DOCTYPE html>
<?php
    $s_list_new = [
        'Parenting Counselling',
        'Overseas Services',
        'Career Counselling',
        'Skill Development',
        'Corporate Couching',
        'Psycological Counselling',
        'Life Counselling',
        'School'
    ];
    sort($s_list_new);
?>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url().'/assets/plugins/fontawesome-free/css/all.min.css'; ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url().'/assets/dist/css/adminlte.min.css'; ?>">
    <link rel="stylesheet" href="<?php echo base_url('/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css'); ?>">
    <link href="<?php echo base_url('/assets/favicon.png');?>" rel="shortcut icon" type="image/png">
    <style>
        /*.bg-color-1 {*/
        /*    background-color: #fc9928;*/
        /*}*/
    
        /*.text-color-1 {*/
        /*    color: #fc9928;*/
        /*}*/
        @media (max-width: 400px) {
              .text-area{
                  display:none !important;
              }
              .registration_area{
                  padding-left: 3rem !important;
              }
              .overlay-container{
                  display:none;
              }
              .login-tab{
                 width: 100% !important;
              }
              .signup-tab{
                 width: 0% !important;
              }
            .input {
              width: 70% !important;
            }
            .container{
              padding-top: 60px !important ;          
            }
            .outer .ghost{
                display: block;
            }
            .form-control{
                width:100% !important;
            }
            /*.right-panel-active .sign-up-container{*/
            /*    width: 100% !important;*/
            /*}*/
            /*.right-panel-active .sign-in-container{*/
            /*    width: 0% !important;*/
            /*}*/
            form{
                padding: 0 30px 0 15px !important;
                width:380px !important;
            }
        }
            h1 {
                font-size:20px;
            	font-weight: bold;
            	margin: 0;
            }
            p {
            	font-size: 14px;
            	font-weight: 100;
            	line-height: 20px;
            	letter-spacing: 0.5px;
            	margin: 20px 0 30px;
            }
            
        span {
        	font-size: 12px;
        }
        
        a {
        	color: #333;
        	font-size: 14px;
        	text-decoration: none;
        	margin: 15px 0;
        }
        
         button, input.submit, a#signUp {
        	border-radius: 20px;
        	border: 1px solid #D8C034;
            background-color: #D8C034;
            color: #8B4229;
        	font-size: 12px;
        	font-weight: bold;
        	padding: 12px 34px;
        	letter-spacing: 1px;
        	text-transform: uppercase;
        	transition: transform 80ms ease-in;
        }
        
        input.submit{
            margin : 0px 25px 0 0 !important;
            padding: 5px 45px !important;
        }
        a#signUp {
            background-color: white !important;
            margin: 0px !important;
        }
        
        .outer .ghost{
            border:1px solid #D7C560 !important;
        }
        button:active {
        	transform: scale(0.95);
        }
        
        button:focus {
        	outline: none;
        }
        
        button.ghost {
        	background-color: transparent;
        	border-color: #FFFFFF;
        }
        button.submit, input.submit {
        	border: 1px solid #D8C034 !important;
            background-color: #D8C034 !important;
            color: #8B4229 !important;
        }
        
        form {
        	background-color: #FFFFFF;
        	display: flex;
        	align-items: center;
        	justify-content: center;
        	flex-direction: column;
        	padding: 0 50px;
        	height: 100%;
        	text-align: center;
        }
        
        input, select {
        	background-color: #eee;
        	border: none;
        	padding: 12px 15px;
            margin: 25px 0 0;
            width: 50%;
        }
        select{
            margin: 25px 0 0;
        }
        
        .container {
    	    background-color: #fff;
            /*border-radius: 10px;*/
            /*box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);*/
            position: relative;
            overflow: hidden;
            width: 100%;
            max-width: 100%;
            min-height: 731px;
            height: auto;
        }
        
        .form-container {
        	position: absolute;
        	top: 0;
        	height: 100%;
        	transition: all 0.6s ease-in-out;
        }
        
        .sign-in-container {
        	left: 0;
        	width: 50%;
        	z-index: 2;
        }
        
        .container.right-panel-active .sign-in-container {
        	transform: translateX(100%);
        }
        
        .sign-up-container {
        	left: 0;
        	width: 50%;
        	opacity: 0;
        	z-index: 1;
        }
        
        .container.right-panel-active .sign-up-container {
        	transform: translateX(100%);
        	opacity: 1;
        	z-index: 5;
        	animation: show 0.6s;
        }
        
        @keyframes show {
        	0%, 49.99% {
        		opacity: 0;
        		z-index: 1;
        	}
        	
        	50%, 100% {
        		opacity: 1;
        		z-index: 5;
        	}
        }
        
        .overlay-container {
        	position: absolute;
        	top: 0;
        	left: 50%;
        	width: 50%;
        	height: 100%;
        	overflow: hidden;
        	transition: transform 0.6s ease-in-out;
        	z-index: 100;
        }
        
        .invalid-feedback{
            min-height:0px;
        }
        .container.right-panel-active .overlay-container{
        	transform: translateX(-100%);
        }
        
        .overlay {
        	/*background: #FF416C;*/
        	<?php
                if( $logindata[0]['value'] == '2' ){
            ?>
            background: <?= $logindata[2]['value'] ?>;
            <?php
                }
                else{
            ?>
            background-image: url(<?php echo base_url($logindata[1]['value']); ?>);
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;">
            <?php
                }
            ?>
        	background-repeat: no-repeat;
        	background-size: cover;
        	background-position: 0 0;
        	color: #FFFFFF;
        	position: relative;
        	left: -100%;
        	height: 100%;
        	width: 200%;
          	transform: translateX(0);
        	transition: transform 0.6s ease-in-out;
        }
        
        .container.right-panel-active .overlay {
          	transform: translateX(50%);
        }
        .form-control{
            width:50%;
        }
        .overlay-panel {
        	position: absolute;
        	display: flex;
        	align-items: center;
        	justify-content: center;
        	flex-direction: column;
        	padding: 0 40px;
        	text-align: center;
        	top: 0;
        	height: 100%;
        	width: 50%;
        	transform: translateX(0);
        	transition: transform 0.6s ease-in-out;
        }
        
        .overlay-left {
            background-image: url(<?= base_url('/uploads/login/counsellor.jpg')?>);
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        	transform: translateX(-20%);
        }
        
        .container.right-panel-active .overlay-left {
        	transform: translateX(0);
        }
        
        .overlay-right {
            background-image: url(<?= base_url('/uploads/login/counsellor.jpg')?>);
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        	right: 0;
        	transform: translateX(0);
        }
        
        .container.right-panel-active .overlay-right {
        	transform: translateX(20%);
        }
        
        .social-container {
        	margin: 20px 0;
        }
        
        .social-container a {
        	border: 1px solid #DDDDDD;
        	border-radius: 50%;
        	display: inline-flex;
        	justify-content: center;
        	align-items: center;
        	margin: 0 5px;
        	height: 40px;
        	width: 40px;
        }
        canvas{
        /*prevent interaction with the canvas*/
            pointer-events:none;
        }
        .border-captcha{
            padding-left: 7%;
            border: 1px solid #e59c1d;
            border-radius: 5px;
        }
        .body.swal2-height-auto{
            height:  !important;
        }
    </style>
  </head>
  <!--style="background-image: url(<?php echo base_url('/assets/bg.jpeg'); ?>);background-repeat: no-repeat;background-attachment: fixed; background-size: cover;"-->
  <?php
    if( $logindata[0]['value'] == '2' ){
  ?>
  <body onload="createCaptcha()" class="hold-transition" style='background-color: <?= $logindata[2]['value'] ?>'>
  <?php
    }
    else{
  ?>
  <body class="hold-transition" style="background-image: url(<?php echo base_url($logindata[1]['value']); ?>);background-repeat: no-repeat;background-attachment: fixed; background-size: cover;">
  <?php
    }
  ?>
  
    <div class="container right-panel-active" id="container">
    	<div class="form-container sign-in-container login-tab d-none">
    		<form action="<?= base_url('UserController/registration') ?>" method="post">
        	    <div class="brand-logo m-0 p-1">
                  <img src="<?php echo base_url('/assets/b-logo.png'); ?>" style="width: 11rem;margin-right: 16px;">
                </div>
    			<h1>Sign in</h1>
    			<!-- <div class="social-container">-->
    			<!--	<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>-->
    			<!--	<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>-->
    			<!--	<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>-->
    			<!-- </div> -->
    			<!-- <span>or use your account</span> -->
    			 <?php 
                  $ref_data =  $this->session->userdata("ref_data");
                  $ref_user_id = "";
                  if(!empty($ref_data)){
                    $ref_user_id = $ref_data['user_id'];
                  } ?>
    			<input type="email" class="form-control <?php echo (form_error('email') != '') ? 'is-invalid' : ''; ?>" name="email" value="<?php echo (set_value('email'))?set_value('email'):$ref_user_id; ?>" placeholder="Email" />
    			<div><?php echo strip_tags(form_error('email')); ?></div>
    			<input type="password" class="form-control <?php echo (form_error('password') != '') ? 'is-invalid' : ''; ?>" name="password" placeholder="Password" />
    			<div><?php echo strip_tags(form_error('password')); ?></div>
    			<a href="#">Forgot your password?</a>
    			<!--<button class='submit'>Sign In</button>-->
    			<div class="d-flex outer">
            			<button class='submit mr-5'>Sign In</button>      
            			<button type='button' class="ghost" id="signUp">Sign Up</button>
    			</div>
    			<div class='row'>
    			    <div class='col-md-6'>
    			    </div>
    			    <div class='col-md-6'>
    			    </div>
    			</div>
    		</form>
    	</div>
    	<div class="form-container sign-up-container signup-tab">
    		<form  action="" method="post" id='registrationForm'>
    		    <div class="brand-logo m-0 p-1">
                  <img src="<?php echo base_url('/assets/b-logo.png'); ?>" style="width: 11rem;margin-right: 16px;">
                </div>
    			<h1>Create Account</h1>
			    <?php 
                  $msg = $this->session->flashdata('msg');
                  if($msg !="")
                  {
                    ?> <div class="alert alert-danger"> <?php echo $msg; ?> </div> <?php 
                  }
                  $msg2 = $this->session->flashdata('msg2');
                  if($msg2 !="")
                  {
                  ?> <div class="alert alert-success"> <?php echo $msg2; ?> </div> <?php 
                  }
                ?> 
                <?php 
                    $ref_data =  $this->session->userdata("ref_data");
                    $ref_user_id = "";
                    if(!empty($ref_data)){
                      $ref_user_id = $ref_data['user_id'];
                    } 
                ?>
    			<!--<div class="social-container">-->
    			<!--	<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>-->
    			<!--	<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>-->
    			<!--	<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>-->
    			<!--</div>-->
    			<!--<span>or use your email for registration</span>-->
    			<input type="text" required name="full_name" value="<?php echo set_value('full_name'); ?>" class="form-control <?php echo (form_error('full_name')!="") ? 'is-invalid' : ''; ?>" placeholder="Full name">
    			<?php echo (form_error('full_name')!="") ? '<p class="invalid-feedback mt-1 m-0">'.strip_tags(form_error("full_name")).'</p>' : '' ; ?>
    			<input type="email"  required class="form-control <?php echo (form_error('email')!="") ? 'is-invalid' : ''; ?>" name="email" value="<?php echo (set_value('email'))?set_value('email'):$ref_user_id; ?>" placeholder="Email">
    			<?php echo (form_error('email')!="") ? '<p class="invalid-feedback mt-1 m-0">'.strip_tags(form_error("email")).'</p>' : '' ; ?>
    			<input type="tel" required class="form-control <?php echo (form_error('mobile')!="") ? 'is-invalid' : ''; ?>" name="mobile" value="<?php echo set_value('mobile'); ?>" placeholder="Mobile No.">
    			<?php echo (form_error('mobile')!="") ? '<p class="invalid-feedback mt-1 m-0">'.strip_tags(form_error("mobile")).'</p>' : '' ; ?>
    			<select readonly class="form-control d-none <?php echo (form_error('role')!="") ? 'is-invalid' : ''; ?>" name="role" value="<?php echo set_value('role'); ?>" id="role">
                  <option value="">Nature</option>
                  <option value="individual" selected>Individual</option>
                  <option value="group">Group</option>
                  <option value="institution">Institution</option>
                </select>
    			<?php echo (form_error('role')!="") ? '<p class="invalid-feedback mt-1 m-0">'.strip_tags(form_error("role")).'</p>' : '' ; ?>
                <select readonly class="form-control d-none <?php echo (form_error('iam')!="") ? 'is-invalid' : ''; ?>" name="iam" value="<?php echo set_value('iam'); ?>" id="iam">
                  <option value="">Register Me as </option>
                  <option value="user">User</option>
                  <option value="sp" selected>Service Provider</option>
                  <option value="reseller">Reseller</option>
                </select>
    			<?php echo (form_error('iam')!="") ? '<p class="invalid-feedback mt-1 m-0">'.strip_tags(form_error("iam")).'</p>' : '' ; ?>
                 <select required class="form-control <?php echo (form_error('serviceName')!="") ? 'is-invalid' : ''; ?>" name='serviceName' required>
                    <option value="">All Services</option>
                    <!--<?php foreach($s_lists as $v){ ?>-->
                    <!--    <option value="<?= strtolower( str_replace( ' ' , '-' , $v['alternate_name']) );?>"><?php echo $v['alternate_name'];?></option>                                                    -->
                    <!--<?php } ?>-->
                    <?php foreach($s_list_new as $v){ ?>
                        <option value="<?= $v ;?>"><?php echo $v ;?></option>                                                    
                    <?php } ?>
                </select>
    			<?php echo (form_error('serviceName')!="") ? '<p class="invalid-feedback mt-1 m-0">'.strip_tags(form_error("serviceName")).'</p>' : '' ; ?>
    			<input type="password" class="form-control <?php echo (form_error('password')!="") ? 'is-invalid' : ''; ?>" name="password" placeholder="Password">
    			<?php echo (form_error('password')!="") ? '<p class="invalid-feedback mt-1 m-0">'.strip_tags(form_error("password")).'</p>' : '' ; ?>
    			<input type="password" class="form-control <?php echo (form_error('cpassword')!="") ? 'is-invalid' : ''; ?>" name="cpassword" placeholder="Retype password">
    			<?php echo (form_error('cpassword')!="") ? '<p class="invalid-feedback mt-1 m-0">'.strip_tags(form_error("cpassword")).'</p>' : '' ; ?>
    			
                <!-- Captcha Code -->
                <label class='mt-3'>CAPTCHA Security Check</label>
                <div id="captcha" class='text-center border-captcha mt-1'></div>
                <label class='form-label mt-0'> Type The Characters Below Correctly </label>
                <input type="text" class="form-control mt-1" placeholder="Enter Captcha Here" id="cpatchaTextBox"/>
                <!-- Captcha Code -->
                
                <div class="row">
                  <div class="col-12 mb-2">
                    <div class="icheck-primary">
                      <input type="checkbox" id="terms" name="terms" class="form-control <?php echo (form_error('terms')!="") ? 'is-invalid' : ''; ?>" required value="agree">
                      <label for="terms" class="text-secondary">
                       I agree to the <a href="https://respicite.com/terms-and-conditions.php" class="text-secondary" target="_black"><strong class="text-primary"> terms </strong></a>
                      </label>
                    </div>
        			<?php echo (form_error('terms')!="") ? '<p class="invalid-feedback mt-1 m-0">'.strip_tags(form_error("terms")).'</p>' : '' ; ?>
                  </div>
                  <!-- /.col -->
                </div>
    			<div class="d-flex outer">
            			<input type='submit' id='btn-submit' name='regbtn' class="submit mr-5" value='Sign Up'>      
    			        <a type='button' href="<?= base_url() ?>UserController/login" id="signUp"  class="ghost">Sign In</a>
    			</div>
    		</form>
    	</div>
    	<div class="overlay-container">
    		<div class="overlay">
    			<div class="overlay-panel overlay-right">
    				<!--<h1 style='<?= $logindata[4]['value'] != '' ? 'color :'.$logindata[4]['value'].'; ' : ''   ?><?= $logindata[5]['value'] != '' ? 'font-size :'.$logindata[5]['value'].'px;' : ''   ?>' > <?= ucwords($logindata[3]['value']) ?> </h1>-->
        <!--            <p style='<?= $logindata[7]['value'] != '' ? 'color :'.$logindata[7]['value'].'; ' : ''   ?><?= $logindata[8]['value'] != '' ? 'font-size :'.$logindata[8]['value'].'px;' : ''   ?>' >-->
        <!--                <?= ucwords($logindata[6]['value']) ?>-->
        <!--            </p>-->
        <!--            <div class='row'>-->
        <!--                <div class='col-md-8 offset-md-2'>-->
        <!--                    <h1 style='<?= $logindata[10]['value'] != '' ? 'color :'.$logindata[10]['value'].'; ' : ''   ?><?= $logindata[11]['value'] != '' ? 'font-size :'.$logindata[11]['value'].'px;' : ''   ?>'>-->
        <!--                         <?= ucwords($logindata[9]['value']) ?>-->
        <!--                    </h1>-->
        <!--                </div>-->
        <!--            </div>-->
    				<!--<button class="ghost mt-2" id="signUp">Sign Up</button>-->
    			</div>
    			<div class="overlay-panel overlay-left">
    			    <!--<h1 style='<?= $logindata[4]['value'] != '' ? 'color :'.$logindata[4]['value'].'; ' : ''   ?><?= $logindata[5]['value'] != '' ? 'font-size :'.$logindata[5]['value'].'px;' : ''   ?>' > <?= ucwords($logindata[3]['value']) ?> </h1>-->
           <!--         <p style='<?= $logindata[7]['value'] != '' ? 'color :'.$logindata[7]['value'].'; ' : ''   ?><?= $logindata[8]['value'] != '' ? 'font-size :'.$logindata[8]['value'].'px;' : ''   ?>' >-->
           <!--             <?= ucwords($logindata[6]['value']) ?>-->
           <!--         </p>-->
           <!--         <div class='row'>-->
           <!--             <div class='col-md-8 offset-md-2'>-->
           <!--                 <h1 style='<?= $logindata[10]['value'] != '' ? 'color :'.$logindata[10]['value'].'; ' : ''   ?><?= $logindata[11]['value'] != '' ? 'font-size :'.$logindata[11]['value'].'px;' : ''   ?>'>-->
           <!--                      <?= ucwords($logindata[9]['value']) ?>-->
           <!--                 </h1>-->
           <!--             </div>-->
           <!--         </div>-->
    				<!--<button class="ghost mt-2" id="signIn">Sign In</button>-->
    			</div>
    		</div>
    	</div>
    </div>
    
    <!-- /.login-box -->
    <!-- jQuery -->
<script src="<?php echo base_url('/assets/plugins/jquery/jquery.min.js'); ?>">
    </script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url('/assets/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>">
    </script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url('/assets/dist/js/adminlte.min.js'); ?>">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // const signUpButton = document.getElementById('signUp');
        // const signInButton = document.getElementById('signIn');
        // const container = document.getElementById('container');
        
        // signUpButton.addEventListener('click', () => {
        // 	container.classList.add("right-panel-active");
        // });
        
        // signInButton.addEventListener('click', () => {
        // 	container.classList.remove("right-panel-active");
        // });
    </script>
    <script>
        var code;
        function createCaptcha() {
        // clear the contents of captcha div first
            document.getElementById('captcha').innerHTML = "";
            var charsArray =
            "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@!#$%^&*";
            var lengthOtp = 6;
            var captcha = [];
            for (var i = 0; i < lengthOtp; i++) {
                //below code will not allow Repetition of Characters
                var index = Math.floor(Math.random() * charsArray.length + 1); //get the next character from the array
                if (captcha.indexOf(charsArray[index]) == -1)
                captcha.push(charsArray[index]);
                else i--;
            }
            var canv = document.createElement("canvas");
            canv.id = "captcha";
            canv.width = 120;
            canv.height = 50;
            var ctx = canv.getContext("2d");
            ctx.font = "25px Georgia";
            ctx.strokeText(captcha.join(""), 0, 30);
            //storing captcha so that can validate you can save it somewhere else according to your specific requirements
            code = captcha.join("");
            document.getElementById("captcha").appendChild(canv);
         // adds the canvas to the body element
        }
        let checkCaptcha = false;
        $('#btn-submit').on('click',function(e){
            if( checkCaptcha !== true ){
                var form = $( '#registrationForm' );
                if( document.getElementById("cpatchaTextBox").value == code ) {
                    Swal.fire({
                        title: "Captcha",
                        text: "You Entered Correct Captcha",
                        icon: "success",
                        confirmButtonColor: "#fc9928",
                    }).then((result) => {
                        // console.log( result );
                        if (result.isConfirmed){
                            document.getElementById("cpatchaTextBox").disabled = true;
                            checkCaptcha = true;
                            return true;
                        }
                    });
                }
                else{
                    checkCaptcha = false;
                    createCaptcha();
                    Swal.fire({
                        title: "Captcha",
                        text: "You Entered Incorrect Captcha, Please Try Again",
                        icon: "error",
                        confirmButtonColor: "#fc9928"
                    });
                    return false;
                }
            }
            // e.preventDefault();
        });
        // function validateCaptcha(){
        //     event.preventDefault();
        //     if( document.getElementById("cpatchaTextBox").value == code ) {
        //         Swal.fire({
        //             title: "Captcha",
        //             text: "You Entered Correct Captcha",
        //             icon: "success",
        //             confirmButtonColor: "#fc9928",
        //         }).then((result) => {
        //             if (result.isConfirmed) {
        //                 console.log( 'ok' );
        //                 return true;
        //             }
        //         });
        //     }
        //     else{
                
        //         createCaptcha();
        //         Swal.fire({
        //             title: "Captcha",
        //             text: "You Entered Incorrect Captcha, Please Try Again",
        //             icon: "error",
        //             confirmButtonColor: "#fc9928"
        //         });
        //         return false;
        //     }
        // }
    </script>
  </body>
</html>