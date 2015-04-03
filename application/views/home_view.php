

		<div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Tickets en cours
                        </h1>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Titre</th>
                                        <th>Statut</th>
                                        <th>N°</th>
                                        <th>Priorite</th>
                                        <th>Demandeur</th>
                                        <th>Technicien</th>
                                        <th>Type</th>
                                        <th>Informations</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    foreach ($result_display as $key => $value) {
                                         ?>
                                        <tr>
                                            <td><?php echo $value->tickets_id ?></td>
                                            <td><?php echo $value->tickets_titre ?></td>
                                            <td><?php 
                                            if ($grade == "1") {
                                                echo form_open('modifticket');
                                                echo form_hidden('tid', ''.$value->tickets_id.'');
                                                echo form_dropdown('statut', array('1' => 'Non traité','2' => 'Attribué','3' => 'Résolu','4' => 'Fermé'), $value->tickets_status, 'class="form-control"'); 
                                             } else {
                                                echo form_dropdown('statut', array('1' => 'Non traité','2' => 'Attribué','3' => 'Résolu','4' => 'Fermé'), $value->tickets_status, 'class="form-control" disabled'); 
                                            }?></td>
                                            <td><?php echo $value->commandes_id ?></td>
                                            <td><?php 
                                            if ($grade == "1") {
                                                echo form_dropdown('priorite', array('1' => '1','2' => '2','3' => '3','4' => '4'), $value->tickets_priorite, 'class="form-control"');
                                            } else {
                                                echo $value->tickets_priorite;
                                            }?></td>
                                            <td><?php echo $value->clients_societe ?></td>
                                            <td><?php echo $value->users_nom ?></td>
                                            <td><?php echo form_dropdown('tickets_type', array('autres' => 'Autres','transporteur' => 'Transporteur','produits' => 'Produits'), $value->tickets_type, 'class="form-control"');?></td>
                                            <td><button type="button" class="form-control btn btn-success" data-toggle="modal" data-target="#Modal<?php echo $value->tickets_id ?>">Details</button></td>
                                            <td><?php 
                                            if ($grade == "1") {
                                                echo form_submit(array('class'=> 'form-control btn btn-default','id' => 'submit', 'value' => 'Valider'));
                                                echo form_close(); 
                                            }?></td>
                                        </tr>
                                        <div class="modal fade" id="Modal<?php echo $value->tickets_id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                          <div class="modal-dialog">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h3 class="modal-title" id="myModalLabel"><?php echo $value->tickets_titre ?></h3>
                                              </div>
                                              <div class="modal-body">
                                                <h4>Transporteur:</h4>
                                                <p><?php echo ''.$value->transporteurs_societe.' par '.$value->transporteurs_livreur.'' ?></p>
                                                <h4>Dates:</h4>
                                                <p><?php echo 'Creation: '.$value->tickets_date_ajout.' - Derniere modification: '.$value->tickets_date_modification.'' ?></p>
                                                <h4>Description par le client:</h4>
                                                <p><?php echo $value->reclamation_description ?></p>
                                                <h4>Commentaire du technicien:</h4>
                                                <p>
                                                    <?php 
                                                    echo form_open('modifdescription');
                                                    echo form_hidden('tid', ''.$value->tickets_id.'');
                                                    echo form_textarea(array('value' => ''.$value->tickets_description.'', 'class'=> 'form-control','id' => 'description', 'name' => 'description'));
                                                    ?>
                                                </p>
                                              </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                                                <?php
                                                    echo form_submit(array('class'=> 'btn btn-primary','id' => 'submit', 'value' => 'Sauvegarder les changements')); 
                                                    echo form_close();
                                                ?>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                <?php
                                    }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->


        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Tickets terminé
                        </h1>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Titre</th>
                                        <th>Statut</th>
                                        <th>N°</th>
                                        <th>Priorite</th>
                                        <th>Demandeur</th>
                                        <th>Technicien</th>
                                        <th>Informations</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    foreach ($closed as $key => $value) {
                                         ?>
                                        <tr>
                                            <td><?php echo $value->tickets_id ?></td>
                                            <td><?php echo $value->tickets_titre ?></td>
                                            <td><?php 
                                            if ($grade == "1") {
                                                echo form_open('modifticket');
                                                echo form_hidden('tid', ''.$value->tickets_id.'');
                                                echo form_dropdown('statut', array('1' => 'Non traité','2' => 'Attribué','3' => 'Résolu','4' => 'Fermé'), $value->tickets_status, 'class="form-control"'); 
                                             } else {
                                                echo form_dropdown('statut', array('1' => 'Non traité','2' => 'Attribué','3' => 'Résolu','4' => 'Fermé'), $value->tickets_status, 'class="form-control" disabled'); 
                                            }?></td>
                                            <td><?php echo $value->commandes_id ?></td>
                                            <td><?php echo $value->tickets_priorite ?></td>
                                            <td><?php echo $value->clients_societe ?></td>
                                            <td><?php echo $value->users_nom ?></td>
                                            <td><button type="button" class="form-control btn btn-danger" disabled>Details</button></td>
                                            <td><?php 
                                            if ($grade == "1") {
                                                echo form_submit(array('class'=> 'form-control btn btn-default','id' => 'submit', 'value' => 'Valider'));
                                                echo form_close(); 
                                            }?></td>
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

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

