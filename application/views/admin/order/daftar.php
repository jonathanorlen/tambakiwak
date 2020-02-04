<div class="content">
  <div class="row">
    <div class="col-md-12">
      <a href="<?php echo base_url('admin/media/tambah')?>">
        <button type="button" class="btn btn-primary btn-lg col-md-4 col-sm-12 col-12"><i class="nc-icon nc-simple-add"></i>   Tambah Media</button>
      </a>
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead class=" text-primary">
                <th>
                  Tanggal
                </th>
                <th>
                  Nama File
                </th>
                <th class="text-right">
                  Action
                </th>
              </thead>
              <tbody>
                <?php 
                foreach ($list as $data){
                 ?>
                 <?php 
                 $rows = 1;
                 $ok = $this->db->get_where('media',array("tanggal"=> $data['tanggal']));
                 ?>
                 <tr>
                  <td rowspan="<?php echo $ok->num_rows()?>">
                    <?php echo $data['tanggal']    ?>
                  </td>
                  <?php 
                  foreach($ok->result() as $da){ $rows++?>
                    <td>
                      <?php echo $da->nama ?>
                    </td>
                    <td class="text-right">
                      <a href="<?php echo base_url('admin/media/edit/');echo $da->id?>">
                        <button type="button" class="btn btn-warning"><!--<i class="nc-icon nc-simple-add"></i>--> Edit </button>
                      </a>
                      <a onclick="deletdata('<?php echo base_url('admin/media/hapus/');echo $da->id?>')">
                        <button type="button" class="btn btn-danger">Hapus </button>
                      </a>
                    </td>
                  </tr>
                <?php }}
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
 function deletdata(link) {
		swal({
			title: "Apakah anda yakin",
			text: "Anda tidak dapat mengembalikan data ini",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: "Konfirmasi",
			cancelmButtonText: "Batal"
		}).then(function () {
			window.location.href = link;
		})
	}
</script>