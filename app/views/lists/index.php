<h1>Lists</h1>
<p>These are your current lists.</p>
<ul class='list_items'>
<?php foreach($lists as $list): ?>
    <li><?php echo $list->list_name; ?></li>
<?php endforeach; ?>
</ul>
<br>
<p><a href="#">Create a New List</a></p>