<?php

Class Uitslag{

private $db;

public function __construct(){
    $this->db = new Database;
}

public function getScores(){
        $this->db->query("SELECT        PE.Id,
                                        PE.Voornaam,
	                                PE.Tussenvoegsel,
	                                PE.Achternaam,
       
	                                UI.Aantalpunten
                        from persoon as PE
                        inner join uitslag as UI
                        on UI.Id = PE.Id;
                        ");

        $result = $this->db->resultSet();
        return $result;
    }

     public function getSingleScore($id = NULL)
    {
        $this->db->query("SELECT        PE.Id as Id,
                                        PE.Voornaam as Voornaam,
	                                PE.Tussenvoegsel as Tussenvoegsel,
	                                PE.Achternaam as Achternaam,
       
	                                UI.Aantalpunten as Aantalpunten
                        from persoon as PE
                        inner join uitslag as UI
                        on UI.Id = PE.Id;");
        $this->db->bind(':id', $id, PDO::PARAM_INT);
        return $this->db->single();
    }

     public function updateScore($post)
         {
                //call update_person_and_uitslag stored procedure
                $this->db->query("CALL update_person_and_uitslag(:Id, :Aantalpunten)");
                $this->db->bind(':Id', $post['Id'], PDO::PARAM_INT);
                $this->db->bind(':aantalpunten', $post['Aantalpunten'], PDO::PARAM_INT);
                return $this->db->execute();
        }

}