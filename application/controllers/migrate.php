<?php

class Migrate extends CI_Controller
{

        public function index()  //用來做 Migrate
        {
                $this->load->library('migration');

                if ($this->migration->current() === FALSE){
                        show_error($this->migration->error_string());
                }else{
                   echo "It's OK!!";
                }

        }

}
