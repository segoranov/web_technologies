<!DOCTYPE html>
<html>
  <head>
    <link href="optional_subjects.css" rel="stylesheet" />
    <title>Optional subjects form</title>
  </head>
  <body>
    <form>
        <label class="form_element"> Subject <input type="text"> </label>

        <label class="form_element"> Lecturer <input type="text"> </label>

        <label class="form_element"> Description <input type="text"> </label>

        <label class="form_element"> Credits <input type="text"> </label>

        <select id="group_select" autofocus="true">
            <optgroup label="Group">
                <option value="core_of_cs"> ЯКН </option>
                <option value="basics_of_cs"> ОКН </option>
                <option value="math"> М </option>
                <option value="applied_math"> ПМ </option>
            </optgroup>
        </select>
    </form>

    <?php

    ?>
  </body>
</html>
