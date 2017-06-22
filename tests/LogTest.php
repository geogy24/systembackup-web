<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LogTest extends TestCase
{
    
    /**
     * Verify if We can create a log from api
     *
     * @return true
     */
    public function testCreateLog()
    {
        $this->json(
                        'GET',
                        '/api/log/create', 
                        ['businessName' => 'prueba', 'typeLog' => 'information', 'title' => 'prueba', 'description' => 'prueba']
                    )
            ->seeJson(['created' => true ]);
    }
    
}
