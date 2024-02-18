    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- Alertify -->
    <script src="/ecommerce/admin/assets/alertify/alertify.min.js"></script>
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
            if(isset($_SESSION['logout']))
            {
                ?>
                    alertify.set('notifier','position', 'top-right');
                    alertify.success("<?= $_SESSION['logout']; ?>");
                <?php
                unset($_SESSION['logout']);
            }
        ?> 
    </script>

    <script>
        $(document).ready(function()
        {
            $("#increament").click(function(e)
            {
                e.preventDefault();

                var qty = $(this).closest('.product_data').find('#input_qty').val();
                //alert(qty);
                var value = parseInt(qty, 10);
                value = isNaN(value) ? 0 : value;
                if(value < 10){
                    value++;
                    $(this).closest('.product_data').find('#input_qty').val(value);
                }
            })

            $("#decreament").click(function(e)
            {
                e.preventDefault();

                var qty = $(this).closest('.product_data').find('#input_qty').val();
                //alert(qty);
                var value = parseInt(qty, 10);
                value = isNaN(value) ? 0 : value;
                if(value > 1){
                    value--;
                    $(this).closest('.product_data').find('#input_qty').val(value);
                }
            })
        }) 
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

