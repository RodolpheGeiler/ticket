

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Login
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-body">
                        <?php
                            echo validation_errors();
                            echo form_open('verifylogin');
                        ?>
                    <fieldset>
                        <div class="form-group">
                            <?php
                                $attributes = array('class' => 'form-control', 'name' => 'username', 'id'=>'username', 'placeholder' => 'Nom d\'utilisateur');
                                echo form_input($attributes);
                            ?>
                        </div>
                        <div class="form-group">
                            <?php
                                $attributes = array('class' => 'form-control', 'name' => 'password', 'id'=>'password', 'placeholder' => 'Mot de passe');
                                echo form_password($attributes);
                            ?>
                        </div>
                        <input class="btn btn-lg btn-success btn-block" name="login" type="submit" value="Se connecter">
                        <?php
                            echo form_close();
                        ?>
                    </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
