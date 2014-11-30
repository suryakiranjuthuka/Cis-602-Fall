<?php 

require_once(LIB_PATH.DS.'database.php');

class ClientLp extends DatabaseObject{
	
	protected static $table_name="clientlp";
	public $id;
	public $salesrep_id;
	public $client_name;
	public $email;
	public $t_o_c;
	public $p_t;
	public $leads;

	
	public function create_c_lp_template_info(){
		global $database;
		$client_name = $database->escape_value($this->client_name);
		$salesrep_id = $database->escape_value($this->salesrep_id);
		$email = $database->escape_value($this->email);
		
		
		$sql="INSERT INTO clientlp (client_name, salesrep_id, email) VALUES ('{$client_name}', '{$salesrep_id}', '{$email}')";
		
		if($database->query($sql)){
			return $database->insert_id();
		}else{
			return false;
		}
	}
	
	
	
	public function update_c_lp_template_info(){
		global $database;
		$client_name = $database->escape_value($this->client_name);
		$salesrep_id = $database->escape_value($this->salesrep_id);
		$email = $database->escape_value($this->email);
		$t_o_c = $database->escape_value($this->t_o_c);
		$p_t = $database->escape_value($this->p_t);
		$leads = $database->escape_value($this->leads);
		$id = $database->escape_value($this->id);
		 
		$sql  = "UPDATE clientlp SET client_name='{$client_name}', salesrep_id='{$salesrep_id}', ";
		$sql .= "email='{$email}', t_o_c='{$t_o_c}', ";
		$sql .= "p_t='{$p_t}', leads='{$leads}' ";
		$sql .= "WHERE id={$id}";
		
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