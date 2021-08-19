<?php
      if ($_GET["vb"]){

            $userid = $_GET["user"];
            $accessToken = $_GET["token"];
            $site = $_GET["site"];
       
            function fetchData($url){
                  
                  $ch = curl_init();
                  curl_setopt($ch, CURLOPT_URL, $url);
                  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                  curl_setopt($ch, CURLOPT_TIMEOUT, 20);
                  $result = curl_exec($ch);
                  curl_close($ch); 
                  return $result;

            }

             	$result = fetchData("https://api.instagram.com/v1/users/{$userid}/media/recent/?access_token={$accessToken}");
             	$result = json_decode($result);
             	$trr = $result->data[0];

             	$username =  $trr->user->username;
                  $img = $trr->user->profile_picture;

             	$redirect = "{$site}?user={$userid}&token={$accessToken}&username={$username}&img={$img}";
                 
                 //echo $redirect;

                  //print_r(json_encode($trr));
                  header("Location: {$redirect}");
                  
                  exit();
      }

?>
<!DOCTYPE html>
<html>
      <head>
            <title>Obtendo Token</title>
      </head>
      <body>
            <script type="text/javascript">

                  var host = window.location.host;
                  var url_t = window.location.hash;
                  var url_w = window.location.href;
                  var site_t = (/\?site=([^#]+)/i).exec(url_w);
                  var site = decodeURIComponent(site_t[1]);

                  //alert(host);

                  var url_x = url_t.split("=");
                  var url_y = url_x[1].split(".");
                  //var redirect = "http://" + site + "/wp-admin/widgets.php?vb=1&user=" + url_y[0] + "&token=" + url_x[1];
                  var redirect = "http://" + host + "/api-instagram/?vb=1&user=" + url_y[0] + "&token=" + url_x[1] + "&site=" + site;
                  window.location = redirect;
                  //alert(redirect);

            </script>
      </body>
</html>

