<?PHP
	class Reservation{
		private  $id_reservation ;
		private  $nom;
		private  $prenom ;
		private  $email ;
		private $date_depart ;
		private $date_arrive ;
		private $nbpa;
		
		


		function __construct(string $nom, string $prenom, string $email, string $date_depart,string $date_arrive,$nbpa){
			
			$this->nom=$nom;
			$this->prenom=$prenom;
			$this->email=$email;
			$this->date_depart=$date_depart;
			$this->date_arrive=$date_arrive;
			$this->nbpa=$nbpa;
		
			
		
		}

		function getId() {
			return $this->id_reservation;
		}
		function getNom(){
			return $this->nom;
		}
		function getPrenom(){
			return $this->prenom;
		}
		function getdate_depart(){
			return $this->date_depart;
		}
		function getEmail(){
			return $this->email;
		}
		function getdate_arrive(){
			return $this->date_arrive;
		}
		function getnbpa(){
			return $this->nbpa;
		}
	
        function setNom($nom){
			$this->nom=$nom;
		}
		function setPrenom($prenom){
			$this->prenom;
		}
		function setdate_depart( $date_depart){
			$this->date_depart=$date_depart;
		}
		function setEmail( $email){
			$this->email=$email;
		}
		function setdate_arrive( $date_arrive){
			$this->date_arrive=$date_arrive;
		}
		function setnbpa($nbpa){
			$this->nbpa=$nbpa;
		}
	
	
	}
?>