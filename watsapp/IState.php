<?php

interface IState
{
    public function main();
    public function freeWeekDays();
    public function freeHours();
    public function trainingCancelYes_No();  
}