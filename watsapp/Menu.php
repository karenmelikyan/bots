<?php

require_once 'IState.php';

class Menu implements IState
{
    public function __construct()
    {
        
    }

    public function main(): string
    {
        return "0 - Открыть главное меню\n" .
               "1 - Запросить свободное время\n" .
               "2 - Перенести время тренировки\n" .
               "3 - Удалить все записи о будущих тренировках";
    }

    public function freeWeekDays(): string   
    {
        return '';
    }
    
    public function freeHours(): string   
    {
        return '';
    }

    public function trainingCancelYes_No(): string   
    {
        return '';
    }

}