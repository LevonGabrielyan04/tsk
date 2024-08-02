<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h5>
        <a href="<?php echo base_url('pupils');?>">Back</a>
        <br>
    </h5>
    <form action="<?php
    $this->uri = new CI_URI();
    $semester = $this->uri->segment(4);
    $schoolkid_id = $this->uri->segment(3);
    echo base_url(isset($marks->mathemeatics_mark)? 'pupils/updateMarks/'.$marks->id :'pupils/store_marks/'.$schoolkid_id.'/'.$semester  ) ?>" method="post">
        <label for="math">Math:</label>
        <input type="text" id="math" name="math" value="<?php echo $marks->mathemeatics_mark ?? '';?>" required>
        <small><?php echo form_error('math');?></small>
        <br>
        <label for="phisics">Phisics:</label>
        <input type="text" id="phisics" name="phisics" value="<?php echo $marks->phisics_mark ?? '';?>" required>
        <small><?php echo form_error('phisics');?></small>
        <br>
        <label for="history">History:</label>
        <input type="number" id="history" name="history" value="<?php echo $marks->history_mark ?? '';?>" required>
        <small><?php echo form_error('history');?></small>
        <br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>