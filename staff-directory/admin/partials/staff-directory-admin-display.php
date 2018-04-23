<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       twestfall2763.sb.cis
 * @since      1.0.0
 *
 * @package    Staff-Directory
 * @subpackage Staff-Directory/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<?php
	global $post;
	$custom = get_post_custom($post->ID);
	

	
	$staff_directory_first_name = $custom["staff_directory_first_name"][0];
	$staff_directory_last_name = $custom["staff_directory_last_name"][0];
	$staff_directory_email = $custom["staff_directory_email"][0];
	$staff_directory_phone = $custom["staff_directory_phone"][0];
	$staff_directory_job = $custom["staff_directory_job"][0];
	$staff_directory_sort_order = $custom["staff_directory_sort_order"][0];
	$staff_directory_biography = $custom["staff_directory_biography"][0];
	$staff_directory_full_bio = $custom["staff_directory_full_bio"][0];
	
	


	 ?>

<fieldset class = "outer">
<legend>Staff Directory Fields</legend>
	<label class="staff-directory-label">First Name:</label>
	<input class="staff-directory-input"  name="staff_directory_first_name" type="text" value="<?php echo $staff_directory_first_name; ?>"  required /><br>
	<label class="staff-directory-label">Last Name:</label>
	<input class="staff-directory-input"  name="staff_directory_last_name" type="text" value="<?php echo $staff_directory_last_name; ?>"  required /><br>
	<label class="staff-directory-label">Email:</label>
	<input class="staff-directory-input"  name="staff_directory_email" type="text" value="<?php echo $staff_directory_email; ?>"  required /><br>
	<label class="staff-directory-label">Phone:</label>
	<input class="staff-directory-input"  name="staff_directory_phone" type="text" value="<?php echo $staff_directory_phone; ?>"  required /><br>
	<label class="staff-directory-label">Job Position:</label>
	<input class="staff-directory-input"  name="staff_directory_job" type="text" value="<?php echo $staff_directory_job; ?>"  required /><br>
	<label class="staff-directory-label">Sort Order:</label>
	<input class="staff-directory-input"  name="staff_directory_sort_order" type="text" value="<?php echo $staff_directory_sort_order; ?>"  required /><br>
	<label class="staff-directory-label">Short Biography:</label>
	<textarea class="staff-directory-input"  name="staff_directory_biography"  rows="5" cols="80"  required > <?php echo $staff_directory_biography; ?> </textarea><br>
	<label class="staff-directory-label"> Full Biography:</label>
	<textarea class="staff-directory-input"  name="staff_directory_full_bio"  rows="5" cols="80"  required > <?php echo $staff_directory_full_bio; ?> </textarea><br>


	
	
	
	
	
	
	</fieldset>