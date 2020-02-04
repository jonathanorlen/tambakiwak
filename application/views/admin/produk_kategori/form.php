<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<div class="content">
  <form role="form" method="post" enctype="multipart/form-data" action="<?php echo base_url('admin/media/prosesTambah')?>">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-user">
          <div class="card-header">
            <h5 class="card-title">Tambah Media</h5>
          </div>
          <div class="card-body">
            <form>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Tanggal</label>
                    <input type="date" name="tanggal" class="form-control"  placeholder="Company" required>

                  </div>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Nama File</label>
                    <input type="text" name="nama_file1" class="form-control"  placeholder="Isi nama file" maxlength="15" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <label>.</label>
                  <div class="input-group mb-3">
                    <input type="file" name="file1" class="form-control" placeholder="Your Email" accept="application/pdf, application/vnd.ms-excel, application/msword" required>
                    <div class="input-group-append">
                      <span class="input-group-text">only pdf, excel, word</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="fileform">

              </div>
              <div class="row">
                <div class="col-md-12">
                  <button type="button" id="btnadd" class="btn btn-primary col-md-2 col-sm-12 col-12">
                    <i class="nc-icon nc-simple-add"></i> Tambah
                  </button>
                </div>
              </div>
              <div class="row">
                <div class="update ml-auto mr-auto">
                  <button type="submit" class="btn btn-primary btn-round">Tambah</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>

<script type="text/javascript">
  $(document).ready(function(){
    var counter = 1;
    $("#btnadd").click(function(){
      counter++;
      if(counter<5)
        $(".fileform").append('<div class="row"><div class="col-md-6"> <div class="form-group"> <label>Nama File '+counter+'</label> <input type="text" name="nama_file'+counter+'" class="form-control"  placeholder="Isi nama file '+counter+'" maxlength="15"></div></div> <div class="col-md-6"> <label>File </label> <div class="input-group mb-3"> <input type="file" class="form-control" placeholder="Your FIle" accept="application/pdf, application/vnd.ms-excel, application/vnd.ms-word" name="file'+counter+'" required> <div class="input-group-append"> <span class="input-group-text">only pdf, excel, word</span> </div> </div> </div>');
      else
        alert("Limit File");
    });
  });
</script>