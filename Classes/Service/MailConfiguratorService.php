<?php
namespace JonathanHeilmann\JhMailConfigurator\Service;

use JonathanHeilmann\JhMailConfigurator\Domain\Model\MailConfiguration;
use JonathanHeilmann\JhMailConfigurator\Mail\MailMessage;
use JonathanHeilmann\JhMailConfigurator\Validator\MailValidator;
use TYPO3\CMS\Core\SingletonInterface;
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
 * Mail configurator service for the 'jh_mail_configurator' extension.
 *
 * @author      Jonathan Heilmann <mail@jonathan-heilmann.de>
 * @package     JonathanHeilmann
 * @subpackage  JhMailConfigurator
 */
class MailConfiguratorService implements SingletonInterface
{

    /**
     * @var array
     */
    protected $storedMailConfiguration = [];

    /**
     * @var MailConfiguration
     */
    protected $mailConfiguration = null;

    /**
     * @var int
     */
    private $constructCounter = 0;

    /**
     * MailConfiguratorService constructor.
     *
     * @throws \Exception
     */
    public function __construct()
    {
        if ($this->constructCounter === 1) {
            throw new \Exception(
                'Not able to construct ' . self::class . ' more than once.',
                1551630175
            );
        }
        $this->storedMailConfiguration = $GLOBALS['TYPO3_CONF_VARS']['MAIL'];
        $this->constructCounter++;
    }

    /**
     * @param MailConfiguration $mailConfiguration
     */
    public function setMailConfiguration(MailConfiguration $mailConfiguration)
    {
        $this->mailConfiguration = $mailConfiguration;
        try {
            $testResult = $this->testMailConfiguration();
            if ($testResult === true){
                $GLOBALS['TYPO3_CONF_VARS']['MAIL'] = $this->mailConfiguration->getAsT3ConfVars();
                return;
            }
        } catch (\Exception $e) {
        }

        // Failed to test mail configuration, use stored configuration
        $this->resetMailConfiguration();
    }

    /**
     * @return MailConfiguration
     */
    public function getMailConfiguration()
    {
        return $this->mailConfiguration;
    }

    /**
     *
     */
    public function resetMailConfiguration()
    {
        $this->mailConfiguration = null;
        $GLOBALS['TYPO3_CONF_VARS']['MAIL'] = $this->storedMailConfiguration;
    }

    /**
     * @return array
     */
    public function getStoredMailConfiguration() {
        return $this->storedMailConfiguration;
    }

    /**
     * @return bool
     * @throws \Exception
     */
    public function testMailConfiguration() {
        return MailValidator::isValidSmtpServerConfiguration($this->mailConfiguration);
    }

    /**
     * Test SMTP Connection
     * https://laracasts.com/discuss/channels/general-discussion/check-smtp-connection
     *
     * @return string
     */
    public function testConnection()
    {
        $testMailerResult = 'Unknown Error';
        try {
            if ($this->testMailConfiguration() === true) {
                /** @var MailMessage $mail */
                $mail = GeneralUtility::makeInstance(MailMessage::class);
                $testMailerResult = $mail->testMailer();
            }
        } catch (\Exception $exception) {
            $testMailerResult = $exception->getMessage();
        }

        return $testMailerResult;
    }
}