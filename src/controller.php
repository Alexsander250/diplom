<?php

namespace src;

class Controller
    { 
		private $poster; 
		function __construct() {
			$this->poster = new POST();
		}
        public function menu()
        {		
				
			if (empty($this->poster->post_dep))	//если не выбран институт, то открывается страница для отладки
			{
				$menu = new Menu;				
			}

			$dbd = new database;
			$service = new Service();

			switch ($this->poster->HTML_or_Excel){	
				case 1:
					$html = new html;
					break;
				case 0:
					if ($this->poster->post_dep!=7)	//если выбран ВУЦ, то excel файл формируется отдельно (с остальными институтами выявляются ошибки (требует доработки))
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
