var player = a240e92d;
var postlink = "recieve.php?"; //the link to post data to
var getlink = "update.php?"; //the link to get data
var videoId = ""; //the id of this theatre
var vstatus = ""; //the status of the player
var isadmin = true; //is it a client or an administrator?
var lastrecievetime = 0; //last update time

	player.on({play: function(){vstatus="0";}, pause: function(){vstatus="1";}, stop: function(){vstatus="2";}})

function administrator() //updates the administrator
{
	$.post(postlink + "videoid=" + videoId + "&status=" + vstatus + "&time=" + player.videoElement().currentTime, function(data)
		{
			console.log(data);
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
		if(Math.abs(player.videoElement().currentTime - vtime) > 2)
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
}, 1000); //creates an infinite loop to update everything