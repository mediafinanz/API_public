#!/bin/bash

# Beispiel Curl Command
# Statusanfrage einer Forderung an die mediaFinanz REST API v2.1
# @see https://api.mediafinanz.de/docs/v2.1/openapi/gui/

#-----------------------------------------------------------------------------------------------------------------------

#
# Zugangsdaten erhalten Sie bei mediaFinanz GmbH
# @see https://api.mediafinanz.de/docs/v2.1/account/
#
sUuid='12345678-1234-1234-1234-123456789012';
sUser='';
sPassword='';

# Aktenzeichen, mit der die Anfrage erfolgen soll
az='12345678910';

#-----------------------------------------------------------------------------------------------------------------------

#
# Curl Command
# für eine Statusanfrage einer Forderung an die mediaFinanz REST API v2.1
# @see https://api.mediafinanz.de/docs/v2.1/inkasso_request_collect_claim_status/
# @see https://api.mediafinanz.de/docs/v2.1/openapi/#validate-option
#
curl -X 'GET' \
  'https://test.api.mediafinanz.de/v2.1/collect/claim/'$az'/status/' \
  -H "uuid: $sUuid" \
  -H "user: $sUser" \
  -H "password: $sPassword" \
  -H 'validate: 1' \
  -H 'accept: application/json';