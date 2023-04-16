<?php
namespace src;

require(__DIR__."\..\config.php");
use PDO;
    class database{
		public $shirinatable;
		public $MaxKolExamOOP;
		public $MaxKolExamVP;
		public $MaxKolZachetOOP;
		public $MaxKolZachetVP;
		private $arrayBasic = array();
		private $arrgrZAP = array();
		private $db;
		private $post;
		
		function __construct() {
			$dbHost=defined('dbHost') ? dbHost :'';
			$dbName=defined('dbName') ? dbName :'';
			$dbUser=defined('dbUser') ? dbUser :'';
			$dbPassword=defined('dbPassword') ? dbPassword :'';
			$this->db = new PDO(				sprintf('mysql:host=%s;charset=utf8;dbname=%s',$dbHost,$dbName),$dbUser,$dbPassword			);
			$this->poster = new POST();
		}

		function __destruct() {
			$this->db = null;
		}

		

		public function datadepartments()	//получение списка институтов для выпадающегося списка
		{
			$SQL='SELECT `fnum` , `fname`
					FROM `departments`';
			$result = $this->db->query($SQL);
			return $result;
		}

		public function datagroups()	//получение списка групп для выпадающегося списка
		{
			$SQL="SELECT  `groups`.`grnum` from `groups` where `groups`.`faculty`=".$this->poster->post_dep."";
			$result = $this->db->query($SQL);
			return $result;
		}


		public function get_data_group_of_spec()	//получение информации о специальностях и группах обучающихся по выбранным специальностям
		{	
			// Получение групп по специальностям
				$SQL = "SELECT S.`id`, SP.`gosStudyTerms`, SP.`Name`, SP.`new_code`, GR.`EnrollYear`, GR.`grid`, GR.`grnum`
				FROM `groups` GR
				LEFT JOIN `eduplans` EDP ON GR.`IDEP` = EDP.`IDEP`
				LEFT JOIN `specializations` S ON S.`id` = EDP.`IDSp`
				LEFT JOIN `specialities` SP ON SP.`id` = S.`specialityID`
				where GR.`faculty` = '" . $this->poster->post_dep . "' ";
				if (!empty($this->poster->post_group)) {							//если не выбрана группа, то выбираются группы обучающихся в выбранный учебный год				
					$SQL .= " and GR.`grnum` = '" . $this->poster->post_group . "'";
				} else {
					$SQL .= " and GR.`EnrollYear` >= '".($this->poster->post_year-5)."' and GR.`EnrollYear` < '".($this->poster->post_year)."'";
				}
				$result = $this->db->query($SQL);
				$result=$result->fetchAll();				
				return $result;

		}

		public function list_groups()	// получение списка групп (для фильтрации в будуших запросах)
		{
			$SQL = "SELECT GR.`grid`, GR.`grnum`
					FROM `groups` GR
					LEFT JOIN `eduplans` EDP ON GR.`IDEP` = EDP.`IDEP`
					LEFT JOIN `specializations` S ON S.`id` = EDP.`IDSp`
					where GR.`faculty` = '" . $this->poster->post_dep . "' ";
			if (!empty($this->poster->post_group)) {								//если не выбрана группа, то выбираются группы обучающихся в выбранный учебный год
				$SQL .= " and GR.`grnum` = '" . $this->poster->post_group . "'";
			} else {
				$SQL .= " and GR.`EnrollYear` >= '".($this->poster->post_year-5)."' and GR.`EnrollYear` < '".($this->poster->post_year)."'";
			}			
			$result = $this->db->query($SQL);
			return $result;
		}

		public function get_predmets($arrgrZAP)	//получение предметов и ифнормации о них, изучаемых группами
		{
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
			if (empty($this->poster->post_group)) {									//если не выбрана группа, то выбираются предметы полученные через массив arrgrZAP
				$SQL .= " IN ('" . implode("','", $arrgrZAP) . "')";
			} else {
				$SQL .= " = '" . $this->poster->post_group . "'";
			}			
			$result = $this->db->query($SQL);
			$result=$result->fetchAll();
			return $result;
		}

		public function get_marks_students($arrgrZAP)		//получение оценок студентов
		{
			$SQL = "SELECT distinct S.`id`, GR.`grid`, EDU.`Groupid`, EDPC.`IDEPC`, EDPC.`IDContr`, STUD.`STID`, STUD.`FirstName`, STUD.`LastName`, STUD.`MiddleName`, STUD.`FullNameDat`, STUD.`LastName`, STUD.`MiddleName`, M.`res`
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
			$result = $this->db->query($SQL);
			$result=$result->fetchAll();
			return $result;
		}
    }

?>