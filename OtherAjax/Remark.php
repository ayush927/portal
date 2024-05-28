<?php
    // $pagecount = $pdf->setSourceFile('report_template/Counsellor Remarks.pdf');
    // //echo "sign".$signature."----".$remark_date."-----".$c_remark;die();
    // $tpl = $pdf->importPage(1);
    // $pdf->AddPage();
    // $pdf->useTemplate($tpl, ['adjustPageSize'=>true]);
    // checking_size($logo,$pdf);
    // $pdf->SetFontSize('10','B');
    // $pdf->SetXY(40,169);
    // if($remark_date){
    // $pdf->MultiCell(50,6,$remark_date);}
    
    // $pdf->SetFontSize('12');
    // $pdf->SetXY(35,60);
    // if($c_remark){
    // $pdf->MultiCell(150,8,$c_remark);}
    
    // $pdf->SetXY(105, 169);
    // $pdf->SetFont('arial');
    // if($signature){
    // $pdf->Cell(0,20,$pdf->Image($signature,$pdf->GetX(), $pdf->GetY(),30), 0, 0,'R',false);}
    
     
    //By Manoj 7 Jan 23
     $pagecount = $pdf->setSourceFile('report_template/Counsellor Remarks.pdf');
    $tpl = $pdf->importPage(1);
    $pdf->AddPage();
    $pdf->useTemplate($tpl, ['adjustPageSize'=>true]);
    $pdf->SetFontSize('10','B');
    $pdf->SetXY(40,169);
    if($remark_date){
    $pdf->MultiCell(50,6,$remark_date);}
    
    $pdf->SetFontSize('12');
    $pdf->SetXY(35,60);
    if($c_remark){
    $pdf->MultiCell(150,8,$c_remark);}
    
    $pdf->SetXY(105, 169);
    $pdf->SetFont('arial');
    if($signature){
    $pdf->Cell(0,20,$pdf->Image($signature,$pdf->GetX(), $pdf->GetY(),30), 0, 0,'R',false);}
    
    ?>
    