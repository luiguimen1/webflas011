<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Datos
 *
 * @author Luis Alvarez
 */
class Datos {

    //put your code here
    private $hostname = "localhost";
    private $user = "root";
    private $password="";
    private $bd = "flas011";
    
    public function getHostname() {
        return $this->hostname;
    }

    public function getUser() {
        return $this->user;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getBd() {
        return $this->bd;
    }


}
