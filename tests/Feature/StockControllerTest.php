<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Stock;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\TestResponse;
use Tests\TestCase;

class StockControllerTest extends TestCase {

    use DatabaseMigrations, WithFaker;

    private User $user;

    protected function setUp(): void {

        parent::setUp();

        $this->user = User::factory()->create();
    }

    public function testGetCurrentStockPrice() {

        $this
            ->sendStockPriceRequest(
                [
                    'q' => 'aapl.us',
                ])
            ->assertStatus(200)
            ->assertJsonStructure([
                'name',
                'symbol',
                'open',
                'high',
                'low',
                'close',
            ]);
    }

    public function testGetUserHistory() {

        Stock::factory()->create(['user_id' => $this->user->getKey()]);
        Stock::factory()->create(['user_id' => $this->user->getKey()]);
        Stock::factory()->create(['user_id' => $this->user->getKey()]);

        $this
            ->sendUserHistoryRequest()
            ->assertStatus(200)
            ->assertJsonStructure([
                [
                    'date',
                    'name',
                    'symbol',
                    'open',
                    'high',
                    'low',
                    'close',
                ],
            ]);
    }

    public function testGetCurrentStockPriceAuth() {

        $this
            ->sendStockPriceRequest([], false)
            ->assertStatus(401);
    }

    public function testGetUserHistoryAuth() {

        $this
            ->sendUserHistoryRequest(false)
            ->assertStatus(401);
    }

    private function sendStockPriceRequest(array $data = [], bool $auth = true): TestResponse {

        if ($auth) {
            $this->actingAs($this->user);
        }

        return $this->json('GET', route('api.stock.price'), $data);
    }

    private function sendUserHistoryRequest(bool $auth = true): TestResponse {

        if ($auth) {
            $this->actingAs($this->user);
        }

        return $this->json('GET', route('api.user.history'));
    }
}
