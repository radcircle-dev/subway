<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="stylesheets/style.css" rel="stylesheet">
  <title>Submit to Radcircles Editorial Team</title>
 </head>
<body>

<?php
  include("Slack.php"); 

  $Slack = new Slack('xoxp-2254427554-2677262785-2687290823-213b54'); 
  if($_SERVER['QUERY_STRING']) {
      printf("<h1>Thank You</h1>");
      printf("<p>Your submission has been submitted to the Radcircle Editorial team.</p>");
      printf("<p>Return to <a href='http://www.radcircle.com'>Radcircle</a></p>");
  }
  if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fail = false;
    if($_POST['name']) {
      $name = $_POST['name'];
    } else {
      $fail = true;
      printf("Name is required<br>");
    }
    if($_POST['artist']) {
      $artist = $_POST['artist'];
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
    $string = '[{"pretext": "", "text": "New Submission", "color":"#fffff", "fields": [
          {"title": "User Name","value": "'.$name.'\n'.$contact.'","short":true },
          {"title": "Artist Name","value": "'.$artist.'","short":true },
          {"title": "Description","value": "'.$desc.'","short":true },
          {"title": "Social Media","value": "'.$social.'","short":true }
          ]
        }]';
    if ($fail == false) {
      $array = array(
        channel=>"C0286H1M5",
        text=>"New Submission",
        username=>"Submission Bot",
        attachments=>$string
      );

      // Uncomment to get the channel list
      // print_r($Slack->call('channels.list'));

      // Link to the soundcloud page, should embed in the chat
      $Slack->call('chat.postMessage', array(
            channel=>"C0286H1M5",
            text=>"Soundcloud: $url",
            username=>"Submission Bot",
            unfurl_links=>true));
      $Slack->call('chat.postMessage', $array);
      echo '<script type="text/javascript">
           window.location = "/submissions?s=0"
      </script>';
      // printf("<h1>Thank You</h1>");
      // printf("<p>Your submission for <strong>".$name."</strong>'s song: <strong>".$song."</strong> has been submitted to the Radcircle Editorial team.</p>");
      // printf("<p>Return to <a href='http://www.radcircle.com'>Radcircle</a></p>");
    } else {
      printf('<form id="form" action="index.php" method="post">
  <label for="name">Your Name*:</label><br>
  <input type="text" id="name" name="name"><br>
  <label for="contact">Contact Email*:</label><br>
  <input type="email" id="email" name="contact"><br>
  <label for="artist">Artist Name*:</label><br>
  <input type="text" id="artist" name="artist"><br>
  <label for="song">Song name*:</label><br>
  <input type="text" id="songname" name="song"><br>
  <label for="url">Song link*:</label><br>
  <input type="url" id="soundcloudlink" name="url"><br>
  <label for="description">Description of song and/or band/artist*:</label><br>
  <textarea id="description" maxlength="140" name="description"></textarea><br>
  <label for="social">Links to social media accounts:</label><br>
  <textarea id="social" name="social"></textarea><br>
  <input type="submit" value="Submit">
</form>');
    }
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
