<?php
add_action('admin_menu','pro_admin_menu');
function pro_admin_menu() { 
	add_menu_page(
		"All Property",
		"Property",
		"property_list",
		"property_list",
		"property_list",
		PRO_URL."/images/menu.gif",100
	);  
	add_submenu_page('property_list','Property Add','Property Add','property_add','admin.php?page=property_add');
	/*add_submenu_page(__FILE__,'Agent List','Agent List','9','agent_list','agent_list');*/
	
} 

/**/add_action('admin_menu', 'my_menu_page');
function my_menu_page(){
    add_plugins_page('Property Add', 'Property Add', 'read', 'property_add', 'property_add');
}






function property_list()
{
	 include 'property_list.php';
}
// function for the site listing
/*function agent_list()
{
	 include 'agent_list.php';
}


function agent_add()
{
	 include 'agent_add.php';
}*/




function property_add(){

	 include 'property_add.php';
}






/*switch ( $_REQUEST['page'] ) {
	case 'agent_add':
		include 'agent_add.php';
		break;
	case 'property_add':
		include 'property_add.php';
		break;
}*/




