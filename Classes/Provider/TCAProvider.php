<?php
namespace JonathanHeilmann\JhMailConfigurator\Provider;

/***
 *
 * This file is part of the "jh_mail_configurator" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2019 Jonathan Heilmann <mail@jonathan-heilmann.de>
 *
 ***/

/**
 * TCA provider for the 'jh_mail_configurator' extension.
 *
 * @author      Jonathan Heilmann <mail@jonathan-heilmann.de>
 * @package     JonathanHeilmann
 * @subpackage  JhMailConfigurator
 */
class TCAProvider
{

    public static function columns()
    {
        return [
            'smtp_server' => array(
                'exclude' => 0,
                'label' => 'LLL:EXT:jh_mail_configurator/Resources/Private/Language/locallang_db.xlf:tx_jhmailconfigurator_domain_model_mailconfiguration.smtp_server',
                'config' => array(
                    'type' => 'input',
                    'size' => '60',
                    'eval' => 'trim',
                )
            ),
            'smtp_encrypt' => array(
                'exclude' => 0,
                'label' => 'LLL:EXT:jh_mail_configurator/Resources/Private/Language/locallang_db.xlf:tx_jhmailconfigurator_domain_model_mailconfiguration.smtp_encrypt',
                'config' => array(
                    'type' => 'input',
                    'size' => '30',
                    'eval' => 'trim',
                )
            ),
            'smtp_username' => array(
                'exclude' => 0,
                'label' => 'LLL:EXT:jh_mail_configurator/Resources/Private/Language/locallang_db.xlf:tx_jhmailconfigurator_domain_model_mailconfiguration.smtp_username',
                'config' => array(
                    'type' => 'input',
                    'size' => '60',
                    'eval' => 'trim',
                )
            ),
            'smtp_password' => array(
                'exclude' => 0,
                'label' => 'LLL:EXT:jh_mail_configurator/Resources/Private/Language/locallang_db.xlf:tx_jhmailconfigurator_domain_model_mailconfiguration.smtp_password',
                'config' => array(
                    'type' => 'input',
                    'size' => '60',
                    'eval' => 'password',
                )
            ),
        ];
    }

    public static function interfaceFields()
    {
        return 'smtp_server,smtp_encrypt,smtp_username,smtp_password';
    }

    public static function typesFields()
    {
        return 'smtp_server,smtp_encrypt,smtp_username,smtp_password';
    }
}