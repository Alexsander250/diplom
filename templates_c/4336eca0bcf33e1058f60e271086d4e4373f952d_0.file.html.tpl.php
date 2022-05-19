<?php
/* Smarty version 4.1.0, created on 2022-05-13 18:49:17
  from 'G:\xampp\htdocs\uspev\templates\html.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_627e8c0d75d971_17355950',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4336eca0bcf33e1058f60e271086d4e4373f952d' => 
    array (
      0 => 'G:\\xampp\\htdocs\\uspev\\templates\\html.tpl',
      1 => 1652460552,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_627e8c0d75d971_17355950 (Smarty_Internal_Template $_smarty_tpl) {
?><table border=1>
<tr>
<?php if ($_smarty_tpl->tpl_vars['post_sem']->value == 0) {?>
    <th colspan=<?php echo $_smarty_tpl->tpl_vars['shirinatable']->value;?>
><center>Итоги сдачи весенней сессии в <?php echo $_smarty_tpl->tpl_vars['post_year']->value-1;?>
 - <?php echo $_smarty_tpl->tpl_vars['post_year']->value;?>
 уч. году </center></th>
    <?php } else { ?>
        <th colspan=<?php echo $_smarty_tpl->tpl_vars['shirinatable']->value;?>
}><center>Итоги сдачи осенней сессии в <?php echo $_smarty_tpl->tpl_vars['post_year']->value-1;?>
 - <?php echo $_smarty_tpl->tpl_vars['post_year']->value;?>
 уч. году </center></th>
<?php }?>
</tr>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['array']->value, 'specID');
$_smarty_tpl->tpl_vars['specID']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['specID']->value) {
$_smarty_tpl->tpl_vars['specID']->do_else = false;
?>
    <tr><th colspan=<?php echo $_smarty_tpl->tpl_vars['shirinatable']->value;?>
><center><?php echo $_smarty_tpl->tpl_vars['specID']->value['spname'];?>
</center></td></th>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['specID']->value['groups'], 'id_group');
$_smarty_tpl->tpl_vars['id_group']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['id_group']->value) {
$_smarty_tpl->tpl_vars['id_group']->do_else = false;
?>
        <tr><th colspan=<?php echo $_smarty_tpl->tpl_vars['shirinatable']->value;?>
><center> <?php echo $_smarty_tpl->tpl_vars['id_group']->value['grnum'];?>
</center></th></tr>
        <tr>
        <th colspan=<?php echo $_smarty_tpl->tpl_vars['MaxKolExamOOP']->value+$_smarty_tpl->tpl_vars['MaxKolZachetOOP']->value+1;?>
><center>Дисциплины ООП</center></th>
        <th colspan=<?php echo $_smarty_tpl->tpl_vars['MaxKolExamVP']->value+$_smarty_tpl->tpl_vars['MaxKolZachetVP']->value;?>
><center>Дисциплины ВП</center></th>
        </tr>
        <tr>
                <th colspan=<?php echo $_smarty_tpl->tpl_vars['MaxKolExamOOP']->value+1;?>
><center>Экзамены</center></th>
                <th colspan=<?php echo $_smarty_tpl->tpl_vars['MaxKolZachetOOP']->value;?>
><center>Зачеты</center></th>
                <th colspan=<?php echo $_smarty_tpl->tpl_vars['MaxKolExamVP']->value;?>
><center>Экзамены</center></th>
                <th colspan=<?php echo $_smarty_tpl->tpl_vars['MaxKolZachetVP']->value;?>
><center>Зачеты</center></th>
            </tr>
<tr><td></td>
    <?php $_smarty_tpl->_assignInScope('i', 0);?>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['id_group']->value['predmets'], 'eid');
$_smarty_tpl->tpl_vars['eid']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['eid']->value) {
$_smarty_tpl->tpl_vars['eid']->do_else = false;
?>
    
        <?php if ($_smarty_tpl->tpl_vars['eid']->value['knum'] != 7 && $_smarty_tpl->tpl_vars['eid']->value['type_cont'] == 1) {?>
            <?php $_smarty_tpl->_assignInScope('i', $_smarty_tpl->tpl_vars['i']->value+1);?>
            <td><?php echo $_smarty_tpl->tpl_vars['eid']->value['edu_name'];?>
</td>
        <?php }?>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <?php if ($_smarty_tpl->tpl_vars['i']->value < $_smarty_tpl->tpl_vars['MaxKolExamOOP']->value) {?>
    <td colspan=<?php echo $_smarty_tpl->tpl_vars['MaxKolExamOOP']->value-$_smarty_tpl->tpl_vars['i']->value;?>
></td>
    <?php }?>

    <?php $_smarty_tpl->_assignInScope('i', 0);?>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['id_group']->value['predmets'], 'eid');
$_smarty_tpl->tpl_vars['eid']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['eid']->value) {
$_smarty_tpl->tpl_vars['eid']->do_else = false;
?>
    
        <?php if ($_smarty_tpl->tpl_vars['eid']->value['knum'] != 7 && $_smarty_tpl->tpl_vars['eid']->value['type_cont'] == 6) {?>
        <?php $_smarty_tpl->_assignInScope('i', $_smarty_tpl->tpl_vars['i']->value+1);?>
            <td><?php echo $_smarty_tpl->tpl_vars['eid']->value['edu_name'];?>
</td>
        <?php }?>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['id_group']->value['predmets'], 'eid');
$_smarty_tpl->tpl_vars['eid']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['eid']->value) {
$_smarty_tpl->tpl_vars['eid']->do_else = false;
?>
    
        <?php if ($_smarty_tpl->tpl_vars['eid']->value['knum'] != 7 && $_smarty_tpl->tpl_vars['eid']->value['type_cont'] == 2) {?>
        <?php $_smarty_tpl->_assignInScope('i', $_smarty_tpl->tpl_vars['i']->value+1);?>
            <td><?php echo $_smarty_tpl->tpl_vars['eid']->value['edu_name'];?>
</td>
        <?php }?>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <?php if ($_smarty_tpl->tpl_vars['i']->value < $_smarty_tpl->tpl_vars['MaxKolZachetOOP']->value) {?>
    <td colspan=<?php echo $_smarty_tpl->tpl_vars['MaxKolZachetOOP']->value-$_smarty_tpl->tpl_vars['i']->value;?>
></td>
    <?php }?>
    
    <?php $_smarty_tpl->_assignInScope('i', 0);?>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['id_group']->value['predmets'], 'eid');
$_smarty_tpl->tpl_vars['eid']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['eid']->value) {
$_smarty_tpl->tpl_vars['eid']->do_else = false;
?>
    
        <?php if ($_smarty_tpl->tpl_vars['eid']->value['knum'] == 7 && $_smarty_tpl->tpl_vars['eid']->value['type_cont'] == 1) {?>
            <?php $_smarty_tpl->_assignInScope('i', $_smarty_tpl->tpl_vars['i']->value+1);?>
            <td><?php echo $_smarty_tpl->tpl_vars['eid']->value['edu_name'];?>
</td>
        <?php }?>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <?php if ($_smarty_tpl->tpl_vars['i']->value < $_smarty_tpl->tpl_vars['MaxKolExamVP']->value) {?>
    <td colspan=<?php echo $_smarty_tpl->tpl_vars['MaxKolExamVP']->value-$_smarty_tpl->tpl_vars['i']->value;?>
></td>
    <?php }?>

    <?php $_smarty_tpl->_assignInScope('i', 0);?>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['id_group']->value['predmets'], 'eid');
$_smarty_tpl->tpl_vars['eid']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['eid']->value) {
$_smarty_tpl->tpl_vars['eid']->do_else = false;
?>
    
        <?php if ($_smarty_tpl->tpl_vars['eid']->value['knum'] == 7 && $_smarty_tpl->tpl_vars['eid']->value['type_cont'] == 6) {?>
        <?php $_smarty_tpl->_assignInScope('i', $_smarty_tpl->tpl_vars['i']->value+1);?>
            <td><?php echo $_smarty_tpl->tpl_vars['eid']->value['edu_name'];?>
</td>
        <?php }?>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['id_group']->value['predmets'], 'eid');
$_smarty_tpl->tpl_vars['eid']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['eid']->value) {
$_smarty_tpl->tpl_vars['eid']->do_else = false;
?>
    
        <?php if ($_smarty_tpl->tpl_vars['eid']->value['knum'] == 7 && $_smarty_tpl->tpl_vars['eid']->value['type_cont'] == 2) {?>
        <?php $_smarty_tpl->_assignInScope('i', $_smarty_tpl->tpl_vars['i']->value+1);?>
            <td><?php echo $_smarty_tpl->tpl_vars['eid']->value['edu_name'];?>
</td>
        <?php }?>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <?php if ($_smarty_tpl->tpl_vars['i']->value < $_smarty_tpl->tpl_vars['MaxKolZachetVP']->value) {?>
    <td colspan=<?php echo $_smarty_tpl->tpl_vars['MaxKolZachetVP']->value-$_smarty_tpl->tpl_vars['i']->value;?>
></td>
    <?php }?>
</tr>


<?php if ($_smarty_tpl->tpl_vars['post_stud']->value == 1) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['arroc']->value, 'people', false, 'grnum');
$_smarty_tpl->tpl_vars['people']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['grnum']->value => $_smarty_tpl->tpl_vars['people']->value) {
$_smarty_tpl->tpl_vars['people']->do_else = false;
if ($_smarty_tpl->tpl_vars['grnum']->value == $_smarty_tpl->tpl_vars['id_group']->value['grnum']) {?>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['people']->value, 'student', false, 'FIO');
$_smarty_tpl->tpl_vars['student']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['FIO']->value => $_smarty_tpl->tpl_vars['student']->value) {
$_smarty_tpl->tpl_vars['student']->do_else = false;
?>
    <tr><td><?php echo $_smarty_tpl->tpl_vars['FIO']->value;?>
</td>
    <?php $_smarty_tpl->_assignInScope('i', 0);?>  
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['student']->value, 'eid', false, 'predmet');
$_smarty_tpl->tpl_vars['eid']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['predmet']->value => $_smarty_tpl->tpl_vars['eid']->value) {
$_smarty_tpl->tpl_vars['eid']->do_else = false;
?>
        <?php if ($_smarty_tpl->tpl_vars['eid']->value['knum'] != 7 && $_smarty_tpl->tpl_vars['eid']->value['type_cont'] == 1) {?>
            <?php $_smarty_tpl->_assignInScope('i', $_smarty_tpl->tpl_vars['i']->value+1);?>
            <td><?php echo $_smarty_tpl->tpl_vars['eid']->value['mark'];?>
</td>
        <?php }?>        
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        <?php if ($_smarty_tpl->tpl_vars['i']->value < $_smarty_tpl->tpl_vars['MaxKolExamOOP']->value) {?>
        <td colspan=<?php echo $_smarty_tpl->tpl_vars['MaxKolExamOOP']->value-$_smarty_tpl->tpl_vars['i']->value;?>
></td>
        <?php }?>
        <?php $_smarty_tpl->_assignInScope('i', 0);?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['student']->value, 'eid', false, 'predmet');
$_smarty_tpl->tpl_vars['eid']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['predmet']->value => $_smarty_tpl->tpl_vars['eid']->value) {
$_smarty_tpl->tpl_vars['eid']->do_else = false;
?>
        <?php if ($_smarty_tpl->tpl_vars['eid']->value['knum'] != 7 && $_smarty_tpl->tpl_vars['eid']->value['type_cont'] == 6) {?>
            <?php $_smarty_tpl->_assignInScope('i', $_smarty_tpl->tpl_vars['i']->value+1);?>
            <td><?php echo $_smarty_tpl->tpl_vars['eid']->value['mark'];?>
</td>
        <?php }?>        
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['student']->value, 'eid', false, 'predmet');
$_smarty_tpl->tpl_vars['eid']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['predmet']->value => $_smarty_tpl->tpl_vars['eid']->value) {
$_smarty_tpl->tpl_vars['eid']->do_else = false;
?>
        <?php if ($_smarty_tpl->tpl_vars['eid']->value['knum'] != 7 && $_smarty_tpl->tpl_vars['eid']->value['type_cont'] == 2) {?>
            <?php $_smarty_tpl->_assignInScope('i', $_smarty_tpl->tpl_vars['i']->value+1);?>
            <?php $_prefixVariable1 = 7;
$_tmp_array = isset($_smarty_tpl->tpl_vars['eid']) ? $_smarty_tpl->tpl_vars['eid']->value : array();
if (!(is_array($_tmp_array) || $_tmp_array instanceof ArrayAccess)) {
settype($_tmp_array, 'array');
}
$_tmp_array['mark'] = $_prefixVariable1;
$_smarty_tpl->_assignInScope('eid', $_tmp_array);
if ($_prefixVariable1) {?>
            <td>зач</td>
            <?php } else { ?>
            <td>не зач.</td>
            <?php }?>
        <?php }?>        
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        <?php if ($_smarty_tpl->tpl_vars['i']->value < $_smarty_tpl->tpl_vars['MaxKolZachetOOP']->value) {?>
        <td colspan=<?php echo $_smarty_tpl->tpl_vars['MaxKolZachetOOP']->value-$_smarty_tpl->tpl_vars['i']->value;?>
></td>
        <?php }?>
        
        
        <?php $_smarty_tpl->_assignInScope('i', 0);?>  
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['student']->value, 'eid', false, 'predmet');
$_smarty_tpl->tpl_vars['eid']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['predmet']->value => $_smarty_tpl->tpl_vars['eid']->value) {
$_smarty_tpl->tpl_vars['eid']->do_else = false;
?>
        <?php if ($_smarty_tpl->tpl_vars['eid']->value['knum'] == 7 && $_smarty_tpl->tpl_vars['eid']->value['type_cont'] == 1) {?>
            <?php $_smarty_tpl->_assignInScope('i', $_smarty_tpl->tpl_vars['i']->value+1);?>
            <td><?php echo $_smarty_tpl->tpl_vars['eid']->value['mark'];?>
</td>
        <?php }?>        
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        <?php if ($_smarty_tpl->tpl_vars['i']->value < $_smarty_tpl->tpl_vars['MaxKolExamVP']->value) {?>
        <td colspan=<?php echo $_smarty_tpl->tpl_vars['MaxKolExamVP']->value-$_smarty_tpl->tpl_vars['i']->value;?>
></td>
        <?php }?>
        <?php $_smarty_tpl->_assignInScope('i', 0);?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['student']->value, 'eid', false, 'predmet');
$_smarty_tpl->tpl_vars['eid']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['predmet']->value => $_smarty_tpl->tpl_vars['eid']->value) {
$_smarty_tpl->tpl_vars['eid']->do_else = false;
?>
        <?php if ($_smarty_tpl->tpl_vars['eid']->value['knum'] == 7 && $_smarty_tpl->tpl_vars['eid']->value['type_cont'] == 6) {?>
            <?php $_smarty_tpl->_assignInScope('i', $_smarty_tpl->tpl_vars['i']->value+1);?>
            <td><?php echo $_smarty_tpl->tpl_vars['eid']->value['mark'];?>
</td>
        <?php }?>        
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['student']->value, 'eid', false, 'predmet');
$_smarty_tpl->tpl_vars['eid']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['predmet']->value => $_smarty_tpl->tpl_vars['eid']->value) {
$_smarty_tpl->tpl_vars['eid']->do_else = false;
?>
        <?php if ($_smarty_tpl->tpl_vars['eid']->value['knum'] == 7 && $_smarty_tpl->tpl_vars['eid']->value['type_cont'] == 2) {?>
            <?php $_smarty_tpl->_assignInScope('i', $_smarty_tpl->tpl_vars['i']->value+1);?>
            <?php $_prefixVariable2 = 7;
$_tmp_array = isset($_smarty_tpl->tpl_vars['eid']) ? $_smarty_tpl->tpl_vars['eid']->value : array();
if (!(is_array($_tmp_array) || $_tmp_array instanceof ArrayAccess)) {
settype($_tmp_array, 'array');
}
$_tmp_array['mark'] = $_prefixVariable2;
$_smarty_tpl->_assignInScope('eid', $_tmp_array);
if ($_prefixVariable2) {?>
            <td>зач</td>
            <?php } else { ?>
            <td>не зач.</td>
            <?php }?>
        <?php }?>        
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        <?php if ($_smarty_tpl->tpl_vars['i']->value < $_smarty_tpl->tpl_vars['MaxKolZachetVP']->value) {?>
        <td colspan=<?php echo $_smarty_tpl->tpl_vars['MaxKolZachetVP']->value-$_smarty_tpl->tpl_vars['i']->value;?>
></td>
        <?php }?>




    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}?>
   
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}?>







<tr><td>Ср. балл</td>
    <?php $_smarty_tpl->_assignInScope('i', 0);?>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['id_group']->value['predmets'], 'eid');
$_smarty_tpl->tpl_vars['eid']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['eid']->value) {
$_smarty_tpl->tpl_vars['eid']->do_else = false;
?>
    
        <?php if ($_smarty_tpl->tpl_vars['eid']->value['knum'] != 7 && $_smarty_tpl->tpl_vars['eid']->value['type_cont'] == 1) {?>
            <?php $_smarty_tpl->_assignInScope('i', $_smarty_tpl->tpl_vars['i']->value+1);?>
            <td><?php echo $_smarty_tpl->tpl_vars['eid']->value['avg'];?>
</td>
        <?php }?>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <?php if ($_smarty_tpl->tpl_vars['i']->value < $_smarty_tpl->tpl_vars['MaxKolExamOOP']->value) {?>
    <td colspan=<?php echo $_smarty_tpl->tpl_vars['MaxKolExamOOP']->value-$_smarty_tpl->tpl_vars['i']->value;?>
></td>
    <?php }?>

    <?php $_smarty_tpl->_assignInScope('i', 0);?>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['id_group']->value['predmets'], 'eid');
$_smarty_tpl->tpl_vars['eid']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['eid']->value) {
$_smarty_tpl->tpl_vars['eid']->do_else = false;
?>
    
        <?php if ($_smarty_tpl->tpl_vars['eid']->value['knum'] != 7 && $_smarty_tpl->tpl_vars['eid']->value['type_cont'] == 6) {?>
        <?php $_smarty_tpl->_assignInScope('i', $_smarty_tpl->tpl_vars['i']->value+1);?>
            <td><?php echo $_smarty_tpl->tpl_vars['eid']->value['avg'];?>
</td>
        <?php }?>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <?php if ($_smarty_tpl->tpl_vars['i']->value < $_smarty_tpl->tpl_vars['MaxKolZachetOOP']->value) {?>
    <td colspan=<?php echo $_smarty_tpl->tpl_vars['MaxKolZachetOOP']->value-$_smarty_tpl->tpl_vars['i']->value;?>
></td>
    <?php }?>
    
    <?php $_smarty_tpl->_assignInScope('i', 0);?>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['id_group']->value['predmets'], 'eid');
$_smarty_tpl->tpl_vars['eid']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['eid']->value) {
$_smarty_tpl->tpl_vars['eid']->do_else = false;
?>
    
        <?php if ($_smarty_tpl->tpl_vars['eid']->value['knum'] == 7 && $_smarty_tpl->tpl_vars['eid']->value['type_cont'] == 1) {?>
            <?php $_smarty_tpl->_assignInScope('i', $_smarty_tpl->tpl_vars['i']->value+1);?>
            <td><?php echo $_smarty_tpl->tpl_vars['eid']->value['avg'];?>
</td>
        <?php }?>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <?php if ($_smarty_tpl->tpl_vars['i']->value < $_smarty_tpl->tpl_vars['MaxKolExamVP']->value) {?>
    <td colspan=<?php echo $_smarty_tpl->tpl_vars['MaxKolExamVP']->value-$_smarty_tpl->tpl_vars['i']->value;?>
></td>
    <?php }?>

    <?php $_smarty_tpl->_assignInScope('i', 0);?>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['id_group']->value['predmets'], 'eid');
$_smarty_tpl->tpl_vars['eid']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['eid']->value) {
$_smarty_tpl->tpl_vars['eid']->do_else = false;
?>
    
        <?php if ($_smarty_tpl->tpl_vars['eid']->value['knum'] == 7 && $_smarty_tpl->tpl_vars['eid']->value['type_cont'] == 6) {?>
        <?php $_smarty_tpl->_assignInScope('i', $_smarty_tpl->tpl_vars['i']->value+1);?>
            <td><?php echo $_smarty_tpl->tpl_vars['eid']->value['avg'];?>
</td>
        <?php }?>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <?php if ($_smarty_tpl->tpl_vars['i']->value < $_smarty_tpl->tpl_vars['MaxKolZachetVP']->value) {?>
    <td colspan=<?php echo $_smarty_tpl->tpl_vars['MaxKolZachetVP']->value-$_smarty_tpl->tpl_vars['i']->value;?>
></td>
    <?php }?>
</tr>

<tr><td>5</td>
<?php $_smarty_tpl->_assignInScope('i', 0);?>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['id_group']->value['predmets'], 'eid');
$_smarty_tpl->tpl_vars['eid']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['eid']->value) {
$_smarty_tpl->tpl_vars['eid']->do_else = false;
?>
    
        <?php if ($_smarty_tpl->tpl_vars['eid']->value['knum'] != 7 && $_smarty_tpl->tpl_vars['eid']->value['type_cont'] == 1) {?>
            <?php $_smarty_tpl->_assignInScope('i', $_smarty_tpl->tpl_vars['i']->value+1);?>
            <td><?php echo $_smarty_tpl->tpl_vars['eid']->value['marks'][5];?>
</td>
        <?php }?>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <?php if ($_smarty_tpl->tpl_vars['i']->value < $_smarty_tpl->tpl_vars['MaxKolExamOOP']->value) {?>
    <td colspan=<?php echo $_smarty_tpl->tpl_vars['MaxKolExamOOP']->value-$_smarty_tpl->tpl_vars['i']->value;?>
></td>
    <?php }?>

    <?php $_smarty_tpl->_assignInScope('i', 0);?>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['id_group']->value['predmets'], 'eid');
$_smarty_tpl->tpl_vars['eid']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['eid']->value) {
$_smarty_tpl->tpl_vars['eid']->do_else = false;
?>
    
        <?php if ($_smarty_tpl->tpl_vars['eid']->value['knum'] != 7 && $_smarty_tpl->tpl_vars['eid']->value['type_cont'] == 6) {?>
        <?php $_smarty_tpl->_assignInScope('i', $_smarty_tpl->tpl_vars['i']->value+1);?>
            <td><?php echo $_smarty_tpl->tpl_vars['eid']->value['marks'][5];?>
</td>
        <?php }?>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <?php if ($_smarty_tpl->tpl_vars['i']->value < $_smarty_tpl->tpl_vars['MaxKolZachetOOP']->value) {?>
    <td colspan=<?php echo $_smarty_tpl->tpl_vars['MaxKolZachetOOP']->value-$_smarty_tpl->tpl_vars['i']->value;?>
></td>
    <?php }?>
    
    <?php $_smarty_tpl->_assignInScope('i', 0);?>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['id_group']->value['predmets'], 'eid');
$_smarty_tpl->tpl_vars['eid']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['eid']->value) {
$_smarty_tpl->tpl_vars['eid']->do_else = false;
?>
    
        <?php if ($_smarty_tpl->tpl_vars['eid']->value['knum'] == 7 && $_smarty_tpl->tpl_vars['eid']->value['type_cont'] == 1) {?>
            <?php $_smarty_tpl->_assignInScope('i', $_smarty_tpl->tpl_vars['i']->value+1);?>
            <td><?php echo $_smarty_tpl->tpl_vars['eid']->value['marks'][5];?>
</td>
        <?php }?>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <?php if ($_smarty_tpl->tpl_vars['i']->value < $_smarty_tpl->tpl_vars['MaxKolExamVP']->value) {?>
    <td colspan=<?php echo $_smarty_tpl->tpl_vars['MaxKolExamVP']->value-$_smarty_tpl->tpl_vars['i']->value;?>
></td>
    <?php }?>

    <?php $_smarty_tpl->_assignInScope('i', 0);?>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['id_group']->value['predmets'], 'eid');
$_smarty_tpl->tpl_vars['eid']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['eid']->value) {
$_smarty_tpl->tpl_vars['eid']->do_else = false;
?>
    
        <?php if ($_smarty_tpl->tpl_vars['eid']->value['knum'] == 7 && $_smarty_tpl->tpl_vars['eid']->value['type_cont'] == 6) {?>
        <?php $_smarty_tpl->_assignInScope('i', $_smarty_tpl->tpl_vars['i']->value+1);?>
            <td><?php echo $_smarty_tpl->tpl_vars['eid']->value['marks'][5];?>
</td>
        <?php }?>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <?php if ($_smarty_tpl->tpl_vars['i']->value < $_smarty_tpl->tpl_vars['MaxKolZachetVP']->value) {?>
    <td colspan=<?php echo $_smarty_tpl->tpl_vars['MaxKolZachetVP']->value-$_smarty_tpl->tpl_vars['i']->value;?>
></td>
    <?php }?>

    <tr><td>4</td>
<?php $_smarty_tpl->_assignInScope('i', 0);?>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['id_group']->value['predmets'], 'eid');
$_smarty_tpl->tpl_vars['eid']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['eid']->value) {
$_smarty_tpl->tpl_vars['eid']->do_else = false;
?>
    
        <?php if ($_smarty_tpl->tpl_vars['eid']->value['knum'] != 7 && $_smarty_tpl->tpl_vars['eid']->value['type_cont'] == 1) {?>
            <?php $_smarty_tpl->_assignInScope('i', $_smarty_tpl->tpl_vars['i']->value+1);?>
            <td><?php echo $_smarty_tpl->tpl_vars['eid']->value['marks'][4];?>
</td>
        <?php }?>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <?php if ($_smarty_tpl->tpl_vars['i']->value < $_smarty_tpl->tpl_vars['MaxKolExamOOP']->value) {?>
    <td colspan=<?php echo $_smarty_tpl->tpl_vars['MaxKolExamOOP']->value-$_smarty_tpl->tpl_vars['i']->value;?>
></td>
    <?php }?>

    <?php $_smarty_tpl->_assignInScope('i', 0);?>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['id_group']->value['predmets'], 'eid');
$_smarty_tpl->tpl_vars['eid']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['eid']->value) {
$_smarty_tpl->tpl_vars['eid']->do_else = false;
?>
    
        <?php if ($_smarty_tpl->tpl_vars['eid']->value['knum'] != 7 && $_smarty_tpl->tpl_vars['eid']->value['type_cont'] == 6) {?>
        <?php $_smarty_tpl->_assignInScope('i', $_smarty_tpl->tpl_vars['i']->value+1);?>
            <td><?php echo $_smarty_tpl->tpl_vars['eid']->value['marks'][4];?>
</td>
        <?php }?>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <?php if ($_smarty_tpl->tpl_vars['i']->value < $_smarty_tpl->tpl_vars['MaxKolZachetOOP']->value) {?>
    <td colspan=<?php echo $_smarty_tpl->tpl_vars['MaxKolZachetOOP']->value-$_smarty_tpl->tpl_vars['i']->value;?>
></td>
    <?php }?>
    
    <?php $_smarty_tpl->_assignInScope('i', 0);?>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['id_group']->value['predmets'], 'eid');
$_smarty_tpl->tpl_vars['eid']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['eid']->value) {
$_smarty_tpl->tpl_vars['eid']->do_else = false;
?>
    
        <?php if ($_smarty_tpl->tpl_vars['eid']->value['knum'] == 7 && $_smarty_tpl->tpl_vars['eid']->value['type_cont'] == 1) {?>
            <?php $_smarty_tpl->_assignInScope('i', $_smarty_tpl->tpl_vars['i']->value+1);?>
            <td><?php echo $_smarty_tpl->tpl_vars['eid']->value['marks'][4];?>
</td>
        <?php }?>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <?php if ($_smarty_tpl->tpl_vars['i']->value < $_smarty_tpl->tpl_vars['MaxKolExamVP']->value) {?>
    <td colspan=<?php echo $_smarty_tpl->tpl_vars['MaxKolExamVP']->value-$_smarty_tpl->tpl_vars['i']->value;?>
></td>
    <?php }?>

    <?php $_smarty_tpl->_assignInScope('i', 0);?>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['id_group']->value['predmets'], 'eid');
$_smarty_tpl->tpl_vars['eid']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['eid']->value) {
$_smarty_tpl->tpl_vars['eid']->do_else = false;
?>
    
        <?php if ($_smarty_tpl->tpl_vars['eid']->value['knum'] == 7 && $_smarty_tpl->tpl_vars['eid']->value['type_cont'] == 6) {?>
        <?php $_smarty_tpl->_assignInScope('i', $_smarty_tpl->tpl_vars['i']->value+1);?>
            <td><?php echo $_smarty_tpl->tpl_vars['eid']->value['marks'][4];?>
</td>
        <?php }?>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <?php if ($_smarty_tpl->tpl_vars['i']->value < $_smarty_tpl->tpl_vars['MaxKolZachetVP']->value) {?>
    <td colspan=<?php echo $_smarty_tpl->tpl_vars['MaxKolZachetVP']->value-$_smarty_tpl->tpl_vars['i']->value;?>
></td>
    <?php }?>

    <tr><td>3</td>
<?php $_smarty_tpl->_assignInScope('i', 0);?>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['id_group']->value['predmets'], 'eid');
$_smarty_tpl->tpl_vars['eid']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['eid']->value) {
$_smarty_tpl->tpl_vars['eid']->do_else = false;
?>
    
        <?php if ($_smarty_tpl->tpl_vars['eid']->value['knum'] != 7 && $_smarty_tpl->tpl_vars['eid']->value['type_cont'] == 1) {?>
            <?php $_smarty_tpl->_assignInScope('i', $_smarty_tpl->tpl_vars['i']->value+1);?>
            <td><?php echo $_smarty_tpl->tpl_vars['eid']->value['marks'][3];?>
</td>
        <?php }?>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <?php if ($_smarty_tpl->tpl_vars['i']->value < $_smarty_tpl->tpl_vars['MaxKolExamOOP']->value) {?>
    <td colspan=<?php echo $_smarty_tpl->tpl_vars['MaxKolExamOOP']->value-$_smarty_tpl->tpl_vars['i']->value;?>
></td>
    <?php }?>

    <?php $_smarty_tpl->_assignInScope('i', 0);?>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['id_group']->value['predmets'], 'eid');
$_smarty_tpl->tpl_vars['eid']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['eid']->value) {
$_smarty_tpl->tpl_vars['eid']->do_else = false;
?>
    
        <?php if ($_smarty_tpl->tpl_vars['eid']->value['knum'] != 7 && $_smarty_tpl->tpl_vars['eid']->value['type_cont'] == 6) {?>
        <?php $_smarty_tpl->_assignInScope('i', $_smarty_tpl->tpl_vars['i']->value+1);?>
            <td><?php echo $_smarty_tpl->tpl_vars['eid']->value['marks'][3];?>
</td>
        <?php }?>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <?php if ($_smarty_tpl->tpl_vars['i']->value < $_smarty_tpl->tpl_vars['MaxKolZachetOOP']->value) {?>
    <td colspan=<?php echo $_smarty_tpl->tpl_vars['MaxKolZachetOOP']->value-$_smarty_tpl->tpl_vars['i']->value;?>
></td>
    <?php }?>
    
    <?php $_smarty_tpl->_assignInScope('i', 0);?>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['id_group']->value['predmets'], 'eid');
$_smarty_tpl->tpl_vars['eid']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['eid']->value) {
$_smarty_tpl->tpl_vars['eid']->do_else = false;
?>
    
        <?php if ($_smarty_tpl->tpl_vars['eid']->value['knum'] == 7 && $_smarty_tpl->tpl_vars['eid']->value['type_cont'] == 1) {?>
            <?php $_smarty_tpl->_assignInScope('i', $_smarty_tpl->tpl_vars['i']->value+1);?>
            <td><?php echo $_smarty_tpl->tpl_vars['eid']->value['marks'][3];?>
</td>
        <?php }?>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <?php if ($_smarty_tpl->tpl_vars['i']->value < $_smarty_tpl->tpl_vars['MaxKolExamVP']->value) {?>
    <td colspan=<?php echo $_smarty_tpl->tpl_vars['MaxKolExamVP']->value-$_smarty_tpl->tpl_vars['i']->value;?>
></td>
    <?php }?>

    <?php $_smarty_tpl->_assignInScope('i', 0);?>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['id_group']->value['predmets'], 'eid');
$_smarty_tpl->tpl_vars['eid']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['eid']->value) {
$_smarty_tpl->tpl_vars['eid']->do_else = false;
?>
    
        <?php if ($_smarty_tpl->tpl_vars['eid']->value['knum'] == 7 && $_smarty_tpl->tpl_vars['eid']->value['type_cont'] == 6) {?>
        <?php $_smarty_tpl->_assignInScope('i', $_smarty_tpl->tpl_vars['i']->value+1);?>
            <td><?php echo $_smarty_tpl->tpl_vars['eid']->value['marks'][3];?>
</td>
        <?php }?>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <?php if ($_smarty_tpl->tpl_vars['i']->value < $_smarty_tpl->tpl_vars['MaxKolZachetVP']->value) {?>
    <td colspan=<?php echo $_smarty_tpl->tpl_vars['MaxKolZachetVP']->value-$_smarty_tpl->tpl_vars['i']->value;?>
></td>
    <?php }?>

<tr><td>2</td>
<?php $_smarty_tpl->_assignInScope('i', 0);?>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['id_group']->value['predmets'], 'eid');
$_smarty_tpl->tpl_vars['eid']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['eid']->value) {
$_smarty_tpl->tpl_vars['eid']->do_else = false;
?>
    
        <?php if ($_smarty_tpl->tpl_vars['eid']->value['knum'] != 7 && $_smarty_tpl->tpl_vars['eid']->value['type_cont'] == 1) {?>
            <?php $_smarty_tpl->_assignInScope('i', $_smarty_tpl->tpl_vars['i']->value+1);?>
            <td><?php echo $_smarty_tpl->tpl_vars['eid']->value['marks'][2];?>
</td>
        <?php }?>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <?php if ($_smarty_tpl->tpl_vars['i']->value < $_smarty_tpl->tpl_vars['MaxKolExamOOP']->value) {?>
    <td colspan=<?php echo $_smarty_tpl->tpl_vars['MaxKolExamOOP']->value-$_smarty_tpl->tpl_vars['i']->value;?>
></td>
    <?php }?>

    <?php $_smarty_tpl->_assignInScope('i', 0);?>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['id_group']->value['predmets'], 'eid');
$_smarty_tpl->tpl_vars['eid']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['eid']->value) {
$_smarty_tpl->tpl_vars['eid']->do_else = false;
?>
    
        <?php if ($_smarty_tpl->tpl_vars['eid']->value['knum'] != 7 && $_smarty_tpl->tpl_vars['eid']->value['type_cont'] == 6) {?>
        <?php $_smarty_tpl->_assignInScope('i', $_smarty_tpl->tpl_vars['i']->value+1);?>
            <td><?php echo $_smarty_tpl->tpl_vars['eid']->value['marks'][2];?>
</td>
        <?php }?>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <?php if ($_smarty_tpl->tpl_vars['i']->value < $_smarty_tpl->tpl_vars['MaxKolZachetOOP']->value) {?>
    <td colspan=<?php echo $_smarty_tpl->tpl_vars['MaxKolZachetOOP']->value-$_smarty_tpl->tpl_vars['i']->value;?>
></td>
    <?php }?>
    
    <?php $_smarty_tpl->_assignInScope('i', 0);?>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['id_group']->value['predmets'], 'eid');
$_smarty_tpl->tpl_vars['eid']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['eid']->value) {
$_smarty_tpl->tpl_vars['eid']->do_else = false;
?>
    
        <?php if ($_smarty_tpl->tpl_vars['eid']->value['knum'] == 7 && $_smarty_tpl->tpl_vars['eid']->value['type_cont'] == 1) {?>
            <?php $_smarty_tpl->_assignInScope('i', $_smarty_tpl->tpl_vars['i']->value+1);?>
            <td><?php echo $_smarty_tpl->tpl_vars['eid']->value['marks'][2];?>
</td>
        <?php }?>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <?php if ($_smarty_tpl->tpl_vars['i']->value < $_smarty_tpl->tpl_vars['MaxKolExamVP']->value) {?>
    <td colspan=<?php echo $_smarty_tpl->tpl_vars['MaxKolExamVP']->value-$_smarty_tpl->tpl_vars['i']->value;?>
></td>
    <?php }?>

    <?php $_smarty_tpl->_assignInScope('i', 0);?>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['id_group']->value['predmets'], 'eid');
$_smarty_tpl->tpl_vars['eid']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['eid']->value) {
$_smarty_tpl->tpl_vars['eid']->do_else = false;
?>    
        <?php if ($_smarty_tpl->tpl_vars['eid']->value['knum'] == 7 && $_smarty_tpl->tpl_vars['eid']->value['type_cont'] == 6) {?>
        <?php $_smarty_tpl->_assignInScope('i', $_smarty_tpl->tpl_vars['i']->value+1);?>
            <td><?php echo $_smarty_tpl->tpl_vars['eid']->value['marks'][2];?>
</td>
        <?php }?>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <?php if ($_smarty_tpl->tpl_vars['i']->value < $_smarty_tpl->tpl_vars['MaxKolZachetVP']->value) {?>
    <td colspan=<?php echo $_smarty_tpl->tpl_vars['MaxKolZachetVP']->value-$_smarty_tpl->tpl_vars['i']->value;?>
></td>
    <?php }?>


    <tr><td>зач.</td>

<?php $_smarty_tpl->_assignInScope('i', 0);?>
<td colspan=<?php echo $_smarty_tpl->tpl_vars['MaxKolExamOOP']->value;?>
></td>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['id_group']->value['predmets'], 'eid');
$_smarty_tpl->tpl_vars['eid']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['eid']->value) {
$_smarty_tpl->tpl_vars['eid']->do_else = false;
?>
    
        <?php if ($_smarty_tpl->tpl_vars['eid']->value['knum'] != 7 && $_smarty_tpl->tpl_vars['eid']->value['type_cont'] == 6) {?>
            <?php $_smarty_tpl->_assignInScope('i', $_smarty_tpl->tpl_vars['i']->value+1);?>
            <td></td>
        <?php }?>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['id_group']->value['predmets'], 'eid');
$_smarty_tpl->tpl_vars['eid']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['eid']->value) {
$_smarty_tpl->tpl_vars['eid']->do_else = false;
?>
    
        <?php if ($_smarty_tpl->tpl_vars['eid']->value['knum'] != 7 && $_smarty_tpl->tpl_vars['eid']->value['type_cont'] == 2) {?>
        <?php $_smarty_tpl->_assignInScope('i', $_smarty_tpl->tpl_vars['i']->value+1);?>
            <td><?php echo $_smarty_tpl->tpl_vars['eid']->value['marks'][5];?>
</td>
        <?php }?>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

    <?php if ($_smarty_tpl->tpl_vars['i']->value < $_smarty_tpl->tpl_vars['MaxKolZachetOOP']->value) {?>
    <td colspan=<?php echo $_smarty_tpl->tpl_vars['MaxKolZachetOOP']->value-$_smarty_tpl->tpl_vars['i']->value;?>
></td>
    <?php }?>
    <td colspan=<?php echo $_smarty_tpl->tpl_vars['MaxKolExamVP']->value;?>
></td>

    <?php $_smarty_tpl->_assignInScope('i', 0);?>    
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['id_group']->value['predmets'], 'eid');
$_smarty_tpl->tpl_vars['eid']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['eid']->value) {
$_smarty_tpl->tpl_vars['eid']->do_else = false;
?>
    
        <?php if ($_smarty_tpl->tpl_vars['eid']->value['knum'] == 7 && $_smarty_tpl->tpl_vars['eid']->value['type_cont'] == 6) {?>
        <?php $_smarty_tpl->_assignInScope('i', $_smarty_tpl->tpl_vars['i']->value+1);?>
            <td></td>
        <?php }?>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['id_group']->value['predmets'], 'eid');
$_smarty_tpl->tpl_vars['eid']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['eid']->value) {
$_smarty_tpl->tpl_vars['eid']->do_else = false;
?>
    
        <?php if ($_smarty_tpl->tpl_vars['eid']->value['knum'] == 7 && $_smarty_tpl->tpl_vars['eid']->value['type_cont'] == 2) {?>
        <?php $_smarty_tpl->_assignInScope('i', $_smarty_tpl->tpl_vars['i']->value+1);?>
            <td><?php echo $_smarty_tpl->tpl_vars['eid']->value['marks'][5];?>
</td>
        <?php }?>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <?php if ($_smarty_tpl->tpl_vars['i']->value < $_smarty_tpl->tpl_vars['MaxKolZachetVP']->value) {?>
    <td colspan=<?php echo $_smarty_tpl->tpl_vars['MaxKolZachetVP']->value-$_smarty_tpl->tpl_vars['i']->value;?>
></td>
    <?php }?>

    <tr><td>не зач.</td>

<?php $_smarty_tpl->_assignInScope('i', 0);?>
<td colspan=<?php echo $_smarty_tpl->tpl_vars['MaxKolExamOOP']->value;?>
></td>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['id_group']->value['predmets'], 'eid');
$_smarty_tpl->tpl_vars['eid']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['eid']->value) {
$_smarty_tpl->tpl_vars['eid']->do_else = false;
?>
    
        <?php if ($_smarty_tpl->tpl_vars['eid']->value['knum'] != 7 && $_smarty_tpl->tpl_vars['eid']->value['type_cont'] == 6) {?>
            <?php $_smarty_tpl->_assignInScope('i', $_smarty_tpl->tpl_vars['i']->value+1);?>
            <td></td>
        <?php }?>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['id_group']->value['predmets'], 'eid');
$_smarty_tpl->tpl_vars['eid']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['eid']->value) {
$_smarty_tpl->tpl_vars['eid']->do_else = false;
?>
    
        <?php if ($_smarty_tpl->tpl_vars['eid']->value['knum'] != 7 && $_smarty_tpl->tpl_vars['eid']->value['type_cont'] == 2) {?>
        <?php $_smarty_tpl->_assignInScope('i', $_smarty_tpl->tpl_vars['i']->value+1);?>
            <td><?php echo $_smarty_tpl->tpl_vars['eid']->value['marks'][1];?>
</td>
        <?php }?>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

    <?php if ($_smarty_tpl->tpl_vars['i']->value < $_smarty_tpl->tpl_vars['MaxKolZachetOOP']->value) {?>
    <td colspan=<?php echo $_smarty_tpl->tpl_vars['MaxKolZachetOOP']->value-$_smarty_tpl->tpl_vars['i']->value;?>
></td>
    <?php }?>
    <td colspan=<?php echo $_smarty_tpl->tpl_vars['MaxKolExamVP']->value;?>
></td>

    <?php $_smarty_tpl->_assignInScope('i', 0);?>    
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['id_group']->value['predmets'], 'eid');
$_smarty_tpl->tpl_vars['eid']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['eid']->value) {
$_smarty_tpl->tpl_vars['eid']->do_else = false;
?>
    
        <?php if ($_smarty_tpl->tpl_vars['eid']->value['knum'] == 7 && $_smarty_tpl->tpl_vars['eid']->value['type_cont'] == 6) {?>
        <?php $_smarty_tpl->_assignInScope('i', $_smarty_tpl->tpl_vars['i']->value+1);?>
            <td></td>
        <?php }?>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['id_group']->value['predmets'], 'eid');
$_smarty_tpl->tpl_vars['eid']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['eid']->value) {
$_smarty_tpl->tpl_vars['eid']->do_else = false;
?>
    
        <?php if ($_smarty_tpl->tpl_vars['eid']->value['knum'] == 7 && $_smarty_tpl->tpl_vars['eid']->value['type_cont'] == 2) {?>
        <?php $_smarty_tpl->_assignInScope('i', $_smarty_tpl->tpl_vars['i']->value+1);?>
            <td><?php echo $_smarty_tpl->tpl_vars['eid']->value['marks'][1];?>
</td>
        <?php }?>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <?php if ($_smarty_tpl->tpl_vars['i']->value < $_smarty_tpl->tpl_vars['MaxKolZachetVP']->value) {?>
    <td colspan=<?php echo $_smarty_tpl->tpl_vars['MaxKolZachetVP']->value-$_smarty_tpl->tpl_vars['i']->value;?>
></td>
    <?php }?>



    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</table><?php }
}
