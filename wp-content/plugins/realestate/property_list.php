<?php
$wp_list_table = _get_list_table('WP_Posts_List_Table'); 

$post_new_file = "admin.php?page=property_add";


class My_Example_List_Table extends WP_List_Table {

    function __construct(){
    global $status, $page;

        parent::__construct( array(
            'singular' => __( 'agent', 'mylisttable' ), //singular name of the listed records
            'plural' => __( 'agents', 'mylisttable' ), //plural name of the listed records
            'ajax' => '' //does this table support ajax?
    ) );
    }

  function column_default( $item, $column_name ) {
    switch( $column_name ) {
        case 'property_id':
        case 'agent_name':
        case 'agent_email':
            return $item[ $column_name ];
        default:
            return print_r( $item, true ) ; //Show the whole array for troubleshooting purposes
    }
  }

function get_columns(){
        $columns = array(
            'cb' => '<input type="checkbox" />',
		    'property_id' => __( 'Property ID', 'mylisttable' ),
            'traction_type' => __( 'Traction Type', 'mylisttable' ),
            'date_added' => __( 'Date Added', 'mylisttable' )
        );
         return $columns;
    }
function prepare_items() {
  $per_page = 10;
  $columns = $this->get_columns();
  $hidden = array();
  //$sortable = array("agent_name");
  $sortable = $this->get_sortable_columns();
  $this->get_bulk_actions = $this->get_bulk_actions();
 
  $this->_column_headers = array( $columns, $hidden, $sortable );
  $this->items = $this->prepare_data();
  $this->column_booktitle = $this->column_booktitle($this->items); 
 $current_page = $this->get_pagenum();
 $total_items = count($this->items);
// only ncessary because we have sample data
 $this->found_data = array_slice($this->items,(($current_page-1)*$per_page),$per_page);
 $this->set_pagination_args( array(
	'total_items' => $total_items, //WE have to calculate the total number of items
	'per_page' => $per_page //WE have to determine how many items to show on a page
) );
  
  $this->items = $this->found_data;
 
}

function prepare_data() {
  global $wpdb;
  $sql = "SELECT *FROM ".PRO_TABLE_PREFIX."property where  1";
  $results = $wpdb->get_results($sql, "ARRAY_A");
  usort( $results, array( &$this, 'usort_reorder' ) );
  
  $this->example_data = $results;
  
  return  $this->example_data;	
}

function get_sortable_columns() {
	$sortable_columns = array(
	'property_id' => array('property_id',false),
	'agent_name' => array('agent_name',false),
	'agent_email' => array('agent_email',false)
	);
	return $sortable_columns;
}

 function get_bulk_actions() {
    $actions = array(
    'delete' => 'Delete'
    );
    return $actions;
 }

 function column_cb($item) {
    return sprintf(
    '<input type="checkbox" name="book[]" value="%s" />', $item['property_id']
    );
 }
 
  function usort_reorder( $a, $b ) {
    // If no sort, default to title
    $orderby = ( ! empty( $_GET['orderby'] ) ) ? $_GET['orderby'] : 'agent_name';
    // If no order, default to asc
    $order = ( ! empty($_GET['order'] ) ) ? $_GET['order'] : 'asc';
    // Determine sort order
    $result = strcmp( $a[$orderby], $b[$orderby] );
    // Send final sort direction to usort
    return ( $order === 'asc' ) ? $result : -$result;
  }
  
  function column_booktitle($item) {
    $actions = array(
    'edit' => sprintf('<a href="?page=%s&action=%s&book=%s">Edit</a>',$_REQUEST['page'],'edit',$item['property_id']),
    'delete' => sprintf('<a href="?page=%s&action=%s&book=%s">Delete</a>',$_REQUEST['page'],'delete',$item['property_id']),
    );
    return sprintf('%1$s %2$s', $item['property_id'], $this->row_actions($actions) );
  } 


} //class

//function my_render_list_page(){
  $myListTable = new My_Example_List_Table();
  echo '</pre><div class="wrap">
	   <!-- <form method="post">
   <p class="search-box">
    <label class="screen-reader-text" for="search_id-search-input">
    search:</label>
    <input id="search_id-search-input" type="text" name="s" value="" />
    <input id="search-submit" class="button" type="submit" name="" value="search" />
    </p>
    </form>-->
	
	<h2>Property Listing'.esc_html( $post_type_object->labels->name ).'<a href="'.$post_new_file.'" class="add-new-h2">Add New</a></h2>';
  $myListTable->prepare_items();
  $myListTable->display();
 
  echo '</div>';
//}