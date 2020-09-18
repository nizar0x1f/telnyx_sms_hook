<html>
  <head>
    <title>Text Message Receiver</title>
  </head>
  <body>
    <?php


    $json = json_decode(file_get_contents("php://input"), true);
    $from = $json["data"]["payload"]["from"]["phone_number"];
    $message = $json["data"]["payload"]["text"];
    $fromt ="\" From : ".$from."\"";
    $mest = "\" Text : ".$message."\"";
    if($message){
     $fp = fopen('saved_secr.txt', 'a');//opens file in append mode
     fwrite($fp, "From: ".$from.PHP_EOL);
     fwrite($fp, "Text: ".$message.PHP_EOL);
     fwrite($fp, PHP_EOL);
     fclose($fp);
     exec('telegram '.$fromt);
     exec('telegram '.$mest);
     exec('telegram "============================="');


    }
   ?>
  </body>
</html>
