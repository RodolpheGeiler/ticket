

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Gestion des comptes
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
                <?php if ($grade == "1") { ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nom de comptes</th>
                                        <th>Autorisation</th>
                                        <th>Email</th>
                                        <th>Mot de passe (MD5)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    foreach ($result_display as $key => $value) {
                                         ?>
                                        <tr>
                                            <td><?php echo $value->utilisateurs_id ?></td>
                                            <td><?php echo $value->utilisateurs_nom ?></td>
                                            <td><?php 
                                                echo form_open('modifcompte');
                                                echo form_hidden('uid', ''.$value->utilisateurs_id.'');
                                            if ($value->utilisateurs_id  == $id) {
                                                echo form_dropdown('autorisation', array('1' => 'Administrateur','2' => 'Operateur'), $value->utilisateurs_grade, 'class="form-control" disabled'); 
                                            } else {
                                                echo form_dropdown('autorisation', array('1' => 'Administrateur','2' => 'Operateur'), $value->utilisateurs_grade, 'class="form-control"'); 
                                            }?></td>
                                            <td><?php 
                                                echo form_open('modifcompte');
                                                echo form_hidden('uid', ''.$value->utilisateurs_id.'');
                                            if ($value->utilisateurs_id  == $id) {
                                                echo form_input(array('value' => $value->utilisateurs_mail, 'class'=> 'form-control','id' => 'email', 'name' => 'email', 'readonly'=>'readonly'));
                                            } else {
                                                echo form_input(array('value' => $value->utilisateurs_mail, 'class'=> 'form-control','id' => 'email', 'name' => 'email'));
                                            }?></td>
                                            <td><?php echo $value->utilisateurs_motdepasse ?></td>
                                            <td><?php 
                                            if ($grade == "1") {
                                                echo form_submit(array('class'=> 'form-control btn btn-default','id' => 'submit', 'value' => 'Valider'));
                                                echo form_close(); 
                                            }?></td>
                                            <td><?php
                                            echo form_open('delcompte');
                                            echo form_hidden('uid', ''.$value->utilisateurs_id.'');
                                            if ($value->utilisateurs_grade == "2") {
                                                echo form_submit(array('class'=> 'form-control btn btn-danger','id' => 'submit', 'value' => 'DEL'));
                                            }
                                            echo form_close();
                                            ?></td>
                                        </tr>
                                <?php
                                    }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            <?php } else { echo "Vous n'avez pas les droits suffisant pour acceder a cette section.";} ?>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
