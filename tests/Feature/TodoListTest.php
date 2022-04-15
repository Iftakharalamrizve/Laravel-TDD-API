<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TodoListTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @test
     * @return void
     */
    public function getTodList()
    {



        //preparation


        //action
        $response = $this->getJson (route ('todo-list.store'));

        //assertion
        $this->assertEquals (1,count ($response->json()));
    }
}
