<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?php echo e($title); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class="container col-xl-10 col-xxl-8 px-4 py-5">

        <?php if(isset($error)): ?>
            <div class="row">
                <div class="alert alert-danger" role="alert">
                    <?php echo e($error); ?>

                </div>
            </div>
        <?php endif; ?>

        <div class="row">
            <form method="post" action="/logout">
                <?php echo csrf_field(); ?>
                <button class="w-15 btn btn-lg btn-danger" type="submit">Sign Out</button>
            </form>
        </div>

        <div class="row align-items-center g-lg-5 py-5">
            <div class="col-md-10 mx-auto col-lg-5">
                <form class="p-4 p-md-5 border rounded-3 bg-light" method="post" action="/todolist">
                    <?php echo csrf_field(); ?>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="todo" placeholder="todo">
                        <label for="todo">Todo</label>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Add Todo</button>
                </form>
            </div>
        </div>

        <div class="row align-items-right g-lg-5 py-5">
            <div class="mx-auto">
                <form id="deleteForm" method="post" style="display: none">

                </form>
                <table class="table table-striped table-hover">
                    <thead class="thead-dark text-center">
                        <tr>
                            
                            <th scope="col">Todo</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th scope="col">Opsi</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php $__currentLoopData = $todolist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $todo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                
                                <td><?php echo e($todo['todo']); ?></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td colspan="12">
                                    <form action="/todolist/<?php echo e($todo['id']); ?>/delete" method="post">
                                        <?php echo csrf_field(); ?>
                                        <button class="btn btn-lg btn-danger d-flex col-sm-offset-2 col-sm-12"
                                            style="justify-content: center" type="submit">Remove</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\todolist\resources\views/todolist/todolist.blade.php ENDPATH**/ ?>