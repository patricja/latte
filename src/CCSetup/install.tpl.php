<h1>Installation finished!</h1>

<p>You are now good to go with Latte, enjoy.</p>

<table>
<caption>Results from installing modules.</caption>
<thead>
  <tr><th>Module</th><th>Result</th></tr>
</thead>
<tbody>
<?php foreach($modules as $module): ?>
  <tr><td><?=$module['name']?></td><td><div class='<?=$module['result'][0]?>'><?=$module['result'][1]?></div></td></tr>
<?php endforeach; ?>
</tbody>
</table>

<div class="info">Next, go the the <a href="<?=create_url('user','login');?>">login</a>-page and log in as root : root.</div>