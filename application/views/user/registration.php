
<?php
  if(!empty($sp_logo)){
    $path_logo = ASSET_URL.$sp_logo['logo'];
    if(!file_exists($path_logo)){
      $path_logo = $path_logo;
    }
    else{
      $path_logo = ASSET_URL.'/assets/b-logo.png';
    }
  }
  else{
    $path_logo = ASSET_URL.'/assets/b-logo.png';
  }
?>
<!DOCTYPE html>

<html lang="en">

<head>

  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Registration</title>

  <!-- Google Font: Source Sans Pro -->

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <!-- Font Awesome -->

  <link rel="stylesheet" href="<?php echo base_url().'/assets/plugins/fontawesome-free/css/all.min.css'; ?>">

  <!-- icheck bootstrap -->

  <link rel="stylesheet" href="<?php echo base_url().'/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css'; ?>">

  <!-- Theme style -->

  <link rel="stylesheet" href="<?php echo base_url().'/assets/dist/css/adminlte.min.css'; ?>">

  <link href="<?= $path_logo ?>" rel="shortcut icon" height='16' width='16' type="image/png">

  <style>    

    .bg-color-1{

      background-color: #fc9928;

    }

    .text-color-1{

      color: #fc9928;

    }


    .border-captcha{
        padding-left: 7%;
        border: 1px solid #e59c1d;
        border-radius: 5px;
    }

    canvas{
      /*prevent interaction with the canvas*/
      pointer-events:none;
    }

  </style>

</head>

<body onload="createCaptcha()" class="hold-transition register-page"  style="height: 100vh!important;background-image: url(<?php echo base_url('/assets/bg.svg'); ?>);background-repeat: no-repeat;

  background-attachment: fixed; background-size: cover;">

<div class="register-box">

  <div class="card card-outline">

  <div class="card-header text-center bg-color-1 ">

      <div class="brand-logo m-0 p-1">

      <?php 

     

      // if(!empty($sp_logo)){

      //   $path_logo = ASSET_URL.$sp_logo['logo'];

      //   if(!file_exists($path_logo))

      //   echo "<img src='".$path_logo."' style='width: 6rem;margin-right: 16px;'>";

      //   else

      //   echo "<img src='".ASSET_URL.'/assets/b-logo.png'."' style='width: 11rem;margin-right: 16px;'>";

      // }else{

      //   echo "<img src='".ASSET_URL.'/assets/b-logo.png'."' style='width: 11rem;margin-right: 16px;'>";

      // }      

      ?>

        <img src='<?= $path_logo ?>' style='width: 6rem;margin-right: 16px;'>
        

      </div>

    </div>

    <div class="card-body">

      <p class="login-box-msg">Register a new membership</p>

        <?php

            $msg = $this->session->flashdata('msg');

            if($msg != "")

            {

                echo "<div class='alert alert-success'>$msg</div>";

            }

        ?>



      <form action="" id='registrationForm' method="post">

        <div class="input-group mb-3">

          <input type="text" required name="full_name" value="<?php echo set_value('full_name'); ?>" class="form-control <?php echo (form_error('full_name')!="") ? 'is-invalid' : ''; ?>" placeholder="Full name">

          <div class="input-group-append">

            <div class="input-group-text">

              <span class="fas fa-user text-success"></span>

            </div>


          </div>

          <p class="invalid-feedback"><?php echo strip_tags(form_error('full_name')); ?></p>

        </div>

        <div class="input-group mb-3">
          <input type="email" required class="form-control <?php echo (form_error('email')!="") ? 'is-invalid' : ''; ?>" name="email" value="<?php echo set_value('email'); ?>" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope text-success"></span>
            </div>
          </div>
          <p class="invalid-feedback"><?php echo strip_tags(form_error('email')); ?></p>
        </div>

        <div class="input-group mb-3">

          <input type="tel" required class="form-control <?php echo (form_error('mobile')!="") ? 'is-invalid' : ''; ?>" name="mobile" value="<?php echo set_value('mobile'); ?>" placeholder="Mobile No.">

          <div class="input-group-append">

            <div class="input-group-text">

              <span class="fas fa-phone text-success"></span>

            </div>

          </div>

          <p class="invalid-feedback"><?php echo strip_tags(form_error('mobile')); ?></p>

        </div>

        

        <input type="hidden" name="code" value="<?php echo $code; ?>">

        

        <div class="input-group mb-3">

          <input type="password" required class="form-control <?php echo (form_error('password')!="") ? 'is-invalid' : ''; ?>" name="password" placeholder="Password">

          <div class="input-group-append">

            <div class="input-group-text">

              <span class="fas fa-lock text-success"></span>

            </div>

          </div>

          <p class="invalid-feedback"><?php echo strip_tags(form_error('password')); ?></p>

        </div>

        <div class="input-group mb-3">

          <input type="password" required class="form-control <?php echo (form_error('cpassword')!="") ? 'is-invalid' : ''; ?>" name="cpassword" placeholder="Retype password">

          <div class="input-group-append">

            <div class="input-group-text">

              <span class="fas fa-lock text-success"></span>

            </div>

          </div>

          <p class="invalid-feedback"><?php echo strip_tags(form_error('cpassword')); ?></p>

        </div>
        <div class="form-group mb-3">
          <label class='d-block text-center'>CAPTCHA Security Check</label>
          <div id="captcha" class='col-md-6 offset-3 border-captcha text-center'></div>
          <label class='d-block text-center mt-0'> Type The Characters Below Correctly </label>
          <input type="text" class="form-control mt-1" placeholder="Enter Captcha Here" id="cpatchaTextBox"/>
        </div>

        <div class="row">

          <div class="col-8 mb-2">

            <div class="icheck-primary">

              <input type="checkbox" required id="terms" name="terms" class="form-control <?php echo (form_error('terms')!="") ? 'is-invalid' : ''; ?>" value="agree">

              <label for="terms" class="text-secondary">

               I agree to the <a href="https://respicite.com/terms-and-conditions.php" class="text-secondary" target="_black"><strong class="text-primary"> terms </strong></a>

              </label>

            </div>

            <p class="invalid-feedback"><?php echo strip_tags(form_error('terms')); ?></p>

          </div>

          <!-- /.col -->

          <div class="col-12">

            <button type="submit" id='btn-submit'  name="regbtn" style="font-size: 1.5em;" class="btn bg-color-1 text-white btn-block mb-2">Register</button>

          </div>

          <!-- /.col -->

        </div>

      </form>

      

      <!--

      <div class="social-auth-links text-center">

        <a href="#" class="btn btn-block btn-primary">

          <i class="fab fa-facebook mr-2"></i>

          Sign up using Facebook

        </a>

        <a href="#" class="btn btn-block btn-danger">

          <i class="fab fa-google-plus mr-2"></i>

          Sign up using Google+

        </a>

      </div>

      -->

      

      <a href="<?php echo base_url('BaseController/login/'.base64_encode($code)); ?>" class="text-center text-secondary">I already have a membership</a>

    </div>

    <!-- /.form-box -->

  </div><!-- /.card -->

</div>

<!-- /.register-box -->



<!-- jQuery -->

<script src="<?php echo base_url('/assets/plugins/jquery/jquery.min.js'); ?>"></script>

<!-- Bootstrap 4 -->

<script src="<?php echo base_url('/assets/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

<!-- AdminLTE App -->

<script src="<?php echo base_url('/assets/dist/js/adminlte.min.js'); ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
      canv.width = 100;
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
    //   // event.preventDefault();
    //   // debugger
    //   if( document.getElementById("cpatchaTextBox").value == code ) {
    //     alert("Valid Captcha")
    //     return true;
    //   }
    //   else{
    //     alert("Invalid Captcha. try Again");
    //     createCaptcha();
    //     return false;
    //   }
    // }
</script>
</body>

</html>

