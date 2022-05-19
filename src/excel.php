<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\{Font, Border, Alignment};
    class Excel
    {
        public function excelgenerator($post_sem, $post_year, $post_stud, $arrayBasic, $shirinatable, $MaxKolExamOOP, $MaxKolExamVP, $MaxKolZachetOOP, $MaxKolZachetVP)
        {
            $objExcel = new Spreadsheet();
            $objExcel->setActiveSheetIndex(0);
            $sheet = $objExcel->getActiveSheet();
            $bukvaColum = array(
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
            
            
            $border = array(
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
            $strokaExcel=2;
            $i=0;
            $shirinatable=$shirinatable-1;		
            if ($post_sem==0)
                    {
                        $sheet->setCellValueByColumnAndRow(1, 1, "Итоги сдачи весенней сессии в ".($post_year-1)." - ".$post_year." уч. году");
                       // $sheet->getStyle("A".(1)."".":".$bukvaColum[$shirinatable]."".(1))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                        $sheet->mergeCells("A".(1).":".$bukvaColum[$shirinatable]."".(1));
                        $sheet->getStyle("A".(1)."".":".$bukvaColum[$shirinatable]."".(1))->applyFromArray($border);
                        $sheet->getStyle("A".(1)."".":".$bukvaColum[$shirinatable]."".(1))->getFont()->setBold(true);  	
                        $sheet->getStyle("A".(1)."".":".$bukvaColum[$shirinatable]."".(1))->getFont()->setSize(15); 
                    }
                    else
                    {
                        $sheet->setCellValueByColumnAndRow(1, 1, "Итоги сдачи осенней сессии в ".($post_year-1)." - ".$post_year." уч. году");
                        //$sheet->getStyle("A".(1)."".":".$bukvaColum[$shirinatable]."".(1))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                        $sheet->mergeCells("A".(1).":".$bukvaColum[$shirinatable]."".(1));
                        $sheet->getStyle("A".(1)."".":".$bukvaColum[$shirinatable]."".(1))->applyFromArray($border);
                        $sheet->getStyle("A".(1)."".":".$bukvaColum[$shirinatable]."".(1))->getFont()->setBold(true);
                        $sheet->getStyle("A".(1)."".":".$bukvaColum[$shirinatable]."".(1))->getFont()->setSize(15);  
                    }
            
            //$sheet->setCellValueByColumnAndRow(1, 1, "Итоги сдачи сессии");
            foreach($arrayBasic as $specID => $infspec)
            {
                
                $sheet->setCellValueByColumnAndRow(1, $strokaExcel, $infspec['spname']);
                $sheet->mergeCells("A".($strokaExcel).":".$bukvaColum[$shirinatable]."".($strokaExcel));
                //$sheet->getStyle("A".($strokaExcel)."".":".$bukvaColum[$shirinatable]."".($strokaExcel))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $sheet->mergeCells("A".($strokaExcel).":".$bukvaColum[$shirinatable]."".($strokaExcel));
                $sheet->getStyle("A".($strokaExcel)."".":".$bukvaColum[$shirinatable]."".($strokaExcel))->applyFromArray($border);
                $sheet->getStyle("A".($strokaExcel)."".":".$bukvaColum[$shirinatable]."".($strokaExcel))->getFont()->setBold(true);
                $sheet->getStyle("A".($strokaExcel).":".$bukvaColum[$shirinatable]."".($strokaExcel))->getAlignment()->setWrapText(true); 
                $sheet->getStyle("A".($strokaExcel)."".":".$bukvaColum[$shirinatable]."".($strokaExcel))->getFont()->setSize(10);
                $sheet->getRowDimension($strokaExcel)->setRowHeight(20);
                $strokaExcel++;
                //echo $strokaExcel;			
                
                foreach($infspec['groups'] as $id_group => $infGroup)
                {	
                    
                    $v=$strokaExcel;	
                    $columnExcel=1;
                    $sheet->setCellValueByColumnAndRow(1, $strokaExcel, $infGroup['grnum']);
                    $sheet->mergeCells($bukvaColum[0]."".($strokaExcel).":".$bukvaColum[$shirinatable]."".($strokaExcel));
                    //$sheet->getStyle($bukvaColum[0]."".($strokaExcel)."".":".$bukvaColum[$shirinatable]."".($strokaExcel))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                    $sheet->getStyle($bukvaColum[0]."".($strokaExcel)."".":".$bukvaColum[$shirinatable]."".($strokaExcel))->applyFromArray($border); 
                    $strokaExcel++;
                    
                    $sheet->setCellValueByColumnAndRow(2, $strokaExcel, 'Дисциплины ООП');
                    $sheet->mergeCells($bukvaColum[$columnExcel]."".($strokaExcel).":".$bukvaColum[($columnExcel+$MaxKolExamOOP+$MaxKolZachetOOP-1)]."".($strokaExcel));
                    //$sheet->getStyle($bukvaColum[$columnExcel]."".($strokaExcel)."".":".$bukvaColum[($columnExcel+$MaxKolExamOOP+$MaxKolZachetOOP-1)]."".($strokaExcel))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                    $sheet->getStyle($bukvaColum[$columnExcel]."".($strokaExcel)."".":".$bukvaColum[($columnExcel+$MaxKolExamOOP+$MaxKolZachetOOP-1)]."".($strokaExcel))->applyFromArray($border);
                    $columnExcel=$columnExcel+$MaxKolExamOOP+$MaxKolZachetOOP; 
                    $sheet->setCellValueByColumnAndRow($columnExcel+1, $strokaExcel, 'Дисциплины ВП');
                    $sheet->mergeCells($bukvaColum[$columnExcel]."".($strokaExcel).":".$bukvaColum[$shirinatable]."".($strokaExcel));
                    $sheet->getStyle($bukvaColum[$columnExcel]."".($strokaExcel)."".":".$bukvaColum[$shirinatable]."".($strokaExcel))->applyFromArray($border);
                    //$sheet->getStyle($bukvaColum[$columnExcel]."".($strokaExcel)."".":".$bukvaColum[$shirinatable]."".($strokaExcel))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);  
                    $strokaExcel++;
                    $columnExcel=1;
                    $sheet->setCellValueByColumnAndRow(2, $strokaExcel, 'Экзамен');
                    $sheet->mergeCells($bukvaColum[$columnExcel]."".($strokaExcel).":".$bukvaColum[($columnExcel+$MaxKolExamOOP-1)]."".($strokaExcel));
                    $sheet->getStyle($bukvaColum[$columnExcel]."".($strokaExcel).":".$bukvaColum[($columnExcel+$MaxKolExamOOP-1)]."".($strokaExcel))->applyFromArray($border); 
                    //$sheet->getStyle($bukvaColum[$columnExcel]."".($strokaExcel).":".$bukvaColum[($columnExcel+$MaxKolExamOOP-1)]."".($strokaExcel))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                    $columnExcel=$columnExcel+$MaxKolExamOOP;
                    $sheet->setCellValueByColumnAndRow($columnExcel+1, $strokaExcel, 'Зачеты');
                    $sheet->mergeCells($bukvaColum[$columnExcel]."".($strokaExcel).":".$bukvaColum[($columnExcel+$MaxKolZachetOOP-1)]."".($strokaExcel));
                    $sheet->getStyle($bukvaColum[$columnExcel]."".($strokaExcel).":".$bukvaColum[($columnExcel+$MaxKolZachetOOP-1)]."".($strokaExcel))->applyFromArray($border);
                    //$sheet->getStyle($bukvaColum[$columnExcel]."".($strokaExcel).":".$bukvaColum[($columnExcel+$MaxKolZachetOOP-1)]."".($strokaExcel))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);   
                    $columnExcel=$columnExcel+$MaxKolZachetOOP;
                    $sheet->setCellValueByColumnAndRow($columnExcel+1, $strokaExcel, 'Экзамен');
                    $sheet->mergeCells($bukvaColum[$columnExcel]."".($strokaExcel).":".$bukvaColum[($columnExcel+$MaxKolExamVP-1)]."".($strokaExcel));
                    $sheet->getStyle($bukvaColum[$columnExcel]."".($strokaExcel).":".$bukvaColum[($columnExcel+$MaxKolExamVP-1)]."".($strokaExcel))->applyFromArray($border);
                    //$sheet->getStyle($bukvaColum[$columnExcel]."".($strokaExcel).":".$bukvaColum[($columnExcel+$MaxKolExamVP-1)]."".($strokaExcel))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);   
                    $columnExcel=$columnExcel+$MaxKolExamVP;
                    $sheet->setCellValueByColumnAndRow($columnExcel+1, $strokaExcel, 'Зачеты');
                    $sheet->mergeCells($bukvaColum[$columnExcel]."".($strokaExcel).":".$bukvaColum[($columnExcel+$MaxKolZachetVP-1)]."".($strokaExcel));
                    $sheet->getStyle($bukvaColum[$columnExcel]."".($strokaExcel).":".$bukvaColum[($columnExcel+$MaxKolZachetVP-1)]."".($strokaExcel))->applyFromArray($border);
                    //$sheet->getStyle($bukvaColum[$columnExcel]."".($strokaExcel).":".$bukvaColum[($columnExcel+$MaxKolZachetVP-1)]."".($strokaExcel))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);   
                    $sheet->getStyle("A".($v)."".":".$bukvaColum[$shirinatable]."".($strokaExcel))->getFont()->setBold(true);   
                    $strokaExcel++;				
                    $i=0;
                    $columnExcel=2;
                    foreach ($infGroup['predmets'] as $eid => $infpred)
                    {	
                        if ((string)$infpred['knum']!='7' && (string)$infpred['type_cont']==='1' )
                        {					
                            $i++;
                            $sheet->setCellValueByColumnAndRow($columnExcel, $strokaExcel, (string)$infpred['edu_name']); 
                            $columnExcel++;
                        }	
                                
                    }
                    while($i<$MaxKolExamOOP)
                    {					
                        $i++;
                        $columnExcel++;
                    }
                    $i=0;
            
                    foreach ($infGroup['predmets'] as $eid => $infpred)
                    {	
                        if ((string)$infpred['knum']!='7' && (string)$infpred['type_cont']==='6')
                        {					
                            $i++;
                            $sheet->setCellValueByColumnAndRow($columnExcel, $strokaExcel, (string)$infpred['edu_name']);
                            $columnExcel++;
                        }			
                    }
                    foreach ($infGroup['predmets'] as $eid => $infpred)
                    {	
                        if ((string)$infpred['knum']!='7' && (string)$infpred['type_cont']==='2')
                        {						
                            $i++;
                            $sheet->setCellValueByColumnAndRow($columnExcel, $strokaExcel, (string)$infpred['edu_name']);
                            $columnExcel++;
                        }			
                    }
                    for($i; $i<$MaxKolZachetOOP; $i++)
                    {					
                        $columnExcel++;
                    }
                    $i=0;
                    
                    
                    foreach ($infGroup['predmets'] as $eid => $infpred)
                    {	
                        if ((string)$infpred['knum']==='7' && (string)$infpred['type_cont']==='1')
                        {							
                            $i++;
                            $sheet->setCellValueByColumnAndRow($columnExcel, $strokaExcel, (string)$infpred['edu_name']);
                            $columnExcel++;
                        }			
                    }		
                    for($i; $i<$MaxKolExamVP; $i++)
                    {
                        $columnExcel++;
                    }
                    $i=0;
            
                    foreach ($infGroup['predmets'] as $eid => $infpred)
                    {	
                        if ((string)$infpred['knum']==='7' && (string)$infpred['type_cont']==='6' )
                        {						
                            $i++;
                            $sheet->setCellValueByColumnAndRow($columnExcel, $strokaExcel, (string)$infpred['edu_name']);
                            $columnExcel++;
                        }
                        if ((string)$infpred['knum']==='7' && (string)$infpred['type_cont']==='2' )
                        {						
                            $i++;
                            $sheet->setCellValueByColumnAndRow($columnExcel, $strokaExcel, (string)$infpred['edu_name']);
                            $columnExcel++;
                        }	
                    }	
                    for($i; $i<$MaxKolZachetVP; $i++)
                    {
                        $columnExcel++;
                    }
                    $i=0;
                    $columnExcel=1;
                    $sheet->getStyle("A".($strokaExcel)."".":A".($strokaExcel))->applyFromArray($border);				
                    $sheet->getStyle($bukvaColum[$columnExcel]."".($strokaExcel).":".$bukvaColum[($columnExcel+$MaxKolExamOOP-1)]."".($strokaExcel))->applyFromArray($border); 
                    $columnExcel=$columnExcel+$MaxKolExamOOP;
                    $sheet->getStyle($bukvaColum[$columnExcel]."".($strokaExcel).":".$bukvaColum[($columnExcel+$MaxKolZachetOOP-1)]."".($strokaExcel))->applyFromArray($border);
                    $columnExcel=$columnExcel+$MaxKolZachetOOP;
                    $sheet->getStyle($bukvaColum[$columnExcel]."".($strokaExcel).":".$bukvaColum[($columnExcel+$MaxKolExamVP-1)]."".($strokaExcel))->applyFromArray($border);
                    $columnExcel=$columnExcel+$MaxKolExamVP;
                    $sheet->getStyle($bukvaColum[$columnExcel]."".($strokaExcel).":".$bukvaColum[($columnExcel+$MaxKolZachetVP-1)]."".($strokaExcel))->applyFromArray($border);
                    $sheet->getStyle("A".($strokaExcel)."".":A".($strokaExcel))->getAlignment()->setWrapText(true);  //->getAlignment()->setWrapText(true)
                    $sheet->getStyle("B".($strokaExcel).":".$bukvaColum[$shirinatable]."".($strokaExcel))->getAlignment()->setTextRotation(90);
                    $sheet->getStyle("B".($strokaExcel).":".$bukvaColum[$shirinatable]."".($strokaExcel))->getAlignment()->setWrapText(true);
                    $sheet->getStyle("B".($strokaExcel).":".$bukvaColum[$shirinatable]."".($strokaExcel))->getFont()->setBold(true);
                    $sheet->getStyle("A".($strokaExcel)."".":".$bukvaColum[$shirinatable]."".($strokaExcel))->getFont()->setSize(8);
                    $sheet->getRowDimension("".$strokaExcel."")->setRowHeight(150);
            
                    $strokaExcel++;
                    $v=$strokaExcel;		
                /***************************Студенты***********/
                //echo 	$post_stud;
                //print_r($arrayBasic);	
                    if ($post_stud==1)
                    {
                        $arroc=array();
                        foreach ($infGroup['predmets'] as $eid => $infpred)
                        {
                            if (!empty($arrayBasic[$specID]['groups'][$id_group]['predmets'][$eid]['students']))
                            {
                                foreach($arrayBasic[$specID]['groups'][$id_group]['predmets'][$eid]['students'] as $fio =>$mark)
                                {
                                    
                                    if (!empty($arrayBasic[$specID]['groups'][$id_group]['predmets'][$eid]['students'][$fio]))
                                    {
                                        $arroc[$fio][(string)$infpred['edu_name']]=array('knum'=>(string)$infpred['knum'], 'type_cont'=>(string)$infpred['type_cont'], 'mark'=>$mark);
                                    }		
                                }
                            }				
                        }			
                        //print_r($arroc);
                        $num=0;
            
                        foreach ($arroc as $fio => $predmet)
                        {		
                                $i=0;
                                $num++;
                                $columnExcel=1;
                                $str="".$num.". ".$fio."";							
                                $sheet->setCellValueByColumnAndRow(1, $strokaExcel, $str);
                                $columnExcel++;
            
                        //оценки ОП
                                foreach ($predmet as $pred => $infpredmet)
                                {
                                    if ($infpredmet['knum']!='7' && $infpredmet['type_cont']==='1' )
                                        {											
                                            $i++;
                                            $sheet->setCellValueByColumnAndRow($columnExcel, $strokaExcel, $infpredmet['mark']);
                                            $columnExcel++;						
                                        }				
                                }
                                for($i; $i<$MaxKolExamOOP; $i++)
                                    {
                                        $columnExcel++;
                                    }
                                    $i=0;
            
            
                                foreach ($predmet as $pred => $infpredmet)
                                {
                                    if ($infpredmet['knum']!='7' && $infpredmet['type_cont']==='6' )
                                        {										
                                            $i++;
                                            $sheet->setCellValueByColumnAndRow($columnExcel, $strokaExcel, $infpredmet['mark']);
                                            $columnExcel++;							
                                        }				
                                }
                                foreach ($predmet as $pred => $infpredmet)
                                {
                                    if ($infpredmet['knum']!='7' && $infpredmet['type_cont']==='2' )
                                        {
                                            if($infpredmet['mark']==='7')
                                            {											
                                                $sheet->setCellValueByColumnAndRow($columnExcel, $strokaExcel, "зачет");			
                                            }
                                            else
                                            {											
                                                $sheet->setCellValueByColumnAndRow($columnExcel, $strokaExcel, "не зачет");									
                                            }
                                                
                                            $i++;
                                            $columnExcel++;						
                                        }				
                                }
                            for($i; $i<$MaxKolZachetOOP; $i++)
                                {
                                    $columnExcel++;
                                }
                                $i=0;
            
                        //оценки ВП
            
                            foreach ($predmet as $pred => $infpredmet)
                            {
                                if ($infpredmet['knum']=='7' && $infpredmet['type_cont']==='1' )
                                    {										
                                        $i++;
                                        $sheet->setCellValueByColumnAndRow($columnExcel, $strokaExcel, $infpredmet['mark']);
                                        $columnExcel++;									
                                    }				
                            }
                            for($i; $i<$MaxKolExamVP; $i++)
                                {
                                    $columnExcel++;
                                }
                                $i=0;
            
            
                            foreach ($predmet as $pred => $infpredmet)
                            {
                                if ($infpredmet['knum']=='7' && $infpredmet['type_cont']==='6' )
                                    {										
                                        $i++;
                                        $sheet->setCellValueByColumnAndRow($columnExcel, $strokaExcel, $infpredmet['mark']);
                                        $columnExcel++;									
                                    }				
                            }
                            foreach ($predmet as $pred => $infpredmet)
                            {
                                if ($infpredmet['knum']=='7' && $infpredmet['type_cont']==='2' )
                                    {
                                        if($infpredmet['mark']==='7')
                                        {										
                                            $sheet->setCellValueByColumnAndRow($columnExcel, $strokaExcel, "зачет");				
                                        }
                                        else
                                        {										
                                            $sheet->setCellValueByColumnAndRow($columnExcel, $strokaExcel, "не зачет");				
                                        }
                                            
                                        $i++;
                                        $columnExcel++;						
                                    }				
                            }
                        for($i; $i<$MaxKolZachetVP; $i++)
                            {
                                $columnExcel++;
                            }
                            $i=0;
            
                            $strokaExcel++;
                        }
                        
                        $columnExcel=1;
                        $sheet->getStyle("A".($v)."".":A".($strokaExcel))->applyFromArray($border);				
                        $sheet->getStyle($bukvaColum[$columnExcel]."".($v).":".$bukvaColum[($columnExcel+$MaxKolExamOOP-1)]."".($strokaExcel))->applyFromArray($border); 
                        $columnExcel=$columnExcel+$MaxKolExamOOP;
                        $sheet->getStyle($bukvaColum[$columnExcel]."".($v).":".$bukvaColum[($columnExcel+$MaxKolZachetOOP-1)]."".($strokaExcel))->applyFromArray($border);
                        $columnExcel=$columnExcel+$MaxKolZachetOOP;
                        $sheet->getStyle($bukvaColum[$columnExcel]."".($v).":".$bukvaColum[($columnExcel+$MaxKolExamVP-1)]."".($strokaExcel))->applyFromArray($border);
                        $columnExcel=$columnExcel+$MaxKolExamVP;
                        $sheet->getStyle($bukvaColum[$columnExcel]."".($v).":".$bukvaColum[($columnExcel+$MaxKolZachetVP-1)]."".($strokaExcel))->applyFromArray($border);
                        $sheet->setCellValueByColumnAndRow(1, $v-1, "Кол-во человек ".$num."");
                        $sheet->getStyle("A".($v)."".":".$bukvaColum[$shirinatable]."".($strokaExcel))->getFont()->setSize(8);
                        //$sheet->setCellValueByColumnAndRow(1, $v-1, $num);
                    }
            
            
                            
                    /****************Средние оценки*/
                    $columnExcel=2;					
                        $sheet->setCellValueByColumnAndRow(1, $strokaExcel, "Ср. балл");
                            foreach ($infGroup['predmets'] as $eid => $infpred)
                            {	
                                if ((string)$infpred['knum']!='7' && (string)$infpred['type_cont']==='1' )
                                {									
                                    $i++;
                                    $sheet->setCellValueByColumnAndRow($columnExcel, $strokaExcel, (string)$infpred['avg']);
                                    $columnExcel++;			
                                }			
                            }
                            for($i; $i<$MaxKolExamOOP; $i++)
                            {
                                $columnExcel++;
                            }
                            $i=0;
                            
                            
            
                            foreach ($infGroup['predmets'] as $eid => $infpred)
                            {	
                                if ((string)$infpred['knum']!='7' && (string)$infpred['type_cont']==='6' )
                                {								
                                    $i++;
                                    $sheet->setCellValueByColumnAndRow($columnExcel, $strokaExcel, (string)$infpred['avg']);
                                    $columnExcel++;		
                                }			
                            }
                            for($i; $i<$MaxKolZachetOOP; $i++)
                            {
                                $columnExcel++;
                            }
                            $i=0;
                            
            
                            foreach ($infGroup['predmets'] as $eid => $infpred)
                            {	
                                if ((string)$infpred['knum']==='7' && (string)$infpred['type_cont']==='1' )
                                {								
                                    $i++;
                                    $sheet->setCellValueByColumnAndRow($columnExcel, $strokaExcel, (string)$infpred['avg']);
                                    $columnExcel++;	
                                }			
                            }
                            for($i; $i<$MaxKolExamVP; $i++)
                            {
                                $columnExcel++;
                            }
                            $i=0;
            
                            foreach ($infGroup['predmets'] as $eid => $infpred)
                            {	
                                if ((string)$infpred['knum']==='7' && (string)$infpred['type_cont']==='6' )
                                {								
                                    $i++;
                                    $sheet->setCellValueByColumnAndRow($columnExcel, $strokaExcel, (string)$infpred['avg']);
                                    $columnExcel++;	
                                }			
                            }
                            for($i; $i<$MaxKolZachetVP; $i++)
                            {
                                $columnExcel++;
                            }
                            $i=0;
                            
                            $columnExcel=1;
                            $sheet->getStyle("A".($strokaExcel)."".":A".($strokaExcel))->applyFromArray($border);				
                            $sheet->getStyle($bukvaColum[$columnExcel]."".($strokaExcel).":".$bukvaColum[($columnExcel+$MaxKolExamOOP-1)]."".($strokaExcel))->applyFromArray($border); 
                            $columnExcel=$columnExcel+$MaxKolExamOOP;
                            $sheet->getStyle($bukvaColum[$columnExcel]."".($strokaExcel).":".$bukvaColum[($columnExcel+$MaxKolZachetOOP-1)]."".($strokaExcel))->applyFromArray($border);
                            $columnExcel=$columnExcel+$MaxKolZachetOOP;
                            $sheet->getStyle($bukvaColum[$columnExcel]."".($strokaExcel).":".$bukvaColum[($columnExcel+$MaxKolExamVP-1)]."".($strokaExcel))->applyFromArray($border);
                            $columnExcel=$columnExcel+$MaxKolExamVP;
                            $sheet->getStyle($bukvaColum[$columnExcel]."".($strokaExcel).":".$bukvaColum[($columnExcel+$MaxKolZachetVP-1)]."".($strokaExcel))->applyFromArray($border);
                            $sheet->getStyle("A".($strokaExcel)."".":".$bukvaColum[$shirinatable]."".($strokaExcel))->getFont()->setSize(8);
            
                    /*****************************************************/
                    $v=$strokaExcel+1;
                    for ($j=5; $j>=2; $j--)
                    {
                        $strokaExcel++;
                        $columnExcel=2;					
                        $sheet->setCellValueByColumnAndRow(1, $strokaExcel, $j);
            
                            foreach ($infGroup['predmets'] as $eid => $infpred)
                            {	
                                if ((string)$infpred['knum']!='7' && (string)$infpred['type_cont']==='1' )
                                {
                                    if(empty((string)$infpred['marks'][$j]))
                                    {									
                                        $sheet->setCellValueByColumnAndRow($columnExcel, $strokaExcel, 0);
                                    }
                                    else
                                    {									
                                        $sheet->setCellValueByColumnAndRow($columnExcel, $strokaExcel, (string)$infpred['marks'][$j]);				
                                    }
                                    
                                    $i++;
                                    $columnExcel++;
                                }			
                            }
                            for($i; $i<$MaxKolExamOOP; $i++)
                            {
                                $columnExcel++;
                            }
                            $i=0;
            
                            foreach ($infGroup['predmets'] as $eid => $infpred)
                            {	
                                if ((string)$infpred['knum']!='7' && (string)$infpred['type_cont']==='6' )
                                {
                                    if(empty((string)$infpred['marks'][$j]))
                                    {									
                                        $sheet->setCellValueByColumnAndRow($columnExcel, $strokaExcel, 0);
                                    }
                                    else
                                    {									
                                        $sheet->setCellValueByColumnAndRow($columnExcel, $strokaExcel, (string)$infpred['marks'][$j]);				
                                    }
                                    
                                    $i++;
                                    $columnExcel++;
                                }			
                            }
                            for($i; $i<$MaxKolZachetOOP; $i++)
                            {
                                $columnExcel++;
                            }
                            $i=0;
            
                            foreach ($infGroup['predmets'] as $eid => $infpred)
                            {	
                                if ((string)$infpred['knum']==='7' && (string)$infpred['type_cont']==='1' )
                                {
                                    if(empty((string)$infpred['marks'][$j]))
                                    {									
                                        $sheet->setCellValueByColumnAndRow($columnExcel, $strokaExcel, 0);
                                    }
                                    else
                                    {									
                                        $sheet->setCellValueByColumnAndRow($columnExcel, $strokaExcel, (string)$infpred['marks'][$j]);			
                                    }
                                    
                                    $i++;
                                    $columnExcel++;
                                }			
                            }
                            for($i; $i<$MaxKolExamVP; $i++)
                            {
                                $columnExcel++;
                            }
                            $i=0;
            
                            foreach ($infGroup['predmets'] as $eid => $infpred)
                            {	
                                if ((string)$infpred['knum']==='7' && (string)$infpred['type_cont']==='6' )
                                {
                                    if(empty((string)$infpred['marks'][$j]))
                                    {									
                                        $sheet->setCellValueByColumnAndRow($columnExcel, $strokaExcel, 0);
                                    }
                                    else
                                    {									
                                        $sheet->setCellValueByColumnAndRow($columnExcel, $strokaExcel, (string)$infpred['marks'][$j]);				
                                    }
                                    
                                    $i++;
                                    $columnExcel++;
                                }			
                            }
                            for($i; $i<$MaxKolZachetVP; $i++)
                            {
                                $columnExcel++;
                            }
                            $i=0;
                    }
            
                    $columnExcel=1;
                        $sheet->getStyle("A".($v)."".":A".($strokaExcel))->applyFromArray($border);				
                        $sheet->getStyle($bukvaColum[$columnExcel]."".($v).":".$bukvaColum[($columnExcel+$MaxKolExamOOP-1)]."".($strokaExcel))->applyFromArray($border); 
                        $columnExcel=$columnExcel+$MaxKolExamOOP;
                        $sheet->getStyle($bukvaColum[$columnExcel]."".($v).":".$bukvaColum[($columnExcel+$MaxKolZachetOOP-1)]."".($strokaExcel))->applyFromArray($border);
                        $columnExcel=$columnExcel+$MaxKolZachetOOP;
                        $sheet->getStyle($bukvaColum[$columnExcel]."".($v).":".$bukvaColum[($columnExcel+$MaxKolExamVP-1)]."".($strokaExcel))->applyFromArray($border);
                        $columnExcel=$columnExcel+$MaxKolExamVP;
                        $sheet->getStyle($bukvaColum[$columnExcel]."".($v).":".$bukvaColum[($columnExcel+$MaxKolZachetVP-1)]."".($strokaExcel))->applyFromArray($border);
                        $sheet->getStyle("A".($v)."".":".$bukvaColum[$shirinatable]."".($strokaExcel))->getFont()->setSize(8);
                            
                    /********************зачет-**************/
                    $strokaExcel++;
                    $v=$strokaExcel;
                    $columnExcel=2;
                        $sheet->setCellValueByColumnAndRow(1, $strokaExcel, "зачет");
                            
                            for($i; $i<$MaxKolExamOOP; $i++)
                            {
                                $columnExcel++;
                            }
                            $i=0;
            
                            foreach ($infGroup['predmets'] as $eid => $infpred)
                            {	
                                if ((string)$infpred['knum']!='7' && (string)$infpred['type_cont']==='6' )
                                {											
                                    $i++;
                                    $columnExcel++;
                                }			
                            }
                            foreach ($infGroup['predmets'] as $eid => $infpred)
                            {	
                                if ((string)$infpred['knum']!='7' && (string)$infpred['type_cont']==='2' )
                                {								
                                    $sheet->setCellValueByColumnAndRow($columnExcel, $strokaExcel, (string)$infpred['marks']['5']);				
                                    $i++;
                                    $columnExcel++;
                                }			
                            }
                            for($i; $i<$MaxKolZachetOOP; $i++)
                            {
                                $columnExcel++;
                            }
                            $i=0;
                            for($i; $i<$MaxKolExamVP; $i++)
                            {
                                $columnExcel++;
                            }
                            $i=0;
            
                            foreach ($infGroup['predmets'] as $eid => $infpred)
                            {
                                if ((string)$infpred['knum']==='7' && (string)$infpred['type_cont']==='6' )
                                {											
                                    $i++;
                                    $columnExcel++;
                                }		
                                if ((string)$infpred['knum']==='7' && (string)$infpred['type_cont']==='2' )
                                {								
                                    $sheet->setCellValueByColumnAndRow($columnExcel, $strokaExcel, (string)$infpred['marks']['5']);					
                                    $i++;
                                    $columnExcel++;
                                }			
                            }
                            for($i; $i<$MaxKolZachetVP; $i++)
                            {
                                $columnExcel++;
                            }
                            $i=0;	
                        
                        
            
                    /********************не зачет-**************/
                    $strokaExcel++;
                    $columnExcel=2;
                            
                            $sheet->setCellValueByColumnAndRow(1, $strokaExcel, "Не зачет");
                            
                            for($i; $i<$MaxKolExamOOP; $i++)
                            {
                                $columnExcel++;
                            }
                            $i=0;
            
                            foreach ($infGroup['predmets'] as $eid => $infpred)
                            {	
                                if ((string)$infpred['knum']!='7' && (string)$infpred['type_cont']==='6' )
                                {												
                                    $i++;
                                    $columnExcel++;
                                }			
                            }
                            foreach ($infGroup['predmets'] as $eid => $infpred)
                            {	
                                if ((string)$infpred['knum']!='7' && (string)$infpred['type_cont']==='2' )
                                {
                                    $sheet->setCellValueByColumnAndRow($columnExcel, $strokaExcel, (string)$infpred['marks']['1']);				
                                    $i++;
                                    $columnExcel++;
                                }			
                            }
                            for($i; $i<$MaxKolZachetOOP; $i++)
                            {
                                $columnExcel++;
                            }
                            $i=0;
            
                            for($i; $i<$MaxKolExamVP; $i++)
                            {
                            $columnExcel++;
                            }
                            $i=0;
            
                            foreach ($infGroup['predmets'] as $eid => $infpred)
                            {
                                if ((string)$infpred['knum']==='7' && (string)$infpred['type_cont']==='6' )
                                {												
                                    $i++;
                                    $columnExcel++;
                                }		
                                if ((string)$infpred['knum']==='7' && (string)$infpred['type_cont']==='2' )
                                {
                                    
                                    $sheet->setCellValueByColumnAndRow($columnExcel, $strokaExcel, (string)$infpred['marks']['1']);				
                                    $i++;
                                    $columnExcel++;
                                }			
                            }
                            for($i; $i<$MaxKolZachetVP; $i++)
                            {
                                $columnExcel++;
                            }
                            $i=0;
                            $strokaExcel++;			
                            
                            $columnExcel=1;
                            $sheet->getStyle("A".($v)."".":A".($strokaExcel))->applyFromArray($border);				
                            $sheet->getStyle($bukvaColum[$columnExcel]."".($v).":".$bukvaColum[($columnExcel+$MaxKolExamOOP-1)]."".($strokaExcel))->applyFromArray($border); 
                            $columnExcel=$columnExcel+$MaxKolExamOOP;
                            $sheet->getStyle($bukvaColum[$columnExcel]."".($v).":".$bukvaColum[($columnExcel+$MaxKolZachetOOP-1)]."".($strokaExcel))->applyFromArray($border);
                            $columnExcel=$columnExcel+$MaxKolZachetOOP;
                            $sheet->getStyle($bukvaColum[$columnExcel]."".($v).":".$bukvaColum[($columnExcel+$MaxKolExamVP-1)]."".($strokaExcel))->applyFromArray($border);
                            $columnExcel=$columnExcel+$MaxKolExamVP;
                            $sheet->getStyle($bukvaColum[$columnExcel]."".($v).":".$bukvaColum[($columnExcel+$MaxKolZachetVP-1)]."".($strokaExcel))->applyFromArray($border);
                            $sheet->getStyle("A".($v)."".":".$bukvaColum[$shirinatable]."".($strokaExcel))->getFont()->setSize(8);
                            $sheet->getStyle("A1:".$bukvaColum[$shirinatable]."".($strokaExcel))->getFont()->setName('Times New Roman');
                        }
                        
                }


            
            if ((int)$post_stud === 1) {
                $sheet->getColumnDimension('A')->setWidth(20);
                
                $sheet->getStyle("A3:A" . ($strokaExcel))
                    ->getAlignment()->setWrapText(true);
            } else {
                $sheet->getColumnDimension('A')->setWidth(10);
            }
            $writer = new Xlsx($objExcel);
            $date = date('d-m-y-'.substr((string)microtime(), 1, 8));
            $date = str_replace(".", "", $date);
            $filename = "export_".$date.".xlsx";
            $writer->save($filename);
             
            
        }
    }
?>