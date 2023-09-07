<?php 
function logger($log){
  if(!file_exists('log.txt')){
      file_put_contents('log.txt', '');
  }
  $ip = $_SERVER['REMOTE_ADDR'];
  $time = date('Y-m-d H:i:s', time());
  $content = file_get_contents('log.txt');
  $content .= "[$time] $ip $log\n";
  file_put_contents('log.txt', $content);
}
?>