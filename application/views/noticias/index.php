<h2><?php echo $título; ?></h2>

<?php
foreach ($noticias as $noticia_item) : ?>

    <h3><?php echo $noticia_item['título'] ?></h3>

    <div class="inicio">
        <?php echo $noticia_item['texto'] ?>
    </div>

    <p><a href="<?php echo site_url('noticias/'.$noticia_item['slug']); ?> "> Ver artículo</a></p>

<?php endforeach; ?>