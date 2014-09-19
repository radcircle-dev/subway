<html>
<head>
<title>Online PHP Script Execution</title>
</head>
<body>
<?php
  include("Slack.php");  
  if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fail = false;
    if($_POST['name']) {
      $name = $_POST['name'];
    } else {
      $fail = true;
      printf("Name is required<br>");
    }
    if($_POST['artist']) {
      $name = $_POST['artist'];
    } else {
      $fail = true;
      printf("Artist Name is required<br>");
    }
    if($_POST['contact']) {
      $contact = $_POST['contact'];
    } else {
      $fail = true;
      printf("Contact is required<br>"); 
    }
    if($_POST['song']) {
      $song = $_POST['song'];
    } else {
      $fail = true;
      printf("Song is required<br>");
    }
    if ($_POST['url']) {
      $url = $_POST['url'];
    } else {
      $fail = true;
      printf("Song URL is required<br>");
    }
    if ($_POST['social']) {
      $social = $_POST['social'];
    } else {
      $social = "No social media links provided.";
    }
    if ($_POST['description']) {
      $desc = $_POST['description'];
    } else {
      $fail = true;
      printf("Artist description is required<br>");
    }
    $string = '[{"pretext": "Test", "text": "New Submission", "color":"#fffff", "fields": [
          {"title": "User Name","value": "'.$name.'\n'.$contact.'","short":true },
          {"title": "Artist Name","value": "'.$artist.'","short":true },
          {"title": "Description","value": "'.$desc.'","short":true },
          {"title": "Social Media","value": "'.$social.'","short":true }
          ]
        }]';
    if ($fail == false) {
      $array = array(
        channel=>"U027GCKGC",
        text=>"\$5, Footlongs",
        username=>"SUBWAY",
        attachments=>$string
      );
      $Slack = new Slack('xoxp-2254427554-2677262785-2687290823-213b54');
      // print_r($Slack->call('users.list'));
      echo ($Slack->call('chat.postMessage', array(
            channel=>"U027GCKGC",
            text=>"Soundcloud: $url",
            username=>"SUBWAY",
            unfurl_links=>true)));
      echo ($Slack->call('chat.postMessage', $array));
    }
    printf("<h1>Thank You</h1>");
    printf("<p>Your submission for ".$name."'s song: ".$song." has been submitted to the Radcircle Editorial team.</p>");
    printf("<p>We really appreciate your showing us some great music!!</p>");
  } else {
    printf('<form id="form" action="index.php" method="post">
  <label>Your Name*:</label><br>
  <input type="text" id="name" name="name"><br>
  <label>Contact Email*:</label><br>
  <input type="email" id="email" name="contact"><br>
  <label>Artist Name*:</label><br>
  <input type="text" id="artist" name="artist"><br>
  <label>Song name*:</label><br>
  <input type="text" id="songname" name="song"><br>
  <label>Song link*:</label><br>
  <input type="url" id="soundcloudlink" name="url"><br>
  <label>Description of song and/or band/artist*:</label><br>
  <textarea id="description" maxlength="140" name="description"></textarea><br>
  <label>Links to social media accounts:</label><br>
  <textarea id="social" name="social"></textarea><br>
  <input type="submit" value="Submit">
</form>');
  }
?>
</body>
</html>
