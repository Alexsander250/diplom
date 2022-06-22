<table border=1>
<tr>
{$shirinatable=$shirinatable+1}
{if $post_sem==0}
    <th colspan={$shirinatable}><center>Итоги сдачи весенней сессии в {$post_year-1} - {$post_year} уч. году </center></th>
    {else}
        <th colspan={$shirinatable}}><center>Итоги сдачи осенней сессии в {$post_year-1} - {$post_year} уч. году </center></th>
{/if}
</tr>
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
    {foreach from=$id_group.predmets.exam item=$eid key=$type}
            
                {if $eid.knum!=7 }
                    {assign var="i" value=$i+1}
                    <td> {$eid.edu_name}</td>
                {/if}
    {/foreach}
            {if $i<$MaxKolExamOOP}
                <td colspan={$MaxKolExamOOP-$i}></td>
            {/if}

    {assign var="i" value=0}
    {if !empty($id_group.predmets.difzachet)}
        {foreach from=$id_group.predmets.difzachet item=$eid key=$type}            
            {if $eid.knum!=7 }
                {assign var="i" value=$i+1}
                <td> {$eid.edu_name}</td>
            {/if}
        {/foreach}
    {/if}
    {if !empty($id_group.predmets.zachet)}
    {foreach from=$id_group.predmets.zachet item=$eid key=$type}
            
        {if $eid.knum!=7 }
            {assign var="i" value=$i+1}
            <td> {$eid.edu_name}</td>
        {/if}
    {/foreach}
    {/if}
    {if $i<$MaxKolZachetOOP}
        <td colspan={$MaxKolZachetOOP-$i}></td>
    {/if}

    

    {assign var="i" value=0}
    {foreach from=$id_group.predmets.exam item=$eid key=$type}
            
                {if $eid.knum==7 }
                    {assign var="i" value=$i+1}
                    <td> {$eid.edu_name}</td>
                {/if}
    {/foreach}
            {if $i<$MaxKolExamVP}
                <td colspan={$MaxKolExamVP-$i}></td>
            {/if}

    {assign var="i" value=0}
    {if !empty($id_group.predmets.difzachet)}
        {foreach from=$id_group.predmets.difzachet item=$eid key=$type}            
            {if $eid.knum==7 }
                {assign var="i" value=$i+1}
                <td> {$eid.edu_name}</td>
            {/if}
        {/foreach}
    {/if}
    {if !empty($id_group.predmets.zachet)}
    {foreach from=$id_group.predmets.zachet item=$eid key=$type}
            
        {if $eid.knum==7 }
            {assign var="i" value=$i+1}
            <td> {$eid.edu_name}</td>
        {/if}
    {/foreach}
    {/if}

    {if $i<$MaxKolZachetVP}
        <td colspan={$MaxKolZachetVP-$i}></td>
    {/if} 
</tr>


{if $post_stud==1}
    {foreach from=$arroc item=$group key=$grnum}
        {if $grnum==$id_group.grnum}
            {foreach from=$group item=$people key=$FIO}
                <tr><td>{$FIO}</td> 
                {assign var="i" value=0}  
                    {foreach from=$people.exam item=$eid key=$predmet}
                    {if $eid.knum!=7}
                        {assign var="i" value=$i+1}
                        {if $eid.mark!=1}
                        <td>{$eid.mark}</td>
                        {else}
                            <td>Не явка</td> 
                        {/if}
                    {/if}        
                    {/foreach}  
                    {if $i<$MaxKolExamOOP}
                        <td colspan={$MaxKolExamOOP-$i}></td>
                    {/if}


                    {assign var="i" value=0}
                    {if !empty($people.difzachet)}
                        {foreach from=$people.difzachet item=$eid key=$predmet}
                            {if $eid.knum!=7}
                                {assign var="i" value=$i+1}
                                <td>{$eid.mark}</td>
                            {/if}        
                        {/foreach} 
                    {/if} 
                    {if !empty($people.zachet)}
                    {foreach from=$people.zachet item=$eid key=$predmet}
                        {if $eid.knum!=7}
                                {assign var="i" value=$i+1}
                                {if $eid.mark==7}
                                    <td>зач</td>
                                    {else}
                                    <td>не зач.</td>
                                    {/if}
                        {/if}        
                    {/foreach} 
                    {/if} 
                    {if $i<$MaxKolZachetOOP}
                        <td colspan={$MaxKolZachetOOP-$i}></td>
                    {/if}

                    {assign var="i" value=0}
                    {foreach from=$people.exam item=$eid key=$predmet}
                        {if $eid.knum==7}
                            {assign var="i" value=$i+1}
                            {if $eid.mark!=1}
                                <td>{$eid.mark}</td>
                                {else}
                                    <td>Не явка</td> 
                                {/if}
                        {/if}        
                        {/foreach}  
                        {if $i<$MaxKolExamVP}
                            <td colspan={$MaxKolExamVP-$i}></td>
                        {/if}


                        {assign var="i" value=0}
                        {if !empty($people.difzachet)}
                            {foreach from=$people.difzachet item=$eid key=$predmet}
                                {if $eid.knum==7}
                                    {assign var="i" value=$i+1}
                                    {if $eid.mark!=1}
                                        <td>{$eid.mark}</td>
                                        {else}
                                            <td>Не явка</td> 
                                        {/if}
                                {/if}        
                            {/foreach}  
                        {/if} 
                    {if !empty($people.zachet)}
                    {foreach from=$people.zachet item=$eid key=$predmet}
                        {if $eid.knum==7}
                                {assign var="i" value=$i+1}
                                {if $eid.mark==7}
                                    <td>зач</td>
                                    {else}
                                    <td>не зач.</td>
                                    {/if}
                        {/if}        
                    {/foreach} 
                {/if} 
                    {if $i<$MaxKolZachetVP}
                        <td colspan={$MaxKolZachetVP-$i}></td>
                    {/if}
            
            {/foreach}
        {/if}
    
    {/foreach}
{/if}






{*************************}

<tr><td>Ср. балл</td>
{assign var="i" value=0}
{foreach from=$id_group.predmets.exam item=$eid key=$type}
        
            {if $eid.knum!=7 }
                {assign var="i" value=$i+1}
                <td> {$eid.avg}</td>
            {/if}
{/foreach}
        {if $i<$MaxKolExamOOP}
            <td colspan={$MaxKolExamOOP-$i}></td>
        {/if}

{assign var="i" value=0}
{if !empty($id_group.predmets.difzachet)}
    {foreach from=$id_group.predmets.difzachet item=$eid key=$type}            
        {if $eid.knum!=7 }
            {assign var="i" value=$i+1}
            <td> {$eid.avg}</td>
        {/if}
    {/foreach}
{/if}
{if $i<$MaxKolZachetOOP}
    <td colspan={$MaxKolZachetOOP-$i}></td>
{/if}


{assign var="i" value=0}
{foreach from=$id_group.predmets.exam item=$eid key=$type}
        
            {if $eid.knum==7 }
                {assign var="i" value=$i+1}
                <td> {$eid.avg}</td>
            {/if}
{/foreach}
        {if $i<$MaxKolExamVP}
            <td colspan={$MaxKolExamVP-$i}></td>
        {/if}

{assign var="i" value=0}
{if !empty($id_group.predmets.difzachet)}
    {foreach from=$id_group.predmets.difzachet item=$eid key=$type}            
        {if $eid.knum==7 }
            {assign var="i" value=$i+1}
            <td> {$eid.avg}</td>
        {/if}
    {/foreach}
{/if}

{if $i<$MaxKolZachetVP}
    <td colspan={$MaxKolZachetVP-$i}></td>
{/if} 
</tr>

{************************}
{for $j=5 to 1 step -1}
    {if $j!=1}
        <tr><td>{$j}</td>
    {else}
        <tr><td>Не явка</td>
    {/if}
    
    {assign var="i" value=0}
    {foreach from=$id_group.predmets.exam item=$eid key=$type}
                {if $eid.knum!=7 }
                    {assign var="i" value=$i+1}
                    <td> {$eid.marks.{$j}}</td>
                {/if}
    {/foreach}
            {if $i<$MaxKolExamOOP}
                <td colspan={$MaxKolExamOOP-$i}></td>
            {/if}
    {assign var="i" value=0}
    {if !empty($id_group.predmets.difzachet)}
        {foreach from=$id_group.predmets.difzachet item=$eid key=$type}            
            {if $eid.knum!=7 }
                {assign var="i" value=$i+1}
                <td> {$eid.marks.{$j}}</td>
            {/if}
        {/foreach}
    {/if}
        {if $i<$MaxKolZachetOOP}
            <td colspan={$MaxKolZachetOOP-$i}></td>
        {/if}


        
    {assign var="i" value=0}
    {foreach from=$id_group.predmets.exam item=$eid key=$type}
            
                {if $eid.knum==7 }
                    {assign var="i" value=$i+1}
                    <td> {$eid.marks.{$j}}</td>
                {/if}
    {/foreach}
            {if $i<$MaxKolExamVP}
                <td colspan={$MaxKolExamVP-$i}></td>
            {/if}

    {assign var="i" value=0}
    {if !empty($id_group.predmets.difzachet)}
        {foreach from=$id_group.predmets.difzachet item=$eid key=$type}            
            {if $eid.knum==7 }
                {assign var="i" value=$i+1}
                <td> {$eid.marks.{$j}}</td>
            {/if}
        {/foreach}
    {/if}
    {if $i<$MaxKolZachetVP}
        <td colspan={$MaxKolZachetVP-$i}></td>
    {/if} 
    
    <tr>
{/for}


    <tr><td>зач.</td>
    <td colspan={$MaxKolExamOOP}></td>
    {assign var="i" value=0}
    {if !empty($id_group.predmets.difzachet)}
        {foreach from=$id_group.predmets.difzachet item=$eid key=$type}            
            {if $eid.knum!=7 }
                {assign var="i" value=$i+1}
                <td></td>
            {/if}
        {/foreach}
    {/if}
    {if !empty($id_group.predmets.zachet)}
    {foreach from=$id_group.predmets.zachet item=$eid key=$type}            
        {if $eid.knum!=7 }
            {assign var="i" value=$i+1}
            <td> {$eid.marks.5}</td>
        {/if}
    {/foreach}
    {/if}

    {if $i<$MaxKolZachetOOP}
    <td colspan={$MaxKolZachetOOP-$i}></td>
    {/if}
    <td colspan={$MaxKolExamVP}></td>

    {assign var="i" value=0}
    {if !empty($id_group.predmets.difzachet)}
        {foreach from=$id_group.predmets.difzachet item=$eid key=$type}            
            {if $eid.knum==7 }
                {assign var="i" value=$i+1}
                <td></td>
            {/if}
        {/foreach}
    {/if}
    {if !empty($id_group.predmets.zachet)}
    {foreach from=$id_group.predmets.zachet item=$eid key=$type}            
        {if $eid.knum==7 }
            {assign var="i" value=$i+1}
            <td> {$eid.marks.5}</td>
        {/if}
    {/foreach}
{/if}
    {if $i<$MaxKolZachetVP}
    <td colspan={$MaxKolZachetVP-$i}></td>
    {/if}

    <tr><td>не зач.</td>
    <td colspan={$MaxKolExamOOP}></td>
    {assign var="i" value=0}
    {if !empty($id_group.predmets.difzachet)}
        {foreach from=$id_group.predmets.difzachet item=$eid key=$type}            
            {if $eid.knum!=7 }
                {assign var="i" value=$i+1}
                <td></td>
            {/if}
        {/foreach}
    {/if}
    {if !empty($id_group.predmets.zachet)}
    {foreach from=$id_group.predmets.zachet item=$eid key=$type}            
        {if $eid.knum!=7 }
            {assign var="i" value=$i+1}
            <td> {$eid.marks.1}</td>
        {/if}
    {/foreach}
    {/if}
    {if $i<$MaxKolZachetOOP}
    <td colspan={$MaxKolZachetOOP-$i}></td>
    {/if}
    <td colspan={$MaxKolExamVP}></td>

    {assign var="i" value=0}
    {if !empty($id_group.predmets.difzachet)}
        {foreach from=$id_group.predmets.difzachet item=$eid key=$type}            
            {if $eid.knum==7 }
                {assign var="i" value=$i+1}
                <td></td>
            {/if}
        {/foreach}
    {/if}
    {if !empty($id_group.predmets.zachet)}
    {foreach from=$id_group.predmets.zachet item=$eid key=$type}            
        {if $eid.knum==7 }
            {assign var="i" value=$i+1}
            <td> {$eid.marks.1}</td>
        {/if}
    {/foreach}
{/if}
    {if $i<$MaxKolZachetVP}
    <td colspan={$MaxKolZachetVP-$i}></td>
    {/if}




    {/foreach}
    
{/foreach}
</table>