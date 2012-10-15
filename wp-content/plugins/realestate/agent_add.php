 <?php 
 
if(isset($_POST['submit']) && $_POST['submit'] == "Submit"){
	
	global $wpdb;
	
	$data['agent_name']  = $_POST['agent_name'];
	$data['agent_email'] = $_POST['aqgent_email'];
	
	
	$wpdb->insert( PRO_TABLE_PREFIX."agent", $data); 
 
}
 ?> 




<div class="wrap">
	   <!-- <form method="post">
   <p class="search-box">
    <label class="screen-reader-text" for="search_id-search-input">
    search:</label>
    <input id="search_id-search-input" type="text" name="s" value="" />
    <input id="search-submit" class="button" type="submit" name="" value="search" />
    </p>
    </form>-->
	
	<h2>Agent Add</h2>
  </div>
  
 <form action="" method="post" id="commentform">
   <p>
       <input name="agent_name" id="agent_name" value="" size="22" tabindex="1" type="text">
          <label for="author">
             <small>Name (required)</small>
          </label>
   </p>
   <p>
       <input name="aqgent_email" id="aqgent_email" value="" size="22" tabindex="2" type="text">
          <label for="email">
              <small>Mail (will not be published) required)</small>
          </label>
   </p>
   <p>
       <input name="url" id="url" value="" size="22" tabindex="3" type="text">
          <label for="url">
             <small>Website</small>
          </label>
   </p>
   <p>
       <small><strong>XHTML:</strong> You can use these
       tags:....</small>
   </p>
   <p>
       <textarea name="comment" id="comment" cols="100" rows="10" tabindex="4">
       </textarea>
   </p>
   <p>
       <input name="submit" id="submit" tabindex="5" value="Submit" type="submit">
       <input name="comment_post_ID" value="1" type="hidden">
   </p>
</form>
</div>