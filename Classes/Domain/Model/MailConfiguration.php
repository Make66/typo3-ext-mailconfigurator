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
 * Mail configuration domain model for the 'jh_mail_configurator' extension.
 *
 * @author      Jonathan Heilmann <mail@jonathan-heilmann.de>
 * @package     JonathanHeilmann
 * @subpackage  JhMailConfigurator
 */
class MailConfiguration
{
    /**
     * @var string
     */
    protected $transport = '';

    /**
     * @var string
     */
    protected $transportSmtpServer = '';

    /**
     * @var string|null
     */
    protected $transportSmtpEncrypt = null;

    /**
     * @var string
     */
    protected $transportSmtpUsername = '';

    /**
     * @var string
     */
    protected $transportSmtpPassword = '';

    /**
     * MailConfiguration constructor.
     *
     * @param string $transport
     * @param string $transportSmtpServer
     * @param string $transportSmtpEncrypt
     * @param string $transportSmtpUsername
     * @param string $transportSmtpPassword
     */
    public function __construct(
        $transport = 'smtp',
        $transportSmtpServer = '',
        $transportSmtpEncrypt = null,
        $transportSmtpUsername = '',
        $transportSmtpPassword = ''
    ) {
        $this->transport = $transport;
        $this->transportSmtpServer = $transportSmtpServer;
        $this->transportSmtpEncrypt = $transportSmtpEncrypt;
        $this->transportSmtpUsername = $transportSmtpUsername;
        $this->transportSmtpPassword = $transportSmtpPassword;
    }

    /**
     * @return false|string
     */
    public function __toString()
    {
        return json_encode($this->getAsT3ConfVars());
    }

    /**
     * @return string
     */
    public function getTransport()
    {
        return $this->transport;
    }

    /**
     * @return string
     */
    public function getTransportSmtpServer()
    {
        return $this->transportSmtpServer;
    }

    /**
     * @return string
     */
    public function getTransportSmtpEncrypt()
    {
        return $this->transportSmtpEncrypt;
    }

    /**
     * @return string
     */
    public function getTransportSmtpUsername()
    {
        return $this->transportSmtpUsername;
    }

    /**
     * @return string
     */
    public function getTransportSmtpPassword()
    {
        return $this->transportSmtpPassword;
    }

    /**
     * @return array
     */
    public function getAsT3ConfVars()
    {
        return [
            'transport' => $this->getTransport(),
            'transport_smtp_server' => $this->getTransportSmtpServer(),
            'transport_smtp_encrypt' => $this->getTransportSmtpEncrypt(),
            'transport_smtp_username' => $this->getTransportSmtpUsername(),
            'transport_smtp_password' => $this->getTransportSmtpPassword(),
            'defaultMailFromAddress' => '',
            'defaultMailFromName' => '',
            'defaultMailReplyToAddress' => '',
            'defaultMailReplyToName' => '',
        ];
    }
}