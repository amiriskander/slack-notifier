# Slack Notifier
[![Build Status](https://travis-ci.org/amiriskander/slack-notifier.svg?branch=master)](https://travis-ci.org/amiriskander/slack-notifier) [![Latest Stable Version](https://poser.pugx.org/amiriskander/slack-notifier/version)](https://packagist.org/packages/amiriskander/slack-notifier) [![Total Downloads](https://poser.pugx.org/amiriskander/slack-notifier/downloads)](https://packagist.org/packages/amiriskander/slack-notifier) [![License](https://poser.pugx.org/amiriskander/slack-notifier/license)](https://packagist.org/packages/amiriskander/slack-notifier)

A simple PHP package that can be used to build and send Slack messages

### Requirements

- PHP >= 7.1
- PHP cURL Extension

### Installation
```
composer require amiriskander/slack-notifier
```

### Usage
```
public function TestSendSlackMessage()
{
    $message = new SlackMessage();
    $block   = new SlackMessageBlock('section');
    $block->setText(new SlackMessageBlockText('mrkdwn', 'John Doe submitted a feedback!'));
    $message->addBlock($block);

    $block   = new SlackMessageBlock('divider');
    $message->addBlock($block);

    $block   = new SlackMessageBlock('section');
    $block->setText(new SlackMessageBlockText('mrkdwn', ':new: *You guys are awesome. Keep up the good work!*'));
    $message->addBlock($block);

    $block   = new SlackMessageBlock('section');
    $block->setText(new SlackMessageBlockText('mrkdwn', '*Source* :information_source: Homepage Feedback Form'));
    $message->addBlock($block);

    $block   = new SlackMessageBlock('section');
    $block->setText(new SlackMessageBlockText('mrkdwn', '*In the last 30 days*'));
    $block->addField(new SlackMessageBlockText('mrkdwn', 'Submitted 6 form submissions'));
    $block->addField(new SlackMessageBlockText('mrkdwn', 'Rated 12 products'));
    $accessory = new SlackMessageBlockAccessory('image');
    $accessory->setImageUrl('https://i.ibb.co/19W2sdD/stat.png');
    $accessory->setAltText('Stats');
    $block->setAccessory($accessory);
    $message->addBlock($block);

    $block   = new SlackMessageBlock('divider');
    $message->addBlock($block);

    $block   = new SlackMessageBlock('section');
    $block->setText(new SlackMessageBlockText('mrkdwn', 'More information about this user'));
    $accessory = new SlackMessageBlockAccessory('button');
    $accessory->setUrl('https://yourwebsite/user/123/profile/');
    $accessory->setText(new SlackMessageBlockText('plain_text', ':bust_in_silhouette: View User'));
    $accessory->setValue('view_user_btn');
    $block->setAccessory($accessory);
    $message->addBlock($block);

    $message->send('https://hooks.slack.com/services/....');
}
```

### Screenshot
![Sample message screenshot](screenshot.png "Sample message screenshot")