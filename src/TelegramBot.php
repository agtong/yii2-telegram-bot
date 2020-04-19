<?php

namespace agtong\yii2\components;

use yii\base\Component;
use yii\base\InvalidConfigException;
use yii\httpclient\Client;

/**
 * Telegram Bot.
 *
 * Here's an example of how you can make use of this component.
 *
 * $bot = new TelegramBot(['token' => '123456:abcde');
 * $bot->sendMessage('123456', 'Hello World!');
 *
 * @author agtong <agtongatgithub@gmail.com>
 */
class TelegramBot extends Component
{
    const API_BASE_URL = 'https://api.telegram.org/bot';

    public $token;

    private $_client;

    /**
     * Check required property
     */
    public function init()
    {
        parent::init();
        if ($this->token === null) {
            throw new InvalidConfigException(self::className() . '::$token property must be set');
        }
    }

    /**
     * @return Client
     */
    public function getClient()
    {
        if ($this->_client) {
            return $this->_client;
        }

        return new Client(['baseUrl' => self::API_BASE_URL . $this->token]);
    }

    /**
     * Send message to the telegram chat or channel
     * @param int|string $chat_id
     * @param string $text
     * @param string $parse_mode
     * @param bool $disable_web_page_preview
     * @param bool $disable_notification
     * @param int $reply_to_message_id
     * @param null $reply_markup
     * @link https://core.telegram.org/bots/api#sendmessage
     * return array
     */
    public function sendMessage($chat_id, $text, $parse_mode = null, $disable_web_page_preview = null, $disable_notification = null, $reply_to_message_id = null, $reply_markup = null)
    {
        $response = $this->getClient()
            ->post('sendMessage', compact('chat_id', 'text', 'parse_mode', 'disable_web_page_preview', 'disable_notification', 'reply_to_message_id', 'reply_markup'))
            ->send();
        return $response->data;
    }
}
