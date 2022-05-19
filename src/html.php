<?php

class html{
    public function printhtml($post_sem, $post_year, $post_stud, $arrayBasic, $shirinatable, $MaxKolExamOOP, $MaxKolExamVP, $MaxKolZachetOOP, $MaxKolZachetVP){
        //print_r($arrayBasic);
        $smarty = new Smarty;
            if ((int)$post_stud === 1) {

                $arroc1 = array();
                foreach ($arrayBasic as $specID => $infspec) {
                    foreach ($infspec['groups'] as $id_group => $infGroup){
                        if (!empty($infGroup['predmets'])) {
                            foreach ($infGroup['predmets'] as $eid => $infpred) {
                                if (!empty($infspec['groups'][$id_group]['predmets'][$eid]['students'])) {
                                    foreach ($infspec['groups'][$id_group]['predmets'][$eid]['students'] as $fio => $mark) {
                                        if (!empty($infspec['groups'][$id_group]['predmets'][$eid]['students'][$fio])) {
                                            $arroc1[$infGroup['grnum']][$fio][$infpred['edu_name']] = array(
                                                'knum' => $infpred['knum'],
                                                'type_cont' => $infpred['type_cont'],
                                                'mark' => $mark
                                            );
                                        }
                                    }
                                }
                            }
                        }
                    }
                }                  
            }

        $smarty = new Smarty;
        $smarty-> assign('shirinatable', $shirinatable);
        $smarty-> assign('MaxKolExamOOP', $MaxKolExamOOP);
        $smarty-> assign('MaxKolZachetOOP', $MaxKolZachetOOP);
        $smarty-> assign('MaxKolExamVP', $MaxKolExamVP);
        $smarty-> assign('MaxKolZachetVP', $MaxKolZachetVP);
        $smarty->assign('arroc', $arroc1);
        $smarty->assign('array', $arrayBasic);
        $smarty->assign('post_stud', $post_stud);
        $smarty->assign('post_sem', $post_sem);
        $smarty->assign('post_year', $post_year);
        $smarty->display('html.tpl');
    }
}
?>