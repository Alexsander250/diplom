<?php

namespace src;

class Controller
    { 
		public $shirinatable=0;
		public $arr = array();
		private $poster; 

		function __construct() {
			$this->poster = new POST();
		}
		

        public function menu()
        {		
			$dbd = new database;	
				
			if (empty($this->poster->post_dep))
			{
				$menu = new Menu;				
			}
			switch ($this->poster->HTML_or_Excel){
				case 1:
					$html = new html;
					break;
				case 0:
					if ($this->poster->post_dep!=7)
						{
							$excel = new Excel;
						}
						else
						{$excel = new Excelmil;}
					break;

			}
					
		}	

    }   
?>