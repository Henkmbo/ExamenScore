<?php

Class Uitslag{

private $db;

public function __construct(){
    $this->db = new Database;
}

public function getScores(){
        $this->db->query("SELECT        PE.Id,
				        PE.TypePersoonId,
                                        PE.IsVolwassen,
				        PE.Voornaam,
				        PE.Tussenvoegsel,
				        PE.Achternaam,
       
				        UI.Aantalpunten,
                                        UI.SpelId,
                
                                        SP.PersoonId
                
                        from persoon as PE
                        inner join uitslag as UI
                        on UI.Id = PE.Id
                        inner join spel as SP
                        on SP.Id = PE.Id order by Aantalpunten desc;
                        ");

        $result = $this->db->resultSet();
        return $result;
    }

     public function getSingleScore($id = NULL)
    {
        $this->db->query("select 
        UI.SpelId as Id,
        UI.Aantalpunten as Aantalpunten
        from uitslag as UI
        inner join persoon as PE
        on PE.Id = UI.Id
        
                WHERE PE.Id = :id;");
        $this->db->bind(':id', $id, PDO::PARAM_INT);
        return $this->db->single();
    }

     public function updateScore($post)
     {
        $this->db->query("UPDATE uitslag SET Aantalpunten = :aantalpunten WHERE Id = :id");
        $this->db->bind(':id', $post['id']);
        $this->db->bind(':aantalpunten', $post['Aantalpunten']);
        $this->db->execute();
    }
}