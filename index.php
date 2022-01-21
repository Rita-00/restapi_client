<?php

use Client\Client;

$client = new Client('http://127.0.0.1:8000');

echo ($client->createUser("Rita", "1234"));

echo ($client->add_todo("Rita", "do task"));