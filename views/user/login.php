LOGIN IN
<br><br>
<?php //if( isset($_POST) ): var_dump($_POST); endif; ?>

<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-5  col-lg-offset-4 col-md-offset-4 col-sm-offset-4">

        <!--Login form-->
        <form class='form-inline' method="POST">
            <div class="input-group">  <!-- has-success сюда.И можно будет менять фон для содержимого span и цвет границы для всего поля ввода в целом -->
                <span class="input-group-addon "> <i class="fa fa-envelope-o fa-fw text-primary fa-lg"></i> </span>
                <input class="form-control input-lg" type="text" name='email' placeholder="Email address">
            </div>
            <div style='height:5px;'></div>  <!-- div-разделитель для примера -->
            <div class="input-group"> <!-- has-success сюда.И можно будет менять фон для содержимого span и цвет границы для всего поля ввода в целом -->
                <span class="input-group-addon "> <i class="fa fa-key fa-fw text-primary fa-lg"></i> </span>
                <input class='form-control input-lg'  type="password" name='password' placeholder="Password">
            </div>
            <br><br>

            <label class='label label-primary  checkbox'> <input class='checkbox ' type='checkbox' name='remember'> Remember Me </label>
            &nbsp&nbsp
            <button type='submit' class='btn btn-primary btn-lg' name="login"> <em class='glyphicon glyphicon-log-in'></em>&nbsp LOGIN IN</button>
        </form>
        <!--/Login form-->

    </div> <!--/class="col-lg-4-->
</div> <!--class="row"-->
