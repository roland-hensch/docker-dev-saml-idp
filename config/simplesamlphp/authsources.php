<?php

$config = array(

    'admin' => array(
        'core:AdminPassword',
    ),

        'example-userpass' => array(
        'exampleauth:UserPass',
        'john:johnpass' => array(
            'userGUID' => "{662b39f1-ca8b-4296-abf8-7ab47c723703}", 
            'surname' => "Doe",
            'givenname' => "John",
            'preferredLanguage' => "FR-CH",
            'emailaddress' => "john.doe@company.com",
            'lastModificationDate' => "20210831063211.0Z",
            'cmaScn' => "0815",
            'role' => array('Group-1')
        ),

        'jane:janepass' => array(
            'userGUID' => "{ad8b577b-f35b-41ca-bdb2-e750f1ec9a03}", 
            'surname' => "Doe",
            'givenname' => "Jane",
            'preferredLanguage' => "DE-CH",
            'emailaddress' => "jane.doe@company.com",
            'lastModificationDate' => "20210831063211.0Z",
            'cmaScn' => "0815",
            'role' => array('Group-2'),
        ),
    ),
);