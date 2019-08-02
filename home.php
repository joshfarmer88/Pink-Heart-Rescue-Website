<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2"></script>

  
<h2>Welcome to Pink Heart Rescue</h2>
<p style='font-size: 19px'>Here at Pink Heart Rescue our mission is to educate owners, breeders and other rescues on the merle gene and how it affects the dogs we love. At Pink Heart Rescue we strive to put our dogs first and educate, train, and rescue for the greater good of the breeds we all adore.</p>

</br>

<h2>Support Pink Heart Rescue!</h2>

<form method="GET" action="" style="display: inline-block; line-height: 44px;">
<button name="loc" type="submit" value="dogs">Adopt a Dog Today!</button>
</form>

<form method="GET" action="https://squareup.com/store/pinkheartrescue" style="display: inline-block; line-height: 44px;">
<button name="loc" type="submit">Donate to Pink Heart Rescue!</button>
</form>

<form method="GET" action="http://a.co/23sjmS3" style="display: inline-block; line-height: 44px;">
<button name="loc" type="submit">See Our Wish List!</button>
</form>

</br>
</br>
</br>

<h2>Check us out on Facebook!</h2>
<div class="fb-page" data-href="https://www.facebook.com/PinkHeartRescue" data-tabs="timeline" data-height="500" data-width= "500" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/PinkHeartRescue" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/PinkHeartRescue">Pink Heart Rescue</a></blockquote></div>



</br>
</br>
</br>
<div>
<h2>See our former rescues in their new homes!</h2>
<p>
<marquee>
<?php
$pics = glob("adoptedPics/" . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
for ($x = 0; $x <= count($pics); $x++) 
{
    echo "<img style='height:200px;' src='" . $pics[$x] . "'>";
} 
?>
</marquee>
</p>
<p>Want to show off your PHR rescue dog in its new home?</p>
<p>Send a picture of your dog to <i>pinkheartrescue@gmail.com</i> to have it appear on this page!</p>
</div>