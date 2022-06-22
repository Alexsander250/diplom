<?php
namespace src;
use Smarty;
class html{


    function __construct(){
        $poster = new POST();
        $service = new Service();
        $smarty = new Smarty;
            if ($poster->post_stud == 1) 
            {
                $smarty->assign('arroc', $service->arroc);                            
            }

        //$smarty = new Smarty;
        $smarty-> assign('shirinatable', $service->shirinatable);
        $smarty-> assign('MaxKolExamOOP', $service->MaxKolExamOOP);
        $smarty-> assign('MaxKolZachetOOP', $service->MaxKolZachetOOP);
        $smarty-> assign('MaxKolExamVP', $service->MaxKolExamVP);
        $smarty-> assign('MaxKolZachetVP', $service->MaxKolZachetVP);
        
        $smarty->assign('array', $service->array);
        $smarty->assign('post_stud', $poster->post_stud);
        $smarty->assign('post_sem', $poster->post_sem);
        $smarty->assign('post_year', $poster->post_year);
        
        if ($poster->post_dep==7)
        {
            $smarty->display('htmlmil.tpl');
        }
        else
        {
            $smarty->display('html.tpl');
        }
    }
}
?>