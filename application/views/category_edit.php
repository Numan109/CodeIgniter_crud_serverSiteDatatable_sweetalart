<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Server side datatable</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

    <script src="<?php echo base_url('assets/jquery/jquery-2.2.3.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js') ?>"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>

    <!-- sweetalert2 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <!-- ===========server side data table========= -->
    <link href="<?php echo base_url('assets/datatables/css/jquery.dataTables.min.css') ?>" rel="stylesheet">

</head>

<body>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <section class="content">


            <!-- ======================================Main========================================= -->

            <div class="row">

                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header bg-primary">
                            <strong>Update Category</strong>
                        </div>
                        <div class="card-body">
                            <!-- =====================Start Form================== -->
                            <?php foreach($category as $key=>$category){ ?>
                            <form action="<?php echo base_url(); ?>CategoryController/updateCategory" method="post">

                                <div class="form-group ">
                                    <input type="hidden" name="category_id" value="<?php echo $category->id; ?>">
                                    <label for="category_name">Category Name</label>
                                    <input type="text" name="category_name" class="form-control" id="category_name" value="<?php echo $category->category_name; ?>" placeholder="Category Name">
                                </div>

                                <button type="submit" class="btn btn-primary">Update Category</button>
                            </form>
                            <!-- =====================End Form================== -->
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>


            <!-- ======================================End Main========================================= -->



        </section>
        <!-- /.content -->
    </div>

    <!-- ===============sweetalert2 Messgage script ====================== -->
    <script>
        <?php $msg = $this->session->flashdata('success');
        if ($msg != '') { ?>
            swal("Hey, Good job !!", "<?php echo $msg; ?>", "success");
        <?php } ?>

        <?php $error = $this->session->flashdata('error');
        if ($error != '') { ?>
            swal("Oops...", "<?php echo $error; ?>", "error");
        <?php } ?>
    </script>
</body>

</html>