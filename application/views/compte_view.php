        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Mon compte
                        </h1>
                        <p>Afin de modifier votre email vous devez entrer votre mot de passe.</p>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-6">

                        <?php
                            echo form_open('modifself');
                            echo validation_errors();
                            echo form_hidden('uid', ''.$uid.'');
                            echo form_hidden('username', ''.$username.'');
                        ?>

                            <div class="form-group">
                                <label>Nom</label>
                                <input class="form-control" id="disabledInput" type="text" value="<?php echo $username; ?>" disabled>
                            </div>

                            <div class="form-group">
                            <?php
                                echo form_label('Email');
                                echo form_error('email');
                                if ($grade == 1) {
                                    echo form_input(array('value' => $email, 'class'=> 'form-control','id' => 'email', 'name' => 'email'));
                                } else {
                                    echo form_input(array('readonly' => 'true', 'value' => $email, 'class'=> 'form-control','id' => 'email', 'name' => 'email'));
                                }
                            ?>
                            </div>


                            <div class="form-group">
                                <label>Autorisation</label>
                                <?php 
                                    echo form_dropdown('autorisation', array('1' => 'Administrateur','2' => 'Operateur'), $grade, 'class="form-control" disabled'); 
                                 ?>
                            </div>

                    </div>
                    <div class="col-lg-6">


                            <div class="form-group">
                                <?php 
                                    echo form_label('Mot de passe actuel');
                                    echo form_error('oldpass');
                                    echo form_input(array('class'=> 'form-control','id' => 'oldpass', 'name' => 'oldpass', 'type' => 'password'));
                                 ?>
                            </div>

                            <div class="form-group">
                                <?php 
                                    echo form_label('Nouveau mot de passe');
                                    echo form_error('newpass');
                                    echo form_input(array('class'=> 'form-control','id' => 'newpass', 'name' => 'newpass', 'type' => 'password'));
                                 ?>
                            </div>

                            <div class="form-group">
                                <?php 
                                    echo form_label('Confirmer nouveau mot de passe');
                                    echo form_error('confpass');
                                    echo form_input(array('class'=> 'form-control','id' => 'confpass', 'name' => 'confpass', 'type' => 'password'));
                                 ?>
                            </div>

                            <div style="padding:0" class="form-group col-lg-3">
                                <?php 
                                    echo form_label('Valider', '', array('style' => 'visibility:hidden'));
                                    echo form_submit(array('class'=> 'form-control btn btn-default','id' => 'submit', 'value' => 'Valider'));
                                    echo form_close();
                                 ?>
                            </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->