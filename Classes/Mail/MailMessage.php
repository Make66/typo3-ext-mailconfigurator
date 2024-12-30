<?php
namespace JonathanHeilmann\JhMailConfigurator\Mail;

use TYPO3\CMS\Core\Mail\Mailer;
use TYPO3\CMS\Core\Utility\GeneralUtility;

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
 * Mail message for the 'jh_mail_configurator' extension.
 *
 * @author      Jonathan Heilmann <mail@jonathan-heilmann.de>
 * @package     JonathanHeilmann
 * @subpackage  JhMailConfigurator
 */
class MailMessage extends \TYPO3\CMS\Core\Mail\MailMessage
{

    /**
     * @return bool|string
     */
    public function testMailer()
    {
        $this->mailer = GeneralUtility::makeInstance(Mailer::class);
        try {
            $transport = $this->mailer->getTransport();
            $transport->start();
            $transport->stop();
            return true;
        } catch (\Swift_TransportException $e) {
            return $e->getMessage();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}