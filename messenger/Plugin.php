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

namespace craft\plugins\messenger;

use Craft;
use craft\app\base\Plugin as BasePlugin;
use craft\plugins\messenger\mail\transportadaptors\SendGridSMTP;
use Yii;

class Plugin extends BasePlugin
{

    public function getMailTransportAdaptors()
    {
        return [
            new SendGridSMTP()
        ];

    }

}