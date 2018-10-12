<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $title; ?></title>
        <meta name="description" content="<?php echo $description; ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Extra metadata -->
        <?php echo $metadata; ?>
        <!-- / -->

        
    </head>
    <body>
        <?php echo $body; ?>
        <!-- / -->
        <!-- favicon.ico and apple-touch-icon.png -->

        <!-- Bootstrap core CSS -->
          <link rel="stylesheet" href="<?php echo assets_url('londinium/css/select.css'); ?>">
        <link rel="stylesheet" href="<?php echo assets_url('londinium/css/datatables.css'); ?>">
        <link rel="stylesheet" href="<?php echo assets_url('css/bootstrap-yeti.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo assets_url('css/dempster.css'); ?>">
      
        <?php echo $css; ?>
        <!-- / -->

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
            <script src="<?php echo assets_url('js/html5shiv.min.js'); ?>"></script>
            <script src="<?php echo assets_url('js/respond.min.js'); ?>"></script>
        <![endif]-->
        <script src="<?php echo assets_url('js/jquery.min.js'); ?>"></script>
        <script src="<?php echo assets_url('js/bootstrap.min.js'); ?>"></script>
        <script src="<?php echo assets_url('js/plugins/forms/select2.min.js'); ?>"></script>
        <script src="<?php echo assets_url('js/main.js'); ?>"></script>
        <!-- Extra javascript -->
        <?php echo $js; ?>
        <!-- / -->
        <script type="text/javascript">
                    $(document).ready(function() {  
                    $('button.print').click(function() {
                        window.print();
                            return false;
                        });
                    });
            </script>
            <style type="text/css">
            @media print
                {    
                    .no-print, .no-print *
                    {
                        display: none !important;
                    }
                }
            </style>
        
    </body>
</html>