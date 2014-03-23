<?php 

$theater_name = $user_data['theater_name'];

$result = mysql_query("SELECT `video_link` FROM `users` WHERE `theater_name`='$theater_name'");

$video_link = mysql_fetch_row($result); 
$video_link = $video_link[0]; // mysql_fetch_row returns an array. we only want the Name so we just set it excluseively. 

?>
<script type="text/javascript" src="//cdn.sublimevideo.net/js/2mn1v45v.js"></script>
<?php
if (mysql_query("SELECT `video_path` FROM `users` WHERE `theater_name`='$theater_name'")=='' ){
?>
<script type="text/javascript" src="//cdn.sublimevideo.net/js/2mn1v45v.js"></script>

    <div class="row">
  <div class="large-5 large-centered columns text-center">

    <div class="theater-video"><h1><?php echo $theater_name; ?>'s Theater</h1><br><br><video data-autoresize='fit' id="a240e92d" data-youtube-id="<?php echo $video_link; ?>" class="sublime" width="640" height="360" title="Midnight Sun" data-uid="a240e92d" preload="none">
    </video></div>


  </div>

</div>
<?php }
else{
    $file_name = scandir("users/".$theater_name . "/" );
    $video_path = "users/".$theater_name . "/" .$file_name['2'];
?>


    <div class="row">
  <div class="large-5 large-centered columns text-center">

    <div class="theater-video"><h1><?php echo $theater_name; ?>'s Theater</h1><br><br>
        <video data-autoresize='fit' id="a240e92d" class="sublime" width="640" height="360" title="Midnight Sun" data-uid="a240e92d" preload="none">
  <source src=<?php echo $video_path;?>
    </video>
    </div>


  </div>

</div>
<?php
}
?>

<script>
sublime.load();
sublime.ready(function(){   var player = sublime.player('a240e92d');
var postlink = "recieve.php?"; //the link to post data to
var getlink = "update.php?"; //the link to get data
var videoId = "<?php echo $theater_name ?>"; //the id of this theatre
var vstatus = "1"; //the status of the player
var isadmin = true; //is it a client or an administrator?
var lastrecievetime = 0; //last update time

player.on({play: function(){vstatus="0";}, pause: function(){vstatus="1";}, stop: function(){vstatus="2";}});

function administrator() //updates the administrator
{
    $.get(postlink + "videoid=" + videoId + "&status=" + vstatus + "&time=" + player.playbackTime(), function(data)
    {
    });
}

function client() //updates the client
{
    $.get(getlink + "videoid=" + videoId, function(data)
    {
        var datum = data.split(",");
        var nlrt = parseFloat(datum[0]);
        var status = datum[1];
        var vtime = parseInt(datum[2]);
        if(status == "0")
        {
            player.stop();
        }
        else if(status == "1")
        {
            player.pause();
        }
        else
        {
            player.play();
        }
        if(Math.abs(player.playbackTime() - vtime) > 2)
        {
            player.seekTo(vtime);
        }

    });
}

setInterval(function()
{
    if(isadmin)
    {
        administrator();
    }
    else
    {
        client();
    }
}, 250); });

  //creates an infinite loop to update everything
  </script>
      <div class="row">
  <div class="large-2 large-centered columns text-center">
        <br>
        <br>
      <a class="button radius" href="control_panel.php">Control Panel</a>


  </div>

</div>
