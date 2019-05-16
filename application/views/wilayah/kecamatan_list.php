<?php $this->load->view('shared/css_content');?>
<div class="row" id="kecamatan">
<div class="col-md-12">
<div class="card">
<div class="card-content">
<h3 class="card-title"> <i class="fa fa-map-marker mr-10" aria-hidden="true"></i>  DAFTAR KECAMATAN</h3>
<div class="toolbar">
    <!--        Here you can write extra buttons/actions for the toolbar              -->
</div>
<div class="material-datatables">
<table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
<thead>
<tr>
    <th>ID</th>
    <th>KODE</th>
    <th>KECAMATAN</th>
</tr>
</thead>
<tbody>
<?php if(!empty($kecamatan)){ foreach($kecamatan as $row){ ?>
    <tr>
        <td><?php echo $row->kecamatan_id;?></td>
        <td><?php echo $row->kode_kecamatan;?></td>
        <td><?php echo $row->nama_kecamatan;?></td>
    </tr>
<?php }} ?>
</tbody>
</table>
</div>
</div>
<!-- end content-->
</div>
<!--  end card  -->
</div>
<!-- end col-md-12 -->
</div>
<?php
$this->load->view('shared/js_content');
?>
<script type="text/javascript">
    $(document).ready(function() {
        var table = $('#datatables').DataTable({
            "responsive": true,
            "dom": "<'dt-actionbulk'>flr<'dt-advance-search'>B<'dt-alert col-md-12 no-padding'>tip",
            "buttons": [ 'excel', 'pdf', 'print']
        });

    });
</script>