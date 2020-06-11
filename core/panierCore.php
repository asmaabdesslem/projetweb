<?PHP
include "../config.php";
class panierCore{
function afficherpanier ($panier){
	    echo "Identifiant du panier: ".$panier->getid_panier()."<br>";
		echo "Nom du produit: ".$panier->getnom_produit()."<br>";
		echo "Prix:: ".$panier->getprix()."<br>";
		echo "Quantité: ".$panier->getqtit()."<br>";
		
	}
	
	
	function ajouterpanier($panier){
		$sql="insert into panier (id_panier,nom_produit,prix,qtit) values (:id_panier,:nom_produit,:prix,:qtit)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);

		$id_panier=$panier->getid_panier();
        $nom_produit=$panier->getnom_produit();
        $prix=$panier->getprix();
        $qtit=$panier->getqtit();
        $req->bindValue(':id_panier',$id_panier);
		$req->bindValue(':nom_produit',$nom_produit);
		$req->bindValue(':prix',$prix);
		$req->bindValue(':qtit',$qtit);
		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function afficherpaniers(){
		$sql="SElECT * From panier";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimerpanier($id_panier){
		$sql="DELETE FROM panier where id_panier= :id_panier";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':id_panier',$id_panier);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }

	}


		function recupererpanier($id_panier){
		$sql="SELECT * from panier where id_panier=$id_panier";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
	function modifierpanier($panier,$id_panier){
		$sql="UPDATE panier SET id_panier=:id_panier, nom_produit=:nom_produit,prix=:prix,qtit=:qtit WHERE id_panier=:id_panier";
		
		$db = config::getConnexion();
try{		
        $req=$db->prepare($sql);
		$id_panier=$panier->getid_panier();
        $nom_produit=$panier->getnom_produit();
        $prix=$panier->getprix();
        $qtit=$panier->getqtit();

		$datas = array(':id_panier'=>$id_panier, ':id_panier'=>$id_panier, ':nom_produit'=>$nom_produit,':prix'=>$prix,':qtit'=>$qtit);
		$req->bindValue(':id_panier',$id_panier);
		$req->bindValue(':nom_produit',$nom_produit);
		$req->bindValue(':prix',$prix);
		$req->bindValue(':qtit',$qtit);
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}
	
}

?>