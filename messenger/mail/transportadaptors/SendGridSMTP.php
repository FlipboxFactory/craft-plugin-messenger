<?php
/**
 * Messenger Plugin for Craft CMS
 *
 * @package   Organization
 * @author    Flipbox Factory
 * @copyright Copyright (c) 2015, Flipbox Digital
 * @link      https://flipboxfactory.com/craft/messenger/
 * @license   https://flipboxfactory.com/craft/messenger/license
 */

namespace craft\plugins\messenger\mail\transportadaptors;

use Craft;
use craft\app\mail\transportadaptors\BaseTransportAdaptor;

class SendGridSMTP extends BaseTransportAdaptor
{

    /**
     * @inheritdoc
     */
    public static function displayName()
    {
        return 'SendGrid (SMTP)';
    }

    /**
     * @var string The username that should be used
     */
    public $username;

    /**
     * @var string The password that should be used
     */
    public $password;

    /**
     * @var string The timeout duration (in seconds)
     */
    public $timeout = 10;

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'username' => Craft::t('app', 'Username'),
            'password' => Craft::t('app', 'Password'),
            'timeout' => Craft::t('app', 'Timeout'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password', 'timeout'], 'required'],
            [['timeout'], 'number', 'integerOnly' => true],
        ];
    }

    /**
     * @inheritdoc
     */
    public function getSettingsHtml()
    {
        return Craft::$app->getView()->renderTemplate('messenger/_components/mailertransportadaptors/SendGrid/settings', [
            'adaptor' => $this
        ]);
    }

    /**
     * @inheritdoc
     */
    public function getTransportConfig()
    {
        return [
            'class' => 'Swift_SmtpTransport',
            'host' => 'smtp.messenger.net',
            'port' => 587,
            'username' => $this->username,
            'password' => $this->password,
            'timeout' => $this->timeout,
        ];
    }
}
