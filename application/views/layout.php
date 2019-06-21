
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Stem Jawa NGapak</title>

    <link href="<?= site_url('assets/template/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= site_url('assets/template/font-awesome/css/font-awesome.css') ?>" rel="stylesheet">
    <link href="<?= site_url('assets/template/css/animate.css') ?>" rel="stylesheet">
    <link href="<?= site_url('assets/template/css/style.css') ?>" rel="stylesheet">



    <link href="<?= site_url('assets/template/css/plugins/dataTables/datatables.min.css') ?>" rel="stylesheet">

    <script>
        const SITE_URL = "<?=site_url() ?>";
    </script>

</head>

<body class="top-navigation">

    <div id="wrapper">
        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom white-bg">
                <nav class="navbar navbar-expand-lg navbar-static-top" role="navigation">

                    <a href="<?= site_url('/') ?>" class="navbar-brand">Inspinia</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-reorder"></i>
                    </button>

                    <div class="navbar-collapse collapse" id="navbar">
                        <ul class="nav navbar-nav mr-auto">
                            <li class="">
                                <a aria-expanded="false" role="button" href="<?= site_url('/') ?>"> Kata Dasar</a>
                            </li>
                            <li class="">
                                <a aria-expanded="false" role="button" href="<?= site_url('/welcome/data_uji') ?>"> Data Uji</a>
                            </li>
                            
                            
                            
                            <!-- <li class="dropdown">
                                <a aria-expanded="false" role="button" href="<?= site_url('assets/template/#') ?>" class="dropdown-toggle" data-toggle="dropdown"> Menu item</a>
                                <ul role="menu" class="dropdown-menu">
                                    <li><a href="<?= site_url('assets/template/') ?>">Menu item</a></li>
                                    <li><a href="<?= site_url('assets/template/') ?>">Menu item</a></li>
                                    <li><a href="<?= site_url('assets/template/') ?>">Menu item</a></li>
                                    <li><a href="<?= site_url('assets/template/') ?>">Menu item</a></li>
                                </ul>
                            </li> -->

                        </ul>
                        <ul class="nav navbar-top-links navbar-right">
                            <li>
                                <a href="<?= site_url('assets/template/login.html') ?>">
                                    <i class="fa fa-sign-out"></i> Log out
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="wrapper wrapper-content">
                <?php isset($content) ? $this->load->view($content) : '' ?>
            </div>
            <div class="footer">
                <div class="float-right">
                    10GB of <strong>250GB</strong> Free.
                </div>
                <div>
                    <strong>Copyright</strong> Example Company &copy; 2014-2018
                </div>
            </div>

        </div>
    </div>



    <!-- Mainly scripts -->
    <script src="<?= site_url('assets/template/js/jquery-3.1.1.min.js') ?>"></script>
    <script src="<?= site_url('assets/template/js/popper.min.js') ?>"></script>
    <script src="<?= site_url('assets/template/js/bootstrap.js') ?>"></script>
    <script src="<?= site_url('assets/template/js/plugins/metisMenu/jquery.metisMenu.js') ?>"></script>
    <script src="<?= site_url('assets/template/js/plugins/slimscroll/jquery.slimscroll.min.js') ?>"></script>

    <script src="<?= site_url('assets/template/js/plugins/dataTables/datatables.min.js') ?>"></script>
    <script src="<?= site_url('assets/template/js/plugins/dataTables/dataTables.bootstrap4.min.js') ?>"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?= site_url('assets/template/js/inspinia.js') ?>"></script>
    <script src="<?= site_url('assets/template/js/plugins/pace/pace.min.js') ?>"></script>
    <script src="<?= site_url('assets/js/custom.js') ?>"></script>






</body>

</html>
