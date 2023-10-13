#!/bin/bash

# Beispiel Curl Command - Crif Bonitätsauskunkt (Produkt NegativeCheckHard)
# Anfrage an die mediaFinanz REST API v2.1
# @see https://api.mediafinanz.de/docs/v2.1/openapi/gui/

#-----------------------------------------------------------------------------------------------------------------------

#
# Zugangsdaten erhalten Sie bei mediaFinanz GmbH
# @see https://api.mediafinanz.de/docs/v2.1/account/
#
sUuid='12345678-1234-1234-1234-123456789012';
sUser='';
sPassword='';

#-----------------------------------------------------------------------------------------------------------------------

#
# Curl Command
# Crif Bonitätsanfrage an die mediaFinanz REST API v2.1
# @see https://api.mediafinanz.de/docs/v2.1/crif_request_score_negativecheckhard/
# @see https://api.mediafinanz.de/docs/v2.1/openapi/#validate-option
#
curl -X 'POST' \
  'https://test.api.mediafinanz.de/v2.1/infoservice/crif/score/negativecheckhard/' \
  -H "uuid: $sUuid" \
  -H "user: $sUser" \
  -H "password: $sPassword" \
  -H 'validate: 1' \
  -H 'accept: application/json' \
  -H 'Content-Type: application/json' \
  -d '{
    "Order": {
      "CustomerReference": "6910-2",
      "ProofOfInterest": 3,
      "ReportFormat": "NONE"
    },
    "Person": {
      "Title": "",
      "FirstName": "Erick",
      "LastName": "Gonzalez",
      "Gender": "m",
      "BirthDate": "2001-05-08"
    },
    "Address": {
      "Street": "Notbachstr.",
      "HouseNumber": "4",
      "PostalCode": "73888",
      "City": "Wasserbad",
      "CountryCode": "DE"
    }
  }'