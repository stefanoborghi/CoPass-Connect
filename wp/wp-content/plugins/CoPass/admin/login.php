<?php

add_action( 'login_enqueue_scripts', 'copass_login_logo' );


function copass_login_logo() { ?>
    <style type="text/css">
        body.login div#login h1 a {
            background-image: url(<?php echo plugins_url('copass/assets/img/cc_login_logo.png') ?>);
            padding-bottom: 30px;
        }
    </style>
<?php }
