

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Kompanijų sąrašas</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Pavadinimas</th>
                <th>Paštas</th>
                <th>Adresas</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($company->id); ?></td>
                    <td><?php echo e($company->name); ?></td>
                    <td><?php echo e($company->email); ?></td>
                    <td><?php echo e($company->address); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH G:\Users\Daniil\Desktop\laravel\resources\views/companies.blade.php ENDPATH**/ ?>