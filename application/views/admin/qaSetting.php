
<!-- Intro Header -->
<header class="masthead">

  <section id="content" class="content-section text-center">
    <?php if(null !== $this->session->flashdata('msg')){
       echo('<p>** '.$this->session->flashdata('msg')).' **</p>';
     } ?>
    <?php if($from === 'back'){ ?>
      <h2>Q&A 管理</h2>
      <div align="right">
        <sup>
          <a class="btn btn-primary btn-lg" href="<?= base_url() ?>admin/newsCreate">建立消息</a>
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
            <th scope="col">按</th>
            <th scope="col">鈕</th>
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
              <td><a class="btn btn-secondary" href="<?php echo (base_url().'news/'.$news['n_slug']); ?>">編輯</a></td>
              <td>
                <?php echo form_open('admin/newsDelete/'.$news['n_slug']);?>
                  <button type="submit" class="btn btn-secondary">刪除</button>
                </form>
              </td>
            <?php } ?>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </section>

</header>

<script type="text/javascript">
  $(document).ready(function(){

    // $("#delete-news").click(function(e){
    //   e.preventDefault();
    //   if(confirm("確定刪除嗎"))
    //   {
    //
    //   }
    // });

  });
</script>
