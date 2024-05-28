<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Successfully</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <style>
        * {
            font-family: Arial, Helvetica, sans-serif;
        }

        .main {
            width: 23rem;
            margin: 0 auto;
            padding-top: 5rem;
        }

        .icon {
            font-size: 7em;
        }

        .green {
            color: #07c107;
        }

        .inner-1 {

            text-align: center;
            border: 2px solid #07c145;
            padding: 41px;
            border-radius: 6px;
        }

        .inner-1 a {
            text-decoration: none;
            padding: 8px 15px;
            background: #ff8100;
            color: white;
            border-radius: 24px;
        }

        .order-id{
            border: 1px dashed;
            padding: 8px;
        }
    </style>
</head>

<body>
    <div class="main">
        <div class="inner-1">
            <i class="far fa-check-circle icon fa-beat green"></i>
            <h2 class="green">Payment Successfully</h2>
            <h3>Your Order ID</h3>
            <h3 class="order-id"><?php echo $roder_id; ?></h3>
            <p>Thank you for purchasing</p>
            <br>
            <?php
                if( !isset($url) ){
            ?>
            <?php 
            //     // redirect(base_url().'UserController/code_approvel_for_user/'.$row['id']."/".$row['solution']."/".$parentData['email']);
            //  }
            //  else{
                    $sessArray['id'] = $user['id'];
                    $sessArray['fullname']=$user['fullname'];
                    $sessArray['email'] = $user['email'];
                    $sessArray['mobile'] = $user['mobile'];
                    $sessArray['user_id'] = $user['user_id'];
                    $sessArray['iam'] = $user['iam'];
                    $sessArray['profile_photo'] = $user['profile_photo'];
                    $this->session->set_userdata('user',$sessArray);
                    $this->db->where(["reseller_id"=> $parentData['email'], 'user_id' => $user['email'] ,"status"=>"pending"]);
                    $this->db->order_by("id","desc");
                    $row = $this->db->get('user_code_list')->row_array();
                    // print_r($row);
                    // die;
                    redirect(base_url().'UserController/code_approvel_for_user/'.$row['id']."/".$row['solution']."/".$parentData['email']);
            ?>
                <a href="<?php echo base_url('UserController/login');?>">Go to Login And Take Assessment</a>
            <?php
                }
                else{
            ?>
                 <a id='myBtn' disabled href="<?= isset( $url ) ? $url : base_url('BaseController/purchase_code_history');?>"><?= isset( $url ) ? 'Book Appointment' : 'Go to Purchase Code History' ?></a>
            <?php
                }
            ?>
        </div>
    </div>
</body>
    <script src="<?php echo base_url('/assets/plugins/jquery/jquery.min.js'); ?>"></script>
<?php
if( isset($url) ){
?>
    <script>
        document.getElementById("myBtn").click(); 
        // function triggerButton(){
        //     $("#myBtn").click();
        // }
        // triggerButton();
    </script>
<?php
}
?>

</html>