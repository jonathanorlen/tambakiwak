<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<div class="content">
<?php if(!isset($banner)){
              $form = base_url('admin/banner/prosesTambah');
            }else{
              $form = base_url('admin/banner/prosesEdit');
            }
            ?>
  <form role="form" method="post" enctype="multipart/form-data" action="<?php echo $form?>">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-user">
          <div class="card-header">
            <h5 class="card-title">Form Banner</h5>
          </div>
          <div class="card-body">
            <div class="row text-center">
            <input type="hidden" name="id" value="<?php if(isset($banner['id'])){echo $banner['id'];}?>">

              <div class="col-md-3">
                <label>Gambar</label>
                <div class="image-edit" id="imagepreview" <?php if(isset($banner['gambar'])){echo 'style="background-image:url('.base_url("upload/banner/").$banner['gambar'].')"';}?>>
                </div>
                <div class="upload-btn-wrapper mt-1">
                  <button class="btn-upload">Upload</button>
                  <input type="file" name="gambar" id="imageUpload" accept=".png, .jpg, .jpeg" />
                </div>
                </div>
                <div class="col-md-2">
                </div>
                <input type="hidden" name="gambar_lama" value="<?php if(isset($banner['gambar'])){echo $banner['gambar'];}?>">
            </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" value="<?php if(isset($banner['title'])){echo $banner['title'];}?>" class="form-control"  placeholder="Isikan nama banner" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                <label>Deskripsi</label>
                  <textarea class="form-control" row="10" name="deskripsi">
                    <?php if(isset($banner['deskripsi'])){echo $banner['deskripsi'];}?>
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