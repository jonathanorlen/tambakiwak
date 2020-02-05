<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<?php if(!isset($kategori)){
              $form = base_url('admin/ProdukKategori/prosesTambah');
            }else{
              $form = base_url('admin/ProdukKategori/prosesEdit');
            }
            ?>
<div class="content">
  <form role="form" method="post" enctype="multipart/form-data" action="<?php echo $form?>">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-user">
          <div class="card-header">
            <h5 class="card-title">Form Produk Kategori</h5>
          </div>
          <div class="card-body">
            <div class="row text-center">
            <input type="hidden" name="id" value="<?php if(isset($kategori['id'])){echo $kategori['id'];}?>">

            </div>
            <div class="row">
              <div class="col-md-2">
                <label>Gambar</label>
                <div class="image-edit" id="imagepreview" <?php if(isset($kategori['gambar'])){echo 'style="background-image:url('.base_url("upload/itemkategori/").$kategori['gambar'].')"';}?>>
                </div>
                <div class="upload-btn-wrapper mt-1">
                  <button class="btn-upload">Upload</button>
                  <input type="file" name="gambar" id="imageUpload" accept=".png, .jpg, .jpeg" />
                </div>
                </div>
                <input type="hidden" name="gambar_lama" value="<?php if(isset($kategori['gambar'])){echo $kategori['gambar'];}?>">
                
                <div class="col-md-10">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" value="<?php if(isset($kategori['nama'])){echo $kategori['nama'];}?>" class="form-control"  placeholder="Isikan nama kategori" required>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="status">
                      <option value="1" <?php if(isset($kategori['status']) && @$kategori['status'] == 1){echo "selected";}?>>ON</option>
                      <option value="0" <?php if(isset($kategori['status']) && @$kategori['status'] == 0){echo "selected";}?>>OFF</option>
                    </select>
                  </div>
                </div>
                </div>
                
              </div>
              <div class="row">
                <div class="update ml-auto mr-auto">
                  <button type="submit" class="btn btn-primary btn-round">Submit</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
<script>
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagepreview').css('background-image', 'url('+e.target.result +')');
            $('#imagepreview').hide();
            $('#imagepreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#imageUpload").change(function() {
    readURL(this);
    console.log(this);
});
</script>