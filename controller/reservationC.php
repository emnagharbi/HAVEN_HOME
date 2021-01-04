<?php


class config {
    private static $pdo = NULL;

    public static function getConnexion() {
      if (!isset(self::$pdo)) {
        try{
          self::$pdo = new PDO('mysql:host=localhost;dbname=reservation', 'root', '',
          [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
          
        }catch(Exception $e){
          die('Erreur: '.$e->getMessage());
        }
      }
      return self::$pdo;
    }
  }

class  resC{
	


	function ajouterres($Reservation)
	{
 $sql="INSERT INTO re (nom, prenom, email, date_depart, date_arrive,nbpa) 
			VALUES (:nom,:prenom,:email, :date_depart, :date_arrive,:nbpa)";
            $db = config::getConnexion();
            try{
                $query = $db->prepare($sql);

                $query->execute([
                    'nom' => $Reservation->getnom(),
                    'prenom' => $Reservation->getprenom(),
                    'email' => $Reservation->getemail(),
                    'date_depart' => $Reservation->getdate_depart(),
                    'date_arrive' => $Reservation->getdate_arrive(),
                    'nbpa'=>$Reservation->getnbpa()
               
                ]);
            }
            catch (Exception $e){
                echo 'Erreur: '.$e->getMessage();
            }
	}
	    function afficherres(){

		$sql="SElECT * From re";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
function modifierres($Reservation, $id)
	{
 	$db = config::getConnexion();
 	$sql="UPDATE 're' SET 
						nom = :nom, 
						prenom = :prenom,
						email = :email,
						date_depart = :date_depart,
						date_arrive = :date_arrive,
						nbpa=:nbpa
						
					WHERE id_reservation = :id";
 		try{

        $req=$db->prepare($sql);		
$nom = $Reservation->getNom();
                    $prenom = $Reservation->getPrenom();
                    $email = $Reservation->getEmail();
                    $date_depart = $Reservation->getdate_depart();
                    $date_arrive = $Reservation->getdate_arrive();
                    $nbpa=$Reservation->getnbpa();
			$req->bindValue(':nom',$nom);
		$req->bindValue(':prenom',$prenom);
		$req->bindValue(':email',$email);
		$req->bindValue(':date_depart',$date_depart);
			$req->bindValue(':date_arrive',$date_arrive);
				
					$req->bindValue(':nbpa',$nbpa);
   
			$req->bindValue(':id',$id);		

            $req->execute();
        }
        catch (Exception $e){

            echo 'Erreur: '.$e->getMessage();
        }
	}



		function recupererres($id){
		$sql="SELECT * FROM re WHERE  id_reservation=:id ";
		$db = config::getConnexion();
		try{
		$req=$db->prepare($sql);
		$req->bindValue(':id',$id);
 	    $req->execute();
 		$event= $req->fetchALL(PDO::FETCH_OBJ);
		return $event;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
        function Supprimerres($id){
		$sql="DELETE  from re where  id_reservation=:id ";
		$db = config::getConnexion();
		try{
		$req=$db->prepare($sql);
			$req->bindValue(':id',$id);
 	    $req->execute();
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
		function incrementerres($id){
		$sql="SELECT * FROM re WHERE  id_reservation=:id ";
		$db = config::getConnexion();
		try{
		$req=$db->prepare($sql);
		$req->bindValue(':id',$id);
 	    $req->execute();
 		$event= $req->fetchALL(PDO::FETCH_OBJ);

$nbpa=$event->getnbpa() + 1;
$event->setnbpa($nbpa);

modifierres($Reservation,$id);



		return $Reservation;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
		function decrmenterres($id){
		$sql="SELECT * FROM re WHERE  id_reservation=:id ";
		$db = config::getConnexion();
		try{
		$req=$db->prepare($sql);
		$req->bindValue(':id',$id);
 	    $req->execute();
 		$event= $req->fetchALL(PDO::FETCH_OBJ);

$nbpa=$event->getnbpa() - 1;
$event->setnbpa($nbpa);

modifierres($Reservation,$id);



		return $Reservation;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }		

		
	
}


?>