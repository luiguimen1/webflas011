<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Conectar
 *
 * @author Luis Alvarez
 */
class Conectar {

    //put your code here

    private $mysqli;

    function __construct() {
        $this->conectar();
    }

    private function conectar() {
        $valores = new Datos();
        $this->mysqli = new mysqli($valores->getHostname(), $valores->getUser(), $valores->getPassword(), $valores->getBd());
        if ($this->mysqli->connect_errno) {
            return "Falló la conexión a MySQL: (" . $this->mysqli->connect_errno . ") " . $this->mysqli->connect_error;
        } else {
            $this->mysqli->query("SET NAMES 'utf8'");
            return "OK";
        }
    }

    public function getMysqli() {
        return $this->mysqli;
    }

}
