<?php

return array(


    'pdf' => array(
        'enabled' => true,
        'binary'  => 'vendor/h4cc/wkhtmltopdf-amd64/bin/wkhtmltopdf',
        'timeout' => false,
        'options' => array(),
        'env'     => array(),
    ),
    'image' => array(
        'enabled' => true,
        'binary'  => 'vendor/h4cc/wkhtmltopdf-amd64/bin/wkhtmltoimage',
        'timeout' => false,
        'options' => array(),
        'env'     => array(),
    ),


);
