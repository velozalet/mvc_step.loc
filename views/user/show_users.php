ALL USERS from DB:
<br><br>
<?php //var_dump($data); ?>
<div class="row">

<div class="col-lg-12 col-md-12">
	<table class="table">
		<tr>
			<th>NAME</th> <th>EMAIL</th> <th>DATA REGISTRATION</th> <th>EDIT</th> <th>DELETE</th>
		</tr>
	<?php 
	foreach ($data as $user) {
		echo '<tr>';
		echo '<td>'.$user['name'].'</td>';
		echo '<td>'.$user['email'].'</td>';
		echo '<td>'.date('d.m.Y H:i:s', $user['date']).'</td>';

		echo '<td> <a href="'.URL.'user/edit?id='.$user['id'].'">
						<span class="glyphicon glyphicon-edit"></span>
				   </a>
			  </td>';
		echo '<td> <a href="'.URL.'user/del?id='.$user['id'].'">
						<span class="glyphicon glyphicon-trash"></span>
				   </a>
			  </td>';
	    echo '</tr>';
	}
	?>
	</table>

	<p class="jj"><?php //сюда бы неплохо выводить переменную с сообщением, что Юзер успешно удален ?></p>
</div>

</div> <!--class="row"-->
