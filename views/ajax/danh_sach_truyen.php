<?php $num = 1; foreach($data['danhsach'] as $value){ ?>
					<tr class="tr-<?php echo $value['id']; ?>">
						<th scope="row"><?php echo $num; ?></th>
						<td><i class="fas fa-feather-alt"></i> <?php echo $value['title']; ?></td>
						<td><?php echo $value['author']; ?></td>
						<td><button type="button" class="btn btn-sm btn-primary"><?php echo $value['status']; ?></button></td>
						<td><button type="button" class="btn btn-sm btn-secondary"><?php echo $value['type']; ?></button></td>
						<td><button type="button" class="btn btn-sm btn-success"><?php echo $value['views']; ?></button></td>
						<td><button type="button" class="btn btn-sm btn-warning"><?php echo $value['num_chaps']; ?></button></td>
						<td><?php echo $value['user_post']; ?></td>
						<td><a class="btn text-primary" href="sua-truyen/<?php echo $value['title_u']; ?>"><i class="far fa-edit"></i></a></td>
						<td class="text-center"><button class="btn text-danger" onclick="Confirm_XoaTruyen('<?php echo $value['title']; ?>', '<?php echo $value['id']; ?>')"><i class="fas fa-trash"></i></button></td>
					</tr>
					<?php $num++; } ?>