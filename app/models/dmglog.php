<?php
require('/db.php');
Class Dmglog {

public var int ID;
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
	
	public function setDateCreated($dateCreated){
		$dateCreated = $this->dateCreated;
	}

	public function getDateCreated(){
		return $this->dateCreated
	}
	
	public insertDmgLog(){
		$sql = "INSERT(".$this->dateCreated.",".$this->damageType.",".$this->shooterSteamID.",".$this->shooterName.",".$this->shooterFaction.",".$this->shooterPos.",".$this->targetSteamID.",".$this->$targetName.",".$this->targetFaction.",".$this->targetPos.",".$this->weapon.",".$this->distance.",".$this->damage.",".$this->melee.",".$this->headshot.",".$this->kill.",".$this->part.",".$this->hitType.",".$this->projectile.") INTO DmgLog";
		$db->insert($sql);	
	}
	
	public getDmgLogById($ID){
		$sql = "SELECT ID,dateCreated,damageType,shooterSteamID,shooterName,shooterFaction,shooterPos,targetSteamID,targetName,targetFaction,targetPos,weapon,distance FROM DmgLog WHERE ID=". .";
	}
	public search
}
  
