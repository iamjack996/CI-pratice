<section id="content" class="content-section text-center">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 mx-auto">
        <h2>商品列表</h2>
        <?php foreach($products as $products): ?>
          <h3><?php echo $products['p_title']; ?></h3>
          <p><?php echo $products['p_kind']; ?></p>
          <img src="uploads/<?php echo $products['p_image']; ?>">
          <p>$ <i><?php echo $products['p_price']; ?></i></p>
          <p><?php echo word_limiter($products['p_description'], 10); ?></p>
          <hr><hr>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>
