<?php 
if(isset($_REQUEST['email'])) {
	//placeholder for testing
	$admin_email = "joshfrmr92@gmail.com";
	$email = $_REQUEST['email'];
	$subject = $_REQUEST['subject'];
	$comment = $_REQUEST['comment'];
	
	mail($admin_email, "$subject", $comment, "From:" . $email);
	
	echo "<span style='font-family: Arial, Helvetica, sans-serif;
	font-size: 16px;
	color: gray;'>Thank you for contacting us!</span>";
}

else {
	?>
	
	<h2>Contact Pink Heart Rescue</h2>
	
	<div style='text-align: center;'>
	<div class="dogdiv" style="margin-bottom: 15px;">
	<div class="dogtable" style="margin-bottom: 50px;">
	
	<p><i>Before sending us an email, check the FAQ! Your question may already be answered below.</i></p>
	</br>
	
	<span style="font-family: Arial, Helvetica, sans-serif;
	font-size: 16px;
	color: gray;">
	<ul>
	<p><li> Our Rescue focuses on Double merle dogs that are born blind and/or deaf due to a genetic mutation that occurs in puppies when two dogs containing the merle gene are bred.</li></p>
	<p><li> If a dog is listed under our "available dogs" album in our photos the dog is still available. Once the dog is adopted we will remove the dog from that album and put it into our "adopted" album.</li></p>
	<p><li> Adoption fees are dependant on the medical costs and additional costs to care for the dog. This fee varies from dog to dog. Our adoption fees start out at $150.</li></p>
	<p><li> Each of our dogs are adopted out up to date on shots, spayed or nuetered, dewormed, tested for intestinal parasites and heart worm, and microchipped.</li></p>
	<p><li> Each home will require different expectations depending on the dog's size, breed, age, and personality. We do look specifically for fenced in yard (although not always required), up to date vaccines and records for currently owned dogs, and other necessary medical treatment for current dogs.</li></p>
	<p><li> Our Rescue is located in Indianapolis. We do not have open visiting hours. You must have an approved application before setting up an appointment for a meet and greet with a dog.</li></p>
	<p><li> We do adopt out of state but you will be responsible for additional transportation costs.</li></p>
	<p><li> We are a 501c3 non-profit organization. All proceeds of our rescue goes directly to the dogs and their care.</li></p>
	<p><li> If you would like to make a financial donation please visit: <a href="https://squareup.com/store/pinkheartrescue">https://squareup.com/store/pinkheartrescue</a></li></p>
	<p><li> 100% of our proceeds go directly to the dogs of Pink Heart Rescue.</li></p>
	<p><li> If you would like to donate specific items that are needed at our rescue please visit: <a href="http://a.co/23sjmS3">http://a.co/23sjmS3</a></li></p>
	</ul>
	</span>
	
	</div>
	
	
	<div style='text-align: center;'>
	<div class="dogtable">
	
	<p><b>Contact us at:</b> <i>pinkheartrescue@gmail.com</i></p>
	
	<p><b>Or use the following form to send us an email:</b></p>
	</br>
	<p>
	<form method="post">
	<p><b>Your Email Address:</b></p><p><input name="email" type="text" /></p>
	<p><b>Subject: </b></p><p><input name="subject" type="text" /></p>
	<p><b>Message: </b></p><p><textarea name="comment" rows="15" cols="40" style="height: 200px; resize: none;"></textarea></p>
	<p><input type="submit" value="Submit" /></p>
	</form>
	</p>
	
	</div>
	</div>
	</div>
	</div>
	
	<?php
}
?>