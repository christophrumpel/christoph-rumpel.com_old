<?php
/*
Plugin Name: Simple Contact Form Shortcode
Plugin URI: http://wp.tutsplus.com/author/barisunver/
Description: A simple contact form for simple needs. Usage: <code>[contact email="your@email.address"]</code>
Version: 1.0
Author: Barış Ünver
Author URI: http://beyn.org/
*/

// function to get the IP address of the user
function wptuts_get_the_ip() {
	if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) {
		return $_SERVER["HTTP_X_FORWARDED_FOR"];
	}
	elseif (isset($_SERVER["HTTP_CLIENT_IP"])) {
		return $_SERVER["HTTP_CLIENT_IP"];
	}
	else {
		return $_SERVER["REMOTE_ADDR"];
	}
}

// the shortcode
function wptuts_contact_form_sc($atts) {
	extract(shortcode_atts(array(
		"email" => get_bloginfo('admin_email'),
		"label_name" => 'You are?',
		"label_email" => 'Your E-mail?',
		"label_message" => 'What can i do for you?',
		"label_submit" => 'Send',
		"error_empty" => 'Oh, did you forget to fill all the <span class="theme-color">fields?</span>.',
		"error_noemail" => 'Oh, seems like something went wrong. Please check your <span class="font-bold">email address</span>.',
		"success" => '<h2 class="contact__thx">Thank you!</h2><h4 class="contact__linesdrop">Your lines are already dropping in my direction</h4><div class="contact-lines"></div>'
	), $atts));

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$error = false;
		$required_fields = array("contact-name", "contact-mail", "contact-message");

		foreach ($_POST as $field => $value) {
			if (get_magic_quotes_gpc()) {
				$value = stripslashes($value);
			}
			$form_data[$field] = strip_tags($value);
		}

		foreach ($required_fields as $required_field) {
			$value = trim($form_data[$required_field]);
			if(empty($value)) {
				$error = true;
				$result = $error_empty;
			}
		}

		if(!is_email($form_data['contact-mail'])) {
			$error = true;
			$result = $error_noemail;
		}

		if ($error == false) {
			$email_message = $form_data['contact-message'] . "\n\nIP: " . wptuts_get_the_ip();
			$subject = "CR Contact Message";
			$headers .= "From: ".$form_data['contact-name']." <".$form_data['contact-mail'].">\n";
			$headers .= "Content-Type: text/plain; charset=UTF-8\n";
			$headers .= "Content-Transfer-Encoding: 8bit\n";
			wp_mail($email, $subject, $email_message, $headers);
			$result = $success;
			$sent = true;
		}
	}

	if($result != "") {
		$info = '<div class="info info--top animated fadeInDown">'.$result.'</div>';
	}
	?>


		<?php
		$email_form = '<form class="contact-form" method="post" action="'.get_permalink().'">
			<div class="contact-form">
				<div class="grid one-half">
					<input class="contact-form__name" name="contact-name" type="text" placeholder="'.$label_name.'" />
				</div>
				<div class="grid one-half">
					<input class="contact-form__mail" name="contact-mail" type="text" placeholder="'.$label_email.'" />
				</div>
				<div class="grid one-whole">
					<textarea class="contact-form__message" name="contact-message" placeholder="'.$label_message.'"></textarea>
					<input type="submit" value="'.$label_submit.'" name="contact-send" class="btn btn-send">
				</div>
			</div>
		</form>
	</div> <!-- END GRID WRAPPER -->';
	
	if($sent == true) {
		echo '<h3>'.$success.'</h3>';
	} else {
	?>
		<div class="grid-wrapper">
			<div class="grid one-whole">
				<?php echo $info; ?>
			</div>
		</div>
		<div class="grid-wrapper">
			<div class="grid two-thirds palm-one-whole">
				<h2 class="contact-headline">If you would like to<span class="font-bold"> hire me</span> or just want to get in touch</h2>
			</div>
			<div class="grid three-fifths palm-one-whole">
				<img src="<?php bloginfo('template_directory'); ?>/_/img/icon_dropmealine.png" class="contact-dropmealine" alt="Drop Me A Line"><br />
			</div>
			<div class="grid one-third lap-two-fifths hide--palm">
				<div class="contact-christoph-wrapper">
					<img src="<?php bloginfo('template_directory'); ?>/_/img/icon_christoph.png" class="contact-christoph" alt="Image of myself">
				</div>
			</div>
	<?php
		return $email_form;
	}
} add_shortcode('contact', 'wptuts_contact_form_sc');

?>