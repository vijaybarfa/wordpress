<?php 
/*
Plugin Name: Realestate plugin
Plugin URI: http://techlect.com/
Description: Realestate plugin
Author: vijay barfa
Version: 1.0.1
Author URI: http://techlect.com/
*/



$siteurl = get_option('siteurl');
define('PRO_FOLDER', dirname(plugin_basename(__FILE__)));
define('PRO_URL', $siteurl.'/wp-content/plugins/' . PRO_FOLDER);
define('PRO_FILE_PATH', dirname(__FILE__));
define('PRO_DIR_NAME', basename(PRO_FILE_PATH));
// this is the table prefix
global $wpdb;
$pro_table_prefix=$wpdb->prefix.'real_';
define('PRO_TABLE_PREFIX', $pro_table_prefix);



register_activation_hook(__FILE__,'pro_install');
register_deactivation_hook(__FILE__ , 'pro_uninstall' );

function pro_install()
{
    global $wpdb;
    $table = PRO_TABLE_PREFIX."property";
    $structure = "CREATE TABLE $table (
  `property_id` int(10) NOT NULL AUTO_INCREMENT,
  `agent_id` int(10) NOT NULL COMMENT 'admin_id or agent_id ',
  `traction_type` tinyint(3) NOT NULL COMMENT '0 for buy and 1 for rent',
  `property_type_id` int(10) NOT NULL COMMENT 'reference from tbl_property_type',
  `furnished` int(10) NOT NULL DEFAULT '0' COMMENT '1 for Unfurnished, 2 for Furnished, 3 for Part furnished, 4 for Furnished/Unfurnished',
  `beds` int(10) DEFAULT NULL,
  `date_added` datetime NOT NULL,
  `budget` float(10,2) NOT NULL,
  `super_area` int(10) NOT NULL,
  `state_id` int(10) NOT NULL,
  `country_id` int(10) NOT NULL,
  `latitude` varchar(15) NOT NULL,
  `longitude` varchar(15) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `property_video` varchar(250) DEFAULT NULL,
  `property_iphone_video` varchar(250) DEFAULT NULL,
  `exclude` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 for non and 1 for yes',
  `video_desc` text,
  PRIMARY KEY (`property_id`)
);";
    $wpdb->query($structure);
	
	
	
 $table1 = PRO_TABLE_PREFIX."property_type";
	
 $structure1 = "CREATE TABLE IF NOT EXISTS $table1 (
  `property_type_id` int(10) NOT NULL AUTO_INCREMENT,
  `property_type` varchar(50) NOT NULL,
  PRIMARY KEY (`property_type_id`)
);";
	 $wpdb->query($structure1);
	 
	 
 $table2 = PRO_TABLE_PREFIX."property_images";
	
 $structure2 = "CREATE TABLE IF NOT EXISTS $table2 (
  `image_Id` int(10) NOT NULL AUTO_INCREMENT,
  `property_id` int(10) NOT NULL,
  `image_name` varchar(250) NOT NULL,
  `date_added` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`image_Id`)
);";
	 $wpdb->query($structure2);
	 
 $table3 = PRO_TABLE_PREFIX."save_property";
	
 $structure3 = "CREATE TABLE IF NOT EXISTS $table3 (
  `save_property_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`save_property_id`)
);";
	 $wpdb->query($structure3);	 
	 
	 

	
	  // Populate table
   // $wpdb->query("INSERT INTO $table(name, website, description)
        //VALUES('Pro Questions', 'pro-questions.com','This Is A Programming Questions Site')");
}
function pro_uninstall()
{
    global $wpdb;
    $table = PRO_TABLE_PREFIX."property";
    $structure = "drop table if exists $table";
    $wpdb->query($structure);  
	
	$table1 = PRO_TABLE_PREFIX."property_type";
    $structure1 = "drop table if exists $table1";
    $wpdb->query($structure1);  
	
	$table2 = PRO_TABLE_PREFIX."property_images";
    $structure2 = "drop table if exists $table2";
    $wpdb->query($structure2);
	
	$table3 = PRO_TABLE_PREFIX."save_property";
    $structure3 = "drop table if exists $table3";
    $wpdb->query($structure3);    
	
	
}

if (is_admin())
	require_once dirname( __FILE__ ) . '/admin.php';

