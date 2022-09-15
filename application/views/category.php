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
                <div class="col-sm-8">
                    <div class="card">
                        <div class="card-header bg-primary">
                            <strong>View Category</strong>
                        </div>
                        <div class="card-body">
                            <!-- ========================Start table=================== -->

                            <div class="container">
                                <h1 style="font-size:20pt">Simple Serverside Datatable Codeigniter</h1>

                                <h3>Customers Data</h3>
                                <br />

                                <table id="category" class="display" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Category Name</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>

                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Category Name</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>



                            <!-- ========================End table=================== -->


                        </div>
                    </div>
                </div>



                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-header bg-primary">
                            <strong>Create Category</strong>
                        </div>
                        <div class="card-body">
                            <!-- =====================Start Form================== -->
                            <form action="<?php echo base_url(); ?>CategoryController/saveCategory" method="post">

                                <div class="form-group ">
                                    <label for="category_name">Category Name</label>
                                    <input type="text" name="category_name" class="form-control" id="category_name" placeholder="Category Name">
                                </div>

                                <button type="submit" class="btn btn-primary">Add Category</button>
                            </form>
                            <!-- =====================End Form================== -->

                        </div>
                    </div>
                </div>
            </div>


            <!-- ======================================End Main========================================= -->



        </section>
        <!-- /.content -->
    </div>

    


    <script type="text/javascript">
        var table;

        $(document).ready(function() {

            //datatables 
            table = $('#category').DataTable({         //  table id

                "processing": true, //Feature control the processing indicator.
                "serverSide": true, //Feature control DataTables' server-side processing mode.
                "order": [], //Initial no order.

                // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": "<?php echo site_url('CategoryController/ajax_list') ?>",
                    "type": "POST"
                },

                //Set column definition initialisation properties.
                "columnDefs": [{
                    "targets": [0], //first column / numbering column
                    "orderable": false, //set not orderable
                }, ],

            });

           
        });
    </script>


	
<!-- 	<script type="text/javascript">
    var table;
    $(document).ready(function() {
        //datatables
        table = $('#table').DataTable({
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.
            dom: 'lBfrtip',
            buttons: [
                'csv', 'excel',
                 {
                    extend: 'pdfHtml5',
                    title: 'Children List',
                    orientation: 'landscape',
                    pageSize: 'LEGAL'
                }, 
                'print', 'colvis'
            ],
            "lengthMenu": [
                [25, 50, 100, 500, -1],
                [25, 50, 100, 500, "All"]
            ],

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('StudentController/finl_stuedent_approved_list') ?>",
                "type": "POST"
            },

            //Set column definition initialisation properties.
            "columnDefs": [{
                "targets": [0], //first column / numbering column
                "orderable": false, //set not orderable
            }, ],
        });
    });
</script> -->




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
