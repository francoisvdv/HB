<?php
define('PP_CONFIG_PATH', './sdk_config.ini');

$apiContext = new ApiContext(new OAuthTokenCredential('<clientId>', '<clientSecret>'));
?>