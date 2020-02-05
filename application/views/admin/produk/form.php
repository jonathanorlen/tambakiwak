<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<div class="content">
<?php if(!isset($produk)){
              $form = base_url('admin/produk/prosesTambah');
            }else{
              $form = base_url('admin/produk/prosesEdit');
            }
            ?>
  <form role="form" method="post" enctype="multipart/form-data" action="<?php echo $form?>">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-user">
          <div class="card-header">
            <h5 class="card-title">Form Produk</h5>
          </div>
          <div class="card-body">
            <div class="row text-center">
            <input type="hidden" name="id" value="<?php if(isset($produk['id'])){echo $produk['id'];}?>">

              <div class="col-md-3">
                <label>Gambar</label>
                <div class="image-edit" id="imagepreview" <?php if(isset($produk['gambar'])){echo 'style="background-image:url('.base_url("upload/item/").$produk['gambar'].')"';}?>>
                </div>
                <div class="upload-btn-wrapper mt-1">
                  <button class="btn-upload">Upload</button>
                  <input type="file" name="gambar" id="imageUpload" accept=".png, .jpg, .jpeg" />
                </div>
                </div>
                <div class="col-md-2">
                </div>
                <input type="hidden" name="gambar_lama" value="<?php if(isset($produk['gambar'])){echo $produk['gambar'];}?>">
            </div>
            <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Kategori Produk</label>
                    <select class="form-control" name="kategori" required>
                      <option value="">-- PILIH KATEGORI --</option>
                      <?php foreach($kategori as $item){ ?>
                        <option value="<?php echo $item['id'];?>" <?php if(@$produk['kategori'] == $item['id']){echo "selected";}?>><?php echo $item['nama'];?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" value="<?php if(isset($produk['nama'])){echo $produk['nama'];}?>" class="form-control"  placeholder="Isikan nama produk" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                <label>Harga</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">Rp.</span>
                    </div>
                    <input type="number" name="harga" min="1000" value="<?php if(isset($produk['harga'])){echo $produk['harga'];}?>" class="form-control" placeholder="Masukan nominal">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Satuan</label>
                    <input type="text" name="satuan" value="<?php if(isset($produk['satuan'])){echo $produk['satuan'];}?>" class="form-control"  placeholder="Isikan nama produk" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                <label>Deskripsi</label>
                  <textarea class="form-control" row="10" name="deskripsi">
                    <?php if(isset($produk['deskripsi'])){echo $produk['deskripsi'];}?>
                  </textarea>
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