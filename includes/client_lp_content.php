<?php 

require_once(LIB_PATH.DS.'database.php');

class ClientLpContent extends DatabaseObject{
	
	protected static $table_name="clientlp_content";
	public $id;
	public $salesrep_id;
	public $clientlp_id;
	public $time_created;
	public $complete;
	public $review;
	public $from_id;
	public $one;
	public $two;
	public $three;
	public $four;
	public $five;
	public $six;
	public $count;
	public $title;
	public $content_header;
	public $content;
	public $box1_header;
	public $box1_content;
	public $box2_header;
	public $box2_content;
	public $box3_header;
	public $box3_content;
	public $footer;

	
	public function create_c_lp_content_info(){
		global $database;
		$clientlp_id = $database->escape_value($this->clientlp_id);
		$salesrep_id = $database->escape_value($this->salesrep_id);
		$title = $database->escape_value($this->title);
		$content_header = $database->escape_value($this->content_header);
		$content = $database->escape_value($this->content);
		$box1_header = $database->escape_value($this->box1_header);
		$box1_content = $database->escape_value($this->box1_content);
		$box2_header = $database->escape_value($this->box2_header);
		$box2_content = $database->escape_value($this->box2_content);
		$box3_header = $database->escape_value($this->box3_header);
		$box3_content = $database->escape_value($this->box3_content);
		$footer = $database->escape_value($this->footer);
		
		
		$sql="INSERT INTO clientlp_content (clientlp_id, salesrep_id, title, content_header, content, box1_header, box1_content, box2_header, box2_content, box3_header, box3_content, footer) VALUES ('{$clientlp_id}', '{$salesrep_id}', '{$title}', '{$content_header}', '{$content}', '{$box1_header}', '{$box1_content}', '{$box2_header}', '{$box2_content}', '{$box3_header}', '{$box3_content}', '{$footer}')";
		
		if($database->query($sql)){
			return $database->insert_id();	
		}else{
			return false;
		}
	}
	
	
	
	public function update_c_lp_template_info(){
		global $database;
		$client_name = $database->escape_value($this->client_name);
		$website_url = $database->escape_value($this->website_url);
		$start_date = $database->escape_value($this->start_date);
		$expire_date = $database->escape_value($this->expire_date);
		$email = $database->escape_value($this->email);
		$notes = $database->escape_value($this->notes);
		$city = $database->escape_value($this->city);
		$state = $database->escape_value($this->state);
		$zip_code = $database->escape_value($this->zip_code);
		$google_ad = $database->escape_value($this->google_ad);
		$google_ad_setup = $database->escape_value($this->google_ad_setup);
		$page_complete = $database->escape_value($this->page_complete);
		$renewing_page = $database->escape_value($this->renewing_page);
		$leads = $database->escape_value($this->leads);
		$id = $database->escape_value($this->id);
		$salesrep_id = $database->escape_value($this->salesrep_id);
		 
		$sql  = "UPDATE clientlp SET client_name='{$client_name}', website_url='{$website_url}', ";
		$sql .= "start_date='{$start_date}', expire_date='{$expire_date}', ";
		$sql .= "email='{$email}', notes='{$notes}', ";
		$sql .= "city='{$city}', state='{$state}', ";
		$sql .= "zip_code='{$zip_code}', google_ad='{$google_ad}', ";
		$sql .= "google_ad_setup='{$google_ad_setup}', page_complete='{$page_complete}', renewing_page='{$renewing_page}', leads='{$leads}' ";
		$sql .= "WHERE id={$id} && salesrep_id={$salesrep_id}";
		
		$database->query($sql);
		return ($database->affected_rows() == 1) ? true : false;
	}
	
	
	
	public static function hide_c_lp_template_info($c_lp_id="",$current_user_id="", $c_lp_hide=""){
		global $database;
		$sql  = "UPDATE clientlp SET hidden={$c_lp_hide} WHERE id={$c_lp_id} && salesrep_id={$current_user_id}";
		
		$database->query($sql);
		return ($database->affected_rows() == 1) ? true : false;
	}
	
	
	
	public static function find_all_user_c_lp($id=""){
		global $database;
		$sql = "SELECT * from clientlp WHERE salesrep_id='{$id}' && hidden=0 ORDER BY id DESC ";
		
		return static::find_by_sql($sql);	
	}
	
	
	
	public static function search_c_lp($search_term="", $id="", $hidden=0){
		global $database;
		$sql = "SELECT * FROM  clientlp WHERE ((client_name LIKE '%$search_term%') OR (start_date LIKE '%$search_term%') OR (expire_date LIKE '%$search_term%') OR (email LIKE '%$search_term%') OR (website_url LIKE '%$search_term%') OR (city LIKE '%$search_term%') OR (state LIKE '%$search_term%') OR (zip_code LIKE '%$search_term%'))";
		$sql .= " AND ((salesrep_id={$id}) AND (hidden={$hidden})) ORDER BY id DESC";
		
		return static::find_by_sql($sql);
	}
	
	
	
	
}
?>