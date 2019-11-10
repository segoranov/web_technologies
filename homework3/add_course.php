
<!DOCTYPE html>
<html>
<head>
  <link href="add_course.css" rel="stylesheet" type="text/css">
  <meta charset=utf-8>
</head>
<body>

<?php
$valid = array();
$errors = array();
$group = "core_cs";

if ($_POST) {
    $subject_name = $_POST['subject_name'];
    if (!$subject_name) {
        $errors['subject_name'] = 'Името на избираемия предмет е задължително поле.';
    } elseif (strlen($subject_name) > 200) {
        $errors['subject_name'] = 'Името на избираемия предмет има максимална дължина 150 символа.';
    } else {
        $valid['subject_name'] = $subject_name;
    }

    $lecturer_name = $_POST['lecturer_name'];
    if (!$lecturer_name) {
        $errors['lecturer_name'] = 'Името на лектора е задължително поле.';
    } elseif (strlen($lecturer_name) > 200) {
        $errors['lecturer_name'] = 'Името на лектора има максимална дължина 200 символа.';
    } else {
        $valid['lecturer_name'] = $lecturer_name;
    }

    $group = $_POST['group'];

    $description = $_POST['description'];
    if (!$description) {
        $errors['description'] = 'Описанието на избираемия предмет е задължително поле.';
    } elseif (strlen($description) < 10) {
        $errors['description'] = 'Описанието на избираемия предмет има минимална дължина 10 символа.';
    } else {
        $valid['description'] = $description;
    }

    $credits = $_POST['credits'];
    if (!$credits) {
        $errors['credits'] = 'Кредитите са задължително поле.';
    } elseif (!is_numeric($credits) || $credits < 0) {
        $errors['credits'] = 'Кредитите трябва да са цяло положително число.';
    } else {
        $valid['credits'] = $credits;
    }
}
?>

<h2>Add optional subject</h2>

<div class="container">
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

  <div class="row">
    <div class="col-25">
      <label for="subject_name">Subject Name</label>
    </div>
    <div class="col-75">
      <input type="text" id="subject_name" name="subject_name" placeholder="Subject name..."
             value="<?php
                    if (isset($valid['subject_name'])) {
                      echo htmlspecialchars($valid['subject_name']);
                    }?>">
    </div>
  </div>

  <div class="row">
    <div class="col-25">
      <label for="Lecturer name">Lecturer Name</label>
    </div>
    <div class="col-75">
      <input type="text" id="lecturer_name" name="lecturer_name" placeholder="Lecturer name..."
             value="<?php
                    if (isset($valid['lecturer_name'])) {
                      echo htmlspecialchars($valid['lecturer_name']);
                    }?>">
    </div>
  </div>

  <div class="row">
    <div class="col-25">
      <label for="group">Group</label>
    </div>
    <div class="col-75">
      <select id="group" name="group">
        <option value="core_cs" <?php if ($group == "core_cs") echo 'selected="selected" '; ?>>ЯКН</option>
        <option value="basics_cs" <?php if ($group == "basics_cs") echo 'selected="selected" '; ?>>ОКН</option>
        <option value="math" <?php if ($group == "math") echo 'selected="selected" '; ?>>М</option>
        <option value="applied_math" <?php if ($group == "applied_math") echo 'selected="selected" '; ?>>ПМ</option>
      </select>
    </div>
  </div>

  <div class="row">
      <div class="col-25">
        <label for="Credits">Credits</label>
      </div>
      <div class="col-75">
        <input type="text" id="credits" name="credits" placeholder="Number of credits..."
               value="<?php
                      if (isset($valid['credits'])) {
                        echo htmlspecialchars($valid['credits']);
                      }?>">
      </div>
  </div>

  <div class="row">
    <div class="col-25">
      <label for="description">Description</label>
    </div>
    <div class="col-75">
      <textarea id="description" name="description" placeholder="Description of the subject..." style="height:200px"><?php
        if (isset($valid['description'])) {
          echo htmlspecialchars($valid['description']);
        }?></textarea>
    </div>
  </div>

  <div class="row">
    <input type="submit" value="Submit">
  </div>
  </form>
</div>

<?php
  if (empty($errors) && !empty($valid)) {
    echo "<font color='green' size=5>Successfully added optional course!</font> <br\n>";
  } else {
    foreach ($errors as $error) {
      echo "<font color='red' size=5>" . $error . "</font> <br/>\n";
    }
  }
?>

</body>
</html>
