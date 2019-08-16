<?php foreach ($comments as $comment): ?>

<p>Author: <?= $comment['author']; ?></p>
<p>Date and time: <?= date('d/m/Y G:i', $comment['datetime']); ?></p>
<p><?= $comment['text']; ?></p>

<hr>
<?php endforeach; ?>