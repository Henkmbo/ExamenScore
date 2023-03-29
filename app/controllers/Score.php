<?php

class Score extends Controller
{
    private $scoreModel;

    public function __construct()
    {
        $this->scoreModel = $this->model('Uitslag');
    }

    public function index()
    {
         $result = $this->scoreModel->getScores();
         $rows = '';

         foreach ($result as $value) {
            $rows .= "<tr>
                         <td>$value->Voornaam</td>
                         <td>$value->Tussenvoegsel</td>
                         <td>$value->Achternaam</td>
                         <td>$value->Aantalpunten</td>
                         <td><a href='" . URLROOT . "score/update/$value->Id'><img src='" . URLROOT . "/img/icons8-pencil-16.png' alt='update'></a></td>
                      </tr>";
        }

         
        $data = [
            'title' => "Overzicht Speler",
            'rows' => $rows
        ];
        $this->view('score/index', $data);
    }

    public function update($id = NULL){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $this->scoreModel->updateScore($_POST);
            echo "Uitslag is aangepast";
            header("Location: " . URLROOT . "score/index");
            
        }
        else{
            echo "error, probeer opnieuw";
        }
            $row = $this->scoreModel->getSingleScore($id);
            $data = [
                'title' => 'Detail Uitslag',
                'row' => $row
            ];
            $this->view("score/update", $data);
        
    }
}