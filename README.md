## Usage

Add the following to .env:

DIALOGFLOW_API_KEY=<your_dialogflow_api_key>
SCOUT_ELASTIC_HOST=<your_elastic_search_node_ip:port>

Slack Installation:

1. Install slack driver php artisan botman:install-driver slack
2. Download ngrok: https://ngrok.com/ Open CMD Navigate to folder that ngrok.exe is, type "ngrok http 8000" ngrok will give you a new url next to the first "Forwarding" section
3. Create Slack Bot: https://api.slack.com/apps Create New App Button top right of screen Select a name and workspace for bot 
4. Select Interactive Components on sidebar under the Request URL enter the forwarding address that ngrok provided add to the end of the address /botman/tinker Ex: "http://3bfc36f2.ngrok.io/botman/tinker" Save Changes
5. Select Event Subscriptions under Request URL type in the same forwarding address as you did in the previous step but remove the tinker Ex: "http://3bfc36f2.ngrok.io/botman/" Save Changes
6. In the same window as the last step Subscribe to Workspace Events: meessage.im for messages
7. Select Bot Users Choose a name and default username. Save Changes
8. Under OAuth & Permissions record the token under Bot User OAuth Access Token Place this token in .env file as SLACK_TOKEN=<ACCESS_TOKEN>
9. Install App under Setting Install the app, Authorize


<p align="center"><img height="188" width="198" src="https://botman.io/img/botman.png"></p>
<h1 align="center">BotMan Studio</h1>

## About BotMan Studio

While BotMan itself is framework agnostic, BotMan is also available as a bundle with the great [Laravel](https://laravel.com) PHP framework. This bundled version is called BotMan Studio and makes your chatbot development experience even better. By providing testing tools, an out of the box web driver implementation and additional tools like an enhanced CLI with driver installation, class generation and configuration support, it speeds up the development significantly.

## Documentation

You can find the BotMan and BotMan Studio documentation at [http://botman.io](http://botman.io).

## Support the development
**Do you like this project? Support it by donating**

- PayPal: [Donate](https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=m%2epociot%40googlemail%2ecom&lc=CY&item_name=BotMan&no_note=0&currency_code=EUR&bn=PP%2dDonationsBF%3abtn_donateCC_LG%2egif%3aNonHostedGuest)
- Patreon: [Donate](https://www.patreon.com/botman)

## Security Vulnerabilities

If you discover a security vulnerability within BotMan or BotMan Studio, please send an e-mail to Marcel Pociot at m.pociot@gmail.com. All security vulnerabilities will be promptly addressed.

## License

BotMan is free software distributed under the terms of the MIT license.
