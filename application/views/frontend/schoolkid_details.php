<!DOCTYPE html>
<html>
<head>
    <title>Schoolkid Details</title>
</head>
<body>
    <h1>Schoolkid Details</h1>
    
    <?php if ($schoolkid): ?>
        <p><strong>Full Name:</strong> <?php echo $schoolkid->full_name; ?></p>
        <p><strong>First Semester:</strong></p>
        <p><a href="<?php echo isset($firstSemester->id)?base_url('pupils/editmarks/'.$firstSemester->id) : base_url('pupils/createMarks/'.$schoolkid->id.'/1'); ?>">Edit</a></p>
        <p><strong>Math:</strong> <?php echo $firstSemester->mathemeatics_mark ?? 'N/A';?></p>
        <p><strong>Physics:</strong> <?php echo $firstSemester->phisics_mark ?? 'N/A'; ?></p>
        <p><strong>History:</strong> <?php echo $firstSemester->history_mark ?? 'N/A'; ?></p>
        <p><strong>Second Semester:</strong></p>
        <p><a href="<?php echo isset($secondSemester->id)? base_url('pupils/editmarks/'.$secondSemester->id) : base_url('pupils/createMarks/'.$schoolkid->id.'/2'); ?>">Edit</a></p>
        <p><strong>Math:</strong> <?php echo $secondSemester->mathemeatics_mark ?? 'N/A'; ?></p>
        <p><strong>Physics:</strong> <?php echo $secondSemester->phisics_mark ?? 'N/A'; ?></p>
        <p><strong>History:</strong> <?php echo $secondSemester->history_mark ?? 'N/A'; ?></p>
        <p><strong>Third Semester:</strong></p>
        <p><a href="<?php isset($overall->id)? base_url('pupils/editmarks/'.$overall->id) : base_url('pupils/createMarks/'.$schoolkid->id.'/3'); ?>">Edit</a></p>
        <p><strong>Math:</strong> <?php echo $overall->mathemeatics_mark ?? 'N/A'; ?></p>
        <p><strong>Physics:</strong> <?php echo $overall->phisics_mark ?? 'N/A'; ?></p>
        <p><strong>History:</strong> <?php echo $overall->history_mark ?? 'N/A'; ?></p>
    <?php else: ?>
        <p>No details available.</p>
    <?php endif; ?>
    
    <p><a href="<?php echo base_url('pupils'); ?>">Back</a></p>
</body>
</html>
