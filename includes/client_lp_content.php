<?php 

require_once(LIB_PATH.DS.'database.php');

class ClientLpContent extends DatabaseObject{
	
	protected static $table_name="clientlp_content";
	public $id;
	public $salesrep_id;
	public $temp_salesrep_id;
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
		$temp_salesrep_id = $database->escape_value($this->temp_salesrep_id);
		$title = $database->escape_value($this->title);
		$content_header = $database->escape_value($this->content_header);
		$content = $database->escape_value($this->content);
		$box1_header = $database->escape_value($this->box1_header);
		$box1_content = $database->escape_value($this->box1_content);
		$box2_header = $database->escape_value($this->box2_header);
		$box2_content = $database->escape_value($this->box2_content);
		$box3_header = $database->escape_value($this->box3_header);
		$box3_content = $database->escape_value($this->box3_content);
		$from_id = $database->escape_value($this->from_id);
		$footer = $database->escape_value($this->footer);
		
		
		$sql="INSERT INTO clientlp_content (clientlp_id, salesrep_id, temp_salesrep_id, title, content_header, content, box1_header, box1_content, box2_header, box2_content, box3_header, box3_content, from_id, footer) VALUES ('{$clientlp_id}', '{$salesrep_id}', '{$temp_salesrep_id}', '{$title}', '{$content_header}', '{$content}', '{$box1_header}', '{$box1_content}', '{$box2_header}', '{$box2_content}', '{$box3_header}', '{$box3_content}', '{$from_id}', '{$footer}')";
		
		if($database->query($sql)){
			return $database->insert_id();	
		}else{
			return false;
		}
	}
	
	
	
	public function update_c_lp_content_info(){
		global $database;
		$clientlp_id = $database->escape_value($this->clientlp_id);
		$salesrep_id = $database->escape_value($this->salesrep_id);
		$temp_salesrep_id = $database->escape_value($this->temp_salesrep_id);
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
		$count = $database->escape_value($this->count);
		$one = $database->escape_value($this->one);
		$two = $database->escape_value($this->two);
		$three = $database->escape_value($this->three);
		$four = $database->escape_value($this->four);
		$five = $database->escape_value($this->five);
		$six = $database->escape_value($this->six);
		$complete = $database->escape_value($this->complete);
		$review = $database->escape_value($this->review);
		$from_id = $database->escape_value($this->from_id);
		$time_created = $database->escape_value($this->time_created);
		$id = $database->escape_value($this->id);
		
		
		 
		$sql  = "UPDATE clientlp_content SET clientlp_id='{$clientlp_id}', salesrep_id='{$salesrep_id}', temp_salesrep_id='{$temp_salesrep_id}', ";
		$sql .= "title='{$title}', content_header='{$content_header}', content='{$content}', time_created='{$time_created}', ";
		$sql .= "complete='{$complete}', review='{$review}', ";
		$sql .= "box1_header='{$box1_header}' ,box1_content='{$box1_content}', box2_header='{$box2_header}', box2_content='{$box2_content}', box3_header='{$box3_header}', box3_content='{$box3_content}', footer='{$footer}', ";
		$sql .= "count='{$count}' ,one='{$one}', two='{$two}', three='{$three}', four='{$four}', five='{$five}', six='{$six}' ";
		$sql .= "WHERE id={$id}";
		
		$database->query($sql);
		return ($database->affected_rows() == 1) ? true : false;
	}
	
	
	
	public static function find_all_user_c_lp_content($id=""){
		global $database;
		$sql = "SELECT * from clientlp_content WHERE salesrep_id='{$id}' ORDER BY id DESC ";
		
		return static::find_by_sql($sql);	
	}
	

		public static function search_c_lp($search_term="", $id=""){
		global $database;
		$sql = "SELECT * FROM  clientlp_content WHERE (id LIKE '%$search_term%')";
		$sql .= " AND (salesrep_id={$id}) ORDER BY id DESC";
		
		return static::find_by_sql($sql);
	}
	
	
	
	
}
?>