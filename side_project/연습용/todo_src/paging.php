<?php

$btn_page_cnt = 3;
$max_page_num = 29;
$now_page = 20;

// $start_page = (floor($now_page / $btn_page_cnt) * $btn_page_cnt) + 1;
// $start_page = (floor(($now_page - 1) / $btn_page_cnt) * $btn_page_cnt) + 1;

// for($now_page = 1; $now_page < 100; $now_page++){
    //     $start_page = (floor(($now_page - 1) / $btn_page_cnt) * $btn_page_cnt) + 1;
    //     echo "$now_page page,   $start_page \n";
    // }
    
$start_page = ceil($now_page / $btn_page_cnt) * $btn_page_cnt - ($btn_page_cnt - 1);
$end_page = $start_page + ($btn_page_cnt - 1);
$end_page = $end_page > $max_page_num ? $max_page_num : $end_page;
for($i = $start_page; $i <= $end_page; $i++){
    echo "$i page\n";
}