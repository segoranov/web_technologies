<?php
$valid = array();
$errors = array();

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

    $description = $_POST['description'];
    if (!$description) {
    $errors['description'] = 'Описанието на избираемия предмет е задължително поле.';
    } elseif (strlen($description) < 10) {
    $errors['description'] = 'Описанието на избираемия предмет има минимална дължина 10 символа.';
    } else {
    $valid['description'] = $description;
    }

    foreach ($errors as $error) {
        echo $error . "<br/>\n";
    }

}
?>