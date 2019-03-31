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
              $db = new DB();
	}
	
	function setID(int $id){
		$this->ID = $id;
		$sql = "INSERT VALUE(ID) INTO DmgLog WHERE ID=" . $this->ID ."";
		unset($this->ID);
	    $result =  DB::query($sql);
		return $result;
	}

	function getDateCreated(int $id){
		$this->ID = $id;
		$sql = "SELECT DateCreated FROM DmgLog WHERE ID=" . $this->ID ."";
		$result =  DB::query($sql);
		return $result;
	}


	public function setDateCreated($dateCreated){
		$this->dateCreated = $dateCreated;
		$sql = "INSERT VALUE(DateCreated) INTO DmgLog WHERE ID=" . $this->dateCreated; ."";
		$result =  DB::query($sql);
		return $result;
	
	}

	public function getDateCreated(){
		return $this->dateCreated
	}
	
	public insertDmgLog(){
		$sql = "INSERT(".$this->dateCreated.",".$this->damageType.",".$this->shooterSteamID.",".$this->shooterName.",".$this->shooterFaction.",".$this->shooterPos.",".$this->targetSteamID.",".$this->$targetName.",".$this->targetFaction.",".$this->targetPos.",".$this->weapon.",".$this->distance.",".$this->damage.",".$this->melee.",".$this->headshot.",".$this->kill.",".$this->part.",".$this->hitType.",".$this->projectile.") INTO DmgLog";
		$db->insert($sql);	
	}
	
	public getDmgLogByID($ID){
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

	/* SOMETHING I HAVEN'T EVEN THOUGHT OF YET*/
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

}
  
