<?php

class html{
    public function printhtml($post_sem, $post_year, $post_stud, $arrayBasic, $shirinatable, $MaxKolExamOOP, $MaxKolExamVP, $MaxKolZachetOOP, $MaxKolZachetVP){
//print_r($arrayBasic);

if ((int)$post_stud === 1) {

    $arroc = array();

    if (!empty($infGroup['predmets'])) {
        foreach ($infGroup['predmets'] as $eid => $infpred) {
            if (!empty($infspec['groups'][$id_group]['predmets'][$eid]['students'])) {
                foreach ($infspec['groups'][$id_group]['predmets'][$eid]['students'] as $fio => $mark) {
                    if (!empty($infspec['groups'][$id_group]['predmets'][$eid]['students'][$fio])) {
                        $arroc[$fio][$infpred['edu_name']] = array(
                            'knum' => $infpred['knum'],
                            'type_cont' => $infpred['type_cont'],
                            'mark' => $mark
                        );
                    }
                }
            }
        }
    }
    $smarty->assign('arroc', $arroc);
}

$smarty = new Smarty;
$smarty-> assign('shirinatable', $shirinatable);
$smarty-> assign('MaxKolExamOOP', $MaxKolExamOOP);
$smarty-> assign('MaxKolZachetOOP', $MaxKolZachetOOP);
$smarty-> assign('MaxKolExamVP', $MaxKolExamVP);
$smarty-> assign('MaxKolZachetVP', $MaxKolZachetVP);
$smarty->assign('array', $arrayBasic);

$smarty->display('html.tpl');
//print_r($arrayBasic);

printf('<br><br><br><br><table border="1">');
printf('
    <tr>
        <th colspan="%d"><center>Итоги сдачи %s сессии в %d - %s уч. году </center></th>
    </tr>',
    $shirinatable, (((int)$post_sem === 0) ? 'весенней' : 'осенней'), (int)$post_year - 1, $post_year
);


foreach ($arrayBasic as $specID => $infspec) {
    printf('
        <tr>
            <th colspan="%d"><center>%s</center></th>
        </tr>',
        $shirinatable, $infspec['spname']
    );

    foreach ($infspec['groups'] as $id_group => $infGroup) {
        printf('
            <tr>
                <th colspan="%d"><center>%s</center></th>
            </tr>',
            $shirinatable, $infGroup['grnum']
        );

        printf('
            <tr>
                <th colspan="%d"><center>Дисциплины ООП</center></th>
                <th colspan="%d"><center>Дисциплины ВП</center></th>
            </tr>',
            ($MaxKolExamOOP + $MaxKolZachetOOP + 1),($MaxKolExamVP + $MaxKolZachetVP)
        );

        printf('
            <tr>
                <th colspan="%d"><center>Экзамены</center></th>
                <th colspan="%d"><center>Зачеты</center></th>
                <th colspan="%d"><center>Экзамены</center></th>
                <th colspan="%d"><center>Зачеты</center></th>
            </tr>',
            ($MaxKolExamOOP + 1), $MaxKolZachetOOP, $MaxKolExamVP,$MaxKolZachetVP
        );

        $i = 0;
        if (!empty($infGroup['predmets'])) {
            printf('<tr>');
            printf('<td></td>');
            foreach ($infGroup['predmets'] as $eid => $infpred) {
                if ((int)$infpred['knum'] !== 7 && (int)$infpred['type_cont'] === 1) {
                    printf('<td>%s</td>', htmlspecialchars($infpred['edu_name']));
                    $i++;
                }
            }

            if ($i < $MaxKolExamOOP) {
                $empty_cols = $MaxKolExamOOP - $i;
                printf('<td colspan="%d"></td>',$empty_cols);
            }
            $i = 0;

            foreach ($infGroup['predmets'] as $eid => $infpred) {
                if ((int)$infpred['knum'] !== 7 && (int)$infpred['type_cont'] === 6) {
                    printf('<td>%s</td>', htmlspecialchars($infpred['edu_name']));
                    $i++;
                }
            }

            foreach ($infGroup['predmets'] as $eid => $infpred) {
                if ((int)$infpred['knum'] !== 7 && (int)$infpred['type_cont'] === 2) {
                    printf('<td>%s</td>', htmlspecialchars($infpred['edu_name']));
                    $i++;
                }
            }

            if ($i < $MaxKolZachetOOP) {
                $empty_cols = $MaxKolZachetOOP - $i;
                printf('<td colspan="%d"></td>',$empty_cols);
            }

            $i = 0;
            foreach ($infGroup['predmets'] as $eid => $infpred) {
                if ((int)$infpred['knum'] === 7 && (int)$infpred['type_cont'] === 1) {
                    printf('<td>%s</td>', htmlspecialchars($infpred['edu_name']));
                    $i++;
                }
            }

            if ($i < $MaxKolExamVP) {
                $empty_cols = $MaxKolExamVP - $i;
                printf('<td colspan="%d"></td>',$empty_cols);
            }
            $i = 0;

            foreach ($infGroup['predmets'] as $eid => $infpred) {
                if ((int)$infpred['knum'] === 7 && (int)$infpred['type_cont'] === 6) {
                    printf('<td>%s</td>', htmlspecialchars($infpred['edu_name']));
                    $i++;
                }
                if ((int)$infpred['knum'] === 7 && (int)$infpred['type_cont'] === 2) {
                    printf('<td>%s</td>', htmlspecialchars($infpred['edu_name']));
                    $i++;
                }
            }

            if ($i < $MaxKolZachetVP) {
                $empty_cols = $MaxKolZachetVP - $i;
                printf('<td colspan="%d"></td>',$empty_cols);
            }
            printf('</tr>');
        }

        /***************************Студенты***********/
        //echo 	$post_stud;
        if ((int)$post_stud === 1) {

            $arroc = array();

            if (!empty($infGroup['predmets'])) {
                foreach ($infGroup['predmets'] as $eid => $infpred) {
                    if (!empty($infspec['groups'][$id_group]['predmets'][$eid]['students'])) {
                        foreach ($infspec['groups'][$id_group]['predmets'][$eid]['students'] as $fio => $mark) {
                            if (!empty($infspec['groups'][$id_group]['predmets'][$eid]['students'][$fio])) {
                                $arroc[$fio][$infpred['edu_name']] = array(
                                    'knum' => $infpred['knum'],
                                    'type_cont' => $infpred['type_cont'],
                                    'mark' => $mark
                                );
                            }
                        }
                    }
                }
            }
            //print_r($arroc);
            $num = 0;
            foreach ($arroc as $fio => $predmet) {
                $i = 0;
                $num++;

//                printf('%d. %s',$num,$fio);
                printf('<tr>');
                printf('<td>%d %s</td>',$num,$fio);

                //оценки ОП
                foreach ($predmet as $pred => $infpredmet) {
                    if ((int)$infpredmet['knum'] !== 7 && (int)$infpredmet['type_cont'] === 1) {
                        printf('<td>%s</td>', $infpredmet['mark']);
                        $i++;
                    }
                }

                if ($i < $MaxKolExamOOP) {
                    $empty_cols = $MaxKolExamOOP - $i;
                    printf('<td colspan="%d"></td>',$empty_cols);
                }
                $i = 0;


                foreach ($predmet as $pred => $infpredmet) {
                    if ((int)$infpredmet['knum'] !== 7 && (int)$infpredmet['type_cont'] === 6) {
                        printf('<td>%s</td>', $infpredmet['mark']);
                        $i++;
                    }
                }

                foreach ($predmet as $pred => $infpredmet) {
                    if ((int)$infpredmet['knum'] !== 7 && (int)$infpredmet['type_cont'] === 2) {
                        if ((int)$infpredmet['mark'] === 7) {
                            printf('<td>зач</td>');
                        } else {
                            printf('<td>не зач</td>');
                        }
                        $i++;
                    }
                }

                if ($i < $MaxKolZachetOOP) {
                    $empty_cols = $MaxKolZachetOOP - $i;
                    printf('<td colspan="%d"></td>',$empty_cols);
                }

                $i = 0;

                //оценки ВП
                foreach ($predmet as $pred => $infpredmet) {
                    if ((int)$infpredmet['knum'] === 7 && (int)$infpredmet['type_cont'] === 1) {
                        printf('<td>%s</td>', $infpredmet['mark']);
                        $i++;
                    }
                }

                if ($i < $MaxKolExamVP) {
                    $empty_cols = $MaxKolExamVP - $i;
                    printf('<td colspan="%d"></td>',$empty_cols);
                }

                $i = 0;
                foreach ($predmet as $pred => $infpredmet) {
                    if ((int)$infpredmet['knum'] === 7 && (int)$infpredmet['type_cont'] === 6) {
                        printf('<td>%s</td>', $infpredmet['mark']);
                        $i++;
                    }
                }

                foreach ($predmet as $pred => $infpredmet) {
                    if ((int)$infpredmet['knum'] === 7 && (int)$infpredmet['type_cont'] === 2) {
                        if ((int)$infpredmet['mark'] === 7) {
                            printf('<td>зач</td>');
                        } else {
                            printf('<td>не зач</td>');
                        }
                        $i++;
                    }
                }

                if ($i < $MaxKolZachetVP) {
                    $empty_cols = $MaxKolZachetVP - $i;
                    printf('<td colspan="%d"></td>',$empty_cols);
                }
            }
        }

        $i = 0;

        /****************Средние оценки*/
        if (!empty($infGroup['predmets'])) {
            printf('<tr>');
            printf('<td>Ср. балл</td>');
            foreach ($infGroup['predmets'] as $eid => $infpred) {
                if ((int)$infpred['knum'] !== 7 && (int)$infpred['type_cont'] === 1) {
                    printf('<td>%s</td>', htmlspecialchars($infpred['avg']));
                    $i++;
                }
            }

            if ($i < $MaxKolExamOOP) {
                $empty_cols = $MaxKolExamOOP - $i;
                printf('<td colspan="%d"></td>',$empty_cols);
            }
            $i = 0;

            foreach ($infGroup['predmets'] as $eid => $infpred) {
                if ((int)$infpred['knum'] !== 7 && (int)$infpred['type_cont'] === 6) {
                    printf('<td>%s</td>', htmlspecialchars($infpred['avg']));
                    $i++;
                }
            }

            if ($i < $MaxKolZachetOOP) {
                $empty_cols = $MaxKolZachetOOP - $i;
                printf('<td colspan="%d"></td>',$empty_cols);
            }
            $i = 0;

            foreach ($infGroup['predmets'] as $eid => $infpred) {
                if ((int)$infpred['knum'] === 7 && (int)$infpred['type_cont'] === 1) {
                    printf('<td>%s</td>', htmlspecialchars($infpred['avg']));
                    $i++;
                }
            }

            if ($i < $MaxKolExamVP) {
                $empty_cols = $MaxKolExamVP - $i;
                printf('<td colspan="%d"></td>',$empty_cols);
            }
            $i = 0;

            foreach ($infGroup['predmets'] as $eid => $infpred) {
                if ((int)$infpred['knum'] === 7 && (int)$infpred['type_cont'] === 6) {
                    printf('<td>%s</td>', htmlspecialchars($infpred['avg']));
                    $i++;
                }
            }

            if ($i < $MaxKolZachetVP) {
                $empty_cols = $MaxKolZachetVP - $i;
                printf('<td colspan="%d"></td>',$empty_cols);
            }
            printf('</tr>');
        }
        /*****************************************************/

        for ($j = 5; $j >= 2; $j--) {
            $i = 0;
            printf('<tr>');
            printf('<td>%s</td>', $j);
            if (!empty($infGroup['predmets'])) {

                foreach ($infGroup['predmets'] as $eid => $infpred) {
                    if ((int)$infpred['knum'] !== 7 && (int)$infpred['type_cont'] === 1) {
                        if (empty($infpred['marks'][$j])) {
                            printf('<td>0</td>');
                        } else {
                            printf('<td>%s</td>', htmlspecialchars($infpred['marks'][$j]));
                        }
                        $i++;
                    }
                }

                if ($i < $MaxKolExamOOP) {
                    $empty_cols = $MaxKolExamOOP - $i;
                    printf('<td colspan="%d"></td>',$empty_cols);
                }

                $i = 0;
                foreach ($infGroup['predmets'] as $eid => $infpred) {
                    if ((int)$infpred['knum'] !== 7 && (int)$infpred['type_cont'] === 6) {
                        if (empty($infpred['marks'][$j])) {
                            printf('<td>0</td>');
                        } else {
                            printf('<td>%s</td>', htmlspecialchars($infpred['marks'][$j]));
                        }
                        $i++;
                    }
                }

                if ($i < $MaxKolZachetOOP) {
                    $empty_cols = $MaxKolZachetOOP - $i;
                    printf('<td colspan="%d"></td>',$empty_cols);
                }

                $i = 0;
                foreach ($infGroup['predmets'] as $eid => $infpred) {
                    if ((int)$infpred['knum'] === 7 && (int)$infpred['type_cont'] === 1) {
                        if (empty($infpred['marks'][$j])) {
                            printf('<td>0</td>');
                        } else {
                            printf('<td>%s</td>', htmlspecialchars($infpred['marks'][$j]));
                        }
                        $i++;
                    }
                }

                if ($i < $MaxKolExamVP) {
                    $empty_cols = $MaxKolExamVP - $i;
                    printf('<td colspan="%d"></td>',$empty_cols);
                }

                $i = 0;
                foreach ($infGroup['predmets'] as $eid => $infpred) {
                    if ((int)$infpred['knum'] === 7 && (int)$infpred['type_cont'] === 6) {
                        if (empty($infpred['marks'][$j])) {
                            printf('<td>0</td>');
                        } else {
                            printf('<td>%s</td>', htmlspecialchars($infpred['marks'][$j]));
                        }
                        $i++;
                    }
                }

                if ($i < $MaxKolZachetVP) {
                    $empty_cols = $MaxKolZachetVP - $i;
                    printf('<td colspan="%d"></td>',$empty_cols);
                }
            }
            printf('</tr>');
        }

        /********************зачет-**************/
        if (!empty($infGroup['predmets'])) {
            printf('<tr>');
            printf('<td>зач</td>');

            printf('<td colspan="%d"></td>',$MaxKolExamOOP);
            foreach ($infGroup['predmets'] as $eid => $infpred) {
                if ((int)$infpred['knum'] !== 7 && (int)$infpred['type_cont'] === 6) {
                    printf('<td></td>');
                    $i++;
                }
            }

            foreach ($infGroup['predmets'] as $eid => $infpred) {
                if ((int)$infpred['knum'] !== 7 && (int)$infpred['type_cont'] === 2) {
                    printf('<td>%s</td>', htmlspecialchars($infpred['marks']['5']));
                    $i++;
                }
            }

            if ($i < $MaxKolZachetOOP) {
                $empty_cols = $MaxKolZachetOOP - $i;
                printf('<td colspan="%d"></td>',$empty_cols);
            }

            printf('<td colspan="%d"></td>',$MaxKolExamVP);
            $i = 0;
            foreach ($infGroup['predmets'] as $eid => $infpred) {
                if ((int)$infpred['knum'] === 7 && (int)$infpred['type_cont'] === 6) {
                    printf('<td></td>');
                    $i++;
                }
                if ((int)$infpred['knum'] === 7 && (int)$infpred['type_cont'] === 2) {
                    printf('<td>%s</td>', htmlspecialchars($infpred['marks']['5']));
                    $i++;
                }
            }

            if ($i < $MaxKolZachetVP) {
                $empty_cols = $MaxKolZachetVP - $i;
                printf('<td colspan="%d"></td>',$empty_cols);
            }
            $i = 0;


            /********************не зачет-**************/
            printf('<tr>');
            printf('<td>не зач</td>');
            printf('<td colspan="%d"></td>',$MaxKolExamOOP);

            foreach ($infGroup['predmets'] as $eid => $infpred) {
                if ((int)$infpred['knum'] !== 7 && (int)$infpred['type_cont'] === 6) {
                    printf('<td></td>');
                    $i++;
                }
            }

            foreach ($infGroup['predmets'] as $eid => $infpred) {
                if ((int)$infpred['knum'] !== 7 && (int)$infpred['type_cont'] === 2) {
                    printf('<td>%s</td>', htmlspecialchars($infpred['marks']['1']));
                    $i++;
                }
            }

            if ($i < $MaxKolZachetOOP) {
                $empty_cols = $MaxKolZachetOOP - $i;
                printf('<td colspan="%d"></td>',$empty_cols);
            }
            $i = 0;

            printf('<td colspan="%d"></td>',$MaxKolExamVP);

            foreach ($infGroup['predmets'] as $eid => $infpred) {
                if ((int)$infpred['knum'] === 7 && (int)$infpred['type_cont'] === 6) {
                    printf('<td></td>');
                    $i++;
                }
                if ((int)$infpred['knum'] === 7 && (int)$infpred['type_cont'] === 2) {
                    printf('<td>%s</td>', htmlspecialchars($infpred['marks']['1']));
                    $i++;
                }
            }

            if ($i < $MaxKolZachetVP) {
                $empty_cols = $MaxKolZachetVP - $i;
                printf('<td colspan="%d"></td>',$empty_cols);
            }
            printf('</tr>');
        }
    }
}


    }
}
?>