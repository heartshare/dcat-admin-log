<?php

use Dcat\Admin\Satan\Admin\Log\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::resource('satan/dcat-admin-log', Controllers\DcatAdminLogController::class);
