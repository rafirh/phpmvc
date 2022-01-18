<?php
    class About extends Controller{
        public function index($name = "Rafi",$address = "Malang",$age = 16){
            $data['name'] = $name;
            $data['address'] = $address;
            $data['age'] = $age;
            $this->view("about/index", $data);
        }
        public function page(){
            $this->view("about/page");
        }
    }
?>