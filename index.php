<html>
<head>
<title>Online PHP Script Execution</title>
</head>
<body>
<?php
  include("util.php");
 $array = array(
      channel=>"C027GB3U3",
      text=>"\$5, Footlongs",
      username=>"SUBWAY",
      attachments => '[{"pretext": "New Submission", "text": "New Submission", "color":"#fffff", "fields": [
        {"title": "Author","value": "Gavin Dinubilo","short":false },
        {"title": "Soundcloud Link", "value": "test", "short":true, "unfurl_links": true},
        {"title": "Description", "value": "WOW, Zed\'s Dead is pretty cool", "short":true}
    ]}]'
  );
 $Slack = new Slack('xoxp-2254427554-2677262785-2687290823-213b54');
   # print_r($Slack->call('users.list'));
print_r($Slack->call('chanels.list'));
echo ($Slack->call('chat.postMessage', array(
      channel=>"C027GB3U3",
      text=>"Soundcloud: http://soundcloud.com/zedsdead/zeds-dead-twin-shadow-lost-you-feat-dangelo-lacy",
      username=>"SUBWAY",
      unfurl_links=>true)));
echo ($Slack->call('chat.postMessage', $array));

 
?>
</body>
</html>
