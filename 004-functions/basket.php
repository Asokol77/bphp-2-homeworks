<?php
declare(strict_types=1);
const OPERATION_EXIT = 0;
const OPERATION_ADD = 1;
const OPERATION_DELETE = 2;
const OPERATION_PRINT = 3;
$items = [];
$operations = [
    OPERATION_EXIT => OPERATION_EXIT . '. Завершить программу.',
    OPERATION_ADD => OPERATION_ADD . '. Добавить товар в список покупок.',
    OPERATION_DELETE => OPERATION_DELETE . '. Удалить товар из списка покупок.',
    OPERATION_PRINT => OPERATION_PRINT . '. Отобразить список покупок.',
];
function interf(array $operations): string {
    do {

        echo 'Выберите операцию для выполнения: ' . PHP_EOL;
        // Проверить, есть ли товары в списке? Если нет, то не отображать пункт про удаление товаров
        echo implode(PHP_EOL, $operations) . PHP_EOL . '> ';
        $operationNumber = trim(fgets(STDIN));

        if (!array_key_exists($operationNumber, $operations)) {
            system('clear');

            echo '!!! Неизвестный номер операции, повторите попытку.' . PHP_EOL;
        }

    } while (!array_key_exists($operationNumber, $operations));
    echo 'Выбрана операция: '  . $operations[$operationNumber] . PHP_EOL;
    return $operationNumber;
}

function cart(array $items){
    if (count($items)) {
        echo 'Ваш список покупок: ' . PHP_EOL;
        echo implode("\n", $items) . "\n";
    } else {
        echo 'Ваш список покупок пуст.' . PHP_EOL;
    }
}

function addItems(array $items) {
    echo "Введение название товара для добавления в список: \n> ";
    $itemName = trim(fgets(STDIN));
    $items[] = $itemName;
    return $items;
}
function delItems(array $items): array {
            // Проверить, есть ли товары в списке? Если нет, то сказать об этом и попросить ввести другую операцию
            echo 'Текущий список покупок:' . PHP_EOL;
            echo 'Список покупок: ' . PHP_EOL;
            echo implode("\n", $items) . "\n";

            echo 'Введение название товара для удаления из списка:' . PHP_EOL . '> ';
            $itemName = trim(fgets(STDIN));

            if (in_array($itemName, $items, true) !== false) {
                while (($key = array_search($itemName, $items, true)) !== false) {
                    unset($items[$key]);
                }
            }
            return $items;
}
function printItems(array $items){
    echo 'Ваш список покупок: ' . PHP_EOL;
    echo implode(PHP_EOL, $items) . PHP_EOL;
    echo 'Всего ' . count($items) . ' позиций. '. PHP_EOL;
    echo 'Нажмите enter для продолжения';
    fgets(STDIN);
}
do {
    system('clear');
//    system('cls'); // windows
    cart($items);
    $operationNumber = interf($operations);

    switch ($operationNumber) {
        case OPERATION_ADD:
            $items = addItems($items);
        case OPERATION_DELETE:
            $items = delItems($items);
            break;
        case OPERATION_PRINT:
            printItems($items);
            break;
    }

    echo "\n ----- \n";
} while ($operationNumber > 0);

echo 'Программа завершена' . PHP_EOL;
