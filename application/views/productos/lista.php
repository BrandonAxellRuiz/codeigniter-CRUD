<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2>Products CRUD
                <div class="pull-right">
                    <a class="btn btn-primary" href="<?php echo base_url('/index.php/productos/crear') ?>"> Create New Product</a>
                </div>
            </h2>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $d) { ?>
                    <tr>
                        <td><?php echo $d->title; ?></td>
                        <td><?php echo $d->description; ?></td>
                        <td>
                            <form method="DELETE" action="<?php echo base_url('/index.php/productos/eliminar/' . $d->id); ?>">
                                <a class="btn btn-info btn-xs" href="<?php echo base_url('index.php/productosEditar/' . $d->id) ?>"><i class="fas fa-pen-square"></i></a>
                                <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-remove"></i></button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>