<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<div class="content">
  <form role="form" method="post" enctype="multipart/form-data" action="<?=site_url()?>admin/user/<?=($mode=='add')?'createuser':'updateUser'?>">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-user">
          <div class="card-header">
            <h5 class="card-title">Form User</h5>
          </div>
          <div class="card-body">
              <div class="row">
              <div class="col-md-12">
                  <div class="form-group">
                    <label>Nama</label>
                    <input type="hidden" name="id" value="<?= (isset($user))?$user['id']: '' ?>">
                    <input type="text" name="nama" class="form-control"  placeholder="Isi nama" maxlength="20" required value="<?= (isset($user))?$user['nama']: '' ?>">
                  </div>
                </div>
              </div>
              <div class="row">
              <div class="col-md-12">
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control"  placeholder="Isi Email" required value="<?= (isset($user))?$user['email']: '' ?>">
                  </div>
                </div>
              </div>
              <div class="row">
              <div class="col-md-12">
                  <div class="form-group">
                    <label>Nomor Handphone</label>
                    <input type="number" name="nomor_hp" class="form-control" maxlength="15"  placeholder="Isi Nomor Handphone" required value="<?= (isset($user))?$user['nomor_hp']: '' ?>">
                  </div>
                </div>
              </div>
              <div class="row">
              <div class="col-md-12">
                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control username"  placeholder="Isi username" required value="<?= (isset($user))?$user['username']: '' ?>" maxlength="20">
                  </div>
                </div>
              </div>
              <div class="row">
              <div class="col-md-12">
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control"  placeholder="Isi Password" required>
                  </div>
                </div>
              </div>
              <hr>
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
  $('.username').on('keypress', function (event) {
    var regex = new RegExp("^[a-zA-Z0-9]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
       event.preventDefault();
       return false;
    }
});
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