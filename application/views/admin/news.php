
<!-- Intro Header -->
<header class="masthead">

  <section id="content" class="content-section text-center">
    <?php if($from === 'back'){ ?>
      <h2>消息管理</h2>
      <div align="right">
        <sup>
          <a class="btn btn-secondary btn-lg" href="">C R E A T E</a>
        </sup>
      </div>
    <?php } ?>
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">標題</th>
          <th scope="col">日期</th>
          <th scope="col">內容</th>
          <?php if($from === 'back'){ ?>
            <th scope="col">按鈕</th>
          <?php } ?>
        </tr>
      </thead>
      <tbody>
        <?php foreach($news as $news): ?>
          <tr>
            <td><a class="nav-link" href="<?php echo (base_url().'news/'.$news['n_slug']); ?>"><?php echo $news['n_title']; ?></a></td>
            <td><?php echo $news['n_created_at']; ?></td>
            <td><?php echo word_limiter($news['n_content'], 10); ?></td>
            <?php if($from === 'back'){ ?>
              <td><a class="btn btn-secondary" href="<?php echo (base_url().'news/'.$news['n_slug']); ?>">E D I T</a></td>
            <?php } ?>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </section>



</header>
