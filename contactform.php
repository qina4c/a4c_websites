<?php
function decodeData($data)
{
	$data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
	return $data;
}
function spamcheck($field) {
  // Sanitize e-mail address
  $field=filter_var($field, FILTER_SANITIZE_EMAIL);
  // Validate e-mail address
  if(filter_var($field, FILTER_VALIDATE_EMAIL)) {
    return TRUE;
  } else {
    return FALSE;
  }
}
?>

<?php
// form display before post 
if ($_SERVER['REQUEST_METHOD']!=='POST') {
  ?>
  <div id="inner-container"> 
  <div id="loader">
     <div id="img"><img src="images/loader/loading.gif" /></div>
 </div>
  <button id="contact-form-close-button">x</button>
  <form id="techPro_CForm" class="basic-grey">
  <h1>Contact Us<span class="error">*Required field</span></h1>
  <label>
	<span class="input-label">From: </span><input type="text" name="from"><span class='error'>*</span>
  </label>
  <label>
	<span class="input-label">Firstname: </span><input type="text" name="Firstname"><span class='error'>*</span>
  </label>
  <label>
	<span class="input-label">Lastname: </span><input type="text" name="Lastname"><span class='error'>*</span>
  </label>
  <label>
	<span class="input-label">Phone: </span><input type="text" name="Phone">
  </label>
  <label>
	<span class="input-label">Subject: </span><input type="text" name="subject"><span class='error'>*</span>
  </label>
  <label>
	<span class="message-label">Message: </span><span class='error'>*</span>
  </label>
  <textarea name="message"></textarea>
  <input id="techPro_CForm_cubmit" type="button" class="button" name="submit" value="Submit">
  </form>
  </div>
  <?php 
} else {  
	
// the user has submitted the form
  // Check if the "from" input field is filled out
	  if (empty($_POST["from"]))
	  {
		$errors['from'] = "Empty E-mail Field";
	  } 
	  $mailcheck = spamcheck($_POST["from"]);
	  if(($mailcheck==FALSE) )
	  {
		$errors['from'] = "Invalid E-mail input";
	  }
	  if (empty($_POST["Firstname"]))
	  {
		$errors['Firstname'] = "Empty Firstname Field";
	  } 
	  else if(strlen($_POST["Firstname"])>25)
	  {
		$errors['Firstname'] = "Exceeded 25 characters limit";
	  }
	  if (empty($_POST["Lastname"]))
	  {
		$errors['Lastname'] = "Empty Lastname Field";
	  }
	  else if(strlen($_POST["Lastname"])>25)
	  {
		$errors['Lastname'] = "Exceeded 25 characters limit";
	  }
	  if(empty($_POST["Phone"]))
	  {
		  if(strlen($_POST["Phone"])>25)
		  {
			  $errors['Phone'] = "Exceeded 25 characters limit";
		  }
	  }
	  if (empty($_POST["subject"]))
	  {
		$errors['subject'] = "Empty subject Field";
	  } 
	  if (empty($_POST["message"]))
	  {
		$errors['message'] = "Empty message Field";
	  } 
	  //if there is error 
	  if(isset($errors))
	  {?>
  		<div id="inner-container" class="basic-grey">
        <div id="loader">
        	<div id="img"><img src="images/loader/loading.gif" /></div>
    	</div>
        <button id="contact-form-close-button">x</button>
          <form id="techPro_CForm">
		  <h1>Contact Us<span class="error">*Required field</span></h1>
		  <label>
			<span class="input-label">From: </span><input type="text" name="from" <?php if(!empty($_POST["from"])) {?>value="<?php echo trim($_POST["from"]);?>"<?php }?>>
			<span class='error'>*</span>
			<?php if(isset($errors['from'])) {?><br><span class="error error-align"><?php echo $errors['from'];?></span><?php }?>
          </label>
		  <label>
			<span class="input-label">Firstname: </span><input type="text" name="Firstname" <?php if(!empty($_POST["Firstname"])) {?>value="<?php echo trim($_POST["Firstname"]);?>"<?php }?>>
			<span class='error'>*</span>
			<?php if(isset($errors['Firstname'])) {?><br><span class="error error-align"><?php echo $errors['Firstname'];?></span><?php }?>
          </label>
		  <label>
			<span class="input-label">Lastname: </span><input type="text" name="Lastname" <?php if(!empty($_POST["Lastname"])) {?>value="<?php echo trim($_POST["Lastname"]);?>"<?php }?>>
			<span class='error'>*</span>
			<?php if(isset($errors['Lastname'])) {?><br><span class="error error-align"><?php echo $errors['Lastname'];?></span><?php }?>
          </label>
		  <label>
			<span class="input-label">Phone: </span><input type="text" name="Phone" <?php if(!empty($_POST["Phone"])) {?>value="<?php echo trim($_POST["Phone"]);?>"<?php }?>>
			<?php if(isset($errors['Phone'])) {?><br><span class="error error-align"><?php echo $errors['Phone'];?></span><?php }?>
          </label>
		  <label>
			<span class="input-label">Subject: </span><input type="text" name="subject"  <?php if(!empty($_POST["subject"])) {?>value="<?php echo trim($_POST["subject"]);?>"<?php }?>>
			<span class='error'>*</span>
			<?php if(isset($errors['subject'])) {?><br><span class="error error-align"><?php echo $errors['subject'];?></span><?php }?>
          </label>
		  <label>
			<span class="input-label">Message: </span><span class='error message-error'>* <?php if(isset($errors['message'])) {echo $errors['message'];}?></span>
          </label>
		  <textarea name="message"><?php if(!empty($_POST["message"])) { echo $_POST["message"];}?></textarea>
		  <input id="techPro_CForm_cubmit" class="button" type="button" name="submit" value="Submit">
		  </form>
          </div>
          <?php
	  }
	  //after post sucesss
	  else 
	  {
		  //get posted inputs
		  $from = $_POST["from"]; // sender
		  $Firstname = $_POST["Firstname"];
		  $Lastname = $_POST["Lastname"];
		  $Phone = $_POST["Phone"];
		  $subject = $_POST["subject"];
	      $message = $_POST["message"];
          
		  $Firstname = decodeData($Firstname);
		  $Lastname = decodeData($Lastname);
		  $Phone = decodeData($Phone);
		  $subject = decodeData($subject);
		  $message = decodeData($message);
		  $content = "Name: ".$Firstname." ".$Lastname."\n";
		  $content.= "Email: ".$from."\n";
		  $content.= "Telephone: ".$Phone."\n";
		  $content.= "\n\nMessage:\n";
		  $content.= $message;
		  // send mail
		  mail("Qin@all4cellular.com",$subject,$message,"From: $from\n");
		  ?>
		  <div id="inner-container" class="basic-grey">
          	<button id="contact-form-close-button">x</button>
          	<form id="techPro_CForm">
            	<h1>Contact Us<span class="error">*Required field</span></h1>
                <div id="contact-form-message">
               	 	<span class="success">Thank you for contacting us!</span>
                </div>
            </form>
		  </div>
          <?php
	  }
	  
  
}
?>

