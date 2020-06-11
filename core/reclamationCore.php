<?PHP
include "../config.php";
class reclamationCore {
function afficherreclamations ($reclamation){
		echo "idavis: ".$reclamation->getidavis()."<br>";
		echo "idp: ".$reclamation->getidrec()."<br>";
		echo "idclient: ".$reclamation->getmessage()."<br>";
		}

function ajouterreclamation($reclamation){
		$sql="insert into reclamation (idavis,idrec,message) values (:idavis,:idrec,:message)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
        $idavis=$reclamation->getidavis();
        $idrec=$reclamation->getidrec();
        $message=$reclamation->getMessage();
      		$req->bindValue(':idavis',$idavis);
		$req->bindValue(':idrec',$idrec);
		$req->bindValue(':message',$message);
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function afficherreclamation(){
		$sql="SElECT * From reclamation";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimerreclamation($idavis){
		$sql="DELETE FROM reclamation where idavis=:idavis";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':idavis',$idavis);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function modifierreclamation($reclamation,$idavis){
		$sql="UPDATE reclamation SET idavis=idavis,idrec=:idrec,message=:message WHERE idavis=:idavis";
		
		$db = config::getConnexion();
try{		
        $req=$db->prepare($sql);
        $idavis=$reclamation->getidavis();
        $idrec=$reclamation->getidrec();
        $message=$reclamation->getMessage();
		$datas = array(':idavis'=>$idavis, ':idavis'=>$idavis, ':idrec'=>$idrec,':message'=>$message);
		$req->bindValue(':idavis',$idavis);
		$req->bindValue(':idavis',$idavis);
		$req->bindValue(':idrec',$idrec);
		$req->bindValue(':message',$message);
		
		
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}
	function recupererreclamation($idavis){
		$sql="SELECT * from reclamation where idavis=$idavis";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}

}

?>