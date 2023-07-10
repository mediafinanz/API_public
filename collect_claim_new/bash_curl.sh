#!/bin/bash

#
# Zugangsdaten erhalten Sie bei mediaFinanz GmbH
# @see https://api.mediafinanz.de/docs/v1.2/account/
#
iClientNo=000000;
sUser='';
sPassword='';

#-----------------------------------------------------------------------------------------------------------------------

#
# Beispiel-JSON-Datensatz einer Forderung
# für die Übergabe an die mediaFinanz REST API v1.2
# @see https://api.mediafinanz.de/docs/v1.2/collect_claim_new/
# @see https://api.mediafinanz.de/docs/v1.2/collect_claim_new_faq/#anfrage-ueberpruefen
#
curl -X 'PUT' \
  'https://test.api.mediafinanz.de/v1.2/collect/claim/new/' \
  -H "id: $iClientNo" \
  -H "user: $sUser" \
  -H "password: $sPassword" \
  -H 'validate: 1' \
  -H 'accept: application/json' \
  -H 'Content-Type: application/json' \
  -d '{
  "ClientNo": '"$iClientNo"',
  "ClientCustomerRefNo": "6910-2",
  "PartnerNo": 91,
  "AcceptanceDate": "2022-10-17T12:15:00",
  "Stage": "V",
  "Debtor": {
    "PersonType": 1,
    "Company": "",
    "LastName": "Mustermann",
    "FirstName": "Max",
    "BirthDate": "2001-05-08",
    "PostalAddress": {
      "Annex": ", Das ist ein Test, Das ist ein Test, Das ist ein Test, Das ist ein Test, Das ist ein Test",
      "Street": "Weiße Breite 5",
      "PostalCode": "49084",
      "City": "Osnabrück",
      "CountryCode": "DE",
      "Validity": 1
    },
    "AlternateAddress": {
      "Annex": "Bei Schmidt",
      "Street": "Musterstraße 1",
      "PostalCode": "49084",
      "City": "Osnabrück",
      "CountryCode": "DE",
      "Validity": 0
    },
    "Communications": [
      {
        "Means": 2,
        "Type": 2,
        "Value": "0123 456 7890",
        "Validity": 1
      },
      {
        "Means": 1,
        "Type": 1,
        "Value": "mustermann@example.com",
        "Validity": 0
      },
      {
        "Means": 4,
        "Type": 2,
        "Value": "0541 2029-100",
        "Validity": 1
      },
      {
        "Means": 1,
        "Type": 1,
        "Value": "0541 2029-xxx",
        "Validity": 1
      },
      {
        "Means": 5,
        "Type": 2,
        "Value": "www.mediafinanz.de",
        "Validity": 1
      },
      {
        "Means": 3,
        "Type": 1,
        "Value": "01525 2029-xxx",
        "Validity": 0
      }
    ]
  },
  "Claim": {
    "Amount": 79.99,
    "ContractDate": "2022-01-06",
    "ContractualItemCatalogueNo": "01",
    "ContractualCondition": 1,
    "OriginalCreatorName": "Foo",
    "Reason": "InkassoWeb Nutzungsgebühr für den Monat Oktober 2022 und für den Monat November 2022 und für den Monat Dezember 2022 sowie für die Monate Januar 2023 und Februar 2023",
    "PrincipalClaim": {
      "Number": "1086247",
      "Value": 30.99,
      "Date": "2021-08-02",
      "Remark": "Bemerkung Hauptforderung"
    },
    "DunningCosts": {
      "Number": "1086247",
      "Value": 10.28,
      "Date": "2021-08-02",
      "Remark": "Mahnkosten"
    }
  },
  "Memo": "Nutzungsgebühren"
}';