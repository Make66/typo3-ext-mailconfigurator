<?php
namespace JonathanHeilmann\JhMailConfigurator\Domain\Model;

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
 * Implementing domain model for the 'jh_mail_configurator' extension.
 *
 * @author      Jonathan Heilmann <mail@jonathan-heilmann.de>
 * @package     JonathanHeilmann
 * @subpackage  JhMailConfigurator
 */
class ImplementingDomain extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * smtpServer
     *
     * @var string
     */
    protected $smtpServer = '';

    /**
     * smtpEncrypt
     *
     * @var string
     */
    protected $smtpEncrypt = null;

    /**
     * smtpUsername
     *
     * @var string
     */
    protected $smtpUsername = '';

    /**
     * smtpPassword
     *
     * @var string
     */
    protected $smtpPassword = '';

    /**
     * Returns the smtpServer
     *
     * @return string $smtpServer
     */
    public function getSmtpServer()
    {
        return $this->smtpServer;
    }

    /**
     * Sets the smtpServer
     *
     * @param string $smtpServer
     * @return void
     */
    public function setSmtpServer($smtpServer)
    {
        $this->smtpServer = $smtpServer;
    }

    /**
     * Returns the smtpEncrypt
     *
     * @return string $smtpEncrypt
     */
    public function getSmtpEncrypt()
    {
        return $this->smtpEncrypt;
    }

    /**
     * Sets the smtpEncrypt
     *
     * @param string $smtpEncrypt
     * @return void
     */
    public function setSmtpEncrypt($smtpEncrypt)
    {
        $this->smtpEncrypt = $smtpEncrypt;
    }

    /**
     * Returns the smtpUsername
     *
     * @return string $smtpUsername
     */
    public function getSmtpUsername()
    {
        return $this->smtpUsername;
    }

    /**
     * Sets the smtpUsername
     *
     * @param string $smtpUsername
     * @return void
     */
    public function setSmtpUsername($smtpUsername)
    {
        $this->smtpUsername = $smtpUsername;
    }

    /**
     * Returns the smtpPassword
     *
     * @return string $smtpPassword
     */
    public function getSmtpPassword()
    {
        return $this->smtpPassword;
    }

    /**
     * Sets the smtpPassword
     *
     * @param string $smtpPassword
     * @return void
     */
    public function setSmtpPassword($smtpPassword)
    {
        $this->smtpPassword = $smtpPassword;
    }

}