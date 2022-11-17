<?php
namespace src;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\{Font, Border, Alignment};
    class Excel
    {
        private $border = array(
            'borders' => [
                'outline' => [
                    'borderStyle' => Border::BORDER_THICK,
                    'color' => [
                        'rgb' => '000000'
                    ]
                ],
                'inside' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => [
                        'rgb' => '000000'
                    ]
                ],
            ],
        );
        private $bukvaColum = array(
            'A',
            'B',
            'C',
            'D',
            'E',
            'F',
            'G',
            'H',
            'I',
            'J',
            'K',
            'L',
            'M',
            'N',
            'O',
            'P',
            'Q',
            'R',
            'S',
            'T',
            'U',
            'V',
            'W',
            'X',
            'Y',
            'Z',
            'AA',
            'AB'
        );


        private $shirinatable;
        private $strokaExcel;
        private $MaxKolExamOOP;
        private $MaxKolExamVP;
        private $MaxKolZachetOOP;
        private $MaxKolZachetVP;
        private $objExcel;
        private $sheet;
        private $poster;
        private $service;



        function __construct(){
            $this->poster = new POST();
            $this->service = new Service();
            $this->objExcel = new Spreadsheet();
            $this->objExcel->setActiveSheetIndex(0);
            $this->sheet = $this->objExcel->getActiveSheet(); 
            $this->MaxKolExamOOP = $this->service->MaxKolExamOOP;
            $this->MaxKolExamVP = $this->service->MaxKolExamVP;
            $this->MaxKolZachetOOP = $this->service->MaxKolZachetOOP;
            $this->MaxKolZachetVP = $this->service->MaxKolZachetVP;
            $this->shirinatable=$this->service->shirinatable;
            $this->excelgenerator();          
        }

        private function table_header_print()
        {
            $this->strokaExcel=2;
            $i=0;           		
            if ($this->poster->post_sem==0)
                    {
                        $this->sheet->setCellValueByColumnAndRow(1, 1, "Итоги сдачи весенней сессии в ".($this->poster->post_year-1)." - ".$this->poster->post_year." уч. году");
                        $this->sheet->getStyle("A".(1)."".":".$this->bukvaColum[$this->shirinatable]."".(1))->getAlignment()->setHorizontal('center');
                        $this->sheet->mergeCells("A".(1).":".$this->bukvaColum[$this->shirinatable]."".(1));
                        $this->sheet->getStyle("A".(1)."".":".$this->bukvaColum[$this->shirinatable]."".(1))->applyFromArray($this->border);
                        $this->sheet->getStyle("A".(1)."".":".$this->bukvaColum[$this->shirinatable]."".(1))->getFont()->setBold(true);  	
                        $this->sheet->getStyle("A".(1)."".":".$this->bukvaColum[$this->shirinatable]."".(1))->getFont()->setSize(15); 
                    }
                    else
                    {
                        $this->sheet->setCellValueByColumnAndRow(1, 1, "Итоги сдачи осенней сессии в ".($this->poster->post_year-1)." - ".$this->poster->post_year." уч. году");
                        $this->sheet->getStyle("A".(1)."".":".$this->bukvaColum[$this->shirinatable]."".(1))->getAlignment()->setHorizontal('center');
                        $this->sheet->mergeCells("A".(1).":".$this->bukvaColum[$this->shirinatable]."".(1));
                        $this->sheet->getStyle("A".(1)."".":".$this->bukvaColum[$this->shirinatable]."".(1))->applyFromArray($this->border);
                        $this->sheet->getStyle("A".(1)."".":".$this->bukvaColum[$this->shirinatable]."".(1))->getFont()->setBold(true);
                        $this->sheet->getStyle("A".(1)."".":".$this->bukvaColum[$this->shirinatable]."".(1))->getFont()->setSize(15);  
                    }
                    //return $this->sheet;
        }

        private function table_header_spec_print($infspec)
        {
                $this->sheet->setCellValueByColumnAndRow(1, $this->strokaExcel, $infspec['spname']);
                $this->sheet->mergeCells("A".($this->strokaExcel).":".$this->bukvaColum[$this->shirinatable]."".($this->strokaExcel));
                $this->sheet->getStyle("A".($this->strokaExcel)."".":".$this->bukvaColum[$this->shirinatable]."".($this->strokaExcel))->getAlignment()->setHorizontal('center');
                $this->sheet->mergeCells("A".($this->strokaExcel).":".$this->bukvaColum[$this->shirinatable]."".($this->strokaExcel));
                $this->sheet->getStyle("A".($this->strokaExcel)."".":".$this->bukvaColum[$this->shirinatable]."".($this->strokaExcel))->applyFromArray($this->border);
                $this->sheet->getStyle("A".($this->strokaExcel)."".":".$this->bukvaColum[$this->shirinatable]."".($this->strokaExcel))->getFont()->setBold(true);
                $this->sheet->getStyle("A".($this->strokaExcel).":".$this->bukvaColum[$this->shirinatable]."".($this->strokaExcel))->getAlignment()->setWrapText(true); 
                $this->sheet->getStyle("A".($this->strokaExcel)."".":".$this->bukvaColum[$this->shirinatable]."".($this->strokaExcel))->getFont()->setSize(10);
                $this->sheet->getRowDimension($this->strokaExcel)->setRowHeight(20);
                $this->strokaExcel++;
                //return $this->sheet;
        }

        private function table_header_spec_group_print($infGroup)
        {
            $v=$this->strokaExcel;	
                    $columnExcel=1;
                    $this->sheet->setCellValueByColumnAndRow(1, $this->strokaExcel, $infGroup['grnum']);
                    $this->sheet->mergeCells($this->bukvaColum[0]."".($this->strokaExcel).":".$this->bukvaColum[$this->shirinatable]."".($this->strokaExcel));
                    $this->sheet->getStyle($this->bukvaColum[0]."".($this->strokaExcel)."".":".$this->bukvaColum[$this->shirinatable]."".($this->strokaExcel))->getAlignment()->setHorizontal('center');
                    $this->sheet->getStyle($this->bukvaColum[0]."".($this->strokaExcel)."".":".$this->bukvaColum[$this->shirinatable]."".($this->strokaExcel))->applyFromArray($this->border); 
                    $this->strokaExcel++;
                    
                    $this->sheet->setCellValueByColumnAndRow(2, $this->strokaExcel, 'Дисциплины ООП');
                    $this->sheet->mergeCells($this->bukvaColum[$columnExcel]."".($this->strokaExcel).":".$this->bukvaColum[($columnExcel+$this->MaxKolExamOOP+$this->MaxKolZachetOOP-1)]."".($this->strokaExcel));
                    $this->sheet->getStyle($this->bukvaColum[$columnExcel]."".($this->strokaExcel)."".":".$this->bukvaColum[($columnExcel+$this->MaxKolExamOOP+$this->MaxKolZachetOOP-1)]."".($this->strokaExcel))->getAlignment()->setHorizontal('center');
                    $this->sheet->getStyle($this->bukvaColum[$columnExcel]."".($this->strokaExcel)."".":".$this->bukvaColum[($columnExcel+$this->MaxKolExamOOP+$this->MaxKolZachetOOP-1)]."".($this->strokaExcel))->applyFromArray($this->border);
                    $columnExcel=$columnExcel+$this->MaxKolExamOOP+$this->MaxKolZachetOOP; 
                    $this->strokaExcel++;
                    $columnExcel=1;
                    $this->sheet->setCellValueByColumnAndRow(2, $this->strokaExcel, 'Экзамен');
                    $this->sheet->mergeCells($this->bukvaColum[$columnExcel]."".($this->strokaExcel).":".$this->bukvaColum[($columnExcel+$this->MaxKolExamOOP-1)]."".($this->strokaExcel));
                    $this->sheet->getStyle($this->bukvaColum[$columnExcel]."".($this->strokaExcel).":".$this->bukvaColum[($columnExcel+$this->MaxKolExamOOP-1)]."".($this->strokaExcel))->applyFromArray($this->border); 
                    $this->sheet->getStyle($this->bukvaColum[$columnExcel]."".($this->strokaExcel).":".$this->bukvaColum[($columnExcel+$this->MaxKolExamOOP-1)]."".($this->strokaExcel))->getAlignment()->setHorizontal('center');
                    $columnExcel=$columnExcel+$this->MaxKolExamOOP;
                    $this->sheet->setCellValueByColumnAndRow($columnExcel+1, $this->strokaExcel, 'Зачеты');
                    $this->sheet->mergeCells($this->bukvaColum[$columnExcel]."".($this->strokaExcel).":".$this->bukvaColum[($columnExcel+$this->MaxKolZachetOOP-1)]."".($this->strokaExcel));
                    $this->sheet->getStyle($this->bukvaColum[$columnExcel]."".($this->strokaExcel).":".$this->bukvaColum[($columnExcel+$this->MaxKolZachetOOP-1)]."".($this->strokaExcel))->applyFromArray($this->border);
                    $this->sheet->getStyle($this->bukvaColum[$columnExcel]."".($this->strokaExcel).":".$this->bukvaColum[($columnExcel+$this->MaxKolZachetOOP-1)]."".($this->strokaExcel))->getAlignment()->setHorizontal('center'); 
                    $this->sheet->getStyle("A".($v)."".":".$this->bukvaColum[$this->shirinatable]."".($this->strokaExcel))->getFont()->setBold(true);
                    $this->strokaExcel++;
                    //return $this->sheet;
        }

        private function table_header_spec_group_pedmet_print($infGroup)
        {
            $columnExcelExamOOP=2;
            $columnExcelZachetOOP=$this->MaxKolExamOOP+2;
            $columnExcelExamVP=$columnExcelZachetOOP+$this->MaxKolZachetOOP;
            $columnExcelZachetVP=$columnExcelExamVP+$this->MaxKolExamVP;
            foreach ($infGroup as $Typecontr => $predmet) 
                {
                    foreach($predmet as $IDEPC => $infpred)
                    {
                        switch ($Typecontr)
                        {
                            case 'exam':
                               
                                    $this->sheet->setCellValueByColumnAndRow($columnExcelExamOOP, $this->strokaExcel, (string)$infpred['edu_name']); 
                                    $columnExcelExamOOP++;                                
                                break;
                            case 'zachet':
                            case 'difzachet':
                                
                                    $this->sheet->setCellValueByColumnAndRow($columnExcelZachetOOP, $this->strokaExcel, (string)$infpred['edu_name']); 
                                    $columnExcelZachetOOP++;
                                break;
                        }
                    }       
                }
                $columnExcel=1;
                $this->sheet->getStyle("A".($this->strokaExcel)."".":A".($this->strokaExcel))->applyFromArray($this->border);				
                $this->sheet->getStyle($this->bukvaColum[$columnExcel]."".($this->strokaExcel).":".$this->bukvaColum[($columnExcel+$this->MaxKolExamOOP-1)]."".($this->strokaExcel))->applyFromArray($this->border); 
                $columnExcel=$columnExcel+$this->MaxKolExamOOP;
                $this->sheet->getStyle($this->bukvaColum[$columnExcel]."".($this->strokaExcel).":".$this->bukvaColum[($columnExcel+$this->MaxKolZachetOOP-1)]."".($this->strokaExcel))->applyFromArray($this->border);
                $columnExcel=$columnExcel+$this->MaxKolZachetOOP;                
                $this->sheet->getStyle("A".($this->strokaExcel)."".":A".($this->strokaExcel))->getAlignment()->setWrapText(true);  //->getAlignment()->setWrapText(true)
                $this->sheet->getStyle("B".($this->strokaExcel).":".$this->bukvaColum[$this->shirinatable]."".($this->strokaExcel))->getAlignment()->setTextRotation(90);
                $this->sheet->getStyle("B".($this->strokaExcel).":".$this->bukvaColum[$this->shirinatable]."".($this->strokaExcel))->getAlignment()->setWrapText(true);
                $this->sheet->getStyle("B".($this->strokaExcel).":".$this->bukvaColum[$this->shirinatable]."".($this->strokaExcel))->getFont()->setBold(true);
                $this->sheet->getStyle("A".($this->strokaExcel)."".":".$this->bukvaColum[$this->shirinatable]."".($this->strokaExcel))->getFont()->setSize(10);
                $this->sheet->getRowDimension("".$this->strokaExcel."")->setRowHeight(150);
            //return $this->sheet;
        }

        private function table_stat_information_group_print($infGroup)
        {
            
            $columnExcelExamOOP=2;
            $columnExcelZachetOOP=$this->MaxKolExamOOP+2;

            $this->sheet->setCellValueByColumnAndRow(1, $this->strokaExcel, 'Ср. балл');
            $this->sheet->setCellValueByColumnAndRow(1, $this->strokaExcel+1, '5');
            $this->sheet->setCellValueByColumnAndRow(1, $this->strokaExcel+2, '4');
            $this->sheet->setCellValueByColumnAndRow(1, $this->strokaExcel+3, '3');
            $this->sheet->setCellValueByColumnAndRow(1, $this->strokaExcel+4, '2');
            $this->sheet->setCellValueByColumnAndRow(1, $this->strokaExcel+5, 'Не явка');
            $this->sheet->setCellValueByColumnAndRow(1, $this->strokaExcel+6, 'Зачет');
            $this->sheet->setCellValueByColumnAndRow(1, $this->strokaExcel+7, 'Не зачет');
            /* граница средних баллов */
            $columnExcel=1;
            $this->sheet->getStyle("A".($this->strokaExcel)."".":A".($this->strokaExcel))->applyFromArray($this->border);				
            $this->sheet->getStyle($this->bukvaColum[$columnExcel]."".($this->strokaExcel).":".$this->bukvaColum[($columnExcel+$this->MaxKolExamOOP-1)]."".($this->strokaExcel))->applyFromArray($this->border); 
            $columnExcel=$columnExcel+$this->MaxKolExamOOP;
            $this->sheet->getStyle($this->bukvaColum[$columnExcel]."".($this->strokaExcel).":".$this->bukvaColum[($columnExcel+$this->MaxKolZachetOOP-1)]."".($this->strokaExcel))->applyFromArray($this->border);
            $columnExcel=$columnExcel+$this->MaxKolZachetOOP;
            $this->sheet->getStyle("A".($this->strokaExcel)."".":".$this->bukvaColum[$this->shirinatable]."".($this->strokaExcel))->getFont()->setSize(8);
            /* границы баллов */
            $columnExcel=1;
            $this->sheet->getStyle("A".($this->strokaExcel+1)."".":A".($this->strokaExcel+4))->applyFromArray($this->border);				
            $this->sheet->getStyle($this->bukvaColum[$columnExcel]."".($this->strokaExcel+1).":".$this->bukvaColum[($columnExcel+$this->MaxKolExamOOP-1)]."".($this->strokaExcel+4))->applyFromArray($this->border); 
            $columnExcel=$columnExcel+$this->MaxKolExamOOP;
            $this->sheet->getStyle($this->bukvaColum[$columnExcel]."".($this->strokaExcel+1).":".$this->bukvaColum[($columnExcel+$this->MaxKolZachetOOP-1)]."".($this->strokaExcel+4))->applyFromArray($this->border);
            $columnExcel=$columnExcel+$this->MaxKolZachetOOP;
            $this->sheet->getStyle("A".($this->strokaExcel+1)."".":".$this->bukvaColum[$this->shirinatable]."".($this->strokaExcel+4))->getFont()->setSize(8);
            //граница не явки
            $columnExcel=1;
            $this->sheet->getStyle("A".($this->strokaExcel+5)."".":A".($this->strokaExcel+5))->applyFromArray($this->border);				
            $this->sheet->getStyle($this->bukvaColum[$columnExcel]."".($this->strokaExcel+5).":".$this->bukvaColum[($columnExcel+$this->MaxKolExamOOP-1)]."".($this->strokaExcel+5))->applyFromArray($this->border); 
            $columnExcel=$columnExcel+$this->MaxKolExamOOP;
            $this->sheet->getStyle($this->bukvaColum[$columnExcel]."".($this->strokaExcel+5).":".$this->bukvaColum[($columnExcel+$this->MaxKolZachetOOP-1)]."".($this->strokaExcel+5))->applyFromArray($this->border);
            $columnExcel=$columnExcel+$this->MaxKolZachetOOP;
            $this->sheet->getStyle("A".($this->strokaExcel+5)."".":".$this->bukvaColum[$this->shirinatable]."".($this->strokaExcel+5))->getFont()->setSize(8);

            $columnExcel=1;
            $this->sheet->getStyle("A".($this->strokaExcel+6)."".":A".($this->strokaExcel+7))->applyFromArray($this->border);				
            $this->sheet->getStyle($this->bukvaColum[$columnExcel]."".($this->strokaExcel+6).":".$this->bukvaColum[($columnExcel+$this->MaxKolExamOOP-1)]."".($this->strokaExcel+7))->applyFromArray($this->border); 
            $columnExcel=$columnExcel+$this->MaxKolExamOOP;
            $this->sheet->getStyle($this->bukvaColum[$columnExcel]."".($this->strokaExcel+6).":".$this->bukvaColum[($columnExcel+$this->MaxKolZachetOOP-1)]."".($this->strokaExcel+7))->applyFromArray($this->border);
            $columnExcel=$columnExcel+$this->MaxKolZachetOOP;
            $this->sheet->getStyle("A".($this->strokaExcel+6)."".":".$this->bukvaColum[$this->shirinatable]."".($this->strokaExcel+7))->getFont()->setSize(8);

            foreach ($infGroup as $Typecontr => $predmet) 
                {                    
                    foreach($predmet as $IDEPC => $infpred)
                    {
                       
                            switch ($Typecontr)
                            {
                                case 'exam':
                                    if(!empty($infpred['avg']))
                                    {
                                        $this->sheet->setCellValueByColumnAndRow($columnExcelExamOOP, $this->strokaExcel, $infpred['avg']);
                                        $this->sheet->setCellValueByColumnAndRow($columnExcelExamOOP, $this->strokaExcel+1, $infpred['marks'][5]);
                                        $this->sheet->setCellValueByColumnAndRow($columnExcelExamOOP, $this->strokaExcel+2, $infpred['marks'][4]);
                                        $this->sheet->setCellValueByColumnAndRow($columnExcelExamOOP, $this->strokaExcel+3, $infpred['marks'][3]);
                                        $this->sheet->setCellValueByColumnAndRow($columnExcelExamOOP, $this->strokaExcel+4, $infpred['marks'][2]);
                                        $this->sheet->setCellValueByColumnAndRow($columnExcelExamOOP, $this->strokaExcel+5, $infpred['marks'][1]); 
                                        $columnExcelExamOOP++;  
                                    }                              
                                    break;
                                case 'zachet':
                                    if(!empty($infpred['marks']))
                                    {
                                        $this->sheet->setCellValueByColumnAndRow($columnExcelZachetOOP, $this->strokaExcel+6, $infpred['marks'][5]);
                                        $this->sheet->setCellValueByColumnAndRow($columnExcelZachetOOP, $this->strokaExcel+7, $infpred['marks'][1]);
                                        $columnExcelZachetOOP++;
                                    }
                                    break;
                                case 'difzachet': 
                                    if(!empty($infpred['avg']))
                                    {                               
                                        $this->sheet->setCellValueByColumnAndRow($columnExcelZachetOOP, $this->strokaExcel, $infpred['avg']);
                                        $this->sheet->setCellValueByColumnAndRow($columnExcelZachetOOP, $this->strokaExcel+1, $infpred['marks'][5]);
                                        $this->sheet->setCellValueByColumnAndRow($columnExcelZachetOOP, $this->strokaExcel+2, $infpred['marks'][4]);
                                        $this->sheet->setCellValueByColumnAndRow($columnExcelZachetOOP, $this->strokaExcel+3, $infpred['marks'][3]);
                                        $this->sheet->setCellValueByColumnAndRow($columnExcelZachetOOP, $this->strokaExcel+4, $infpred['marks'][2]);  
                                        $this->sheet->setCellValueByColumnAndRow($columnExcelZachetOOP, $this->strokaExcel+5, $infpred['marks'][1]);
                                        $columnExcelZachetOOP++;
                                    }
                                    break;
                            }  
                                              
                    }       
                }
                $this->strokaExcel=$this->strokaExcel+7;
            //return $this->sheet;
        }

        private function table_student_information_group_print($grnum)
        {
            $num=0;
            $firstExcelstroka=$this->strokaExcel;
            if(!empty($this->service->arroc[$grnum]))
            {
                foreach($this->service->arroc[$grnum] as $FIO => $infstudent)
                {
                    $columnExcelExamOOP=2;
                    $columnExcelZachetOOP=$this->MaxKolExamOOP+2;
                    $i=0;
                    $num++;
                    $columnExcel=1;
                    $str="".$num.". ".$FIO."";							
                    $this->sheet->setCellValueByColumnAndRow(1, $this->strokaExcel, $str);
                    foreach ($infstudent as $Typecontr => $predmet) 
                    {
                        foreach($predmet as $IDEPC => $infpred)
                        {
                            switch ($Typecontr)
                            {
                                case 'exam':
                                
                                        if ($infpred['mark']!=1)
                                        {
                                            $this->sheet->setCellValueByColumnAndRow($columnExcelExamOOP, $this->strokaExcel, $infpred['mark']); 
                                        }
                                        else
                                        {
                                            $this->sheet->setCellValueByColumnAndRow($columnExcelExamOOP, $this->strokaExcel, 'Не явка'); 
                                        }                                    
                                        $columnExcelExamOOP++;
                                    break;
                                case 'zachet':                               
                                        if($infpred['mark']=='7')
                                                {											
                                                    $this->sheet->setCellValueByColumnAndRow($columnExcelZachetOOP, $this->strokaExcel, "зачет");			
                                                }
                                                else
                                                {											
                                                    $this->sheet->setCellValueByColumnAndRow($columnExcelZachetOOP, $this->strokaExcel, "не зачет");									
                                                }                                   
                                        $columnExcelZachetOOP++;
                                    break;
                                case 'difzachet':
                                    
                                        if ($infpred['mark']!=1)
                                        {
                                            $this->sheet->setCellValueByColumnAndRow($columnExcelZachetOOP, $this->strokaExcel, $infpred['mark']);
                                        }
                                        else
                                        {
                                            $this->sheet->setCellValueByColumnAndRow($columnExcelZachetOOP, $this->strokaExcel, 'Не явка'); 
                                        }                                     
                                        $columnExcelZachetOOP++;
                                    break;
                            }                        
                        }  
                    }
                    $this->strokaExcel++;
                }
            }
            //границы таблицы
            $columnExcel=1;
                $this->sheet->getStyle("A".($firstExcelstroka)."".":A".($this->strokaExcel))->applyFromArray($this->border);				
                $this->sheet->getStyle($this->bukvaColum[$columnExcel]."".($firstExcelstroka).":".$this->bukvaColum[($columnExcel+$this->MaxKolExamOOP-1)]."".($this->strokaExcel))->applyFromArray($this->border); 
                $columnExcel=$columnExcel+$this->MaxKolExamOOP;
                $this->sheet->getStyle($this->bukvaColum[$columnExcel]."".($firstExcelstroka).":".$this->bukvaColum[($columnExcel+$this->MaxKolZachetOOP-1)]."".($this->strokaExcel))->applyFromArray($this->border);
                $columnExcel=$columnExcel+$this->MaxKolZachetOOP;
                $this->sheet->getStyle("A".($firstExcelstroka)."".":".$this->bukvaColum[$this->shirinatable]."".($this->strokaExcel))->getFont()->setSize(8);
        }

        private function file_download($file)
        {
            if (file_exists($file)) {
                ob_clean();
                header('Content-Description: File Transfer');
                header('Content-Type: application/vnd.ms-excel');
                header('Content-Disposition: attachment; filename="'.basename($file).'"');
                //header('Expires: 0');
                //header('Cache-Control: must-revalidate');
                //header('Pragma: public');
                //header('Content-Length: ' . filesize($file));
                readfile($file);
                //exit;
            }


        }

        public function excelgenerator()
        {
            
            $this->table_header_print();
            //print_r($this->service->array);
            
            foreach($this->service->array as $specID => $infspec)
            {
                             
                    $this->table_header_spec_print($infspec);
                 
                    foreach($infspec['groups'] as $id_group => $infGroup)
                    {
                        if(!empty($infGroup['predmets']) && !empty($infGroup['grnum']) )   
                        { 
                        $this->table_header_spec_group_print($infGroup);
                        $v=$this->strokaExcel;
                        
                        $this->table_header_spec_group_pedmet_print($infGroup['predmets']);
                        $this->strokaExcel++;
                        if($this->poster->post_stud==1)
                        $this->table_student_information_group_print($infGroup['grnum']);
                                        
                        $this->table_stat_information_group_print($infGroup['predmets']);
                        $this->strokaExcel++;
                        }
                    }                                       
            }            
            if ((int)$this->poster->post_stud === 1) {
                $this->sheet->getColumnDimension('A')->setWidth(20);
                
                $this->sheet->getStyle("A3:A" . ($this->strokaExcel))
                    ->getAlignment()->setWrapText(true);
            } else {
                $this->sheet->getColumnDimension('A')->setWidth(10);
            }
            $writer = new Xlsx($this->objExcel);
            $date = date('d-m-y-'.substr((string)microtime(), 1, 8));
            $date = str_replace(".", "", $date);
            $filename = "export_".$date.".xlsx";
            $writer->save($filename);
            $this->file_download($filename);
                    
            
        }
    }
?>
