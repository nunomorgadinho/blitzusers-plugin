<?php
/*
Plugin Name: BlitzUsers
Plugin URI: http://blitzchiropracticmarketing.com
Description: Blitz User Management Utilities
Version: 0.1
Author: Blitz Chiropractic Marketing
Author URI: http://blitzchiropracticmarketing.com
*/

//Define plugin directories
define( 'WP_BLITZUSERS_URL', WP_PLUGIN_URL.'/'.plugin_basename(dirname(__FILE__)) );
define( 'WP_BLITZUSERS_DIR', WP_PLUGIN_DIR.'/'.plugin_basename(dirname(__FILE__)) );


add_action('admin_menu', 'blitzusers_add_pages');

function blitzusers_add_pages() 
{
	$title_dashboard = __('Dashboard', 'blitzusers');
	$title_profile	 = __('Blitz Profile', 'blitzusers');

	$page = add_menu_page('Blitz Marketing', 'Blitz Marketing', 'administrator', 'blitzusers', 'blitzusers_manage_page');
	add_submenu_page('blitzusers', $title_dashboard, $title_dashboard, 'administrator', 'blitzusers', 'blitzusers_manage_page');
	add_submenu_page('blitzusers', $title_profile, $title_profile, 'administrator', 'blitzprofile', 'blitzusers_manage_profile');


}

function blitzusers_manage_page()
{
	echo "<br/>Hello Doc,";
}

function blitzusers_manage_profile() 
{
	global $current_user;
	
	set_time_limit(0);
	$user_id = $current_user->ID;
	
	if (isset($_POST['action']) && $_POST['action'] == 'post') 
	{
		$doc_first_name = $_POST['doc_first_name'];
		$doc_last_name = $_POST['doc_last_name'];
		$practice_address = $_POST['practice_address'];
		$phone_number = $_POST['phone_number'];
		$city = $_POST['city'];
		$state = $_POST['state'];
		$state_abbr = $_POST['state_abbr'];
		$zip_code = $_POST['zip_code'];
		$services = $_POST['services'];
		$conditions = $_POST['conditions'];
		$twitter_user = $_POST['twitter_user'];
		$twitter_pass = $_POST['twitter_pass'];
		$youtube_user = $_POST['youtube_user'];
		$youtube_pass = $_POST['youtube_pass'];
		$facebook_user = $_POST['facebook_user'];
		$facebook_pass = $_POST['facebook_pass'];
		
		if (!empty($doc_first_name))
			update_usermeta( $user_id, "doc_first_name", $doc_first_name );
		if (!empty($doc_last_name))
			update_usermeta( $user_id, "doc_last_name", $doc_last_name );
		if (!empty($practice_address))
			update_usermeta( $user_id, "practice_address", $practice_address );
		if (!empty($phone_number))
			update_usermeta( $user_id, "phone_number", $phone_number );
		if (!empty($city))
			update_usermeta( $user_id, "city", $city );
		if (!empty($state))
			update_usermeta( $user_id, "state", $state );
		if (!empty($state_abbr))
			update_usermeta( $user_id, "state_abbr", $state_abbr );
		if (!empty($zip_code))
			update_usermeta( $user_id, "zip_code", $zip_code );
		if (!empty($services))
			update_usermeta( $user_id, "services", $services );
		if (!empty($conditions))
			update_usermeta( $user_id, "conditions", $conditions );
		if (!empty($twitter_user))
			update_usermeta( $user_id, "twitter_user", $twitter_user );
		if (!empty($twitter_pass))
			update_usermeta( $user_id, "twitter_pass", $twitter_pass );
		if (!empty($youtube_user))
			update_usermeta( $user_id, "youtube_user", $youtube_user );
		if (!empty($youtube_pass))
			update_usermeta( $user_id, "youtube_pass", $youtube_pass );
		if (!empty($facebook_user))
			update_usermeta( $user_id, "facebook_user", $facebook_user );
		if (!empty($facebook_pass))
			update_usermeta( $user_id, "facebook_pass", $facebook_pass );
	}
	
	?>

	<div class="wrap">
	<h2>Blitz Profile</h2>

	<div id="wpbody">	
	<ul id="adminmenu">
	<?php 
	echo "<br/>Hello Doc,<br/><br/>";

	echo "Username: <input type='text' disabled value='" . $current_user->user_login . "'><br/><br/>";
	
	echo "E-Mail: <input type='text' size='25' disabled value='" . $current_user->user_email . "'><br/><br/>";
	  	
	$single = true;
  	$_POST["doc_first_name"] = get_usermeta( $user_id, "doc_first_name", $single);
	?>
	
	<form action="" method="post" enctype="multipart/form-data" id="new_post2" name="new_post2">
	<input type="hidden" name="action" value="post" />
	<label for="doc_first_name"><?php _e('First Name'); ?></label>
	<input name="doc_first_name" type="text" size="50" id="doc_first_name" value="<?php echo get_usermeta( $user_id, "doc_first_name", $single); ?>"></input>
	<label for="doc_last_name"><?php _e('Last Name'); ?></label>
	<input name="doc_last_name" type="text" size="50" id="doc_last_name" value="<?php echo get_usermeta( $user_id, "doc_last_name", $single); ?>"></input>
	<label for="practice_address"><?php _e('Practice Address'); ?></label>
	<textarea name="practice_address" type="text" rows="5" wrap="soft" id="practice_address_id"/><?php echo get_usermeta( $user_id, "practice_address", $single); ?></textarea>
	<label for="phone_number"><?php _e('Phone Number'); ?> </label>
	<input name="phone_number" type="text" id="phone_number" value="<?php echo get_usermeta( $user_id, "phone_number", $single); ?>"></input>
	<label for="city"><?php _e('City'); ?></label>
	<input name="city" type="text" size="25" id="city" value="<?php echo get_usermeta( $user_id, "city", $single); ?>"></input>
	<label for="state"><?php _e('State'); ?></label>
	<input name="state" type="text" size="25" id="state" value="<?php echo get_usermeta( $user_id, "state", $single); ?>"></input>
	<label for="state_abbr"><?php _e('Two letter state'); ?></label>
	<input name="state_abbr" type="text" size="2" maxlength="2" id="state_abbr" value="<?php echo get_usermeta( $user_id, "state_abbr", $single); ?>"></input>
	<label for="zip_code"><?php _e('Zip Code'); ?></label>
	<input name="zip_code" type="text" size="10" id="zip_code" value="<?php echo get_usermeta( $user_id, "zip_code", $single); ?>"></input>
	<label for="services"><?php _e('Services'); ?></label>
	<input name="services" type="text" size="50" id="services" value="<?php echo get_usermeta( $user_id, "services", $single); ?>"></input>
	<label for="conditions"><?php _e('Conditions Treated'); ?></label>
	<input name="conditions" type="text" size="50" id="conditions" value="<?php echo get_usermeta( $user_id, "conditions", $single); ?>"></input>
	<label for="twitter_user"><?php _e('Twitter user/password'); ?></label>
	<input name="twitter_user" type="text" size="25" id="twitter_user"" value="<?php echo get_usermeta( $user_id, "twitter_user", $single); ?>"></input>
	<input name="twitter_pass" type="password" size="25" id="twitter_pass" value="<?php echo get_usermeta( $user_id, "twitter_pass", $single); ?>"></input>
	<label for="youtube_user"><?php _e('Youtube user/password'); ?></label>
	<input name="youtube_user" type="text" size="25" id="youtube_user" value="<?php echo get_usermeta( $user_id, "youtube_user", $single); ?>"></input>
	<input name="youtube_pass" type="password" size="25" id="youtube_pass" value="<?php echo get_usermeta( $user_id, "youtube_pass", $single); ?>"></input>
	<label for="facebook_user"><?php _e('Facebook user/password'); ?></label>
	<input name="facebook_user" type="text" size="25" id="facebook_user" value="<?php echo get_usermeta( $user_id, "facebook_user", $single); ?>"></input>
	<input name="facebook_pass" type="password" size="25" id="facebook_pass" value="<?php echo get_usermeta( $user_id, "facebook_pass", $single); ?>"></input>
	
	<br/><br/>
	<input type="submit" name="submit" value="Submit"></input>

	</form>
	</ul>
	</div>
	</div>

	<?php
	//print_r($current_user);
}


/*
 *
 *
 * SIGNUP FORM
 *
 *
 */
//add the extra fields here
//add_action('signup_extra_fields', 'my_extra_field');
add_action('signup_blogform', 'my_extra_field');

//validate the extra field
add_filter('wpmu_validate_blog_signup', 'my_validation');

//add the data to the userdata
add_filter('add_signup_meta','my_add_signup_meta');

function my_extra_field($errors) {
	$error = $errors->get_error_message('error-tag');
	
	if($error) {
		echo '<p class="error">' . $error . '</p>';
	} 
	
	?>
	<label for="doc_first_name"><?php _e('First Name'); ?></label>
	<input name="doc_first_name" type="text" size="50" id="doc_first_name" value="<?php echo $_POST["doc_first_name"]; ?>"></input>
	<label for="doc_last_name"><?php _e('Last Name'); ?></label>
	<input name="doc_last_name" type="text" size="50" id="doc_last_name" value="<?php echo $_POST["doc_last_name"]; ?>"></input>
	<label for="practice_address"><?php _e('Practice Address'); ?></label>
	<textarea name="practice_address" type="text" rows="5" wrap="soft" id="practice_address_id"/><?php echo $_POST["practice_address"]; ?></textarea>
	<label for="phone_number"><?php _e('Phone Number'); ?> </label>
	<input name="phone_number" type="text" id="phone_number" value="<?php echo $_POST["phone_number"]; ?>"></input>
	<label for="city"><?php _e('City'); ?></label>
	<input name="city" type="text" size="25" id="city" value="<?php echo $_POST["city"]; ?>"></input>
	<label for="state"><?php _e('State'); ?></label>
	<input name="state" type="text" size="25" id="state" value="<?php echo $_POST["state"]; ?>"></input>
	<label for="state_abbr"><?php _e('Two letter state'); ?></label>
	<input name="state_abbr" type="text" size="2" maxlength="2" id="state_abbr" value="<?php echo $_POST["state_abbr"]; ?>"></input>
	<label for="zip_code"><?php _e('Zip Code'); ?></label>
	<input name="zip_code" type="text" size="10" id="zip_code" value="<?php echo $_POST["zip_code"]; ?>"></input>
	<label for="services"><?php _e('Services'); ?></label>
	<input name="services" type="text" size="50" id="services" value="<?php echo $_POST["services"]; ?>"></input>
	<label for="conditions"><?php _e('Conditions Treated'); ?></label>
	<input name="conditions" type="text" size="50" id="conditions" value="<?php echo $_POST["conditions"]; ?>"></input>
	<label for="twitter_user"><?php _e('Twitter username/password (if you have one)'); ?></label>
	<input name="twitter_user" type="text" size="25" id="twitter_user"" value="<?php echo $_POST["twitter_user"]; ?>"></input>
	<input name="twitter_pass" type="password" size="25" id="twitter_pass" value="<?php echo $_POST["twitter_pass"]; ?>"></input>
	<label for="youtube_user"><?php _e('Youtube username/password (if you have one)'); ?></label>
	<input name="youtube_user" type="text" size="25" id="youtube_user" value="<?php echo $_POST["youtube_user"]; ?>"></input>
	<input name="youtube_pass" type="password" size="25" id="youtube_pass" value="<?php echo $_POST["youtube_pass"]; ?>"></input>
	<label for="facebook_user"><?php _e('Facebook username/password (if you have one)'); ?></label>
	<input name="facebook_user" type="text" size="25" id="facebook_user" value="<?php echo $_POST["facebook_user"]; ?>"></input>
	<input name="facebook_pass" type="password" size="25" id="facebook_pass" value="<?php echo $_POST["facebook_pass"]; ?>"></input>

	<?php
}

function my_validation($content) {

	$data = $_POST['practice_address'];
	if($data == '' && $_POST['stage'] == 'validate-blog-signup') {
		$content['errors']->add('error-tag', __('Please enter a practice address'));
	}
	$data = $_POST['doc_first_name'];
	if($data == '' && $_POST['stage'] == 'validate-blog-signup') {
		$content['errors']->add('error-tag', __('Please enter a first name'));
	}
	$data = $_POST['doc_last_name'];
	if($data == '' && $_POST['stage'] == 'validate-blog-signup') {
		$content['errors']->add('error-tag', __('Please enter a last name'));
	}	
	$data = $_POST['phone_number'];
	if($data == '' && $_POST['stage'] == 'validate-blog-signup') {
		$content['errors']->add('error-tag', __('Please enter a phone number'));
	}
	$data = $_POST['city'];
	if($data == '' && $_POST['stage'] == 'validate-blog-signup') {
		$content['errors']->add('error-tag', __('Please enter a city name'));
	}
	$data = $_POST['state'];
	if($data == '' && $_POST['stage'] == 'validate-blog-signup') {
		$content['errors']->add('error-tag', __('Please enter a state'));
	}
	$data = $_POST['state_abbr'];
	if($data == '' && $_POST['stage'] == 'validate-blog-signup') {
		$content['errors']->add('error-tag', __('Please enter a two-letter state abbr'));
	}
	$data = $_POST['zip_code'];
	if($data == '' && $_POST['stage'] == 'validate-blog-signup') {
		$content['errors']->add('error-tag', __('Please enter a zip code'));
	}
	$data = $_POST['services'];
	if($data == '' && $_POST['stage'] == 'validate-blog-signup') {
		$content['errors']->add('error-tag', __('Please enter a services description'));
	}
	$data = $_POST['conditions'];
	if($data == '' && $_POST['stage'] == 'validate-blog-signup') {
		$content['errors']->add('error-tag', __('Please enter a conditions description'));
	}

	return $content;
}

function my_add_signup_meta($meta) {
	$meta['practice_address'] = $_POST['practice_address'];
	$meta['doc_first_name'] = $_POST['doc_first_name'];
	$meta['doc_last_name'] = $_POST['doc_last_name'];
	$meta['phone_number'] = $_POST['phone_number'];
	$meta['city'] = $_POST['city'];
	$meta['state'] = $_POST['state'];
	$meta['state_abbr'] = $_POST['state_abbr'];
	$meta['zip_code'] = $_POST['zip_code'];
	$meta['services'] = $_POST['services'];
	$meta['conditions'] = $_POST['conditions'];
	$meta['twitter_user'] = $_POST['twitter_user'];
	$meta['twitter_pass'] = $_POST['twitter_pass'];
	$meta['youtube_user'] = $_POST['youtube_user'];
	$meta['youtube_pass'] = $_POST['youtube_pass'];
	$meta['facebook_user'] = $_POST['facebook_user'];
	$meta['facebook_pass'] = $_POST['facebook_pass'];
	return $meta;
}

?>