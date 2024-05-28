<?php
    $hostname = 'localhost'; $dbname = 'cgcaogjv_ghp'; $username = 'cgcaogjv_root'; $password = 'Rota87Last56@#Info$$';
    $db = new mysqli($hostname, $username, $password, $dbname);
    print_r( $db );
    $data = rand(00000000000 , 9999999999)." Hello";
    $sql = "INSERT INTO `test_cron` (`data`) VALUES ('$data')";
    $db1 = $db->query($sql);
    
    $unparsed_json = file_get_contents('"https://staging.respicite.com/users/OtherAjax/download_report.php?code='.base64_encode('AWSW474268').'"');
    echo $unparsed_json;
    // $url =  'http://staging.respicite.com/users/OtherAjax/download_report.php?code=';
    // $data = rand(00000000000 , 9999999999)." Hello";

?>