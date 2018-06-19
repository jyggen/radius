#!/bin/sh
set -eu

./bin/generate https://raw.githubusercontent.com/FreeRADIUS/freeradius-server/v3.0.x/share/dictionary

BASE_URL=https://raw.githubusercontent.com/FreeRADIUS/freeradius-server/v3.0.x/share/
DICTIONARIES=(
    MikroTik
    Rfc2865
    Rfc2866
    Rfc2867
    Rfc2868
    Rfc2869
    Rfc3162
    Rfc3576
    Rfc3580
    Rfc4072
    Rfc4372
    Rfc4603
    Rfc4675
    Rfc4679
    Rfc4818
    Rfc4849
    Rfc5090
    Rfc5176
)

for DICTIONARY in "${DICTIONARIES[@]}"
do
    echo $DICTIONARY
    LOWERCASE=$(echo "$DICTIONARY" | tr '[:upper:]' '[:lower:]')
    ./bin/generate ${BASE_URL}dictionary.${LOWERCASE} $DICTIONARY > src/Dictionary/${DICTIONARY}.php
done
