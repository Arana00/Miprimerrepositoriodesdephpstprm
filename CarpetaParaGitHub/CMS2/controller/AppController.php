<?php
namespace App\Controller;

use App\Model\Partido;
use App\Helper\ViewHelper;
use App\Helper\DbHelper;


class AppController
{
    var $db;
    var $view;

    function __construct()
    {

        //Conexión a la BBDD
        $dbHelper = new DbHelper();
        $this->db = $dbHelper->db;

        //Instancio el ViewHelper
        $viewHelper = new ViewHelper();
        $this->view = $viewHelper;


    }

    public function index(){


        //Consulta a la bbdd
        $rowset = $this->db->query("SELECT * FROM partidos WHERE activo=1 AND home=1 ORDER BY fecha DESC");


        //Asigno resultados a un array de instancias del modelo
        $partidos = array();
        while ($row = $rowset->fetch(\PDO::FETCH_OBJ)){
            array_push($partidos,new Partido($row));
        }

        //Llamo a la vista
        $this->view->vista("app", "index", $partidos);
    }

    public function acercade(){

        //Llamo a la vista
        $this->view->vista("app", "acerca-de");

    }

    public function partidos(){

        //Consulta a la bbdd
        $rowset = $this->db->query("SELECT * FROM partidos WHERE activo=1 ORDER BY fecha DESC");

        //Asigno resultados a un array de instancias del modelo
        $partidos = array();
        while ($row = $rowset->fetch(\PDO::FETCH_OBJ)){
            array_push($partidos,new Partido($row));
        }

        //Llamo a la vista
        $this->view->vista("app", "partidos", $partidos);

    }

    public function partido($slug){

        //Consulta a la bbdd
        $rowset = $this->db->query("SELECT * FROM partidos WHERE activo=1 AND slug='$slug' LIMIT 1");

        //Asigno resultado a una instancia del modelo
        $row = $rowset->fetch(\PDO::FETCH_OBJ);
        $partido = new Partido($row);

        //Llamo a la vista
        $this->view->vista("app", "partido", $partido);

    }
}