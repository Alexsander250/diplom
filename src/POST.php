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
        if (isset($_POST['stud'])) {
            $this->post_stud = $_POST['stud'];
        } else {
            $this->post_stud = null;
        }
        if (isset($_POST['year'])) {
            $this->post_year = $_POST['year'];
        } else {
            $this->post_year = null;
        }
        if (isset($_POST['sem'])) {
            $this->post_sem = $_POST['sem'];
        } else {
            $this->post_sem = null;
        }
        if (isset($_POST['dep'])) {
            $this->post_dep = $_POST['dep'];
        } else {
            $this->post_dep = null;
        }
        if (isset($_POST['group'])) {
            $this->post_group = $_POST['group'];
        } else {
            $post_group = null;
        }
        if (isset($_POST['HTML_or_excel'])) {
            $this->HTML_or_Excel = $_POST['HTML_or_excel'];
        } else {
            $this->HTML_or_Excel = null;
        }
    }

}


?>