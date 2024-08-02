<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h5>
        <a href="<?php echo base_url('pupils/add');?>">Add a Schoolkid</a>
    </h5>
    
    
    <form action="<?php echo base_url('pupils/search') ?>" method="post">
    <label for="name">Name or second name:</label>
    <input type="text" name="name" >
    <?php echo validation_errors(); ?>
    <input type="submit" value="Search">
    <br>
    <label for="class">Class filter:</label>
    <input type="text" name="class" >
    <br>
    <label for="school">School filter:</label>
    <input type="text" name="school">
    </form>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>School</th>
                <th>Full Name</th>
                <th>Class</th>
                <th>Average Mark First Semester</th>
                <th>Average Mark Second Semester</th>
                <th>Average Mark</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($schoolkid as $row):?>
            <tr>
                <td><?php echo $row->id?></td>
                <td><?php echo $row->school?></td>
                <td><?php echo $row->full_name?></td>
                <td><?php echo $row->class?></td>
                <td><?php echo $row->average_mark_first_semester?></td>
                <td><?php echo $row->average_mark_second_semester?></td>
                <td><?php echo $row->average_mark?></td>
                <td>
                    <a href="<?php echo base_url('pupils/edit/'.$row->id); ?>">Edit</a>
                </td>
                <td>
                    <a href="<?php echo base_url('pupils/delete/'.$row->id); ?>">Delete</a>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
    <?php echo $links; ?>
</body>
</html>