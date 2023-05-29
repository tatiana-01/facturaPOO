<?php 
    class Cliente{
        private $id;
        private $name;
        private $email;
        private $phone;

        public function __construct( $id,$name,$email,$phone){
            $this->id=$id;  
            $this->name=$name;
            $this->email=$email;
            $this->phone=$phone;  
        }
        
        public function getId(){
            return $this->id;
        }
        public function setId($id){
            $this->id=$id;
        }
        public function getName(){
            return $this->name;
        }
        public function setName($name){
            $this->name=$name;
        }
        public function getEmail(){
            return $this->email;
        }
        public function setEmail($email){
            $this->email=$email;
        }
        public function getPhone(){
            return $this->phone;
        }
        public function setPhone($phone){
            $this->phone=$phone;
        }
    }
?>