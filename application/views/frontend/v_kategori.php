
<div class="intro intro-single route bg-image" style="background-image: url(img/overlay-bg.jpg)">
  <div class="overlay-mf"></div>
  <div class="intro-content display-table">
    <div class="table-cell">
      <div class="container">
        <h2 class="intro-title mb-4">Kategori</h2>
        <ol class="breadcrumb d-flex justify-content-center">
          <li class="breadcrumb-item">
            <a href="<?php echo base_url(); ?>">Home</a>
          </li>
          <li class="breadcrumb-item">
            <a href="<?php echo base_url('blog'); ?>">Kategori</a>
          </li>
          <li class="breadcrumb-item active">Produk</li>
        </ol>
      </div>
    </div>
  </div>
</div>
<!--/ Intro Skew End /-->

<!--/ Section Blog-Single Star /-->

<section class="blog-wrapper sect-pt4" id="blog">
  <div class="container">
    <div class="row">
      <div class="col-md-8">

        <?php if(count($produk) == 0){ ?>
          <center>
            <h3 class="mt-5">Belum Ada produk Pada Kategori Ini.</h3>
          </center>
        <?php } ?>

        <?php foreach($produk as $a){ ?>

          <div class="post-box">
            <div class="post-thumb">
              <?php if($a->psampul != ""){ ?>
                <img src="<?php echo base_url(); ?>gambar/produk/<?php echo $a->psampul ?>" alt="<?php echo $a->pjudul ?>" class="img-fluid">
              <?php } ?>
            </div>
            <div class="post-meta">
              <h1 class="article-title"><a href="<?php echo base_url().$a->pslug ?>"><?php echo $a->pjudul ?></a></h1>
              <ul>
                <li>
                  <span class="ion-pricetag"></span>
                  <a href="#"><?php echo $a->knama ?></a>
                </li>
              </ul>
            </div>
          </div>
        <?php } ?>

        <!-- membuat tombol halaman pagination -->
        <?php echo $this->pagination->create_links(); ?>

      </div>

      <div class="col-md-4">
        <?php $this->load->view('frontend/v_sidebar'); ?>
      </div>
    </div>
  </div>
</section>
