<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Contact:</h2>

        <div>
            <ul>
                <li>Name: <?php echo e($input['name'] ? $input['name']: ''); ?></li>
                <li>Email: <?php echo e($input['email']); ?></li>
                <li>Mobile: <?php echo e($input['phone'] ? $input['phone'] : ''); ?></li>
                <li>Message: <?php echo e($input['message']); ?></li>
            </ul>
        </div>

    </body>
</html>