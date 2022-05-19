<?php
/* Smarty version 4.1.0, created on 2022-05-13 16:45:28
  from 'G:\xampp\htdocs\uspev\templates\menu.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_627e6f08f1c228_14907104',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '975cd1ad3c4f5fa583bf78b984d9f1085244c02e' => 
    array (
      0 => 'G:\\xampp\\htdocs\\uspev\\templates\\menu.tpl',
      1 => 1652453127,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_627e6f08f1c228_14907104 (Smarty_Internal_Template $_smarty_tpl) {
?>
<form action="" method="post">
<select name="stud">
    <?php if ($_smarty_tpl->tpl_vars['post_stud']->value == 0) {?>
        <option value="1">Групповые ведомости</option>
		<option selected value="0">Сводные ведомости</option>
    <?php } else { ?>
        <option selected value="1">Групповые ведомости</option>
		<option value="0">Сводные ведомости</option>
    <?php }?>
</select>
<br>
<select name="dep">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['dep']->value, 'infdep');
$_smarty_tpl->tpl_vars['infdep']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['infdep']->value) {
$_smarty_tpl->tpl_vars['infdep']->do_else = false;
?>
        <?php if ($_smarty_tpl->tpl_vars['infdep']->value['fnum'] == $_smarty_tpl->tpl_vars['post_dep']->value) {?>
        <option selected value=<?php echo $_smarty_tpl->tpl_vars['infdep']->value['fnum'];?>
><?php echo $_smarty_tpl->tpl_vars['infdep']->value['fname'];?>
</option>
        <?php } else { ?>
            <option value=<?php echo $_smarty_tpl->tpl_vars['infdep']->value['fnum'];?>
><?php echo $_smarty_tpl->tpl_vars['infdep']->value['fname'];?>
</option>
        <?php }?>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</select>
<br>
<?php if ($_smarty_tpl->tpl_vars['post_dep']->value != '') {?>
    <select name="group">
    <?php if ($_smarty_tpl->tpl_vars['post_group']->value == '') {?>
        <option selected value=''></option>
        <?php } else { ?>
        <option value=''></option> 
    <?php }?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['groups']->value, 'infgroup');
$_smarty_tpl->tpl_vars['infgroup']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['infgroup']->value) {
$_smarty_tpl->tpl_vars['infgroup']->do_else = false;
?>
            
            <?php if ($_smarty_tpl->tpl_vars['infgroup']->value['grnum'] == $_smarty_tpl->tpl_vars['post_group']->value) {?>
            <option selected value=<?php echo $_smarty_tpl->tpl_vars['infgroup']->value['grnum'];?>
><?php echo $_smarty_tpl->tpl_vars['infgroup']->value['grnum'];?>
</option>
            <?php } else { ?>
                <option value=<?php echo $_smarty_tpl->tpl_vars['infgroup']->value['grnum'];?>
><?php echo $_smarty_tpl->tpl_vars['infgroup']->value['grnum'];?>
</option>
            <?php }?>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </select>
<?php }?>
<br>
<select name="year">
<?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['current_year']->value+1 - (2016) : 2016-($_smarty_tpl->tpl_vars['current_year']->value)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 2016, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
    <?php if ($_smarty_tpl->tpl_vars['post_year']->value == $_smarty_tpl->tpl_vars['i']->value) {?>
        <option selected value=<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
><?php echo $_smarty_tpl->tpl_vars['i']->value-1;?>
 - <?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</option>
        <?php } else { ?>
            <option value=<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
><?php echo $_smarty_tpl->tpl_vars['i']->value-1;?>
 - <?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</option>
    <?php }
}
}
?>    
</select>
<br>
<select name='sem'>
<?php if ($_smarty_tpl->tpl_vars['post_sem']->value == 0) {?>
    <option selected value="0">Весенняя</option>
    <option value="1">Осенняя</option>
<?php } else { ?>
    <option value="0">Весенняя</option>
    <option selected value="1">Осенняя</option>
<?php }?>
</select>
<br>
<?php if ($_smarty_tpl->tpl_vars['HTML_or_Excel']->value == 0) {?>
    <input type="radio" name="HTML_or_excel" value="0" checked> Информация в Excel файле 
	<input type="radio" name="HTML_or_excel" value="1"> На веб старнице
    <?php } else { ?>
        <input type="radio" name="HTML_or_excel" value="0"> Информация в Excel файле 
		<input type="radio" name="HTML_or_excel" value="1" checked> На веб старнице
<?php }?>
<p><input type="submit" name="submit" value="OK"></form>
<?php }
}
