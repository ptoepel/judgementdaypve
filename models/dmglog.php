<?php

Class Dmglog {

public var date dateCreated {get; set;};
public var string damageType {get; set;};
public var int shooterSteamID {get; set;};
public var string shooterName {get; set;};
public var string shooterFaction {get; set;};
public var string shooterPos {get; set;};
public var int targetSteamID {get; set;};
public var string targetName { get; set;};
public var string targetFaction {get; set;}
public var string  targetPos { get; set;}
public var string weapon { get; set;}
public var string distance {get; set;}
public var string damage { get; set;}
public var string melee {get; set;}
public var string headshot { get; set;}
public var string kill { get; set;}
public var string part {get; set;}
public var string hitType { get; set;}
public var string projectile { get; set;}
    
    public function __construct() {

        };


}
  
