<?php 

        // $pagecount = $pdf->setSourceFile('report_template/Client_Details.pdf');
        // $tpl = $pdf->importPage(1);
        // $pdf->AddPage();
        // $pdf->useTemplate($tpl, ['adjustPageSize'=>true]);
        // $detail_sql = "select * from user_code_list where code='$code'";
        // $detail_res = mysqli_query($con,$detail_sql);
        // $detail_row = mysqli_fetch_array($detail_res);
        // $name = $detail_row['name'];
        // $dob = $detail_row['dob'];
        // $gender = $detail_row['gender'];
        // $mobile = $detail_row['mobile'];
        // $email = $detail_row['email'];
        // $address = $detail_row['address'];
        // $r_id = $detail_row['reseller_id'];
        // $cls_nature = $detail_row['cls_nature'];
        // $cls = $detail_row['cls_detail'];
        // $cls_type = $detail_row['cls_type'];
        // $c_remark = $detail_row['c_remark'];
        // $remark_date = $detail_row['remark_update_last'];
        // $submission_date = $detail_row['asignment_submission_date'];
        // $r_detail_sql = "select * from reseller_homepage where r_email='$r_id'";
        // $r_detail_res = mysqli_query($con,$r_detail_sql);
        // $r_detail_row = mysqli_fetch_array($r_detail_res);
        // $logo = $r_detail_row['logo'];
        // if($r_detail_row['reseller_signature']!='')
        // {
        //     $signature = 'https://users.respicite.com/'.$r_detail_row['reseller_signature'];
        // }
        // elseif($logo)
        // {
        //     $signature = 'https://users.respicite.com/'.$logo;
        // }else{
        //     $signature='';
        // }
        
        // $logo = 'https://users.respicite.com/'.$logo;
        // $r2_detail_sql = "select * from user_details where email='$r_id'";
        // $r2_detail_res = mysqli_query($con,$r2_detail_sql);
        // $r2_detail_row = mysqli_fetch_array($r2_detail_res);
        // $r_name = $r2_detail_row['fullname'];
        // $r_address = $r_detail_row['address'];
        // //$address= wordwrap($r_address,24,"\n");
        // //echo $r_address;die();
        // $r_email = $r_detail_row['email']; 
        // $r_mobile = $r_detail_row['contact']; 

        // $pdf->SetFont('arial');
        // $pdf->SetFontSize('12');
        // $pdf->SetXY(88,61);
        // $pdf->Cell(20, 10,$name, 0, 0, 'L');


        // $pdf->SetXY(88,69);
        // $pdf->Cell(20, 10,$cls_nature.' '.$cls_type.' '.$cls, 0, 0, 'L');

        // $pdf->SetXY(88,78);
        // $pdf->Cell(20, 10,$dob, 0, 0, 'L');

        // $pdf->SetXY(88,87);
        // $pdf->Cell(20, 10,$gender, 0, 0, 'L');

        // $pdf->SetXY(88,95);
        // $pdf->Cell(20, 10,$mobile, 0, 0, 'L');

        // $pdf->SetXY(88,104);
        // $pdf->Cell(20, 10,$email, 0, 0, 'L');

        // $pdf->SetXY(88,118);
        // //$pdf->Cell(20, 10,$address, 0, 0, 'L');
        // $pdf->MultiCell(100,5,$address);

        // $pdf->SetXY(88,128);
        // $pdf->Cell(20, 10,$submission_date, 0, 0, 'L');


        // $pdf->SetXY(80,160);
        // $pdf->Cell(20, 10,$r_name, 0, 0, 'L');

        // $pdf->SetXY(80,170);
        // $pdf->Cell(20, 10,$r_mobile, 0, 0, 'L');

        // $pdf->SetXY(80,180);
        // $pdf->Cell(20, 10,$r_email, 0, 0, 'L');

        // $pdf->SetXY(80,188);
        // $pdf->Cell(20, 10,$r_mobile, 0, 0, 'L');

        // $pdf->SetXY(80,200);
        // //$pdf->Cell(20, 10,$address, 0, 0, 'L');
        // $pdf->MultiCell(100,5,$r_address);
        // //$pdf->Ln();
        // //$pdf->Cell(60,10,'');
        // //$pdf->MultiCell( 20, 2, $address,5);
        
        
      
        //By Manoj 7 Jan 23
        $pagecount = $pdf->setSourceFile('report_template/Client_Details.pdf');
        $tpl = $pdf->importPage(1);
        $pdf->AddPage();
        $pdf->useTemplate($tpl, ['adjustPageSize'=>true]);
        $detail_sql = "select * from user_code_list where code='$code'";
        $detail_res = mysqli_query($con,$detail_sql);
        $detail_row = mysqli_fetch_array($detail_res);
        $name = $detail_row['name'];
        $dob = $detail_row['dob'];
        $gender = $detail_row['gender'];
        $mobile = $detail_row['mobile'];
        $email = $detail_row['email'];
        $address = $detail_row['address'];
        $r_id = $detail_row['reseller_id'];
        $cls_nature = $detail_row['cls_nature'];
        $cls = $detail_row['cls_detail'];
        $cls_type = $detail_row['cls_type'];
        $c_remark = $detail_row['c_remark'];
        $remark_date = $detail_row['remark_update_last'];
        $submission_date = $detail_row['asignment_submission_date'];
        $r_detail_sql = "select * from reseller_homepage where r_email='$r_id'";
        $r_detail_res = mysqli_query($con,$r_detail_sql);
        $r_detail_row = mysqli_fetch_array($r_detail_res);
        $logo = $r_detail_row['logo'];
        //echo "logo--".$logo;die();
        if($r_detail_row['reseller_signature']!='')
        {
            $signature = 'https://users.respicite.com/'.$r_detail_row['reseller_signature'];
        }
        else
        {
            $signature = 'https://users.respicite.com/'.$logo;
        }
        
        $logo = 'https://users.respicite.com/'.$logo;
        $r2_detail_sql = "select * from user_details where email='$r_id'";
        $r2_detail_res = mysqli_query($con,$r2_detail_sql);
        $r2_detail_row = mysqli_fetch_array($r2_detail_res);
        $r_name = $r2_detail_row['fullname'];
        $r_address = $r_detail_row['address'];
        $r_email = $r_detail_row['email']; 
        $r_mobile = $r_detail_row['contact']; 
        //echo $remark_date."--".$c_remark."--".$signature."--".$logo;die();
        $pdf->SetFont('arial');
        $pdf->SetFontSize('12');
        $pdf->SetXY(88,61);
        $pdf->Cell(20, 10,$name, 0, 0, 'L');


        $pdf->SetXY(88,69);
        $pdf->Cell(20, 10,$cls_nature.' '.$cls_type.' '.$cls, 0, 0, 'L');

        $pdf->SetXY(88,78);
        $pdf->Cell(20, 10,$dob, 0, 0, 'L');

        $pdf->SetXY(88,87);
        $pdf->Cell(20, 10,$gender, 0, 0, 'L');

        $pdf->SetXY(88,95);
        $pdf->Cell(20, 10,$mobile, 0, 0, 'L');

        $pdf->SetXY(88,104);
        $pdf->Cell(20, 10,$email, 0, 0, 'L');

        $pdf->SetXY(88,113);
        $pdf->Cell(20, 10,$address, 0, 0, 'L');

        $pdf->SetXY(88,125);
        $pdf->Cell(20, 10,$submission_date, 0, 0, 'L');


        $pdf->SetXY(80,160);
        $pdf->Cell(20, 10,$r_name, 0, 0, 'L');

        $pdf->SetXY(80,170);
        $pdf->Cell(20, 10,$r_mobile, 0, 0, 'L');

        $pdf->SetXY(80,180);
        $pdf->Cell(20, 10,$r_email, 0, 0, 'L');

        $pdf->SetXY(80,188);
        $pdf->Cell(20, 10,$r_mobile, 0, 0, 'L');

        $pdf->SetXY(80,198);
        // $pdf->Cell(20, 10,$r_address, 0, 0, 'L');
        $pdf->MultiCell(100, 7, $r_address, 0, 'L');

?>

