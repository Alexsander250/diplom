<?php

//require __DIR__. '\database.php';

    class Menu{

        public function printmenu($post_stud, $post_year, $post_sem, $post_dep, $post_group, $HTML_or_Excel)
        {
            $dbd = new database;

            ?>
            <form action="" method="post">
            <select name="stud">
                <option <?= (empty($post_stud)) || ((int)$post_stud === 0) ? 'selected' : '' ?> value="0">Сводные ведомости</option>
                <option <?= (empty($post_stud)) || ((int)$post_stud !== 0) ? 'selected' : '' ?> value="1">Групповые ведомости</option>
            </select>
            <br>
            <?php
            $result = $dbd->datadepartments();
            ?>
            <select name="dep">
                <option <?= !empty($post_dep) ? 'selected' : '' ?> value=""></option>
                <?php
                foreach ($result as $row) {
                    if ((int)$post_dep === (int)$row['fnum']) {
                        printf('<option selected value="%s">%s</option>', $row['fnum'], $row['fname']);
                    } else {
                        printf('<option value="%s">%s</option>', $row['fnum'], $row['fname']);
                    }
                }
                ?>
            </select>
            <br>
            <?php
            if (!empty($post_dep)) {
                $result = $dbd->datagroups($post_dep);
                ?>
                <select name="group">
                    <option <?= !empty($post_group) ? 'selected' : '' ?> value=""></option>
                    <?php
                    foreach ($result as $row) {
                        if ($post_group == $row['grnum']) {
                            printf('<option selected value="%s">%s</option>', $row['grnum'], $row['grnum']);
                        } else {
                            printf('<option value="%s">%s</option>', $row['grnum'], $row['grnum']);
                        }
                    }
                    ?>
                </select>
                <br>
                <?php
            } ?>
            <select name="year">
                <?php
                $current_year = date('Y');
                for ($i = 2016; $i <= $current_year; $i++) {
                    if ((int)$post_year === $i) {
                        printf('<option selected value="' . $i . '">' . ($i - 1) . ' - ' . $i . '</option>');
                    } else {
                        printf('<option value="' . $i . '">' . ($i - 1) . ' - ' . $i . '</option>');
                    }
                } ?>
            </select>
            <select name="sem">
                <option <?= ((int)$post_sem === 2) ? 'selected' : '' ?> value="2">Весенняя</option>
                <option <?= ((int)$post_sem !== 2) ? 'selected' : '' ?> value="1">Осенняя</option>
            </select>
            <br>
            <input type="radio" name="HTML_or_excel" value="0" <?= (isset($HTML_or_Excel) && (int)$HTML_or_Excel === 0) ? 'checked' : '' ?>>
            Информация в Excel файле
            <input type="radio" name="HTML_or_excel" value="1" <?= (isset($HTML_or_Excel) && (int)$HTML_or_Excel !== 0) ? 'checked' : '' ?>>
            На веб старнице
            <p>
                <input type="submit" name="submit" value="OK">
        </form>

            <?php
        }




    }
?>