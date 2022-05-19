
<form action="" method="post">
<select name="stud">
    {if $post_stud==0}
        <option value="1">Групповые ведомости</option>
		<option selected value="0">Сводные ведомости</option>
    {else}
        <option selected value="1">Групповые ведомости</option>
		<option value="0">Сводные ведомости</option>
    {/if}
</select>
<br>
<select name="dep">
    {foreach from=$dep item=$infdep }
        {if $infdep.fnum==$post_dep}
        <option selected value={$infdep.fnum}>{$infdep.fname}</option>
        {else}
            <option value={$infdep.fnum}>{$infdep.fname}</option>
        {/if}
    {/foreach}
</select>
<br>
{if $post_dep!=''}
    <select name="group">
    {if $post_group==''}
        <option selected value=''></option>
        {else}
        <option value=''></option> 
    {/if}
        {foreach from=$groups item=$infgroup }
            
            {if $infgroup.grnum==$post_group}
            <option selected value={$infgroup.grnum}>{$infgroup.grnum}</option>
            {else}
                <option value={$infgroup.grnum}>{$infgroup.grnum}</option>
            {/if}
        {/foreach}
    </select>
{/if}
<br>
<select name="year">
{for $i=2016 to $current_year}
    {if $post_year==$i}
        <option selected value={$i}>{$i-1} - {$i}</option>
        {else}
            <option value={$i}>{$i-1} - {$i}</option>
    {/if}
{/for}    
</select>
<br>
<select name='sem'>
{if $post_sem==0}
    <option selected value="0">Весенняя</option>
    <option value="1">Осенняя</option>
{else}
    <option value="0">Весенняя</option>
    <option selected value="1">Осенняя</option>
{/if}
</select>
<br>
{if $HTML_or_Excel==0}
    <input type="radio" name="HTML_or_excel" value="0" checked> Информация в Excel файле 
	<input type="radio" name="HTML_or_excel" value="1"> На веб старнице
    {else}
        <input type="radio" name="HTML_or_excel" value="0"> Информация в Excel файле 
		<input type="radio" name="HTML_or_excel" value="1" checked> На веб старнице
{/if}
<p><input type="submit" name="submit" value="OK"></form>
