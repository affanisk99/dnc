<div class="widget-sidebar sidebar-search">
  <h5 class="sidebar-title">Search</h5>
  <div class="sidebar-content">
    <?php echo form_open(base_url().'search'); ?>
    <div class="input-group">
      <input type="text" class="form-control" name="cari" placeholder="Search for..." aria-label="Search for...">
      <span class="input-group-btn">
        <button class="btn btn-secondary btn-search" type="submit">
          <span class="ion-android-search">Search</span>
        </button>
      </span>
    </div>
  </form>
</div>
</div>
<div class="widget-sidebar">
  <h5 class="sidebar-title">Produk Terbaru</h5>
  <div class="sidebar-content">
    <ul class="list-sidebar">
      <?php 
      $produk = $this->db->query("SELECT * FROM produk,kategori WHERE pstatus='publish' AND pkategori=kid ORDER BY pid DESC LIMIT 3")->result();
      foreach($produk as $a){
        ?>
        <li>
          <a href="<?php echo base_url('produk/detail_produk/').$a->pslug; ?>"><?php echo $a->pjudul; ?></a>
        </li>
        <?php
      }
      ?>
    </ul>
  </div>
  <h5 class="sidebar-title">Artikel Terbaru</h5>
  <div class="sidebar-content">
    <ul class="list-sidebar">
      <?php 
      $artikel = $this->db->query("SELECT * FROM artikel,kategori WHERE astatus='publish' AND akategori=kid ORDER BY aid DESC LIMIT 3")->result();
      foreach($artikel as $a){
        ?>
        <li>
          <a href="<?php echo base_url('artikel/detail_artikel/').$a->aslug; ?>"><?php echo $a->ajudul; ?></a>
        </li>
        <?php
      }
      ?>
    </ul>
  </div>
</div>
<div class="widget-sidebar widget-tags">
  <h5 class="sidebar-title">Kategori</h5>
  <div class="sidebar-content">
    <ul>
      <?php 
      $kategori = $this->m_data->get_data('kategori')->result();
      foreach($kategori as $k){
        ?>
        <li>
          <a href="<?php echo base_url().'kategori/'.$k->kslug; ?>"><?php echo $k->knama; ?></a>
        </li>
        <?php
      }
      ?>
    </ul>
  </div>
</div>