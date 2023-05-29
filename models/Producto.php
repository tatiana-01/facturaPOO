<?php
class Producto{
    private $idProducto;
    private $name;
    private $price;
    private $quantity;
    public function __construct( $idProducto, $name, $price,$quantity){
        $this->idProducto = $idProducto;
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
    }
    public function getIdProducto(){
        return $this->idProducto;
    }
    public function setIdProducto($idProducto){
        $this->idProducto = $idProducto;
    }
    public function getName(){
        return $this->name;
    }
    public function setName($name){
        $this->name = $name;
    }
    public function getPrice(){
        return $this->price;
    }
    public function setPrice($price){
        $this->price = $price;
    }
    public function getQuantity(){
        return $this->quantity;
    }
    public function setQuantity($quantity){
        $this->quantity = $quantity;
    }
}
?>