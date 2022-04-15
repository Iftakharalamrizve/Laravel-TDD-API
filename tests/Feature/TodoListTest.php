<?php

namespace Tests\Feature;

use App\Models\TodoList;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TodoListTest extends TestCase
{

    use RefreshDatabase;

    private $list ;

    public function setUp() : void
    {
        parent ::setUp ();
        $this->list = TodoList::factory ()->create();
    }

    /**
     * A basic feature test example.
     *
     * @test
     * @return void
     */
    public function getTodList()
    {
        $response = $this->getJson (route ('todo-list.index'));
        $this-> assertCount ( 1 , $response -> json () );
    }

    /**
     * A basic feature test example.
     *
     * @test
     * @return void
     */

    public function getSingleRow()
    {
        $response = $this->getJson (route ('todo-list.show',$this->list->id))
                    ->assertOk ()
                    ->json ();
        $this->assertEquals (true , is_array($response));
    }

    /**
     * A basic feature test example.
     *
     * @test
     * @return void
     */
    public function storeNewTodoList()
    {
        $response = $this->postJson (route ('todo-list.store',['name'=>$this->list->name]))
                    ->assertCreated ()
                    ->json();
        $this->assertEquals ($this->list->name,$response['name']);
        $this->assertDatabaseHas ('todo_lists',['name' => $this->list->name ]);
    }

    /**
     * A basic feature test example.
     *
     * @test
     * @return void
     */
    public function validatePostRequestInTodoList()
    {
        $this->withExceptionHandling();

        $this->postJson (route ('todo-list.store'))
             ->assertUnprocessable ()
             ->assertJsonValidationErrors (['name']);
    }


}
