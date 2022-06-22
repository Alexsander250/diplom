<?php

//require __DIR__. '\database.php';
namespace src;
use Smarty;
    class Menu{

        function __construct() {
            $dbd = new database;
            $poster = new POST();
            $smarty =new Smarty;
            $smarty->assign('post_stud', $poster->post_stud);
            $smarty->assign('post_dep', $poster->post_dep);
           
            if (!empty($poster->post_dep)) {
                $result = $dbd->datagroups($poster->post_dep);
                $result1=$result->fetchAll();
                $smarty->assign('post_group', $poster->post_group);
                $smarty->assign('groups', $result1);            
            }               
            $result = $dbd->datadepartments();
            $result1=$result->fetchAll();
            $smarty->assign('dep', $result1);
            $current_year = date('Y');
            $smarty->assign('post_year', $poster->post_year);
            $smarty->assign('current_year', $current_year);
            $smarty->assign('post_sem', $poster->post_sem);
            $smarty->assign('HTML_or_Excel', $poster->HTML_or_Excel);
            $smarty->display('menu.tpl');               
        }
    }
?>