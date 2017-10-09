<?php
const appPath = '../agenda-teste/app/';
require_once(appPath."Routes.php");

if(!isset($_SESSION))
    session_start();

$path = isset($_GET['acao']) ? intval($_GET['acao']) : 0;
$route = new Routes();
$route = $route->validateRoute($path, $_REQUEST);

require_once("resources/views/main/header.php");
?>

<body class="no-skin">

    <!-- tittle -->
    <?php require_once("resources/views/main/tittle.php"); ?>

    <div class="main-container" id="main-container">
        <script type="text/javascript">
            try{ace.settings.check('main-container' , 'fixed')}catch(e){}
        </script>

        <!-- sidebar -->
        <?php require_once("resources/views/main/sidebar.php"); ?>

        <!-- main content -->
        <div class="main-content">
            <div class="main-content-inner">
                <?php require_once("resources/views/main/superiorBar.php"); ?>
                <div class="page-content">
                    <div class="row">
                        <div class="col-xs-12">
                            <?php require_once("resources/views/pages/".$route['currentPath']); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php require_once("resources/views/main/footer.php"); ?>