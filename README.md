[![](https://scdn.rapidapi.com/RapidAPI_banner.png)](https://rapidapi.com/package/TwilioCopilot/functions?utm_source=RapidAPIGitHub_TwilioCopilotFunctions&utm_medium=button&utm_content=RapidAPI_GitHub)

# Twilio Copilot Package
This package allows to send sms and mms messages using the Twilio Copilot platform.

## How to get `accountSid` and `accountToken`:
 0. [Go to the twilio console](https://www.twilio.com/console)
 1. Create or login to your account.
 2. Pay for account or use free trial.
 3. Go to Account->Account Settings and find API Credentials block.
 4. Copy your `accountSid` and `accountToken`.
 
## Custom datatypes:
  |Datatype|Description|Example
  |--------|-----------|----------
  |Datepicker|String which includes date and time|```2016-05-28 00:00:00```
  |Map|String which includes latitude and longitude coma separated|```50.37, 26.56```
  |List|Simple array|```["123", "sample"]```
  |Select|String with predefined values|```sample```
  |Array|Array of objects|```[{"Second name":"123","Age":"12","Photo":"sdf","Draft":"sdfsdf"},{"name":"adi","Second name":"bla","Age":"4","Photo":"asfserwe","Draft":"sdfsdf"}] ```
 
## Webhook credentials
  Please use SDK to test this feature.
  1. Go to [RapidAPI](http://rapidapi.com)
  2. Log in or create an account
  3. Go to [My apps](https://dashboard.rapidapi.com/projects)
  4. Add new project with projectName to get your project Key
 
  | Field      | Type       | Description
  |------------|------------|----------
  | projectName     | credentials| Your RapidAPI project name
  | projectKey | credentials     | Your RapidAPI project key

## /api/twilioCopilot/sendSms
Send text message

| Field            | Type     | Description  |
| -------------    |-------------     | -----|
| `accountSid`         |credentials  | A 34 character string that uniquely identifies this account. |
| `accountToken`         |credentials  | The authorization token for this account. |
| `from` |string  | The phone number or client identifier to use as the caller id. If using a phone number, it must be a Twilio number or a Verified outgoing caller id for your account. |
| `messagingServiceSid` |string  | The 34 character unique id of the Messaging Service you want to associate with this Message. Set this parameter to use the Messaging Service Settings and Copilot Features you have configured. When only this parameter is set, Twilio will use your enabled Copilot Features to select the From phone number for delivery. |
| `to` |string  | The phone number, SIP address or client identifier to call. |
| `body` |string  | The text of the message you want to send, limited to 1600 characters. |
| `accountSid`         |string  | A 34 character string that uniquely identifies this account. |
| `accountToken`         |string  | The authorization token for this account. |
| `from` |string  | The phone number or client identifier to use as the caller id. If using a phone number, it must be a Twilio number or a Verified outgoing caller id for your account. |
| `messagingServiceSid` |string  | The 34 character unique id of the Messaging Service you want to associate with this Message. Set this parameter to use the Messaging Service Settings and Copilot Features you have configured. When only this parameter is set, Twilio will use your enabled Copilot Features to select the From phone number for delivery. |
| `to` |string  | The phone number, SIP address or client identifier to call. |
| `body` |string  | The text of the message you want to send, limited to 1600 characters. |
| `statusCallback`         |string  | Optional: A URL that Twilio will POST to each time your message status changes to one of the following: queued, failed, sent, delivered, or undelivered. |
| `applicationSid`         |string  | Optional: Twilio will POST MessageSid as well as MessageStatus=sent or MessageStatus=failed to the URL in the MessageStatusCallback property of this Application. |
| `maxPrice` |string  | Optional: The total maximum price in US dollars acceptable for the message to be delivered. |
| `provideFeedback` |boolean  | Optional: Set this value to true if you are sending messages that have a trackable user action and you intend to confirm delivery of the message using the Message Feedback API. This parameter is set to false by default. |

#### Request example
```json
{
		"accountSid": "XXXX",
		"accountToken": "XXXX",
	    "messagingServiceSid": "XXXX",
		"to": "+150055444006",
		"body": "text"
}
```

## /api/twilioCopilot/sendMms
Send media message

| Field            | Type     | Description  |
| -------------    |-------------     | -----|
| `accountSid`         |credentials  | A 34 character string that uniquely identifies this account. |
| `accountToken`         |credentials  | The authorization token for this account. |
| `from` |string  | The phone number or client identifier to use as the caller id. If using a phone number, it must be a Twilio number or a Verified outgoing caller id for your account. |
| `messagingServiceSid` |string  | The 34 character unique id of the Messaging Service you want to associate with this Message. Set this parameter to use the Messaging Service Settings and Copilot Features you have configured. When only this parameter is set, Twilio will use your enabled Copilot Features to select the From phone number for delivery. |
| `to` |string  | The phone number, SIP address or client identifier to call. |
| `mediaUrl` |string  | The URL of the media you wish to send out with the message. gif , png and jpeg content is currently supported and will be formatted correctly on the recipient's device. |
| `statusCallback`         |string  | Optional: A URL that Twilio will POST to each time your message status changes to one of the following: queued, failed, sent, delivered, or undelivered. |
| `applicationSid`         |string  | Optional: Twilio will POST MessageSid as well as MessageStatus=sent or MessageStatus=failed to the URL in the MessageStatusCallback property of this Application. |
| `maxPrice` |string  | Optional: The total maximum price in US dollars acceptable for the message to be delivered. |
| `provideFeedback` |boolean  | Optional: Set this value to true if you are sending messages that have a trackable user action and you intend to confirm delivery of the message using the Message Feedback API. This parameter is set to false by default. |

#### Request example
```json
{
		"accountSid": "XXXX",
		"accountToken": "XXXX",
	    "messagingServiceSid": "XXXX",
		"to": "+150055444006",
		"mediaUrl": "http://demo.twilio.com/docs/voice.xml"
}
```

## Errors
| Error            | Description     |
| -------------    |-------------     |
| `Credentials are required to create a Client`     | Provide accountSid and accountToken to establish connection properly. |
| `[HTTP 404] Unable to create record: The requested resource /2010-04-01/Accounts/AC5f37acb25ffaeb498a78/Messages.json was not found"`     | Provide correct accountSid. |
| `[HTTP 401] Unable to create record: Authenticate`     | Provide correct accountToken. |
| `[HTTP 400] Unable to create record: A "messagingServiceSid" number is required.`     | One of  a mandatory field is incorrect. |
| `[HTTP 400] Unable to create record: Method is not valid: TEST`     | One of an additional field is incorrect. |

#### Request example with error
```json
{
	"accountSid": "XXXX",
	"accountToken": "XXXX",
	"messagingServiceSid": "XXXX",
	"to": "+15005260006",
	"method": "test"
}
```
#### Response
```json
{
"callback":"error",
"contextWrites":{
    "to":"[HTTP 400] Unable to create record: Method is not valid: TEST"
    }
}
```
