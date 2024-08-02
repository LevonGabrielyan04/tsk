<!DOCTYPE html>
<html>
<head>
    <title>Search Results</title>
</head>
<body>
    <h1>Search Results</h1>
    
    <?php if (!empty($results)): ?>
        <ul>
            <?php foreach ($results as $schoolkid): ?>
                <li><a href="<?php echo base_url('pupils/view/'.$schoolkid->id); ?>"><?php echo $schoolkid->full_name; ?></a></li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No results found.</p>
    <?php endif; ?>
    
    <p><a href="<?php echo base_url('pupils'); ?>">Back</a></p>
</body>
</html>
