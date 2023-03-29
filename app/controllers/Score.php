<?php

class Score extends Controller
{

    public function __construct()
    {

    }

    public function index()
    {
        $data = [
            'title' => "Example"
        ];
        $this->view('score/index', $data);
    }
}