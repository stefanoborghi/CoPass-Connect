<?php

add_action( 'login_enqueue_scripts', 'copass_login_logo' );


function copass_login_logo() { ?>
    <style type="text/css">
        body.login div#login h1 a {
            background-image: url(<?php echo plugins_url( 'CoPass/assets/img/cc_login_logo.png', __DIR__ ) ?>);
            padding-bottom: 90px;
			background-size: 100%;
        }
    </style>
<?php }
