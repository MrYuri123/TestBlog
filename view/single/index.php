<h3>Author: <?= $post['author']; ?></h3>

<p><b>Date:</b> <?= date('d-m-Y', $post['datetime']); ?></p>

<hr>

<p><?= $post['text']; ?></p>

<a href='/'>Back</a>

<hr>

<p><b>Comment Form</b></p>
<?php include_once '/view/form.php'; ?>

<hr>
<p><b>Comments</b></p>
<hr>

<?php include_once 'comments_list.php'; ?>