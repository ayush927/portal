<?php                    // pre( $sp_logo );
  if(!empty($sp_logo)){
    $path_logo = ASSET_URL.$sp_logo['logo'];
    if(!file_exists($path_logo)){
      $path_logo = $path_logo;
    }
    else{
      $path_logo = ASSET_URL.'/assets/b-logo.png';
    }
  }else{
    $path_logo = ASSET_URL.'/assets/b-logo.png';
  }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
      <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Forgot Password</title>
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"
    />
    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="<?php echo base_url().'/assets/plugins/fontawesome-free/css/all.min.css'; ?>"
    />
    <!-- Theme style -->
    <link
      rel="stylesheet"
      href="<?php echo base_url().'/assets/dist/css/adminlte.min.css'; ?>"
    />
    <link
      rel="stylesheet"
      href="<?php echo base_url('/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css'); ?>"
    />
    <link href="<?= $path_logo ?>" rel="shortcut icon" height='16' width='16' type="image/png">
    <style>   
    .bg-color-1{
        background-color: #fc9928;
    }
    .text-color-1{
        color: #fc9928;
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
  </style>
  </head>
  <body onload="createCaptcha()" class="hold-transition login-page" style="background-image: url(<?php echo base_url('/assets/bg.svg'); ?>);background-repeat: no-repeat;
  background-attachment: fixed; background-size: cover; height:100vh !important;" >
    <div class="login-box">
        <div class="card">
        <!-- Forgot Password #START -->
      <div class="forgot-password"> 
          <div class="card-header text-center text-white bg-color-1">
          <div class="brand-logo m-0 p-1">
               <?php 

      // if(!empty($sp_logo)){
      //     $path_logo = base_url($sp_logo['logo']);
      //     if(!file_exists($path_logo))
      //     echo "<img src='".$path_logo."' style='width: 6rem;margin-right: 16px;'>";
      //     else
      //     echo "<img src='".base_url('/assets/b-logo.png')."' style='width: 11rem;margin-right: 16px;'>";
      // }else{
      //     echo "<img src='".base_url('/assets/b-logo.png')."' style='width: 11rem;margin-right: 16px;'>";

      // }      
      ?>
      <img src='<?= $path_logo ?>' style='width: 6rem;margin-right: 16px;'>

                  </div>
          <p class="m-0">Forgot Password</p>
        </div>
        <div class="card-body">

          <!-- message -->
        <div class="alert alert-danger pb-0 show-msg" style="display:none;"><p>You did not select a file to upload.</p></div>
        <!-- message -->
                <form action=""  method="post" id="forgot_pass">
                    <div class="input-group mb-3">
                      <input type="email" class="form-control" name="email_id" value="" placeholder="Email" required />
                      <div class="input-group-append">
                          <div class="input-group-text text-success">
                            <span class="fas fa-envelope"></span>
                        </div>
                      </div>
                      <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group mb-3">
                      <label class="text-center d-block">CAPTCHA Security Check</label>
                      <div id="captcha" class='col-md-6 offset-3 border-captcha text-center'></div>
                      <label class='form-label mt-0 text-center d-block'> Type The Characters Below Correctly </label>
                      <input type="text" class="form-control" placeholder="Enter Captcha Here" id="cpatchaTextBox" />
                    </div>
                    <div class="row">
                      <div class="col-12 mb-2">
                        <button id='btn-submit' style="font-size: 1.5em;" type="submit" class="btn bg-color-1 text-white btn-block">
                          Reset Password
                        </button>
                      </div>
                    <!-- /.col -->
                    </div>
                </form>
                <p class="mb-1">
                  <?php
                    if( $code != null ){
                  ?>
                  <a href="<?php echo base_url('BaseController/login/'.$code);?>" class="text-secondary">Login</a>
                </p>
                <p class="mb-0">
                  <a href="<?php echo base_url('BaseController/registration/'.$code);?>" class="text-center text-secondary">Register a new membership</a>
                  <?php
                    }
                    else{
                  ?>
                  <a href="<?php echo base_url('BaseController/login');?>" class="text-secondary">Login</a>
                </p>
                <p class="mb-0">
                  <a href="<?php echo base_url('BaseController/registration');?>" class="text-center text-secondary">Register a new membership</a>
                  <?php
                    }
                  ?> 
                </p>
        </div>
      </div>
      <!-- Forgot Password #END -->
      <div class="create-password" style="display:none;">
                <div class="card-header text-center bg-color-1 text-white">
                    <div class="brand-logo m-0 p-1">
                     <img src="<?php echo base_url('/assets/b-logo.png'); ?>" style="width: 11rem;margin-right: 16px;">
                  </div>
                <p class="m-0">Create a new password</p>
                </div>
                <div class="card-body ">
                    <!-- message -->

                  <div class="alert alert-success pb-0 after-success-reset"><p class="text-center">OTP is sent your Email ID.</p></div>
                  <div class="alert alert-danger pb-0 show-msg-2" style="display:none;"><p></p></div>
                  <!-- message -->
                  <form action="" method="post" class="after-success-reset" id="create_new_pass" >
                      <div class="input-group mb-3">
                      <input
                      type="email"
                      class="form-control disabled"
                      disabled
                      name="email_otp"
                      autocomplete="off"
                    />
                    </div>
                    <div class="input-group mb-3">
                      <input
                        type="text"
                        class="form-control required"
                        name="otp_code"
                        placeholder="OTP"
                        required
                        autocomplete="off"
                    />
                    </div>
                    <div class="input-group mb-3">                    
                      <input
                        type="password"
                        class="form-control required"
                        name="new_pass"
                        placeholder="New password"
                        required
                        autocomplete="off"
                    />

                    </div>
                    <div class="row">
                          <div class="col-12">
                              <button
                            style="font-size: 1.5em;"
                            type="submit"
                            class="btn bg-color-1 text-white btn-block "
                            >
                            Create
                            </button>
                        </div>
                        <!-- /.col -->
                        </div>
                    </form>
                </div>
          </div>
    <!-- Create a new password #END -->

      </div>
    </div>

    <!-- jQuery -->
    <script src="<?php echo base_url('/assets/plugins/jquery/jquery.min.js'); ?>"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url('/assets/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url('/assets/dist/js/adminlte.min.js'); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        var URL = "<?php echo base_url("UserController/ajax_work");?>";

        $("#forgot_pass").submit(function(e){
              e.preventDefault();            
              $.post(URL, {action:"FORGOT_PASSWORD",email_id: e.target.email_id.value}, function(res){
                  if(res.msg_code == "SEND_OPT"){
                      $(".forgot-password").hide();
                      $(".create-password").show();
                      $(".create-password form").find("[type=email]").val(e.target.email_id.value);
                      $(".show-msg").hide();
                }
                if(res.msg_code == "USER_NOT_FOUND"){
                      $(".show-msg").show();
                      $(".show-msg p").text("Invalid email address");
                }

            });
        });
        $("#create_new_pass").submit(function(e){
              e.preventDefault();            
              $.post(URL, {action:"NEW_PASSWORD",otp_code: e.target.otp_code.value,
              new_pass:e.target.new_pass.value,email_id:e.target.email_otp.value}, function(res){               

                if(res.msg_code == "ERROR_VALIDATION"){
                  $(".show-msg-2").show();
                  $(".show-msg-2 p").html(res.msg_content);
                  $(".show-msg-2").removeClass("alert-success");
                  $(".show-msg-2").addClass("alert-danger");
              }
              if(res.msg_code=="OTP_INVALID"){
                  $(".show-msg-2").show();
                  $(".show-msg-2 p").text("OTP Invalid.");
                  $(".show-msg-2").removeClass("alert-success");
                  $(".show-msg-2").addClass("alert-danger");
              }
              if(res.msg_code=="UPDATE_DONE"){
                  $(".show-msg-2").show();
                  $(".show-msg-2").removeClass("alert-danger");
                  $(".show-msg-2").addClass("alert-success");
                  $(".after-success-reset").hide();
                  $(".show-msg-2 p").html("Your password has been reset successfully. <a href='<?echo base_url('BaseController/login/'.$code);?>'>Click here to Login.</a>");               
              }

            });
        });
    </script>

<script>
    var code;
      function createCaptcha() {
        //clear the contents of captcha div first 
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
        document.getElementById("captcha").appendChild(canv); // adds the canvas to the body element
      }
      let checkCaptcha = false;
      $('#btn-submit').on('click',function(e){
            if( checkCaptcha !== true ){
                var form = $('#forgot_pass');
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
      //   // debugger
      //   if( document.getElementById("cpatchaTextBox").value == code ) {
      //     Swal.fire({
      //       title: "Captcha",
      //       text: "You Entered Correct Captcha",
      //       icon: "success",
      //       confirmButtonColor: "#fc9928",
      //     }).then((result) => {
      //       if (result.isConfirmed) {
      //         return true;
      //       }
      //     });
      //   }
      //   else{
      //     event.preventDefault();
      //     Swal.fire({
      //       title: "Captcha",
      //       text: "You Entered Incorrect Captcha, Please Try Again",
      //       icon: "error",
      //       confirmButtonColor: "#fc9928"
      //     });
      //     createCaptcha();
      //     return false;
      //   }
      // }
  </script>
</body>
</html>
