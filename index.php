<html>
<head>
<title>Online PHP Script Execution</title>
</head>
<body>
<?php
  include("Slack.php");
   $Slack = new Slack('xoxp-2254427554-2677262785-2687290823-213b54');
   print_r($Slack->call('channels.list'));
print_r($Slack->call('chat.postMessage', array(
      channel=>"C0286H1M5",
      text=>"\$5, Footlongs",
      username=>"SUBWAY"
  )));
?>
</body>
</html>
