<?php
namespace src;

class POST
{
    public $post_stud;
    public $post_year;
    public $post_sem;
    public $post_dep;
    public $post_group;
    public $HTML_or_Excel;

    function __construct()
    {
        if (isset($_POST['stud'])) {            //выбор типа ведомости (групповая (1) или сводная (0))
            $this->post_stud = $_POST['stud'];
        } else {
            $this->post_stud = null;
        }
        if (isset($_POST['year'])) {            //передача интересующей даты
            $this->post_year = $_POST['year'];
        } else {
            $this->post_year = null;
        }
        if (isset($_POST['sem'])) {             //передача интересующего семестра
            $this->post_sem = $_POST['sem'];
        } else {
            $this->post_sem = null;
        }
        if (isset($_POST['dep'])) {             //передача идентификатора интересующего института
            $this->post_dep = $_POST['dep'];
        } else {
            $this->post_dep = null;
        }
        if (isset($_POST['group'])) {           //передача идентификатора интересующей группы 
            $this->post_group = $_POST['group'];
        } else {
            $post_group = null;
        }
        if (isset($_POST['HTML_or_excel'])) {    //выбор способа вывода информации (excel (0) или html (1))
            $this->HTML_or_Excel = $_POST['HTML_or_excel'];
        } else {
            $this->HTML_or_Excel = null;
        }
    }

}


?>
