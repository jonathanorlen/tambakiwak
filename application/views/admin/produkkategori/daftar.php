<div class="content">
  <div class="row">
    <div class="col-md-12">
      <a href="<?php echo base_url('admin/produkkategori/tambah')?>">
        <button type="button" class="btn btn-primary btn-lg col-md-4 col-sm-12 col-12"><i class="nc-icon nc-simple-add"></i> Produk Kategori </button>
      </a>
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead class=" text-primary">
                <th>
                  Gambar
                </th>
                <th>
                  Nama
                </th>
                <th>
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
                 <tr>
                 <td>
                   <img src="<?php echo base_url('upload/itemkategori/'.$data['gambar']);?>"  width="80px">
                 </td>
                   <td>
                    <?php echo $data['nama']?>
                  </td>
                  <td>
                    <?php echo $data['status']?>
                  </td>
                    <td class="text-right">
                      <a href="<?php echo base_url('admin/produkkategori/edit/'.$data['id']);?>">
                        <button type="button" class="btn btn-warning"><!--<i class="nc-icon nc-simple-add"></i>--> Edit </button>
                      </a>
                      <a onclick="deletdata('<?php echo base_url('admin/produkkategori/hapus/'.$data['id']);?>')">
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