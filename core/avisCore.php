<?PHP
include "../config.php";
class avisCore {
function afficheraviss ($avis){
	echo "note: ".$avis->getnote()."<br>";
		echo "idavis: ".$avis->getidavis()."<br>";
		echo "idclient: ".$avis->getidclient()."<br>";
		
		}

function ajouteravis ($avis){
		$sql="insert into avis (idavis,idclient,note) values (:idavis,:idclient,:note)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		$note=$avis->getnote();
        $idavis=$avis->getidavis();
        $idclient=$avis->getidclient();
        	$req->bindValue(':note',$note);
      		$req->bindValue(':idavis',$idavis);
		$req->bindValue(':idclient',$idclient);
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function afficheravis(){
		$sql="SElECT * From avis";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimeravis($idavis){
		$sql="DELETE FROM avis where idavis=:idavis";
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
	function modifieravis($avis,$idavis){
		$sql="UPDATE avis SET idavis=idavis,idclient=:idclient,note=:note WHERE idavis=:idavis";
		
		$db = config::getConnexion();
try{		
        $req=$db->prepare($sql);
        $idavis=$avis->getidavis();
        $idclient=$avis->getidclient();
        $note=$avis->getnote();
		$datas = array(':idavis'=>$idavis, ':idavis'=>$idavis, ':idclient'=>$idclient,':note'=>$note);
		$req->bindValue(':idavis',$idavis);
		$req->bindValue(':idavis',$idavis);
		$req->bindValue(':idclient',$idclient);
		$req->bindValue(':note',$note);
		
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}
	function recupereravis($idavis){
		$sql="SELECT * from avis where idavis=$idavis";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function trieravis()
	{
  		$db = config::getConnexion();
       		$sql="SELECT * FROM avis order by note";
			  // $sql="SELECT * from avis where description LIKE '%$foo%' ";
		try{
 		$req=$db->prepare($sql);
 	    $req->execute();
 		$avis= $req->fetchALL(PDO::FETCH_OBJ);
		return $avis;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}

}

?>