<?php foreach ($posts as $post): ?>

<p><b>Author</b>:  <?= $post['author']; ?></p>

<p><b>Date</b>:  <?= date('d-m-Y', $post['datetime']); ?></p>

<p><b>Text</b>: <?= substr($post['text'], 0, 100); ?></p>

<p><b>Comments:</b> <?= $this->comment->countComments($post['id']); ?></p>

<p><a href='/single-post?id=<?= $post['id'] ?>'>Read more</a></p>
<hr>

<?php endforeach ?>