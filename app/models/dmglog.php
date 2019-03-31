<?php

Class Dmglog {

private $dateCreated;
private $damageType; 
private $shooterSteamID;
private $shooterName;
private $shooterFaction; 
private $shooterPos;
private $targetSteamID;
private $IDtargetName; 
private $targetFaction; 
private $targetPos;
private $weapon; 
private $distance; 
private $damage; 
private $melee; 
private $headshot; 
private $kill; 
private $part; 
private $hitType; 
private $projectile; 



    //Fields $this->dateCreated,$this->damageType,$this->shooterSteamID,$this->shooterName,$this->shooterFaction,$this->shooterPos,$this->targetSteamID,$this->$targetName,$this->targetFaction,$this->targetPos,$this->weapon,$this->distance,$this->damage,$this->melee,$this->headshot,$this->kill,$this->part,$this->hitType,$this->projectile
    public function __construct() {

	}
	
	function setID(int $id){
		$this->ID = $id;
		$sql = "INSERT VALUE(ID) INTO DmgLog WHERE ID=" . $this->ID ."";
		unset($this->ID);
		$result =  Database::query($sql);
		unset($sql);
		return $result;
	}

	function getCreatedDate(int $id){
		$this->ID = $id;
		$sql = "SELECT DateCreated FROM DmgLog WHERE ID=" . $this->ID ."";
		unset($this->ID);
		$result =  Database::query($sql);
		unset($sql);
		return $result;
	}


	function setCreatedDate($dateCreated){
		$this->dateCreated = $dateCreated;
		$sql = "INSERT VALUE(DateCreated) INTO DmgLog WHERE ID=" . $this->dateCreated;"";
		unset($this->dateCreated);
		$result =  Database::query($sql);
		unset($sql);
		return $result;
		unset($result);
	
	}


	function insertDmgLog($dateCreated,$damageType,$shooter){
		$sql = "INSERT(".$this->dateCreated.",".$this->damageType.",".$this->shooterSteamID.",".$this->shooterName.",".$this->shooterFaction.",".$this->shooterPos.",".$this->targetSteamID.",".$this->$targetName.",".$this->targetFaction.",".$this->targetPos.",".$this->weapon.",".$this->distance.",".$this->damage.",".$this->melee.",".$this->headshot.",".$this->kill.",".$this->part.",".$this->hitType.",".$this->projectile.") INTO DmgLog";

		unset($this->ID);
		$result =  Database::query($sql);
		unset($sql);
		return $result;
	}
	/*
	function getDmgLogByID($id){
		$sql = "SELECT ID,dateCreated,damageType,shooterSteamID,shooterName,shooterFaction,shooterPos,targetSteamID,targetName,targetFaction,targetPos,weapon,distance FROM DmgLog WHERE ID=". ."";
	}

	public searchByFilterValue($searchValue, $searchProperty){
		$searchValue= "";
		$searchProperty="";

		$sql = "SELECT * FROM DmgLog WHERE ". $searchProperty ."=". $searchValue ."";
	}

	public getAllDmgLogs(){

	}


	public emailDmgLogToUser(){

	}

	public getUserInLog(){

	}
		// SHOW WHERE THE SHOOTER SHOT FROM AND THE VICTIM THAT GOT HIT
	public showImageOfLocation($user,$yVictimCoords,$shooter,$yShooterCoordinates, $xShooterCoordinates,$xVictimCoords,$yVictimCoords){


	}

	//SHOW IMAGE OF GUN
	public showImageOfGun($gun){

	}

	//CLICKED ON A USER, SHOW PROFILE OF THAT USER
	public getProfileOfUser($userID){

	}

	public getFaction($factionID){

	}

	
	public carType($id){
		$this->ID = $id;
		$sql = "SELECT DateCreated FROM DmgLog WHERE ID=" . $this->ID ."";
	}


	public getPreviousWeek(){

	}


	public destroyDmgLog(){

	}

	public destroyDmgLogs(){
		
	}
*/
}
  
