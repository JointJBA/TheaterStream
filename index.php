<?php 
include 'core/init.php';
include 'includes/overall/header.php'; 
?><div class="landing">
<div class="banner">
	<div class="row text-center">
  	<h1 class="banner-text">THEATERSTREAM</h1>
  	<h3 class="banner-subtext">A new way to share video.</h3>
    </div>
    <br>
    <br>
    <br>
    <br>
    <form action="theater.php" method="get">
    <div class="row text-center"><h4 class="banner-subtext">Find a specific theater</h4></div>
    <div class="row text-center"><div class="large-4 large-centered columns"><input type="text" name="theater_name"></div></div>
    <div class="row text-center"><input class="button radius" type="submit" value="Find"></div>
    </form>

</div>

<div class="row text-center">
  	<div class="large-12 columns">
  		<p class="landing-blurb">
Theaterstream is the easy way to broadcast and share video with 
friends and viewers. It essentially functions by giving a user 
there own "theater page" where they can upload a video or submit
 a Youtube link for everyone to see at the control of the administrator. 
 For example, you could be hanging out with friends on a video chat and 
 watching a synchronized movie that you have uploaded. On the other hand,
  a content creator can broadcast their files to a large audience at a 
  specific time to create a unique online viewing experience. A novelty 
  of this technology is that instead of streaming video, we have created 
  an algorithm to broadcast status of the video, and synchronize the viewing 
  experiences within a reasonable error. We hope you enjoy!
  		</p>
  	</div>
</div>

<div class="row">
    <div class="large-4 columns text-center">
      <img src="img/next.png" />
      <br>
      <br>
      <h4>Stay Synchronized!</h4>
      <p class="landing-blurb">All of the viewer's players will pause and play at the behest of the owner of the theater.</p>
    </div>
    
    <div class="large-4 columns text-center">
      <img src="img/users.png" />
      <br>
      <br>
      <h4>Watch With Friends!</h4>
      <p class="landing-blurb">Create a synchronized viewing experience for you and all your friends to enjoy at the same exact time.</p>
    </div>
    
    <div class="large-4 columns text-center">
      <img src="img/bubble.png" />
      <br>
      <br>
      <h4>Share Your Theater</h4>
      <p class="landing-blurb">To share your content simply send people your theatername or give them the link to your theater. That way you can easily invite viewers to watch with you!</p>
    </div>
  
    </div>
</div>

<?php include 'includes/overall/footer.php'; ?>