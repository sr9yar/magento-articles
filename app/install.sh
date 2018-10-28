#!/bin/sh

php -f install.php -- --license_agreement_accepted yes \
  --locale en_US --timezone "America/Los_Angeles" --default_currency USD \
  --db_host mysql --db_name root --db_user root --db_pass root \
  --db_prefix ma_ \
  --skip_url_validation yes \
  --skip_base_url_validation yes \
  --url "http://localhost/" --use_rewrites no \
  --use_secure no --secure_base_url "http://localhost/" \
  --unsecure_base_url "http://localhost/" \
  --use_secure_admin no \
  --admin_lastname Admin --admin_firstname Admin --admin_email "admin@gmail.com" \
  --admin_username admin --admin_password admin123 \
  --admin_frontname "admin"
