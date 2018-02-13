
<!-- Intro Header -->
<header class="masthead">

  <section id="content" class="content-section text-center">
    <?php if(null !== $this->session->flashdata('msg')){
       echo('<p>** '.$this->session->flashdata('msg')).' **</p>';
     } ?>
    <h2>產品管理列表</h2>
    <div align="right">
      <sup>
        <a class="btn btn-secondary btn-lg" href="<?= base_url() ?>admin/productUpload">產品上架</a>
      </sup>
    </div>
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">圖片</th>
          <th scope="col">名稱</th>
          <th scope="col">Slug</th>
          <th scope="col">類別</th>
          <th scope="col">售價</th>
          <th scope="col">描述</th>
          <th scope="col">新增日</th>
        </tr>
      </thead>
      <tbody>
        <!-- <?php foreach($news as $news): ?> -->
          <tr>
            <td><a class="nav-link" href="<?php echo (base_url().'news/'.$news['n_slug']); ?>"><?php echo $news['n_title']; ?></a></td>
            <td><?php echo $news['n_created_at']; ?></td>
            <td><?php echo word_limiter($news['n_content'], 10); ?></td>
          </tr>
        <!-- <?php endforeach; ?> -->
      </tbody>
    </table>
  </section>



</header>
