<?php
    class About extends Controller{
        public function index($name = "Rafi",$address = "Malang",$age = 16){
            $data['name'] = $name;
            $data['address'] = $address;
            $data['age'] = $age;
            $data['judul'] = "About";
            $this->view("templates/header", $data);
            $this->view("about/index", $data);
            $this->view("templates/footer", $data);
        }
        public function page(){
            $data['judul'] = "Pages";
            $this->view("templates/header", $data);
            $this->view("about/page");
            $this->view("templates/footer", $data);
        }
    }
?>