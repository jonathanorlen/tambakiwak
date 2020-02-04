<div class="logo">
  <a class="simple-text logo-normal">
    <?php echo $this->session->userdata('data')->nama?>
  </a>
</div>
<div class="sidebar-wrapper">
  <ul class="nav">
    <li <?= ($active == 'dashboard')?'class="active"':''?>>
      <a href="<?php echo base_url().'admin/dashboard'?>">
        <i class="nc-icon nc-bank"></i>
        <p>Dashboard</p>
      </a>
    </li>
    <li <?=($active == 'produk')?'class="active"':''?>>
      <a href="<?php echo base_url().'admin/produk'?>">
        <i class="nc-icon nc-paper"></i>
        <p>Produk</p>
      </a>
    </li>
    <li <?=($active == 'kategori_produk')?'class="active"':''?>>
      <a href="<?php echo base_url().'admin/kategori_produk'?>">
        <i class="nc-icon nc-paper"></i>
        <p>Kategori Produk</p>
      </a>
    </li>
    <li <?=($active == 'kategori_produk')?'class="active"':''?>>
      <a href="<?php echo base_url().'admin/order'?>">
        <i class="nc-icon nc-paper"></i>
        <p>Order</p>
      </a>
    </li>
    <?php if($this->session->userdata('data')->hak_akses == 'super user'){?>
      <li <?=($active == 'user')?'class="active"':''?>>
        <a href="<?php echo base_url().'admin/user'?>">
          <i class="nc-icon nc-single-02"></i>
          <p>User</p>
        </a>
      </li>
    <?php }?>
  </ul>
</div>
</div>