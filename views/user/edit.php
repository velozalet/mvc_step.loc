<?php //var_dump($data); ?>

<form action="<?php echo URL ?>user/save" method="POST">
    <b>Name:</b> <input type="text" name="user_name" value="<?php echo $data['name']?>"> </br></br>
    <b>E-mail:</b> <input type="text" name="user_email" value="<?php echo $data['email']?>"> </br></br>

    <input type="hidden" name="user_id" value="<?php echo $data['id'] ?>">

    <button class="btn btn-primary"> Save Edit User </button>
</form>