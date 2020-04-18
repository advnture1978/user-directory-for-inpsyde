<?php
/* User Directory template */
$users = get_users_from_jpt();
get_header();
//var_dump($users);
?>
<div class="container">
	<table class="table">
		<thead>
			<tr>
				<th scope="col">id</th>
				<th scope="col">name</th>
				<th scope="col">username</th>
				<th scope="col">email</th>
				<th scope="col">address</th>
				<th scope="col">phone</th>
				<th scope="col">website</th>
				<th scope="col">company</th>
			</tr>
		</thead>
		<tbody>
		  <?php foreach($users as $user):?>
			<tr>
				<?php foreach($user as $key=>$info):?>
			  	<?php 
			  		$field = $info;
			  		if($key=='address'){
			  			unset($info['geo']);
			  			$field = implode(", ", $info);
			  		}else if($key=='company'){
			  			$field = $info['name'];
			  		}
			  		if(in_array($key, array('id', 'name', 'username'))) $field = '<span class="udfi_link" data-id="'.$user['id'].'">'.$field.'</span>';
			  	?>
			  	<td><?php echo $field;?></td>
			  	<?php endforeach;?>
			</tr>
		  <?php endforeach;?>
		</tbody>
	</table>
</div>
<div class="modal fade" id="udfiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
      	<h5 class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"></div>
    </div>
  </div>
</div>
<?php 
get_footer();
