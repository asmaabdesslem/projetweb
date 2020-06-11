<?php
class reclamation
{
	private $idavis;
	private $idrec;
    private $message;
	


function __construct($idavis,$idrec,$message)
	{
		$this->idavis=$idavis;
		$this->idrec=$idrec;
		$this->message=$message;
		
	
		
	}
function getidavis(){
	return $this->idavis;
}

function getidrec()
{
	return $this->idrec;
}

function getmessage()
{
	return $this->message;
}}