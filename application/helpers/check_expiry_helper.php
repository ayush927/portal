
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('test_method'))
{
    function dateDifference($start_date){
       $date= date_create(date('d-m-Y H:i:s'));
       $end_date = date_format($date, 'd-m-Y H:i:s');
       // calulating the difference in timestamps 
       $diff = strtotime($start_date) - strtotime($end_date);
       return ceil(abs($diff / 86400));  
   }     

   function random_strings(){
       // String of all alphanumeric character
       $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';

       return substr(str_shuffle($str_result),
                          0, 8);
   }
}