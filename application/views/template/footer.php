  </div>
</div>
  <script src="<?php echo base_url(''); ?>assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="<?php echo base_url(''); ?>assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url(''); ?>assets/js/sidebarmenu.js"></script>
  <script src="<?php echo base_url(''); ?>assets/js/app.min.js"></script>
  <script src="<?php echo base_url(''); ?>assets/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="<?php echo base_url(''); ?>assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="<?php echo base_url(''); ?>assets/js/dashboard.js"></script>
  <script src="<?php echo base_url(''); ?>assets/libs/select2/js/select2.min.js"></script>

  <!-- Datatables -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.colVis.min.js"></script>

    <!-- Masukkan plugin Inputmask -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6/jquery.inputmask.min.js"></script>

  <script type="text/javascript">
    $(".pilih-kategori").change(function(){
        if($(this).val() == "0") {
            $(".input-kategori").removeAttr("hidden");
        } else {
            $(".input-kategori").attr('hidden', true);
        }      
    })

    $(document).ready(function() {
        $('#select2-1').select2();
        $('#select2-2').select2();
        $('#select2-3').select2();
        $('.select2').select2();

        $('.decimal').inputmask();

        $('#table-format').DataTable( {
            dom: 'Bfrtip',
            paging: true,
            buttons: [
                'pdf', 'csv', 'excel'
            ]    
        } );
        $('#table-format-no-page').DataTable( {
            dom: 'Bfrtip',
            paging: false,
            buttons: [
                'pdf', 'csv', 'excel'
            ]    
        } );

        $('.table-format').DataTable( {
            dom: 'Bfrtip',
            order: [[ 0, "asc" ]],
            paging: true,
            buttons: [
                {
                    extend: 'copyHtml5',
                    exportOptions: {
                        columns: [ 0, ':visible' ]
                    }
                },
                {
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                'colvis'
            ]   
        } );
        $('.table-format-no-page').DataTable( {
            dom: 'Bfrtip',
            order: [[ 0, "asc" ]],
            paging: false,
            buttons: [
                {
                    extend: 'copyHtml5',
                    exportOptions: {
                        columns: [ 0, ':visible' ]
                    }
                },
                {
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                'colvis'
            ]   
        } );
    });

    /* Tanpa Rupiah */
    var tanpa_rupiah = document.getElementById('tanpa-rupiah');
    tanpa_rupiah.addEventListener('keyup', function(e)
    {
        tanpa_rupiah.value = formatRupiah(this.value);
    });
    
    /* Fungsi */
    function formatRupiah(angka, prefix)
    {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split    = number_string.split(','),
            sisa     = split[0].length % 3,
            rupiah     = split[0].substr(0, sisa),
            ribuan     = split[0].substr(sisa).match(/\d{3}/gi);
            
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        
        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
  </script>
</body>

</html>