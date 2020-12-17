<?php 
	foreach($data['25_chuong'] as $value){ ?>
	<li><a href="doc-truyen/<?php echo $data['title']; ?>/<?php echo $value['title_u']; ?>-<?php echo $value['id']; ?>.html">Chương <?php echo $value['num_chap']; ?>: <?php echo stripslashes($value['title']); ?> <span class="float-right"><i class="<?php if($value['lock_chap'] == 1) echo 'fad fa-lock-alt'; ?>"></i></span></a></li>
<?php } ?>