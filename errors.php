<?php  if (count($errorListVar) > 0) : ?>
    <div class="error">
        <?php foreach ($errorListVar as $error) : ?>
            <p><?php echo $error ?></p>
        <?php endforeach ?>
    </div>
<?php  endif ?>