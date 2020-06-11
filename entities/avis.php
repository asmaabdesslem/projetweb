<?php
class avis
{	private $note;
	private $idavis;
    private $idclient;



	function __construct($idavis,$idclient,$note)
	{ $this->note=$note;
		$this->idavis=$idavis;
		$this->idclient=$idclient;
	   
		
	}

	
	function getnote()
{
	return $this->note;
}

function getidavis(){
	return $this->idavis;
}



function getidclient()
{
	return $this->idclient;
}
function setnote($note)
{
	 $this->note=$note;
}
}
function setidavis($idavis)
{
	 $this->idavis=$idavis;
}




function setidclient($idclient)
{
	 $this->idclient=$idclient;
}


?>



