<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h5>
        Edit Page
        <br>
        <a href="<?php echo base_url('pupils');?>">Back</a>
        <br>
    </h5>
    <form action="<?php echo base_url('pupils/update/'.$schoolkid->id);?>" method="post">
        <label for="school">School:</label>
        <input type="text" id="school" name="school" value="<?= $schoolkid->school ?>" required>
        <small><?php echo form_error('school');?></small>
        <br>
        <label for="full_name">Full Name:</label>
        <input type="text" id="full_name" name="full_name" value="<?= $schoolkid->full_name ?>" required>
        <small><?php echo form_error('full_name');?></small>
        <br>
        <label for="class">Class:</label>
        <input type="number" id="class" name="class" value="<?= $schoolkid->class ?>" required>
        <small><?php echo form_error('class');?></small>
        <br>
        <label for="average_mark_first_semester">Average Mark First Semester:</label>
        <input type="number" id="average_mark_first_semester" name="average_mark_first_semester" value="<?= $schoolkid->average_mark_first_semester ?>" required>
        <small><?php echo form_error('average_mark_first_semester');?></small>
        <br>
        <label for="average_mark_second_semester">Average Mark Second Semester:</label>
        <input type="number" id="average_mark_second_semester" name="average_mark_second_semester" value="<?= $schoolkid->average_mark_second_semester ?>" required>
        <small><?php echo form_error('average_mark_second_semester');?></small>
        <br>
        <label for="average_mark">Average Mark:</label>
        <input type="number" id="average_mark" name="average_mark" value="<?= $schoolkid->average_mark ?>" required>
        <small><?php echo form_error('average_mark');?></small>
        <br>
        <input type="submit" value="Update">
    </form>
</body>
</html>