<?php
// require_once 'src/core/init.php';
// function logger($log) {
//   $logFilePath = 'log.txt';

//   if (!file_exists($logFilePath)) {
//       file_put_contents($logFilePath, '');
//   }

//   $ip = $_SERVER['REMOTE_ADDR'];
//   $time = date('Y-m-d H:i:s', time());
//   $content = file_get_contents($logFilePath);

//   if ($content === false) {
//       die("Error reading log file.");
//   }

//   $content .= "[$time] $ip $log\n";

//   if (file_put_contents($logFilePath, $content) === false) {
//        die("Error writing to log file: " . error_get_last()['message']);
//    }
// }
function logger($log) {
  $logFilePath = 'log.txt';

  $ip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : 'Unknown';

  $time = date('Y-m-d H:i:s');

  $log = htmlspecialchars($log, ENT_QUOTES, 'UTF-8');

  $logEntry = "[$time] [IP: $ip] - [INFO] $log" . PHP_EOL;

  if ($fileHandle = fopen($logFilePath, 'a')) {
      fwrite($fileHandle, $logEntry);
      fclose($fileHandle);
  } else {
      die("Error writing to log file: $logFilePath");
  }
}

?>


