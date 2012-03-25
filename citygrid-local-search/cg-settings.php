<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
	
	update_option( 'publishercode', $_POST['publishercode']);
	
	// Get the old directory page ID
	$parent_page = get_page_by_title( get_option('directory_label') );	
	$parent_page_id = $parent_page->ID;
	update_option( 'directory_label', trim($_POST['directory_label']));	
	
	if ( $parent_page ) 
		{
	    $parent_page->post_title = trim($_POST['directory_label']);
	    
	    wp_update_post( $parent_page );

		}
		
	$parent_page = get_page_by_title( get_option('directory_label') );	
	$parent_page_id = $parent_page->ID;	
	
	update_option( 'show_ads', $_POST['show_ads']);
	
	}
?>

<div class="wrap">

<script type="text/javascript" src="http://static.citygridmedia.com/ads/scripts/v2/loader.js"></script>

<h2>CityGrid Hyp3rL0cal Search</h2>

<form method="post" action="">
    <?php
		settings_fields( 'cg-settings-group' );
	?>
    <table class="form-table">
    
        <tr valign="top">
        <th scope="row">CityGrid Publisher Code</th>
        <td>
        	<input type="text" name="publishercode" value="<?php echo get_option('publishercode'); ?>" />
        	A unique code assigned to you for tracking your calls to CityGrid API.  Obtain a publisher code by <a href="http://developer.citygridmedia.com/dashboard/registration">registering at CityGrid Developer Center</a>.
        </td>
        </tr>  
        
        <tr valign="top">
        <th scope="row">Menu Label</th>
        <td>
        	<input type="text" name="directory_label" value="<?php echo get_option('directory_label'); ?>" />
        	The name of the page that will be the top level menu name of your local directory.
        </td>
        </tr>   
        
        <tr valign="top">
        <th scope="row">Menu Page Text</th>
        <td>
        	<textarea cols="80" rows="10" name="directory_label"><?php echo get_option('directory_text'); ?></textarea>
        </td>
        </tr>          
        
        <tr valign="top">
        <th scope="row">Show Ads</th>
        <td>
        	<select name="show_ads">
        		<option value="yes"<?php if(get_option('show_ads')=='yes'){ ?> selected<?php } ?>>yes</option>
        		<option value="no"<?php if(get_option('show_ads')=='no'){ ?> selected<?php } ?>>no</option>
        	</select>
        	Whether you would like to show advertisements on your directory page.
        </td>
        </tr>        
        
    </table>
    
    <p class="submit">
    <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
    </p>

</form>
</div>