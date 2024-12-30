<?php

/***************************************************************
 * Extension Manager/Repository config file for ext: "jh_mail_configurator"
 *
 * Auto generated by Extension Builder 2019-03-03
 *
 * Manual updates:
 * Only the data in the array - anything else is removed by next write.
 * "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = [
    'title' => 'Mail Configurator',
    'description' => 'Temporarily change mail configuration to use another mailer than configured in install tool.
Includes a validator to validate and test new mail configuration',
    'category' => 'services',
    'author' => 'Jonathan Heilmann',
    'author_email' => 'mail@jonathan-heilmann.de',
    'state' => 'stable',
    'uploadfolder' => 0,
    'createDirs' => '',
    'clearCacheOnLoad' => 0,
    'version' => '1.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '9.5.0-11.5.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];