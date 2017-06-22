<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LogTest extends TestCase
{
    
    /**
     * Verify if we can create a log from api
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
    
    /**
     * Verify if we cannot create a log from api
     *
     * @return false
     */
    public function testDoesntCreateLog()
    {
        $this->json(
                        'GET',
                        '/api/log/create', 
                        ['businessName' => 'cliente', 'typeLog' => 'information', 'title' => 'prueba', 'description' => 'prueba']
                    )
            ->seeJson(['created' => false ]);
    }
    
    
    /**
     * Verify if we does not have data from request
     *
     * @return false
     */
    public function testDoesnotHaveDataFromRequest()
    {
        $this->json(
                        'GET',
                        '/api/log/create', 
                        []
                    )
            ->seeJson(['created' => false ]);
    }
    
    /**
     * Verify if data sent it is empty
     *
     * @return false
     */
    public function testEmptyDataFromRequest()
    {
        $this->json(
                        'GET',
                        '/api/log/create', 
                        ['businessName' => '', 'typeLog' => 'information', 'title' => 'prueba', 'description' => 'prueba']
                    )
            ->seeJson(['created' => false ]);
    }
}
