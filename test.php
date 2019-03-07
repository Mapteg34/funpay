<?php

$messages = [
    0     => 'Сумма указана неверно.',
    1     => 'Пароль: 5743'.PHP_EOL.
             'Спишется 1,01р.'.PHP_EOL.
             'Перевод на счет 410018883308111',
    10    => 'Пароль: 0299'.PHP_EOL.
             'Спишется 10,06р.'.PHP_EOL.
             'Перевод на счет 410018883308362',
    5000  => 'Никому не говорите пароль! Его спрашивают только мошенники.'.PHP_EOL.
             'Пароль: 52278'.PHP_EOL.
             'Перевод на счет 410018883308362'.PHP_EOL.
             'Вы потратите 5025,13р.',
    10000 => 'Недостаточно средств.',
];

require_once 'parseMessage.php';

foreach ($messages as $message) {
    try {
        $result = parseMessage($message);
        echo $message.PHP_EOL;
        var_dump($result);
    } catch (Exception $e) {
        echo $message.PHP_EOL;
        echo 'Parse message fail: '.$e->getMessage();
    }
    echo PHP_EOL.'-------'.PHP_EOL;
}
