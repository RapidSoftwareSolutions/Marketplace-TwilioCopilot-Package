# Twilio Copilot Package
This package allows to send sms and mms messages using the Twilio Copilot platform.

## How to get `accountSid` and `accountToken`:
 0. [Go to the twilio console](https://www.twilio.com/console)
 1. Create or login to your account.
 2. Pay for account or use free trial.
 3. Go to Account->Account Settings and find API Credentials block.
 4. Copy your `accountSid` and `accountToken`.

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
#### Response example
```json
{
	"callback": "success",
	"contextWrites": {
		"to": {
			"sid": "SM9d72da46545d448cb448d7e2ab009136",
			"body": "Sent from your Twilio trial account - http:\/\/demo.twilio.com\/docs\/voice.xml",
			"dateCreated": {
				"date": "2016-09-15 20:46:23.000000",
				"timezone_type": 1,
				"timezone": "+00:00"
			},
			"dateUpdated": {
				"date": "2016-09-15 20:46:23.000000",
				"timezone_type": 1,
				"timezone": "+00:00"
			},
			"accountSid": "AC5f37acb24007a320eefb5ffaeb498a78",
			"to": "+15008850006",
			"from": "XXXX",
			"status": "queued",
			"price": null,
			"direction": "outbound-api",
			"apiVersion": "2010-04-01",
			"uri": "\/2010-04-01\/Accounts\/AC5f37acb24007a320eefb5ffaeb498a78\/Messages\/SM9d72da46545d448cb448d7e2ab009136.json",
			"subresourceUris": {
				"media": "\/2010-04-01\/Accounts\/AC5f37acb24007a320eefb5ffaeb498a78\/Messages\/SM9d72da46545d448cb448d7e2ab009136\/Media.json"
			},
			"priceUnit": "USD",
			"dateSent": {
				"date": "2016-09-15 20:46:23.000000",
				"timezone_type": 3,
				"timezone": "UTC"
			},
			"errorCode": null,
			"errorMessage": null,
			"numMedia": "0",
			"numSegments": "1"
		}
	}
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
#### Response example
```json
{
	"callback": "success",
	"contextWrites": {
		"to": {
			"sid": "MM2e5f462d1a034a72809294fac6493cf1",
			"dateCreated": {
				"date": "2016-09-15 20:43:00.000000",
				"timezone_type": 3,
				"timezone": "UTC"
			},
			"dateUpdated": {
				"date": "2016-09-15 20:43:00.000000",
				"timezone_type": 3,
				"timezone": "UTC"
			},
			"accountSid": "AC5f37acb24007a320eefb5ffaeb498a78",
			"to": "+15005650006",
			"from": "XXXX",
			"status": "queued",
			"price": null,
			"direction": "outbound-api",
			"apiVersion": "2010-04-01",
			"uri": "\/2010-04-01\/Accounts\/AC5f37acb24007a320eefb5ffaeb498a78\/Messages\/MM2e5f462d1a034a72809294fac6493cf1.json",
			"subresourceUris": {
				"media": "\/2010-04-01\/Accounts\/AC5f37acb24007a320eefb5ffaeb498a78\/Messages\/MM2e5f462d1a034a72809294fac6493cf1\/Media.json"
			},
			"priceUnit": "USD",
			"dateSent": {
				"date": "2016-09-15 20:43:00.000000",
				"timezone_type": 3,
				"timezone": "UTC"
			},
			"errorCode": null,
			"errorMessage": null,
			"numMedia": "0",
			"numSegments": "1"
		}
	}
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
