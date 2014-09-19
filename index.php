<html>
<head>
<title>Online PHP Script Execution</title>
</head>
<body>
<?php
  include("util.php");
   $Slack = new Slack('xoxp-2254427554-2677262785-2687290823-213b54');
print_r($Slack->call('chat.postMessage', array(
      channel=>"U027GCKGC",
      text=>"\$5,\n Footlongs\nHey I figured out how to format text!!",
      username=>"SUBWAY",
      
  )));
?>
</body>
</html>
