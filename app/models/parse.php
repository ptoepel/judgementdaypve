<?php

Class Parse 
{
	private $cells;
	private $table;
	
	//$cells = getFile();
	if( $this->cells !== NULL ){
		$table = "<table id='myTable'>";
		$table .="<tr>";
		foreach($cells as $key => $row){		
			if($key == 0){
				foreach($row as $k => $r){
					$incident = explode(":",$r);
					if($k !=0){
						$table .= "<th>$incident[0]</th>";
					}
				}
			}
		}
		$table .="</tr>";
		foreach($cells as $key => $row){		
			$table .="<tr>";		
			foreach($row as $k => $r){
				$incident = explode(":",$r);
				if($k != 0){ 
						$table .= "<td>$incident[1]</td>";
				}
			}
			$table .="</tr>";
		}
		$table .="</table>";
	}
	



}