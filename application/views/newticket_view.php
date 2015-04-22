

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Dernieres reclamations
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
                            <th>Commande</th>
                            <th>Client</th>
                            <th>Description</th>
                            <th>Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($reclamations_liste as $key => $value) {
                            ?>
                            <tr>
                                <td><?php echo $value->reclamations_id ?></td>
                                <td><?php echo $value->reclamations_titre ?></td>
                                <td><?php echo $value->commandes_id ?></td>
                                <td><?php echo $value->clients_societe ?></td>
                                <td><button type="button" class="form-control btn btn-success" data-toggle="modal" data-target="#Modal<?php echo $value->reclamations_id ?>">Details</button></td>
                                <td><?php echo $value->reclamations_date ?></td>
                            </tr>
                            <div class="modal fade" id="Modal<?php echo $value->reclamations_id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h3 class="modal-title" id="myModalLabel">Description</h3>
                                        </div>
                                        <div class="modal-body">
                                            <h4>Description du client:</h4>
                                            <p><?php echo $value->reclamations_description ?></p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
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
                            Nouveau ticket
                        </h1>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-6">

                        <?php
                            echo validation_errors();
                            echo form_open('addticket');
                        ?>

                            <div class="form-group">
                                <?php
                                $reclamationss = array();
                                foreach ($reclamations_infos as $value) {
                                   $reclamationss[$value->reclamations_id] = ''.$value->reclamations_titre.' - ID: '.$value->reclamations_id.'';
                                }
                                    echo form_label('Titre de la réclamation de base');
                                    echo form_error('Title');
                                    echo form_dropdown('title', $reclamationss, '', 'class="form-control"');
                                 ?>
                            </div>

                            <div class="form-group">
                                <?php 
                                    echo form_label('Statut');
                                    echo form_error('statut');
                                    echo form_dropdown('statut', array('1' => 'Non traité','2' => 'Attribué','3' => 'Résolu','4' => 'Fermé'), 'nontraite', 'class="form-control"');
                                 ?>
                            </div>

                            <div class="form-group">
                                <?php 
                                    echo form_label('Description');
                                    echo form_error('description');
                                    echo form_textarea(array('class'=> 'form-control','id' => 'description', 'name' => 'description'));
                                 ?>
                            </div>

                    </div>
                    <div class="col-lg-6">


                            <div class="form-group">
                                <?php 
                                    echo form_label('Priorité');
                                    echo form_error('priorite');
                                    echo form_dropdown('priorite', array('1' => '1','2' => '2','3' => '3','4' => '4'), '1', 'class="form-control"');
                                 ?>
                            </div>

                            <div class="form-group">
                                <?php
                                $techniciens = array();
                                foreach ($result_display as $value) {
                                   $techniciens[$value->utilisateurs_id] = $value->utilisateurs_nom;
                                }
                                    echo form_label('Technicien');
                                    echo form_error('technicien');
                                    if ($grade == 1) {
                                        echo form_dropdown('technicien', $techniciens, '', 'class="form-control"');
                                    } else {
                                    echo form_dropdown('technicien', $techniciens, $id, 'class="form-control" disabled');
                                    }
                                 ?>
                            </div>

                            <div class="form-group">
                                <?php 
                                    echo form_label('Type du probléme');
                                    echo form_error('type');
                                    echo form_dropdown('type', array('autres' => 'Autres','transporteur' => 'Transporteur','produits' => 'Produits',), 'autres', 'class="form-control"');
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