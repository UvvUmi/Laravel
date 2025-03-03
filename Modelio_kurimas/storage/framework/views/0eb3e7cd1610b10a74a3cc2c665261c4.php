<!DOCTYPE html>
<html lang="lt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Laravel Projektas'); ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">DB sistema</a>
        </div>
    </nav>

    <div class="container mt-4">
        <?php echo $__env->yieldContent('content'); ?>
    </div>

    <footer class="text-center mt-4 p-3 bg-light">
        <p>&copy; <?php echo e(date('Y')); ?> Duomenų bazių valdymo sistema</p>
    </footer>
</body>
</html>
<?php /**PATH G:\Users\Daniil\Desktop\laravel\resources\views/layouts/app.blade.php ENDPATH**/ ?>