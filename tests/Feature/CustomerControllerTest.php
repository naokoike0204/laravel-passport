<?php

namespace Tests\Feature;

use App\Models\Customer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CustomerControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_customer_list():void
    {

            Customer::factory()->create([
                'name'=>'test',
            'age'=>'22',
            'prefecture_id'=>'13',
            'address'=>'東京都世田谷区三宿',
            'pr_description'=>'テストです',
            'gender_id'=>'2',
            ]);

            $response = $this->get('customer');

            $response->assertOk()->assertSee('test');

    }
}
