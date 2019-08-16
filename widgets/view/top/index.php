<h3>Top posts</h3>

<?php foreach($topPosts as $index => $post): ?>

<p><?= ++$index ?>. <a href='/single-post?id=<?= $post['id'] ?>'><b>Author</b>: <?= $post['author'] ?>, <b>Date</b>:  <?= date('d-m-Y', $post['datetime']); ?> </a></p>

<?php endforeach; ?>

<hr>