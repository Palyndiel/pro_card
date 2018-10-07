<?php
$db = parse_url(getenv('CLEARDB_DATABASE_URL'));

$container->setParameter('database_driver', 'pdo_mysql');
$container->setParameter('database_host', $db['host']);
$container->setParameter('database_port', $db['port']);
$container->setParameter('database_name', substr($db["path"], 1));
$container->setParameter('database_user', $db['user']);
$container->setParameter('database_password', $db['pass']);
$container->setParameter('secret', getenv('SECRET'));
$container->setParameter('locale', 'en');
$container->setParameter('mailer_transport', null);
$container->setParameter('mailer_host', "smtp.sparkpostmail.com");
$container->setParameter('mailer_port', 587);
$container->setParameter('mailer_user', "SMTP_Injection");
$container->setParameter('mailer_password', "a13a7ef38dea42f1d9ba4170f9e246a8f8bbba06");
$container->setParameter('sparkpost_api', getenv('SPARKPOST_API_KEY'));