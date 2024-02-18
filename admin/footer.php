

        <footer class="footer py-4  ">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-6 mb-lg-0 mb-4">
                        ALL rights reserved Copyright @ Kamlesh Patel - <?= date( 'd/m/Y'); ?>
                    </div>
                    <div class="col-lg-6">
                    <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                        <li class="nav-item">
                        <a href="" class="nav-link text-muted">Kamlesh Patel</a>
                        </li>
                        <li class="nav-item">
                        <a href="" class="nav-link text-muted">About Us</a>
                        </li>
                        <li class="nav-item">
                        <a href="" class="nav-link text-muted">Blog</a>
                        </li>
                        <li class="nav-item">
                        <a href="" class="nav-link pe-0 text-muted"
                        >License</a>
                        </li>
                    </ul>
                    </div>
                </div>
            </div>
        </footer>
    </main>

    <!-- jquery -->
    <script src="assets/jquery/jquery.min.js"></script>

    <!-- Alertify -->
    <script src="/ecommerce/admin/assets/alertify/alertify.min.js"></script>

    <!--sweetalert -->
    <script src="assets/sweetalert/sweetalert.min.js"></script>
    <script>
        <?php 
            if(isset($_SESSION['message']))
            {
                ?>
                    alertify.set('notifier','position', 'top-right');
                    alertify.success("<?= $_SESSION['message']; ?>");
                <?php
                unset($_SESSION['message']);
            }
        ?> 
    </script>
    <script>
        <?php 
            if(isset($_SESSION['logadmin']))
            {
                ?>
                    alertify.set('notifier','position', 'top-right');
                    alertify.success("<?= $_SESSION['logadmin']; ?>");
                <?php
                unset($_SESSION['logadmin']);
            }
        ?> 
    </script>

    <Script> //Category delete
        $(document).ready(function () {
            $(".categorydel").click(function (e) { 
                e.preventDefault();
                var id = $(this).val();
                
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this file!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            method: "POST",
                            url: "category_delete.php",
                            data: {
                                'id' : id,
                                'delete' : true,
                            },
                            success: function (response) {
                                //console.log(response);
                                if(response == 200)
                                {
                                    swal("Sucess!", "Category deleted successsfully!", "success");
                                    setTimeout(() => {
                                        location.reload();
                                    }, 3000);
                                }
                                else if(response == 500)
                                {
                                    swal("Error!", "Something went wrong!", "error");
                                }
                            }
                        });
                    } else {
                        swal("Your file is safe!");
                    }
                });
            });
        });
    </Script>

    <script>
        $(document).ready(function () {
            $(".productdel").click(function (e) { 
                e.preventDefault();
                var id = $(this).val();

                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this file!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            method: "POST",
                            url: "product_delete.php",
                            data: {
                                'pid' : id,
                                'delete' : true,
                            },
                            success: function (response) {
                                if(response == 200)
                                {
                                    swal("Success!", "Product deleted successfully!", "success");
                                    setTimeout(() => {
                                        location.reload();
                                    }, 3000);
                                }
                                else if(response == 500)
                                {
                                    swal("Error!", "Somethinf went wrong!", "error");
                                }
                            }
                        });
                    } else {
                        swal("Your imaginary file is safe!");
                    }
                });

            });
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
    <script>
        //new DataTable('#example');
        $(document).ready(function() {
            $('#example').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            } );
        } );
    </script>

</body>
</html>