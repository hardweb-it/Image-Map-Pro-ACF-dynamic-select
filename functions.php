/* Copy and paste this code on your functions.php (theme file)
Remember to edit 'your_field_name' at line 33, with your real ACF Select field name!!

By setting the return value of your ACF field to 'value', you'll be able to get the shortcode working easily with the code:
$shortcode = get_field('your_field_name');
do_shortcode($shortcode);
*/


# READ ALL IMAGE MAP PRO PROJECTS
function hw_get_imagemappro_shortcodes() {
	if (class_exists('ImageMapPro')) {
		$imp_values = array(); //set the array
		$imp_options = get_option('image-map-pro-wordpress-admin-options', false); //get the image-map-pro options
		$saves = $imp_options['saves']; //get the option's saves index
		foreach($saves as $save_id=>$array) {
			$json_escape = str_replace('\\', '', $array['json']); //remove backslashes from json string
			$json_values = json_decode($json_escape, true); //convert json to associative array
			$shortcode = $json_values['general']['shortcode']; //get the shortcode name
			$name = $json_values['general']['name']; //get the project name
			$imp_values[$shortcode] = $name; //set the values to array
		}
	
	return $imp_values; //return the array if image map pro plugin is installed and actived
	
	} else {
		return array('-1'=>'Image Map Pro plugin is not installed or it's inactive'); //plugin is not active or it isn't installed
	}
}

# POPULATE THE CHOICE FIELD WITH IMAGE MAP PRO PROJECT'S VALUES
add_filter('acf/load_field/name=your_field_name', 'hw_acf_load_imagemappro_field_choices');
function hw_acf_load_imagemappro_field_choices( $field ) {
    // reset values inside select
    $field['choices'] = array();
	//get image map pro values
	$imp_values = hw_get_imagemappro_shortcodes();
    // if is array
    if( is_array($imp_values) ) {
        // while has rows
        foreach($imp_values as $id=>$name) { 
            // append the option
            $field['choices'][ $id ] = $name;
        }
    }
    // return the field
    return $field;
}
