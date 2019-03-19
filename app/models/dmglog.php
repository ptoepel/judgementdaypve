<?php

Class Dmglog {


	_constructor(){
	}


private var ID;
public var date dateCreated;
public var string damageType; 
public var int shooterSteamID;
public var string shooterName;
public var string shooterFaction; 
public var string shooterPos;
public var int targetSteamID;
public var string targetName; 
public var string targetFaction; 
public var string targetPos;
public var string weapon; 
public var string distance; 
public var string damage; 
public var string melee; 
public var string headshot; 
public var string kill; 
public var string part; 
public var string hitType; 
public var string projectile; 



    //Fields $this->dateCreated,$this->damageType,$this->shooterSteamID,$this->shooterName,$this->shooterFaction,$this->shooterPos,$this->targetSteamID,$this->$targetName,$this->targetFaction,$this->targetPos,$this->weapon,$this->distance,$this->damage,$this->melee,$this->headshot,$this->kill,$this->part,$this->hitType,$this->projectile
    public function __construct() {
              $db = new DB();
	}
	
	public setID($id){
		$this->ID = $id;
		$sql = "INSERT VALUE(ID) INTO DmgLog WHERE ID=" . $this->ID ."";

	}

	public getDateCreated($id){
		$this->ID = $id;
		$sql = "SELECT DateCreated FROM DmgLog WHERE ID=" . $this->ID ."";
	}


	public function setDateCreated($dateCreated){
		$this->dateCreated = $dateCreated;
		$sql = "INSERT VALUE(DateCreated) INTO DmgLog WHERE ID=" . $this->dateCreated; ."";

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
  
