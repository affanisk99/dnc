
<div class="intro intro-single route bg-image" style="background-image: url(img/overlay-bg.jpg)">
  <div class="overlay-mf"></div>
  <div class="intro-content display-table">
    <div class="table-cell">
      <div class="container">
        <h2 class="intro-title mb-4">Artikel</h2>
        <ol class="breadcrumb d-flex justify-content-center">
          <li class="breadcrumb-item">
            <a href="<?php echo base_url(); ?>">Home</a>
          </li>
          <li class="breadcrumb-item active">Artikel</li>
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

        <?php if(count($artikel) == 0){ ?>
          <center>
            <h3 class="mt-5">Artikel Tidak Ditemukan.</h3>
          </center>
        <?php } ?>

        <?php foreach($artikel as $a){ ?>

          <div class="post-box">
            <div class="post-thumb">
              <?php if($a->asampul != ""){ ?>
                <img src="<?php echo base_url(); ?>gambar/artikel/<?php echo $a->asampul ?>" alt="<?php echo $a->ajudul ?>" class="img-fluid">
              <?php } ?>
            </div>
            <div class="post-meta">
              <h1 class="article-title"><?php echo $a->ajudul ?></h1>
            </div>
            <div class="article-content">
              <?php echo $a->akonten ?>
            </div>
          </div>
        <?php } ?>
      </div>

      <div class="col-md-4">
        <?php $this->load->view('frontend/v_sidebar'); ?>
      </div>
    </div>
  </div>
</section>
  <!--/ Section Blog-Single End /-->