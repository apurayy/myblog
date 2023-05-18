<?php include_once("includes/head.php") ?>

    <body class="sb-nav-fixed">
    <?php include_once("includes/topnav.php") ?>
        <div id="layoutSidenav">
            <?php include_once("includes/sidenav.php") ?>

            <div id="layoutSidenav_content">
                <main>
                    <!--main conten==================-->
                    <div class="container-fluid">
                        <?php
                            if(isset($view)){
                                if($view == "dashboard"){
                                    include("view/dash_view.php");
                                }
                            }
                        ?>
                    </div>

                </main>
                <?php include_once("includes/footer.php") ?>
            </div>
        </div>
        <?php include_once("includes/script.php") ?>
    </body>
</html>