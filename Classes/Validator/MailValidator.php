<?php
namespace JonathanHeilmann\JhMailConfigurator\Validator;

use JonathanHeilmann\JhMailConfigurator\Domain\Model\MailConfiguration;

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
 * Mail validator for the 'jh_mail_configurator' extension.
 *
 * @author      Jonathan Heilmann <mail@jonathan-heilmann.de>
 * @package     JonathanHeilmann
 * @subpackage  JhMailConfigurator
 */
class MailValidator
{

    /**
     * Checks if a smtp server configuration is valid
     * - server, username, password are set => valid
     * - server, username, password are empty => valid
     * - server starts with `localhost` and username and password are empty => INvalid
     *
     * @param MailConfiguration $mailConfiguration
     * @return bool
     * @throws \Exception
     */
    public static function isValidSmtpServerConfiguration(MailConfiguration $mailConfiguration)
    {
        if ($mailConfiguration->getTransportSmtpServer() !== ''
            && $mailConfiguration->getTransportSmtpUsername() !== ''
            && $mailConfiguration->getTransportSmtpPassword() !== ''
        ) {
            // All fields are set
            return true;
        } else if (strpos($mailConfiguration->getTransportSmtpServer(), 'localhost') === 0
            && $mailConfiguration->getTransportSmtpUsername() === ''
            && $mailConfiguration->getTransportSmtpPassword() === '') {
            // Server is localhost and username and password are empty
            return true;
        } else if ($mailConfiguration->getTransportSmtpServer() === ''
            && $mailConfiguration->getTransportSmtpUsername() === ''
            && $mailConfiguration->getTransportSmtpPassword() === '') {
            // All fields are empty
            // This option is invalid but should be handled in calling function
            return false;
        } else {
            // Configuration error!
            throw new \Exception(
                'SMTP Konfiguration ist nicht vollständig',
                1531939772
            );
        }
    }
}