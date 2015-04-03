        <div id="page-wrapper">
        <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
        <script src="http://cdn.oesmith.co.uk/morris-0.4.1.min.js"></script>

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Statistiques
                        </h1>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                <div class="col-lg-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-long-arrow-right"></i> Nombre de reclamations par mois</h3>
                            </div>
                            <div class="panel-body">
                                <div id="reclamation-line"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-long-arrow-right"></i> Type de reclamation</h3>
                            </div>
                            <div class="panel-body">
                                <div id="type-donut"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                <div class="col-lg-12">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-long-arrow-right"></i> Top des produits posant des soucis</h3>
                            </div>
                            <div class="panel-body">
                                <div id="top-bar"></div>
                            </div>
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
<script type="text/javascript">

Morris.Donut({
  element: 'type-donut',
  data: [
    {label: "Probleme produit", value: <?php echo $reclamation_type['produits']; ?>},
    {label: "Probleme transporteur", value: <?php echo $reclamation_type['transporteur']; ?>},
    {label: "Autres problemes", value: <?php echo $reclamation_type['autres']; ?>}
  ]
});

Morris.Line({
  element: 'reclamation-line',
  data: [
    { y: '2015-05', a: 0},
    { y: '2015-06', a: 20},
    { y: '2015-07', a: 20},
    { y: '2015-08', a: 0},
    { y: '2015-09', a: 70},
    { y: '2015-10', a: 70},
    { y: '2015-11', a: 0},
    { y: '2015-12', a: 20},
    { y: '2015-13', a: 20},
    { y: '2015-14', a: 0}
  ],
  xkey: 'y',
  ykeys: ['a'],
  labels: ['Tickets']
});

Morris.Bar({
  element: 'top-bar',
  data: [
    { y: 'Orties', a: 75},
    { y: 'Choux-fleur', a: 45},
    { y: 'Tulipe', a: 32},
    { y: 'Paquerette', a: 27},
    { y: 'Lilas', a: 20},
    { y: 'Petunia', a: 17},
    { y: 'Muget', a: 13},
    { y: 'Liere', a: 10},
    { y: 'Roses', a: 7},
    { y: 'Salade', a: 3}
  ],
  xkey: 'y',
  ykeys: ['a'],
  labels: ['Nombre']
});

</script>
