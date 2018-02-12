<header class="masthead">

  <section id="content" class="content-section text-center">

    <?php if(isset($_SESSION['user_account'])){ ?>
      <?php if($_SESSION['user_Admin'] === 'admin'){ ?>
        <button type="button" class="btn btn-secondary" id="touch-edit-news" name="button">編輯</button>
        <br><br>
      <?php } ?>
    <?php } ?>
    <div class="container" id="show-news">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h1 class="brand-heading"><?= $news['n_title']; ?></h1>
          <p class="intro-text"><?= $news['n_content']; ?></p>
        </div>
      </div>
    </div>

    <div id="edit-news" class="container" style="display: none;">
      <input type="text" id="new-news-title" value="<?= $news['n_title']; ?>"><hr>
      <textarea class="form-control" id="new-news-content" rows="8"><?= $news['n_content']; ?></textarea><br>
      <button id="change-news" type="button" class="btn btn-secondary">儲存</button>　
      <button id="unchange-news" type="button" class="btn btn-secondary">取消變更</button>
    </div>

  </section>

  <input type="hidden" id="slug" value="<?= $news['n_slug']; ?>">
  <input type="hidden" id="title" value="<?= $news['n_title']; ?>">
  <input type="hidden" id="recontent" value="<?= $news['n_content']; ?>">

</header>

<script type="text/javascript">
$(document).ready(function(){
  $("#touch-edit-news,#unchange-news").click(function(e){
    $("#touch-edit-news").toggle();
    $("#edit-news").toggle();
    $("#show-news").toggle();
    // $("#new-news-title").val($("#title").val());
    // $("#new-news-content").val($("#content").val());
  });
  $("#unchange-news").click(function(){
    $("#new-news-title").val($("#title").val());
    $("#new-news-content").val($("#recontent").val());
  });
  $("#change-news").click(function(e){
    e.preventDefault();
    $.ajax({
      method: "POST",
      url: '<?php echo base_url() ?>admin/newsUpdate',
      data: {slug:$("#slug").val(),title:$("#title").val(),content:$("#recontent").val()},  //
      success: function(data){
          console.log(data);
        },error: function(){
          alert('Fail');
        }
    })
  });

});

</script>
