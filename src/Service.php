<?php
namespace src;
class Service
{
    public $array;    
    public $shirinatable;
    public $MaxKolExamOOP;
    public $MaxKolExamVP;
    public $MaxKolZachetOOP;
    public $MaxKolZachetVP;
    public $arroc;

    private $dbd;
    private $arrgrZAP;
    private $arraygroups;
    private $poster;

    function __construct() {
        $this->dbd = new database;
        $this->poster = new POST();
		if (!empty($this->poster->post_dep))
		{
			$this->get_array_data_group_of_spec();
			$this->list_array_groups();
			$this->get_array_predmets();
			$this->get_array_marks_students();
			$this->get_array_avg_marks_and_col_marks();
			$this->max_kol_exam_and_zach();
			$this->get_array_student_and_marks();
		}	
        
		if ($this->poster->post_dep==7)
		{
			$this->max_kol_exam_and_zach_VP();
		}    
    }
    
    private function get_array_data_group_of_spec(){						//формирование массива со специальностями и информацией о них, а также вложенный массив с группами и информации о них

        $result=$this->dbd->get_data_group_of_spec();
        //$result=$result->fetchAll();				
				$i=0;
				foreach($result as $row)
				{
					$year=$row['gosStudyTerms']/2;					
					if (($year+$row['EnrollYear'])>=$this->poster->post_year)
					{
						if (empty($this->array[$row['id']]))
						{
							$this->array[$row['id']]=array('spname' => $row['Name'], 'newcode' => $row['new_code']);
						}
						$this->array[$row['id']]['groups'][$row['grid']] = array('grnum' => $row['grnum'], 'Fyear' => $row['EnrollYear']);
						$this->arrgrZAP[$i] = $row['grnum'];
						$i++;
					}
				}
    }

    public function list_array_groups(){				//формирование массива с идентификаторами  и номерами групп (для начальной страцины (при внедрении не функция не обязательна))
        $result=$this->dbd->list_groups();
        foreach ($result as $row)
			{
				$this->arraygroups[$row['grid']]=$row['grnum'];
			}
            //print_r($this->arraygroups);			
    }

    private function get_array_predmets(){				//формирование вложенного массива с предметами изучаемых в группах (вкладывается во вложенный массив с группами)
        
        $result=$this->dbd->get_predmets($this->arraygroups);
        
			foreach ($result as $row)					//обработка запроса на получение предметов 
			{
				if (!empty($this->array[$row['id']]['groups'][$row['grid']])) {		
					if (empty($this->poster->post_year)) {		//проверка ввода данных о дате (если не введена, то расчет идет от нынешней даты), для вычисления интересуюжщего номера семестра в учебных планах групп		
                        $current_year=date("Y");
						$sem = (($current_year - $this->array[$row['id']]['groups'][$row['grid']]['Fyear']) * 2) - $this->poster->post_sem;
					} else {
						if ((int)$this->poster->post_sem === 2) {
							$sem = (($this->poster->post_year - $this->array[$row['id']]['groups'][$row['grid']]['Fyear']) * 2);
						} else {
							$sem = (($this->poster->post_year - $this->array[$row['id']]['groups'][$row['grid']]['Fyear']) * 2) - $this->poster->post_sem;
						}
					}
		
					if ($row['SemNum'] === $sem) {		//проверка соответсвия интересующего номера семестра и номера семестра в который проводилась аттестация по предмету 
									
						switch ($row['IDContr'])	
						{						//распределение предметов, по типу контроля (формирование массива с типами контроля дисциплин и массива с идентификаторами дисциплин)
							case 0:
							case 1:
								$this->array[$row['id']]['groups'][$row['grid']]['predmets']['exam'][$row['IDEPC']] = array(
									'knum' => $row['fnum'],
									'edu_name' => $row['Subg'],
									'type_cont' => $row['IDContr'],
									'semnum' => $row['SemNum']
								);
								break;
							case 4:
							case 5:
							case 6:
								$this->array[$row['id']]['groups'][$row['grid']]['predmets']['difzachet'][$row['IDEPC']] = array(
									'knum' => $row['fnum'],
									'edu_name' => $row['Subg'],
									'type_cont' => $row['IDContr'],
									'semnum' => $row['SemNum']
								);
								break;
							case 2:
								$this->array[$row['id']]['groups'][$row['grid']]['predmets']['zachet'][$row['IDEPC']] = array(
									'knum' => $row['fnum'],
									'edu_name' => $row['Subg'],
									'type_cont' => $row['IDContr'],
									'semnum' => $row['SemNum']
								);
								break;
						}
					}
				}
				
			}
    }


    public function get_array_marks_students(){			//формирование массива со списком студентов и их оценках по дисциплинами
        $result=$this->dbd->get_marks_students($this->arraygroups);
        foreach ($result as $row) {
            if (!empty($this->array[$row['id']]['groups'][$row['grid']]['predmets']['exam'][$row['IDEPC']]) ||
                !empty($this->array[$row['id']]['groups'][$row['grid']]['predmets']['difzachet'][$row['IDEPC']]) ||
                !empty($this->array[$row['id']]['groups'][$row['grid']]['predmets']['zachet'][$row['IDEPC']])
                ) {
                if ($row['grid'] == $row['Groupid']) {
                    $fio = $row['LastName'] . " " . $row['FirstName'] . " " . $row['MiddleName'] . " " . $row['FullNameDat'];
                    //echo '<br> arraybasic['.$row["id"].'][groups]['.$row["grid"].'][predmets]['.$row["IDContr"].']['.$row['IDEPC'].'][students]['.$fio.']'; 
                    switch ((int)$row['IDContr'])	
                    {
                        case 0:
                        case 1:
                            $this->array[$row['id']]['groups'][$row['grid']]['predmets']['exam'][$row['IDEPC']]['students'][$fio] = $row['res'];
                            break;
                        case 2:
                            $this->array[$row['id']]['groups'][$row['grid']]['predmets']['zachet'][$row['IDEPC']]['students'][$fio] = $row['res'];
                            break;
                        case 3:
                        case 4:
                        case 5:
                        case 6:
                            $this->array[$row['id']]['groups'][$row['grid']]['predmets']['difzachet'][$row['IDEPC']]['students'][$fio] = $row['res'];
                            break;
                        
                    }
                    
                }
            }
        }
    }


    
		private function get_array_avg_marks_and_col_marks()	//получение средних оценок по дисциплинам и массивов с баллами оценивания
		{
			foreach ($this->array as $specID => $rowSpec) {		//прохождение основного массива по специальностям
				foreach ($rowSpec['groups'] as $id_group => $infGroup){	//прохождение по группам
					
					if(!empty($infGroup['predmets']))		
					{			

						foreach ($infGroup['predmets'] as $Typecontr => $predmet) {	//прохождение по типам контроля дисциплин
							foreach ($predmet as $IDEPC => $infpred) {	//прохождение по дисциплинам
								//echo '<br> arraybasic['.$specID.'][groups]['.$id_group.'][predmets]['.$Typecontr.']['.$IDEPC.'][students]';
								
								
								for($i=1; $i<=5; $i++)
								{
									$this->array[$specID]['groups'][$id_group]['predmets'][$Typecontr][$IDEPC]['marks'][$i] = 0;
								}
								$this->array[$specID]['groups'][$id_group]['predmets'][$Typecontr][$IDEPC]['avg']=0;


								if(!empty($this->array[$specID]['groups'][$id_group]['predmets'][$Typecontr][$IDEPC]['students'])){
								 
									$marks=array_count_values($this->array[$specID]['groups'][$id_group]['predmets'][$Typecontr][$IDEPC]['students']);
														
									$summ=0;
									
									//запись кол-ва оценок по дисциплине и среднего балла по дисциплине
									switch ($infpred['type_cont']) {
									case 0:
									case 1:
									case 3:
									case 4:
									case 5:
									case 6:
										
										foreach($marks as $ball => $collmarks)
										{
											$this->array[$specID]['groups'][$id_group]['predmets'][$Typecontr][$IDEPC]['marks'][$ball] = $collmarks;
											$summ=$summ+($ball*$collmarks);
										}
										$this->array[$specID]['groups'][$id_group]['predmets'][$Typecontr][$IDEPC]['avg'] = round($summ/array_sum($marks),2);					
										break;

									case 2:
										$this->array[$specID]['groups'][$id_group]['predmets'][$Typecontr][$IDEPC]['marks']['5'] = 0;
										$this->array[$specID]['groups'][$id_group]['predmets'][$Typecontr][$IDEPC]['marks']['1'] = 0;
										foreach($marks as $ball => $collmarks)
										{
											if ($ball==7)
											{
												$this->array[$specID]['groups'][$id_group]['predmets'][$Typecontr][$IDEPC]['marks'][5] = $collmarks;
											}
											else
											{
												$this->array[$specID]['groups'][$id_group]['predmets'][$Typecontr][$IDEPC]['marks'][$ball] = $collmarks;
											}
										}							
										break;
									}
								}
							}
							
						}
					}
				}
			}
		}


        private function max_kol_exam_and_zach()		//получение максимального кол-ва экзаменов, диф. зачетов и зачетов 
		{			
			$MaxKolExamOOP = 0;
			$MaxKolZachetOOP = 0;
			$zacmarks=0;
			$difmarks=0;
			//print_r($this->array);
			foreach ($this->array as $specID => $rowSpec) {	//прохождение по специальностям
				foreach ($rowSpec['groups'] as $id_group => $infGroup) {	//прохождение по группам
					$kolZachetOOP = 0;
					$kolExamOOP = 0;
					if(!empty($infGroup['predmets']['exam']))
					{
						$exmarks=count($this->array[$specID]['groups'][$id_group]['predmets']['exam']);
						if ($MaxKolExamOOP < $exmarks) {
							$MaxKolExamOOP = $exmarks;
						}
						
						if (!empty($this->array[$specID]['groups'][$id_group]['predmets']['difzachet']))
						$difmarks=count($this->array[$specID]['groups'][$id_group]['predmets']['difzachet']);
						
						if (!empty($this->array[$specID]['groups'][$id_group]['predmets']['zachet']))
						$zacmarks=count($this->array[$specID]['groups'][$id_group]['predmets']['zachet']);
						$kolZachetOOP=$difmarks+$zacmarks;
						if ($MaxKolZachetOOP < $kolZachetOOP) {
							$MaxKolZachetOOP = $kolZachetOOP;
						}
					}
				}			
        	}
			
			$this->MaxKolExamOOP = $MaxKolExamOOP;			
			$this->MaxKolZachetOOP = $MaxKolZachetOOP;
			$shirinatable = $MaxKolExamOOP + $MaxKolZachetOOP;
			$this->shirinatable = $shirinatable;
		}

		private function max_kol_exam_and_zach_VP()		//получение максимольного кол-ва экзаменов и зачетов по военным дисциплинам 
		{
			$MaxKolExamVP = 0;
			$MaxKolZachetVP = 0;

			foreach ($this->array as $specID => $rowSpec) {	//проождение по специальностям
				foreach ($rowSpec['groups'] as $id_group => $infGroup) {	//прохождение по группам
					$kolZachetVP = 0;
					$kolExamVP = 0;
					if (empty($infGroup['predmets']))
					{echo '<br>'.$infGroup['grnum'];}
					foreach ($infGroup['predmets'] as $Typecontr => $predmet) {	//прохождение по типам контроля дисциплины
						foreach ($predmet as $IDEPC => $infpred) {	//прохождение по дисциплинам
							if (!empty($this->array[$specID]['groups'][$id_group]['predmets'][$Typecontr][$IDEPC]) && $infpred['knum']==7 ) {
								switch ($Typecontr)
								{
									case 'exam':
										$kolExamVP++;
										break;
									case 'difzachet':
									case 'zachet':
										$kolZachetVP++;
										break;										
								}
							}						
						}
					}
					if ($MaxKolExamVP < $kolExamVP) {
						$MaxKolExamVP = $kolExamVP;
					}
					if ($MaxKolZachetVP < $kolZachetVP) {
						$MaxKolZachetVP = $kolZachetVP;
					}
				}
			}

			
			$this->MaxKolExamVP=$MaxKolExamVP;
			//$this->MaxKolExamOOP=$this->MaxKolExamOOP-$MaxKolExamVP;
			$this->MaxKolZachetVP=$MaxKolZachetVP;
			//$this->MaxKolZachetOOP=$this->MaxKolZachetOOP-$MaxKolZachetVP;
			$this->shirinatable = $MaxKolExamVP+$MaxKolZachetVP+$this->MaxKolZachetOOP+$this->MaxKolExamOOP;
		}

		private function get_array_student_and_marks()		//получение массива студентов и их оценкам по дисциплине
		{			
					foreach ($this->array as $specID => $rowSpec) {	//прохождение по специальностям
						foreach ($rowSpec['groups'] as $id_group => $infGroup)	//прохождение по группам
						{
							if(!empty($infGroup['predmets']))
							{							
								foreach ($infGroup['predmets'] as $Typecontr => $predmet){	//прохождение по типам контроля дициплин
									//print_r($infGroup);
									foreach ($predmet as $IDEPC => $infpred) {	//прохождение по дисциплинам
										if(!empty($infGroup['predmets'][$Typecontr][$IDEPC]['students']))
										{	
											foreach ($infGroup['predmets'][$Typecontr][$IDEPC]['students'] as $fio => $mark) {	//формирование массива с оценками студентов по дисциплинам
															
												$this->arroc[$infGroup['grnum']][$fio][$Typecontr][$infpred['edu_name']] = array(
												'knum' => $infpred['knum'],
												'mark' => $mark
												);                                            
											}
										}                                   
									}                                
								}
							}							
						}
					} 
                    //print_r($this->arroc);
		}



        
}
?>