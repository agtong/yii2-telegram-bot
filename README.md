# Yii2 Telegram Bot

Yii2 [Telegram](https://telegram.org) bot.

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
composer require agtong/yii2-telegram-bot
```

or add

```
"agtong/yii2-telegram-bot": "*"
```

to the require section of your `composer.json` file.

## Usage

Use the below code to send a message.

```
$bot = new TelegramBot(['token' => '123456:abcde');
$bot->sendMessage('123456', 'Hello World!');
```

The `sendMessage` function and it's optional paramters are shown below.

```
sendMessage($chat_id, $text, $parse_mode = null, $disable_web_page_preview = null, $disable_notification = null, $reply_to_message_id = null, $reply_markup = null)
```

Read more about the parameters [here](https://core.telegram.org/bots/api#sendmessage).
