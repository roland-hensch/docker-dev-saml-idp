<?php
/**
 * SAML 2.0 remote SP metadata for SimpleSAMLphp.
 *
 * See: https://simplesamlphp.org/docs/stable/simplesamlphp-reference-sp-remote
 */
/*
$metadata[getenv('SIMPLESAMLPHP_SP_ENTITY_ID')] = array(
    'AssertionConsumerService' => getenv('SIMPLESAMLPHP_SP_ASSERTION_CONSUMER_SERVICE'),
    'SingleLogoutService' => getenv('SIMPLESAMLPHP_SP_SINGLE_LOGOUT_SERVICE'),
    'certificate' => 'server.pem',
);
*/

$metadata[getenv('SIMPLESAMLPHP_SP_ENTITY_ID')] = [
    'entityid' => getenv('SIMPLESAMLPHP_SP_ENTITY_ID'),
    'contacts' => [],
    'metadata-set' => 'saml20-sp-remote',
    'certificate' => 'sp-client.cer',
    'privatekey' => 'server.pem',
    'signature.algorithm' => 'http://www.w3.org/2001/04/xmldsig-more#rsa-sha256',
    
    'redirect.sign' => false,
    'redirect.validate' => false,
    
    'assertion.encryption' => false,

    'validate.authnrequest' => false,
    'saml20.sign.assertion' => true,
    'saml20.sign.response' => true,

    'AssertionConsumerService' => [
        [
            'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Artifact',
            'Location' => getenv('SIMPLESAMLPHP_SP_ASSERTION_CONSUMER_SERVICE'),
            'index' => 0,
            'isDefault' => false,
        ],
        [
            'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
            'Location' => getenv('SIMPLESAMLPHP_SP_ASSERTION_CONSUMER_SERVICE'),
            'index' => 1,
            'isDefault' => true,
        ],
        [
            'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:PAOS',
            'Location' => getenv('SIMPLESAMLPHP_SP_ASSERTION_CONSUMER_SERVICE'),
            'index' => 2,
            'isDefault' => false,
        ],
    ],
    'SingleLogoutService' => [
        [
            'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
            'Location' => getenv('SIMPLESAMLPHP_SP_SINGLE_LOGOUT_SERVICE'),
            'ResponseLocation' => getenv('SIMPLESAMLPHP_SP_SINGLE_LOGOUT_SERVICE'),
        ],
        [
            'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
            'Location' => getenv('SIMPLESAMLPHP_SP_SINGLE_LOGOUT_SERVICE'),
            'ResponseLocation' => getenv('SIMPLESAMLPHP_SP_SINGLE_LOGOUT_SERVICE'),
        ],
    ],
    'NameIDFormat' => 'urn:oasis:names:tc:SAML:1.1:nameid-format:persistent',
    /*'keys' => [
        [
            'encryption' => false,
            'signing' => true,
            'type' => 'X509Certificate',
            'X509Certificate' => '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',
        ],
    ],*/
    
];