<?php

/**
 * Решение "в лоб" и "сходу"
 * Возможно не лучший вариант и формулировку "выдаваемый им текст может изменяться" надо уточнить
 * Но это тестовое ;)
 */

/**
 * @param string $message
 *
 * @return array
 * @throws Exception
 */
function parseMessage(string $message): array
{
    $result = [
        'code'     => null,
        'receiver' => null,
        'sum'      => null,
    ];

    preg_match_all('/(^|[^\d])([\d]*)(\.|,)([\d]{2})($|[^\d])/', $message, $matches, PREG_SET_ORDER);
    if (empty($matches)) {
        throw new \Exception('Sum not found');
    }
    if (count($matches) > 1) {
        throw new \Exception('Multiple sum found');
    }
    $result['sum'] = floatval($matches[0][2].'.'.$matches[0][4]);

    $message = str_replace($matches[0][0], '', $message);

    preg_match_all('/(^|[^\d])([\d]{13,15})($|[^\d])/', $message, $matches, PREG_SET_ORDER);
    if (empty($matches)) {
        throw new \Exception('Receiver not found');
    }
    if (count($matches) > 1) {
        throw new \Exception('Multiple receivers found');
    }
    $result['receiver'] = $matches[0][2];

    $message = str_replace($matches[0][0], '', $message);

    preg_match_all('/(^|[^\d])([\d]{1,})($|[^\d])/', $message, $matches, PREG_SET_ORDER);
    if (empty($matches)) {
        throw new \Exception('Code not found');
    }
    if (count($matches) > 1) {
        throw new \Exception('Multiple codes found');
    }
    $result['code'] = $matches[0][2];

    return $result;
}
