<?php require 'View/includes/header.php'?>

<?php // Use any data loaded in the controller here ?>

<section>
    <p><a href="index.php">To home</a></p>

    <ul>
        <?php foreach ($articles as $article) : ?>
            <li> <a href="<?= $article->url() ?>">
                    <?=$article->title?> <?= $article->formatPublishDate() ?>
                </a></li>

        <?php endforeach; ?>
    </ul>
</section>

<?php require 'View/includes/footer.php'?>