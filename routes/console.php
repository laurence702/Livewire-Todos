<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;


Artisan::command('todos:overdue')
    ->daily()
    ->at('6:00')
    ->timezone('America\Chicago')
    ->weekdays();
