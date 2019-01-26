<?php

class Single {
// https://github.com/zyberspace/php-steam-web-api-client
public $cells = array();

public function getFile() {

  $file = explode("\n", file_get_contents('http://localhost/miscreated-dmg-log-dashboard/app/dmg-log/damagelog_2018-01-26.txt', true));
  foreach($file as $key => $row){
      $cells[] = explode(", ",$row);
  }
  return $cells;
}

// Return a table of Raw Data
public function getRaw() {
$cells = $this->getFile();
	if($cells != null){
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


return $table;
}

// Return the name of the player with the top kills


public function topKills() {
  $cells = $this->getFile();
  $killcount = array();
  $killerarray = array();
  $killer = array();
  if($cells != null){
      foreach($cells as $key => $row){
        foreach($row as $k =>$r){
        	if($k == 13){
	           	$values = explode(':', $r);
	          	$kill =  str_replace('"','',$values[1]);
	          	$kill =  str_replace('"','',$kill);
	          	$kill = intval($kill);
	          	if($kill == 1){
					 //If there is a kills on this record
					$killcount = array();
					$values = explode(':', $row[1]);
					array_push($killer,str_replace('"','',$values[1]));
					$killerarray = array_count_values($killer);
					arsort($killerarray);
	           	}else{
					continue;
				}

       		}
		}
	}
	$table = "<table id='myTable'>";
	$table .="<tr>";
	$table .="<th>Player Name</th><th>Kill Count</th>";
	$table .="</tr>";
	$table .="<tr>";
	foreach($killerarray as $key => $row){
		$table .= "<tr><td>$key</td><td>$row</td></tr>";
	}
	$table .="</tr>";
	$table .="</table>";
	}


  return $table;
}
}






 ?>
