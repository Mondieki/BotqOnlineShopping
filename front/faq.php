<html>
<?php include 'header.php';?>
<div class="contact-form">
    <h2>Contact Us</h2>
	    <form method="post" action="contact-post.html">
		    <div>
			    <span><label>Name</label></span>
				<span><input name="userName" type="text" class="textbox"></span>
			</div>
		    <div>
		    	<span><label>E-mail</label></span>
		    	<span><input name="userEmail" type="text" class="textbox"></span>
			</div>
			<div>
				<span><label>Mobile</label></span>
				<span><input name="userPhone" type="text" class="textbox"></span>
			 </div>
			<div>
				<span><label>Subject</label></span>
				<span><textarea name="userMsg"> </textarea></span>
			</div>
			<div>
				<span><input type="submit" class="" value="Submit us"></span>
			</div>
		</form>
</div>
</html>