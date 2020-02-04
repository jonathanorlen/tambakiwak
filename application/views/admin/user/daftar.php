<div class="content">
  <div class="row">
    <div class="col-md-12">
      <a href="<?php echo base_url('admin/user/tambah')?>">
        <button type="button" class="btn btn-primary btn-lg col-md-4 col-sm-12 col-12"><i class="nc-icon nc-simple-add"></i>   Tambah User </button>
      </a>
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead class=" text-primary">
                <th>
                  Username
                </th>
                <th>
                  Email
                </th>
                <th width="15%">
                  Status
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
                 ?>
                 <tr>
                  <td>
                    <?php echo $data['username']    ?>
                  </td>
                  <td>
                    <?php echo $data['email']    ?>
                  </td>
                  <td>
                    <?php echo cek_status($data['status'])  ?>
                  </td>
                  <td>
                  <a href="<?php echo base_url('admin/user/edit/');echo $data['id']?>">
                        <button type="button" class="btn btn-warning"><!--<i class="nc-icon nc-simple-add"></i>--> Edit </button>
                      </a>
                      <a onclick="deletdata('<?php echo base_url('admin/user/hapus/');echo $data['id']?>')">
                        <button type="button" class="btn btn-danger">Hapus </button>
                      </a>
                  </td>
                </tr>
                <?php } ?>
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