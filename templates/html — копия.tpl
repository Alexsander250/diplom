<table border=1>
{foreach $array as $specID}
    <tr><th colspan={$shirinatable}><center>{$specID.spname}</center></td></th>
    {foreach $specID.groups as $id_group}
        <tr><th colspan={$shirinatable}><center> {$id_group.grnum}</center></th></tr>
<tr>
        <th colspan={$MaxKolExamOOP + $MaxKolZachetOOP + 1}><center>Дисциплины ООП</center></th>
        <th colspan={$MaxKolExamVP + $MaxKolZachetVP}><center>Дисциплины ВП</center></th>
    </tr>
    <tr>
                <th colspan={$MaxKolExamOOP+1}><center>Экзамены</center></th>
                <th colspan={$MaxKolZachetOOP}><center>Зачеты</center></th>
                <th colspan={$MaxKolExamVP}><center>Экзамены</center></th>
                <th colspan={$MaxKolZachetVP}><center>Зачеты</center></th>
            </tr>
<tr><td></td>
    {assign var="i" value=0}
    {foreach $id_group.predmets as $eid}
    
        {if $eid.knum!=7 && $eid.type_cont==1}
            {assign var="i" value=$i+1}
            <td>{$eid.edu_name}</td>
        {/if}
    {/foreach}
    {if $i<$MaxKolExamOOP}
    <td colspan={$MaxKolExamOOP-$i}></td>
    {/if}

    {assign var="i" value=0}
    {foreach $id_group.predmets as $eid}
    
        {if $eid.knum!=7 && $eid.type_cont==6}
        {assign var="i" value=$i+1}
            <td>{$eid.edu_name}</td>
        {/if}
    {/foreach}
    {foreach $id_group.predmets as $eid}
    
        {if $eid.knum!=7 && $eid.type_cont==2}
        {assign var="i" value=$i+1}
            <td>{$eid.edu_name}</td>
        {/if}
    {/foreach}
    {if $i<$MaxKolZachetOOP}
    <td colspan={$MaxKolZachetOOP-$i}></td>
    {/if}
    
    {assign var="i" value=0}
    {foreach $id_group.predmets as $eid}
    
        {if $eid.knum==7 && $eid.type_cont==1}
            {assign var="i" value=$i+1}
            <td>{$eid.edu_name}</td>
        {/if}
    {/foreach}
    {if $i<$MaxKolExamVP}
    <td colspan={$MaxKolExamVP-$i}></td>
    {/if}

    {assign var="i" value=0}
    {foreach $id_group.predmets as $eid}
    
        {if $eid.knum==7 && $eid.type_cont==6}
        {assign var="i" value=$i+1}
            <td>{$eid.edu_name}</td>
        {/if}
    {/foreach}
    {foreach $id_group.predmets as $eid}
    
        {if $eid.knum==7 && $eid.type_cont==2}
        {assign var="i" value=$i+1}
            <td>{$eid.edu_name}</td>
        {/if}
    {/foreach}
    {if $i<$MaxKolZachetVP}
    <td colspan={$MaxKolZachetVP-$i}></td>
    {/if}
</tr>


{if $post_stud==1}
{foreach from=$arroc item=$people key=$grnum}
{if $grnum=$id_group.grnum}
    {foreach from=$people item=$student key=$FIO}
    <tr><td>{$FIO} {$grnum}</td>
    {assign var="i" value=0}  
        {foreach from=$student item=$eid key=$predmet}
        {if $eid.knum!=7 && $eid.type_cont==1}
            {assign var="i" value=$i+1}
            <td>{$eid.mark}</td>
        {/if}        
        {/foreach}
        {if $i<$MaxKolExamOOP}
        <td colspan={$MaxKolExamOOP-$i}></td>
        {/if}
        {assign var="i" value=0}
        {foreach from=$student item=$eid key=$predmet}
        {if $eid.knum!=7 && $eid.type_cont==6}
            {assign var="i" value=$i+1}
            <td>{$eid.mark}</td>
        {/if}        
        {/foreach}

        {foreach from=$student item=$eid key=$predmet}
        {if $eid.knum!=7 && $eid.type_cont==2}
            {assign var="i" value=$i+1}
            {if $eid.mark=7}
            <td>зач</td>
            {else}
            <td>не зач.</td>
            {/if}
        {/if}        
        {/foreach}
        {if $i<$MaxKolZachetOOP}
        <td colspan={$MaxKolZachetOOP-$i}></td>
        {/if}
    {/foreach}
{/if}
   
{/foreach}
{/if}






/*************************/

<tr><td>Ср. балл</td>
    {assign var="i" value=0}
    {foreach $id_group.predmets as $eid}
    
        {if $eid.knum!=7 && $eid.type_cont==1}
            {assign var="i" value=$i+1}
            <td>{$eid.avg}</td>
        {/if}
    {/foreach}
    {if $i<$MaxKolExamOOP}
    <td colspan={$MaxKolExamOOP-$i}></td>
    {/if}

    {assign var="i" value=0}
    {foreach $id_group.predmets as $eid}
    
        {if $eid.knum!=7 && $eid.type_cont==6}
        {assign var="i" value=$i+1}
            <td>{$eid.avg}</td>
        {/if}
    {/foreach}
    {if $i<$MaxKolZachetOOP}
    <td colspan={$MaxKolZachetOOP-$i}></td>
    {/if}
    
    {assign var="i" value=0}
    {foreach $id_group.predmets as $eid}
    
        {if $eid.knum==7 && $eid.type_cont==1}
            {assign var="i" value=$i+1}
            <td>{$eid.avg}</td>
        {/if}
    {/foreach}
    {if $i<$MaxKolExamVP}
    <td colspan={$MaxKolExamVP-$i}></td>
    {/if}

    {assign var="i" value=0}
    {foreach $id_group.predmets as $eid}
    
        {if $eid.knum==7 && $eid.type_cont==6}
        {assign var="i" value=$i+1}
            <td>{$eid.avg}</td>
        {/if}
    {/foreach}
    {if $i<$MaxKolZachetVP}
    <td colspan={$MaxKolZachetVP-$i}></td>
    {/if}
</tr>

/************************/
<tr><td>5</td>
{assign var="i" value=0}
    {foreach $id_group.predmets as $eid}
    
        {if $eid.knum!=7 && $eid.type_cont==1}
            {assign var="i" value=$i+1}
            <td>{$eid.marks.5}</td>
        {/if}
    {/foreach}
    {if $i<$MaxKolExamOOP}
    <td colspan={$MaxKolExamOOP-$i}></td>
    {/if}

    {assign var="i" value=0}
    {foreach $id_group.predmets as $eid}
    
        {if $eid.knum!=7 && $eid.type_cont==6}
        {assign var="i" value=$i+1}
            <td>{$eid.marks.5}</td>
        {/if}
    {/foreach}
    {if $i<$MaxKolZachetOOP}
    <td colspan={$MaxKolZachetOOP-$i}></td>
    {/if}
    
    {assign var="i" value=0}
    {foreach $id_group.predmets as $eid}
    
        {if $eid.knum==7 && $eid.type_cont==1}
            {assign var="i" value=$i+1}
            <td>{$eid.marks.5}</td>
        {/if}
    {/foreach}
    {if $i<$MaxKolExamVP}
    <td colspan={$MaxKolExamVP-$i}></td>
    {/if}

    {assign var="i" value=0}
    {foreach $id_group.predmets as $eid}
    
        {if $eid.knum==7 && $eid.type_cont==6}
        {assign var="i" value=$i+1}
            <td>{$eid.marks.5}</td>
        {/if}
    {/foreach}
    {if $i<$MaxKolZachetVP}
    <td colspan={$MaxKolZachetVP-$i}></td>
    {/if}

    <tr><td>4</td>
{assign var="i" value=0}
    {foreach $id_group.predmets as $eid}
    
        {if $eid.knum!=7 && $eid.type_cont==1}
            {assign var="i" value=$i+1}
            <td>{$eid.marks.4}</td>
        {/if}
    {/foreach}
    {if $i<$MaxKolExamOOP}
    <td colspan={$MaxKolExamOOP-$i}></td>
    {/if}

    {assign var="i" value=0}
    {foreach $id_group.predmets as $eid}
    
        {if $eid.knum!=7 && $eid.type_cont==6}
        {assign var="i" value=$i+1}
            <td>{$eid.marks.4}</td>
        {/if}
    {/foreach}
    {if $i<$MaxKolZachetOOP}
    <td colspan={$MaxKolZachetOOP-$i}></td>
    {/if}
    
    {assign var="i" value=0}
    {foreach $id_group.predmets as $eid}
    
        {if $eid.knum==7 && $eid.type_cont==1}
            {assign var="i" value=$i+1}
            <td>{$eid.marks.4}</td>
        {/if}
    {/foreach}
    {if $i<$MaxKolExamVP}
    <td colspan={$MaxKolExamVP-$i}></td>
    {/if}

    {assign var="i" value=0}
    {foreach $id_group.predmets as $eid}
    
        {if $eid.knum==7 && $eid.type_cont==6}
        {assign var="i" value=$i+1}
            <td>{$eid.marks.4}</td>
        {/if}
    {/foreach}
    {if $i<$MaxKolZachetVP}
    <td colspan={$MaxKolZachetVP-$i}></td>
    {/if}

    <tr><td>3</td>
{assign var="i" value=0}
    {foreach $id_group.predmets as $eid}
    
        {if $eid.knum!=7 && $eid.type_cont==1}
            {assign var="i" value=$i+1}
            <td>{$eid.marks.3}</td>
        {/if}
    {/foreach}
    {if $i<$MaxKolExamOOP}
    <td colspan={$MaxKolExamOOP-$i}></td>
    {/if}

    {assign var="i" value=0}
    {foreach $id_group.predmets as $eid}
    
        {if $eid.knum!=7 && $eid.type_cont==6}
        {assign var="i" value=$i+1}
            <td>{$eid.marks.3}</td>
        {/if}
    {/foreach}
    {if $i<$MaxKolZachetOOP}
    <td colspan={$MaxKolZachetOOP-$i}></td>
    {/if}
    
    {assign var="i" value=0}
    {foreach $id_group.predmets as $eid}
    
        {if $eid.knum==7 && $eid.type_cont==1}
            {assign var="i" value=$i+1}
            <td>{$eid.marks.3}</td>
        {/if}
    {/foreach}
    {if $i<$MaxKolExamVP}
    <td colspan={$MaxKolExamVP-$i}></td>
    {/if}

    {assign var="i" value=0}
    {foreach $id_group.predmets as $eid}
    
        {if $eid.knum==7 && $eid.type_cont==6}
        {assign var="i" value=$i+1}
            <td>{$eid.marks.3}</td>
        {/if}
    {/foreach}
    {if $i<$MaxKolZachetVP}
    <td colspan={$MaxKolZachetVP-$i}></td>
    {/if}

<tr><td>2</td>
{assign var="i" value=0}
    {foreach $id_group.predmets as $eid}
    
        {if $eid.knum!=7 && $eid.type_cont==1}
            {assign var="i" value=$i+1}
            <td>{$eid.marks.2}</td>
        {/if}
    {/foreach}
    {if $i<$MaxKolExamOOP}
    <td colspan={$MaxKolExamOOP-$i}></td>
    {/if}

    {assign var="i" value=0}
    {foreach $id_group.predmets as $eid}
    
        {if $eid.knum!=7 && $eid.type_cont==6}
        {assign var="i" value=$i+1}
            <td>{$eid.marks.2}</td>
        {/if}
    {/foreach}
    {if $i<$MaxKolZachetOOP}
    <td colspan={$MaxKolZachetOOP-$i}></td>
    {/if}
    
    {assign var="i" value=0}
    {foreach $id_group.predmets as $eid}
    
        {if $eid.knum==7 && $eid.type_cont==1}
            {assign var="i" value=$i+1}
            <td>{$eid.marks.2}</td>
        {/if}
    {/foreach}
    {if $i<$MaxKolExamVP}
    <td colspan={$MaxKolExamVP-$i}></td>
    {/if}

    {assign var="i" value=0}
    {foreach $id_group.predmets as $eid}    
        {if $eid.knum==7 && $eid.type_cont==6}
        {assign var="i" value=$i+1}
            <td>{$eid.marks.2}</td>
        {/if}
    {/foreach}
    {if $i<$MaxKolZachetVP}
    <td colspan={$MaxKolZachetVP-$i}></td>
    {/if}


    <tr><td>зач.</td>

{assign var="i" value=0}
<td colspan={$MaxKolExamOOP}></td>
    {foreach $id_group.predmets as $eid}
    
        {if $eid.knum!=7 && $eid.type_cont==6}
            {assign var="i" value=$i+1}
            <td></td>
        {/if}
    {/foreach}
    {foreach $id_group.predmets as $eid}
    
        {if $eid.knum!=7 && $eid.type_cont==2}
        {assign var="i" value=$i+1}
            <td>{$eid.marks.5}</td>
        {/if}
    {/foreach}

    {if $i<$MaxKolZachetOOP}
    <td colspan={$MaxKolZachetOOP-$i}></td>
    {/if}
    <td colspan={$MaxKolExamVP}></td>

    {assign var="i" value=0}    
    {foreach $id_group.predmets as $eid}
    
        {if $eid.knum==7 && $eid.type_cont==6}
        {assign var="i" value=$i+1}
            <td></td>
        {/if}
    {/foreach}
    {foreach $id_group.predmets as $eid}
    
        {if $eid.knum==7 && $eid.type_cont==2}
        {assign var="i" value=$i+1}
            <td>{$eid.marks.5}</td>
        {/if}
    {/foreach}
    {if $i<$MaxKolZachetVP}
    <td colspan={$MaxKolZachetVP-$i}></td>
    {/if}

    <tr><td>не зач.</td>

{assign var="i" value=0}
<td colspan={$MaxKolExamOOP}></td>
    {foreach $id_group.predmets as $eid}
    
        {if $eid.knum!=7 && $eid.type_cont==6}
            {assign var="i" value=$i+1}
            <td></td>
        {/if}
    {/foreach}
    {foreach $id_group.predmets as $eid}
    
        {if $eid.knum!=7 && $eid.type_cont==2}
        {assign var="i" value=$i+1}
            <td>{$eid.marks.1}</td>
        {/if}
    {/foreach}

    {if $i<$MaxKolZachetOOP}
    <td colspan={$MaxKolZachetOOP-$i}></td>
    {/if}
    <td colspan={$MaxKolExamVP}></td>

    {assign var="i" value=0}    
    {foreach $id_group.predmets as $eid}
    
        {if $eid.knum==7 && $eid.type_cont==6}
        {assign var="i" value=$i+1}
            <td></td>
        {/if}
    {/foreach}
    {foreach $id_group.predmets as $eid}
    
        {if $eid.knum==7 && $eid.type_cont==2}
        {assign var="i" value=$i+1}
            <td>{$eid.marks.1}</td>
        {/if}
    {/foreach}
    {if $i<$MaxKolZachetVP}
    <td colspan={$MaxKolZachetVP-$i}></td>
    {/if}



    {/foreach}
    
{/foreach}
</table>