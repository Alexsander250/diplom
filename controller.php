<?php

require __DIR__. '\src\database.php';
require __DIR__. '\src\menu.php';
require __DIR__. '\src\html.php';
require __DIR__. '\src\excel.php';


class Controller
    { 
		public $shirinatable=0;
		public $arr = array(); 

        public function menu()
        {		
			$dbd = new database;
			$menu = new Menu;
			if (isset($_POST['stud'])) {
				$post_stud = $_POST['stud'];
			} else {
				$post_stud = null;
			}
			if (isset($_POST['year'])) {
				$post_year = $_POST['year'];
			} else {
				$post_year = null;
			}
			if (isset($_POST['sem'])) {
				$post_sem = $_POST['sem'];
			} else {
				$post_sem = null;
			}
			if (isset($_POST['dep'])) {
				$post_dep = $_POST['dep'];
			} else {
				$post_dep = null;
			}
			if (isset($_POST['group'])) {
				$post_group = $_POST['group'];
			} else {
				$post_group = null;
			}
			if (isset($_POST['HTML_or_excel'])) {
				$HTML_or_Excel = $_POST['HTML_or_excel'];
			} else {
				$HTML_or_Excel = null;
			}
			$menu->printmenu($post_stud, $post_year, $post_sem, $post_dep, $post_group, $HTML_or_Excel);
					if ((int)$HTML_or_Excel === 1) {
						$arr=$dbd->dataminer($post_stud, $post_year, $post_sem, $post_dep, $post_group);
						$this->htmlprint($post_sem, $post_year, $post_stud, $arr, $dbd->shirinatable, $dbd->MaxKolExamOOP, $dbd->MaxKolExamVP, $dbd->MaxKolZachetOOP, $dbd->MaxKolZachetVP);
					} 
					else {
						$arr=$dbd->dataminer($post_stud, $post_year, $post_sem, $post_dep, $post_group);
						$this->excelprint($post_sem, $post_year, $post_stud, $arr, $dbd->shirinatable, $dbd->MaxKolExamOOP, $dbd->MaxKolExamVP, $dbd->MaxKolZachetOOP, $dbd->MaxKolZachetVP);
					}
		}


		public function htmlprint($post_sem, $post_year, $post_stud, $arr, $shirinatable, $MaxKolExamOOP, $MaxKolExamVP, $MaxKolZachetOOP, $MaxKolZachetVP){			
			$html = new html;
			$html->printhtml($post_sem, $post_year, $post_stud, $arr, $shirinatable, $MaxKolExamOOP, $MaxKolExamVP, $MaxKolZachetOOP, $MaxKolZachetVP);	
		}

		public function excelprint($post_sem, $post_year, $post_stud, $arr, $shirinatable, $MaxKolExamOOP, $MaxKolExamVP, $MaxKolZachetOOP, $MaxKolZachetVP){
			$excel = new excel;
			$excel->excelgenerator($post_sem, $post_year, $post_stud, $arr, $shirinatable, $MaxKolExamOOP, $MaxKolExamVP, $MaxKolZachetOOP, $MaxKolZachetVP);
				
		}

    }   
?>