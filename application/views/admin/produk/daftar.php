<div class="content">
  <div class="row">
    <div class="col-md-12">
      <a href="<?php echo base_url('admin/produk/tambah')?>">
        <button type="button" class="btn btn-primary btn-lg col-md-4 col-sm-12 col-12"><i class="nc-icon nc-simple-add"></i> Tambah Produk</button>
      </a>
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead class=" text-primary">
                <th>
                  Nama Produk
                </th>
                <th>
                  Harga
                </th>
                <th>
                  Satuan
                </th>
                <th class="text-right">
                  Action
                </th>
              </thead>
              <tbody>
                <?php 
                foreach ($list as $data){
                 ?>
                 <tr>
                  <td>
                    <?php echo $data['nama']?>
                  </td>
                  <td>
                  <?php echo $data['harga']?>
                  </td>
                  <td>
                  <?php echo $data['satuan']?>
                  </td>
                  <td>
                    <a href="<?php echo base_url('admin/produk/edit/'.$data['id']);?>">
                        <button type="button" class="btn btn-warning"><!--<i class="nc-icon nc-simple-add"></i>--> Edit </button>
                      </a>
                      <a onclick="deletdata('<?php echo base_url('admin/produk/hapus/'.$data['id']);?>')">
                        <button type="button" class="btn btn-danger">Hapus </button>
                      </a>
                  </td>
                  </tr>
                <?php }
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