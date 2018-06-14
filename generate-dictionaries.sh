#!/bin/sh
set -eu

BASE_URL=https://raw.githubusercontent.com/FreeRADIUS/freeradius-server/v3.0.x/share/

./bin/generate ${BASE_URL}dictionary.rfc2865 Rfc2865 > src/Dictionary/Rfc2865.php
./bin/generate ${BASE_URL}dictionary.rfc2866 Rfc2866 > src/Dictionary/Rfc2866.php
./bin/generate ${BASE_URL}dictionary.rfc2867 Rfc2867 > src/Dictionary/Rfc2867.php
./bin/generate ${BASE_URL}dictionary.rfc2868 Rfc2868 > src/Dictionary/Rfc2868.php
./bin/generate ${BASE_URL}dictionary.rfc2869 Rfc2869 > src/Dictionary/Rfc2869.php
./bin/generate ${BASE_URL}dictionary.rfc5176 Rfc5176 > src/Dictionary/Rfc5176.php
./bin/generate ${BASE_URL}dictionary.mikrotik MikroTik > src/Dictionary/MikroTik.php
