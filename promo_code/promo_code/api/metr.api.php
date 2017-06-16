<?php

	class Metrik{

		private function connect_to_base(){
			$conf = (array)json_decode(file_get_contents('../api/.conf', FILE_USE_INCLUDE_PATH));
			$link = mysqli_connect($conf['host'],$conf['user'],$conf['password'],$conf['bd']);
			return $link;
		}

		private function close_connect_to_base($link){
			mysqli_close($link);
		}
		public function error(){
			echo json_encode(array('success'=>false,'error'=>($_POST['data'])));
			exit;
		}

		public function loading($str){
			$req = (array)json_decode($str);
			if (count($req) > 0){
				$this -> data = $req;
			}else $this->error();
		}
	 	function new_apl(){
	 		$link = $this->connect_to_base();
	 		if ( $this->data['count'] >= 0) $this->data['count'] = $this->data['count'] + 1;
	 		if ( $this->data['promo_code'] == 0)
	 		{
	 			$this->data['promo_code'] = mt_rand(100,1000);
	 		}

	 		$value_arr = "'".implode("','",$this->data)."'";
	 		$keys_arr = "`".implode('`,`',array_keys($this->data))."`";
			$conf = (array)json_decode(file_get_contents('../api/.conf', FILE_USE_INCLUDE_PATH));
			$sql = 'INSERT INTO `'.$conf['table'].'` ('.$keys_arr.') VALUES ('.$value_arr.')';
			mysqli_query($link,$sql);

	 		$this->close_connect_to_base($link);
	 		echo json_encode(array('success'=>true,'action'=>true,'count'=>$this->data['count'],'promo_code' => $this->data['promo_code']));
	 	}
	 	public function page($p){
			$promo_code = false;
		if (isset($p['promo_code']))
			{
				$promo_code = $p['promo_code'];
			}

	 		$link = $this->connect_to_base();
			$promo_code_query = '';

			if (!(isset($p['start']) && $p['start']) && isset($p['end']) && $p['end']){
				$promo_code_query .= " `data_time` <= '".$p['end']." 23:59:59' ";
			}
			if (isset($p['start']) && $p['start'] && !(isset($p['end']) && $p['end'])){
				$promo_code_query .= " `data_time` >= '".$p['start']." 00:00:00' ";
			}
			if (isset($p['start']) && $p['start'] && isset($p['end']) && $p['end']){
				$promo_code_query .= " `data_time` >= '".$p['start']." 00:00:00' AND  `data_time` <= '".$p['end']." 23:59:59' ";
			}
			if (!isset($p['type']) || $p['type'] == 'normal'){
				$field = '`id`,`promo_code`,`data_time`,`refer`,`enter_page`,`ip`,`city`,`refer_key`,`chanel`,`count`,`browser`,`device`,`returned`,`first_answer`,`other`';
			}
			if (isset($p['type']) && $p['type'] == 'checkbox_info'){
				$field = ' `id`,`first_answer` ';
				if ($promo_code_query)
					$promo_code_query .= " AND `first_answer` is not NULL  AND `first_answer` != '' ";
				else
					$promo_code_query .= " `first_answer` is not NULL AND `first_answer` != '' ";
			}
			if (isset($p['type']) && $p['type'] == 'other'){
				$field = '`id`,`promo_code`,`data_time`,`refer`,`enter_page`,`ip`,`city`,`refer_key`,`chanel`,`other`';
				if ($promo_code_query)
					$promo_code_query .= " AND `other` is not NULL  AND `other` != '' ";
				else
					$promo_code_query .= " `other` is not NULL AND `other` != '' ";
			}

	 		if ($promo_code){
				if ($promo_code_query) $promo_code_query .= " AND `promo_code` = '".$promo_code."' "; else $promo_code_query .= "  `promo_code` = '".$promo_code."' ";
			}
			if ($promo_code_query) $promo_code_query = 'WHERE '.$promo_code_query;
			//echo $promo_code_query;

	 		$sql = 'SELECT '.$field.' FROM `application` '.$promo_code_query.' ORDER BY `id` DESC LIMIT 150 	';
			//echo $sql;
			$result = mysqli_query($link,$sql);
	 		$r = '';

			if (isset($p['type']) && $p['type'] == 'checkbox_info'){
				$z = array();
				while ($line = mysqli_fetch_assoc($result)) {
					$line = $line['first_answer'];
					$line = (array)json_decode($line);
					//print_r($line);
					foreach ($line as $key => $value) {
						if ($value)
						{
							if (isset($z[$key])) $z[$key]++;
							else{
								$z[$key] = 1;
							}
						}
					}
				}
				foreach ($z as $key => $value) {
					$r .= '<tr><td>'.$key.'</td><td>'.$value.'</td></tr>';
				}
			}else{
				while ($line = mysqli_fetch_row($result)) {
					//var_dump($line);
					//echo "<br>";
					$r = $r."\t<tr>\n";
					foreach ($line as $col_value) {
						$r = $r."\t\t<td><div>$col_value</div></td>\n";
					}
					$r = $r."\t</tr>\n";
				}
			}
			$this->close_connect_to_base($link);
			if ($r) return  $r; else return '<tr><td>Нет данных</td></tr>';
	 	}

		public function validation(){
			if (!(count($this->data) > 0) and !($this->data['ip']))
			{
				$this->error();
			}//else echo 'ok';
		}

	}


	if (isset($_POST['data']) && count($_POST['data'])){
		$page = new Metrik();
		$req = $_POST['data'];
		//Работает echo $page->page();
		$page->loading($req);
		$page->validation();
		$page->new_apl();
	}
?>
