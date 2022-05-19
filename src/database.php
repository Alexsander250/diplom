<?php

    class database{

		public $shirinatable1;
		public $MaxKolExamOOP;
		public $MaxKolExamVP;
		public $MaxKolZachetOOP;
		public $MaxKolZachetVP;

		public function datadepartments()
		{
			$db = new PDO('mysql:host=localhost;charset=utf8;dbname=testovoe','root','');
			$SQL='SELECT `fnum` , `fname`
					FROM `departments`';
			$result = $db->query($SQL);
			return $result;
		}

		public function datagroups($post_dep)
		{
			$db = new PDO('mysql:host=localhost;charset=utf8;dbname=testovoe','root','');
			$SQL="SELECT  `groups`.`grnum` from `groups` where `groups`.`faculty`=".$post_dep."";
			$result = $db->query($SQL);
			return $result;
		}

        public function dataminer($post_stud, $post_year, $post_sem, $post_dep, $post_group)
        {
			
			$arrayBasic = array();
			$arryear = array();
			$arred = array();
			$arrgr = array();
			$arrgrZAP = array();
			$arreid = array();
			$arreidZAP = array();
			$db = new PDO('mysql:host=localhost;charset=utf8;dbname=testovoe','root','');
			// Получение специальностей
			$SQL = "SELECT S.`id`, SP.`Name`, SP.`new_code`
					FROM `eduplans` ED
					LEFT JOIN `groups` GR ON GR.`IDEP` = ED.`IDEP`
					LEFT JOIN `specializations` S ON S.`id` = ED.`IDSp`
					LEFT JOIN `specialities` SP ON SP.`id` = S.`specialityID`
					WHERE GR.`faculty` ='" . $post_dep . "'";
			if (!empty($post_group)) {
				$SQL .= " and GR.`grnum`='" . $post_group . "'";
			} else {
				$SQL .= " and GR.`active` = '1'";
			}
			//echo $SQL;
			//echo '<br>';
			$result = $db->query($SQL);
		
			$i = 0;
			foreach ($result as $row) {
				//$arred[$i]=$row['IDEP'];
				$arrayBasic[$row['id']] = array('spname' => $row['Name'], 'newcode' => $row['new_code']);
				//$i++;
			}
			// var_dump($arred);
			// echo implode(', ', $arred);
		
			// Получение групп по специальностям
			$SQL = "SELECT S.`id`, GR.`EnrollYear`, GR.`grid`, GR.`grnum`
					FROM `groups` GR
					LEFT JOIN `eduplans` EDP ON GR.`IDEP` = EDP.`IDEP`
					LEFT JOIN `specializations` S ON S.`id` = EDP.`IDSp`
					LEFT JOIN `specialities` SP ON SP.`id` = S.`specialityID`
					where GR.`faculty` = '" . $post_dep . "' ";//and `eduplans`.`IDEP` IN ('".implode("','",$arred)."')"
			if (!empty($post_group)) {
				$SQL .= " and GR.`grnum` = '" . $post_group . "'";
			} else {
				$SQL .= " and GR.`active` = '1'";
			}
			//echo '<br>';
			//echo $SQL;
			$result = $db->query($SQL);
			$i = 0;
			foreach ($result->fetchAll(PDO::FETCH_ASSOC) as $row) {
				$arrgrZAP[$i] = $row['grnum'];
				//$arryear[$row['Sp']][$row['grnum']]=$row['FYear'];
		
				$arrayBasic[$row['id']]['groups'][$row['grid']] = array('grnum' => $row['grnum'], 'Fyear' => $row['EnrollYear']);
				$i++;
			}
		
			//echo implode(', ', $arrgrZAP);
			// Получение предметов изучаемых в группе
			$SQL = "SELECT distinct S.`id` , GR.`grid`, EDPC.`IDEPC`, EDPC.`SemNum`, DEP.`fnum`, EDPC.`Subg` , EDPC.`IDContr`
					FROM `marks` M
					LEFT JOIN `eduplancontent` EDPC ON EDPC.`IDEPC` = M.`IDEPC`
					LEFT JOIN `eduplans`EDP ON EDP.`IDEP` = EDPC.`IDEP`
					LEFT JOIN `groups` GR ON GR.`IDEP` = EDP.`IDEP`
					LEFT JOIN `chairs` CH ON CH.`depid` = EDPC.`chair`
					LEFT JOIN `departments` DEP ON DEP.`fnum` = CH.`Faculty`
					LEFT JOIN `specializations` S ON S.`id` = EDP.`IDSp`
					LEFT JOIN `specialities` SP ON SP.`id` = S.`specialityID`
					where GR.`grnum` ";
			if (empty($post_group)) {
				$SQL .= " IN ('" . implode("','", $arrgrZAP) . "')";
			} else {
				$SQL .= " = '" . $post_group . "'";
			}
			
			$result = $db->query($SQL);
			//echo "<br><br>";
			//echo $SQL;
			$i = 0;
			foreach ($result->fetchAll(PDO::FETCH_ASSOC) as $row) {
				if (!empty($arrayBasic[$row['id']]['groups'][$row['grid']])) {
					if (empty($post_year)) {
						$sem = (($current_year - $arrayBasic[$row['id']]['groups'][$row['grid']]['Fyear']) * 2) - $post_sem;
					} else {
						if ((int)$post_sem === 2) {
							$sem = (($post_year - $arrayBasic[$row['id']]['groups'][$row['grid']]['Fyear']) * 2);
						} else {
							$sem = (($post_year - $arrayBasic[$row['id']]['groups'][$row['grid']]['Fyear']) * 2) - $post_sem;
						}
					}
		
					if ((int)$row['SemNum'] === $sem) {
						$arrayBasic[$row['id']]['groups'][$row['grid']]['predmets'][$row['IDEPC']] = array(
							'knum' => $row['fnum'],
							'edu_name' => $row['Subg'],
							'type_cont' => $row['IDContr'],
							'semnum' => $row['SemNum']
						);
					}
				}
				$i++;
			}
			
		
			// получение оценок студентов в группах
			$SQL = "SELECT distinct S.`id`, GR.`grid`, EDU.`Groupid`, EDPC.`IDEPC`, STUD.`STID`, STUD.`FirstName`, STUD.`LastName`, STUD.`MiddleName`, STUD.`FullNameDat`, STUD.`LastName`, STUD.`MiddleName`, M.`res`
					FROM `marks` M
					LEFT JOIN `eduplancontent` EDPC ON EDPC.`IDEPC` = M.`IDEPC`
					LEFT JOIN `eduplans`EDP ON EDP.`IDEP` = EDPC.`IDEP`
					LEFT JOIN `groups` GR ON GR.`IDEP` = EDP.`IDEP`
					LEFT JOIN `eduunit` EDU ON EDU.`eid` = M.`IDEdu`
					LEFT JOIN `students` STUD ON STUD.`STID` = EDU.`STID`
					LEFT JOIN `specializations` S ON S.`id` = EDP.`IDSp`
					LEFT JOIN `specialities` SP ON SP.`id` = S.`specialityID`
					where GR.`grnum` IN ('" . implode("','", $arrgrZAP) . "')
			";
			//echo $SQL;
			//echo "<br><br>";
			$result = $db->query($SQL);
			foreach ($result->fetchAll(PDO::FETCH_ASSOC) as $row) {
				//$fio=$row['fam']." ".$row['lname']." ".$row['sname'];
				if (!empty($arrayBasic[$row['id']]['groups'][$row['grid']]['predmets'][$row['IDEPC']])) {
					if ((int)$row['grid'] === (int)$row['Groupid']) {
						$fio = $row['LastName'] . " " . $row['FirstName'] . " " . $row['MiddleName'] . " " . $row['FullNameDat'];
						$arrayBasic[$row['id']]['groups'][$row['grid']]['predmets'][$row['IDEPC']]['students'][$fio] = $row['res'];
					}
				}
			}
		
			// Вычисление средних баллов и колличества оценок
		
		
			$MaxKolExamVP = 0;
			$MaxKolExamOOP = 0;
			$MaxKolZachetVP = 0;
			$MaxKolZachetOOP = 0;
			$kolExamVP = 0;
			$kolExamOOP = 0;
			$kolZachetOOP = 0;
			$kolZachetVP = 0;
		
			foreach ($arrayBasic as $specID => $rowSpec) {
				foreach ($rowSpec['groups'] as $id_group => $infGroup) {
		
					if (!empty($infGroup['predmets'])) {
						foreach ($infGroup['predmets'] as $IDEPC => $infpred) {
							if (!empty($arrayBasic[$specID]['groups'][$id_group]['predmets'][$IDEPC]['type_cont'])) {
								switch ((int)$infpred['type_cont']) {
									case 1:
										if ((int)$infpred['knum'] === 7) {
											$kolExamVP++;
										} else {
											$kolExamOOP++;
										}
										break;
									case 2:
									case 6:
										if ((int)$infpred['knum'] === 7) {
											$kolZachetVP++;
										} else {
											$kolZachetOOP++;
										}
										break;
								}
							}
		
							if (!empty($arrayBasic[$specID]['groups'][$id_group]['predmets'][$IDEPC]['students'])) {
								$kol = 0;
								$sum = 0;
								$five = 0;
								$four = 0;
								$three = 0;
								$two = 0;
								$one = 0;
								foreach ($infpred['students'] as $fio => $ocenka) {
									$kol++;
									$sum += $ocenka;
									switch ($ocenka) {
										case 2:
										case 6:
											$two++;
											break;
										case 3:
											$three++;
											break;
										case 4:
											$four++;
											break;
										case 5:
										case 7:
											$five++;
											break;
										case 1:
											$one++;
											break;
									}
								}
								$avg = $sum / $kol;
								$arrayBasic[$specID]['groups'][$id_group]['predmets'][$IDEPC]['avg'] = round($avg, 2);
								$arrayBasic[$specID]['groups'][$id_group]['predmets'][$IDEPC]['marks']['4'] = $four;
								$arrayBasic[$specID]['groups'][$id_group]['predmets'][$IDEPC]['marks']['3'] = $three;
		
		
								$arrayBasic[$specID]['groups'][$id_group]['predmets'][$IDEPC]['marks']['5'] = $five;
								$arrayBasic[$specID]['groups'][$id_group]['predmets'][$IDEPC]['marks']['2'] = $two;
								$arrayBasic[$specID]['groups'][$id_group]['predmets'][$IDEPC]['marks']['1'] = $one;
								ksort($arrayBasic[$specID]['groups'][$id_group]['predmets'][$IDEPC]['students']);
							}
						}
					}
		
					if ($MaxKolExamVP < $kolExamVP) {
						$MaxKolExamVP = $kolExamVP;
					}
		
					if ($MaxKolExamOOP < $kolExamOOP) {
						$MaxKolExamOOP = $kolExamOOP;
					}
		
					if ($MaxKolZachetVP < $kolZachetVP) {
						$MaxKolZachetVP = $kolZachetVP;
					}
		
					if ($MaxKolZachetOOP < $kolZachetOOP) {
						$MaxKolZachetOOP = $kolZachetOOP;
					}
		
					$kolZachetOOP = 0;
					$kolZachetVP = 0;
					$kolExamOOP = 0;
					$kolExamVP = 0;
				}
			}
			$shirinatable = $MaxKolExamOOP + $MaxKolExamVP + $MaxKolZachetOOP + $MaxKolZachetVP + 1;
			$this->shirinatable = $shirinatable;
			$this->MaxKolExamOOP = $MaxKolExamOOP;
			$this->MaxKolExamVP = $MaxKolExamVP;
			$this->MaxKolZachetOOP = $MaxKolZachetOOP;
			$this->MaxKolZachetVP = $MaxKolZachetVP;
			//echo $shirinatable;
			//print_r($arrayBasic);
			
			return $arrayBasic;

        }

	public function getshirinatable()
	{
		echo $this->shirinatable;
	}
		
    }

?>