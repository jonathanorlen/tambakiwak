<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<div class="content">
  <form role="form" method="post" enctype="multipart/form-data" action="<?php echo base_url('admin/media/prosesEdit')?>">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-user">
          <div class="card-header">
            <h5 class="card-title">Edit Media</h5>
          </div>
          <div class="card-body">
            <form>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Tanggal</label>
                    <input type="hidden" value="<?php echo $user['id']?>" name="id">
                    <input type="date" name="tanggal" class="form-control" value="<?= (isset($user))?$user['tanggal']:''?>"  placeholder="Company" required>
                  </div>
                </div>
              </div>
              <hr>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Nama File</label>
                      <input type="text" name="nama" class="form-control"  placeholder="Isi nama file" maxlength="15" value="<?= (isset($user))?$user['nama']:''?>" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                  <label>File</label>
                  <div class="input-group mb-3">
                    <input type="hidden" value="<?php echo $user['file']?>" name="file_lama">
                    <input type="file" name="file" class="form-control" placeholder="Your Email" accept="application/pdf, application/vnd.ms-excel, application/msword" required="">
                    <div class="input-group-append">
                      <span class="input-group-text">only pdf, excel, word</span>
                    </div>
                  </div>
                  </div>
                </div>
                <div class="row">
                <div class="update ml-auto mr-auto">
                  <button type="submit" class="btn btn-primary btn-round">Edit</button>
                </div>
              </div>
              <div class="fileform">
            </form>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>

<script type="text/javascript">
  $(document).ready(function(){
    var counter = document.getElementById("jumlah").value;
    $("#btnadd").click(function(){
      counter++;
      if(counter<5){
        $(".fileform").append('<div class="row"><div class="col-md-6"> <div class="form-group"> <label>Nama File </label> <input type="text" name="nama_file'+counter+'" class="form-control"  placeholder="Isi nama file '+counter+'" maxlength="15"></div></div> <div class="col-md-6"> <label>File </label> <div class="input-group mb-3"> <input type="file" class="form-control" placeholder="Your FIle" accept="application/pdf, application/vnd.ms-excel, application/vnd.ms-word" name="file'+counter+'" required> <div class="input-group-append"> <span class="input-group-text">only pdf, excel, word</span> </div> </div> </div>');

      }
      else
        alert(counter);
    });
  });

   function edit() {    
      
      var parameter = $(this).val();
      alert(parameter);
      $.ajax( {  
        type :"post",  
        url : "<?php echo base_url() . 'admin/media/prosesedit' ?>",  
        cache :false,  
        //data :$(this).serialize(),
        success : function(data) {  
        /*  $(".sukses").html(data);   
          setTimeout(function(){$('.sukses').html('');window.location = "<?php echo base_url() . 'admin/berita/daftar' ?>";},1500);*/              
        },  
        error : function() {  
          alert("Data gagal dimasukkan.");  
        }  
      });
      return false;                          
    };   
</script>