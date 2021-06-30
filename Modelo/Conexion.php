<?php
class Conexion{
    function __construct(){
        $this->host='127.0.0.1';
        $this->username='root';
        $this->passwd='';
        $this->dbname='db_calc';
        $this->con=new mysqli($this->host, $this->username, $this->passwd, $this->dbname);
    }
    
    function consultarUsuario($id,$name){
        $this->con->prepare("SELECT * FROM usuarios WHERE id=? AND name=?");
        $this->con->bind_param('i',$id);
        $this->con->bind_param('s',$name);
        $cursor = $this->con->execute();
        foreach($cursor as $c => $usuario){
            echo($usuario->name);
        }
    }
    function insertarUsuario($usuario){
        $this->con->prepare("INSERT INTO usuarios('name') VALUE(?);");
        $this->con->bind_param('s',$usuario->nombre);
        $this->con->execute();
    }
}