<?php

return [
    'providers' => [
        /*
         * Laravel Framework Service Providers...
         */
        Illuminate\Auth\AuthServiceProvider::class,
        // ... other default providers
        
        /*
         * Package Service Providers...
         */
        Barryvdh\DomPDF\ServiceProvider::class,  // Add this line
        
        /*
         * Application Service Providers...
         */
        App\Providers\AppServiceProvider::class,
        // ... other app providers
    ],

    'aliases' => [
        'App' => Illuminate\Support\Facades\App::class,
        // ... other default aliases
        'PDF' => Barryvdh\DomPDF\Facade\Pdf::class,  // Add this line
    ],
];