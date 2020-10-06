<h2><?php echo $título?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('noticias/crear'); ?>

    <label for="título">Título</label>
    <input type="input" name="título"><br>

    <label for="texto">texto</label>
    <textarea name="texto"></textarea><br>

    <input type="submit" name="submit" value="Crear nueva noticia">

</form>