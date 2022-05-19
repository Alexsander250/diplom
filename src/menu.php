<?php

//require __DIR__. '\database.php';

    class Menu{

        public function printmenu($post_stud, $post_year, $post_sem, $post_dep, $post_group, $HTML_or_Excel)
        {
            $dbd = new database;
            $smarty =new Smarty;
            $smarty->assign('post_stud', $post_stud);
            $smarty->assign('post_dep', $post_dep);
           
            if (!empty($post_dep)) {
                $result = $dbd->datagroups($post_dep);
                $result1=$result->fetchAll();
                $smarty->assign('post_group', $post_group);
                $smarty->assign('groups', $result1);            
            }               
            $result = $dbd->datadepartments();
            $result1=$result->fetchAll();
            $smarty->assign('dep', $result1);
            $current_year = date('Y');
            $smarty->assign('post_year', $post_year);
            $smarty->assign('current_year', $current_year);
            $smarty->assign('post_sem', $post_sem);
            $smarty->assign('HTML_or_Excel', $HTML_or_Excel);
            $smarty->display('menu.tpl');               
        }
    }
?>