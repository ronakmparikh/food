<?php
// this code is for database connection

$connect = mysql_connect('localhost','root','') or die(mysql_error());
$db = mysql_select_db('foodstuff',$connect);

function redirect($page){

  echo "<script>window.open('$page.php','_self')</script>";
}

function calling_data($table,$where=null){
  $array = [];
  if($where==null){
    $calling = mysql_query("select * from $table");
  }
  else{
    $calling = mysql_query("select * from $table where $where");
  }

    while($row = mysql_fetch_array($calling)){
      $array[] = $row;
    }
    return $array;
}

/*function send_sms($mobiles,$content){
//Your authentication key
$authKey = "287540ACbZZacWmlr5d406702";



//Sender ID,While using route4 sender id should be 6 characters long.
$senderId = "FDSTUF";

//Your message to send, Add URL encoding here.
$message = urlencode("$content");

//Define route
$route = "4";
//Prepare you post parameters
$postData = array(
    'authkey' => $authKey,
    'mobiles' => $mobiles,
    'message' => $message,
    'sender' => $senderId,
    'route' => $route
);

//API URL
$url="http://api.msg91.com/api/sendhttp.php";

// init the resource
$ch = curl_init();
curl_setopt_array($ch, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $postData
    //,CURLOPT_FOLLOWLOCATION => true
));


//Ignore SSL certificate verification
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);


//get response
$output = curl_exec($ch);

//Print error if any
if(curl_errno($ch))
{
    echo 'error:' . curl_error($ch);
}

curl_close($ch);

echo $output;
}*/
?>
