<?php
return [
  'Cors' => [
    'AllowOrigin' => 'http://localhost:8080',
    'AllowMethods' => ['GET', 'OPTIONS', 'POST'],
    'AllowHeaders' => ['Authorization', 'Content-Type'],
    'MaxAge' => 300,
  ]
];