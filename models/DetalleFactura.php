<?php 
    class DetalleFactura{
        private $idDetailInvoice;
        private $idInvoice;
        private $idProduct;
        private $quantity;
        private $price;
        public function __construct($idDetailInvoice, $idInvoice,$idProduct,$quantity, $price)
        {
            $this->idDetailInvoice = $idDetailInvoice;
            $this->idInvoice=$idInvoice;
            $this->idProduct=$idProduct;
            $this->quantity=$quantity;
            $this->price = $price;
        }
        public function getIdDetailInvoice(){
            return $this->idDetailInvoice;
        }
        public function setIdDetailInvoice($idDetailInvoice){
            $this->idDetailInvoice = $idDetailInvoice;
        }
        public function getIdInvoice(){
            return $this->idInvoice;
        }
        public function setIdInvoice($idInvoice){
            $this->idInvoice = $idInvoice;
        }
        public function getIdProduct(){
            return $this->idProduct;
        }
        public function setIdProduct($idProduct){
            $this->idProduct = $idProduct;
        }
        public function getQuantity(){
            return $this->quantity;
        }
        public function setQuantity($quantity){
            $this->quantity = $quantity;
        }
        public function getPrice(){
            return $this->price;
        }
        public function setPrice($price){
            $this->price=$price;
        }

    }
?>