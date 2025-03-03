<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Klientų sąrašas</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Vardas</th>
                <th>Pavarde</th>
                <th>Telefonas</th>
                <th>Paštas</th>
                <th>Adresas</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($client->id); ?></td>
                    <td><?php echo e($client->name); ?></td>
                    <td><?php echo e($client->surname); ?></td>
                    <td><?php echo e($client->phone); ?></td>
                    <td><?php echo e($client->email); ?></td>
                    <td><?php echo e($client->address); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH G:\Users\Daniil\Desktop\laravel\resources\views/clients.blade.php ENDPATH**/ ?>