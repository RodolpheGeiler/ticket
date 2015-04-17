        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Ajout de compte
                        </h1>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-6">

                        <?php
                            if ($grade == 1) {
                            echo validation_errors();
                            echo form_open('addcompte');
                        ?>

                            <div class="form-group">
                                <?php 
                                    echo form_label('Nom');
                                    echo form_error('dname');
                                    echo form_input(array('class'=> 'form-control','id' => 'dname', 'name' => 'dname'));
                                 ?>
                            </div>

                            <div class="form-group">
                                <?php 
                                    echo form_label('Email');
                                    echo form_error('demail');
                                    echo form_input(array('class'=> 'form-control','id' => 'demail', 'name' => 'demail'));
                                 ?>
                            </div>

                            <div class="form-group">
                                <?php 
                                    echo form_label('Autorisation');
                                    echo form_error('dauto');
                                    echo form_dropdown('autorisation', array('admin' => 'Administrateur','ope' => 'Operateur'), 'Operateur', 'class="form-control"');
                                 ?>
                            </div>

                    </div>
                    <div class="col-lg-6">


                            <div class="form-group">
                                <?php 
                                    echo form_label('Mot de passe');
                                    echo form_error('dpass');
                                    echo form_input(array('class'=> 'form-control','id' => 'dpass', 'name' => 'dpass', 'type' => 'password'));
                                 ?>
                            </div>

                            <div class="form-group">
                                <?php 
                                    echo form_label('Confirmation mot de passe');
                                    echo form_error('dconf');
                                    echo form_input(array('class'=> 'form-control','id' => 'dconf', 'name' => 'dconf', 'type' => 'password'));
                                 ?>
                            </div>

                            <div style="padding:0" class="form-group col-lg-3">
                                <?php 
                                    echo form_label('Valider', '', array('style' => 'visibility:hidden'));
                                    echo form_submit(array('class'=> 'form-control btn btn-default','id' => 'submit', 'value' => 'Valider'));
                                    echo form_close();
                                } else { echo "Vous n'avez pas les droits suffisant pour acceder a cette section.";} ?>
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