<!-- Menu gauche -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                   	<li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#ticket"><i class="fa fa-fw fa-list"></i> Tickets<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="ticket" class="collapse">
                            <li>
                                <?php echo anchor(site_url("home/newticket"),"Nouveau ticket"); ?>
                            </li>
                            <li>
                                <?php echo anchor(site_url("home"),"Consulter tickets"); ?>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#admin"><i class="fa fa-fw fa-cog"></i> Admin<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="admin" class="collapse">
                            <li>
                                <?php echo anchor(site_url("home/modifiercompte"),"Gestion des comptes"); ?>
                            </li>
                            <li>
                                <?php echo anchor(site_url("home/ajoutcompte"),"Creer un compte"); ?>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <?php echo anchor(site_url("home/stats"),"<i class=\"fa fa-fw fa-pie-chart\"></i> Statistiques"); ?>
                    </li>
                </ul>
            </div>
            <!-- /.Menu gauche -->