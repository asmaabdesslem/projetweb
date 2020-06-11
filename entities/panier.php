<?PHP
class panier{
	protected $id_panier;
	protected $nom_produit;
	protected $prix;
	protected $qtit; //FK
	
	function __construct($id_panier,$nom_produit,$prix,$qtit){
		$this->id_panier=$id_panier;
		$this->nom_produit=$nom_produit;
        $this->prix=$prix;
        $this->qtit=$qtit;

	}
	function getid_panier(){
		return $this->id_panier;
	}
	function setid_panier($id){
		$this->id_panier=$id;
	}
	function getnom_produit(){
		return $this->nom_produit;
	}
	function setnom_produit($nom){
		$this->nom_produit=$nom;
	}
	function getprix(){
		return $this->prix;
	}
	function setprix($prix){
		$this->prix=$prix;
	}
	function getqtit(){
		return $this->qtit;
	}
	function setqtit($qtit){
		$this->qtit=$qtit;
	}
 
}

?>