<?php

namespace page

class Controller
    {
        private $db = new PDO('mysql:host=localhost;charset=utf-8;dbname=testovoe','root','');
        
        public function menu()
        {
            $SQL='SELECT `fnum` , `fname`
			FROM `departments`';
            $result = $db->query($SQL);	
            printf('
            <select name="dep">');
            if (!empty($post_dep))
            {
                printf('<option selected value=""></option>');	
            }
            else
            {
                printf('<option value=""></option>');	
            }
        }

    }   
?>