<?php 
// require_once 'src/core/init.php';
// function logger($log){
//   if(!file_exists('log.txt')){
//       file_put_contents('log.txt', '');
//   }
//   $ip = $_SERVER['REMOTE_ADDR'];
//   $time = date('Y-m-d H:i:s', time());
//   $content = file_get_contents('log.txt');
//   $content .= "[$time] $ip $log\n";
//   file_put_contents('log.txt', $content);
// }
// ?>
<?php
require_once 'src/core/init.php';
// function logger($log){
//   $logFileName = date('Y-m-d') . '.txt';
//   $ip = $_SERVER['REMOTE_ADDR'];
//   $time = date('Y-m-d H:i:s', time());
//   $content = file_get_contents($logFileName);
//   $content .= "[$time] $ip $log\n";
//   file_put_contents($logFileName, $content);
// }
function logger($log) {
  $logFilePath = 'log.txt';

  if (!file_exists($logFilePath)) {
      file_put_contents($logFilePath, '');
  }

  $ip = $_SERVER['REMOTE_ADDR'];
  $time = date('Y-m-d H:i:s', time());
  $content = file_get_contents($logFilePath);

  if ($content === false) {
      die("Error reading log file.");
  }

  $content .= "[$time] $ip $log\n";

  if (file_put_contents($logFilePath, $content) === false) {
    die("Error writing to log file: " . error_get_last()['message']);
}
}

?>


