<?php

Route::resource('admin/pages', 'DigitalSeraph\Pages\Http\Controllers\PageController', [
    'as' => 'admin'
]);
