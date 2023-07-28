<?php

namespace Tests\Feature;

use App\Http\Controllers\API\V1\UserScoreController;
use App\Models\UserScore;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserScoreTest extends TestCase
{
    use RefreshDatabase;

    public function testGroupedByScore()
    {
        UserScore::factory()->create([
            'points' => 25,
            'name' => 'Emma',
            'age' => 18,
        ]);

        UserScore::factory()->create([
            'points' => 2500,
            'name' => 'Noah',
            'age' => 18,
        ]);

        $response = (new UserScoreController())->groupedByScore();
        $this->assertIsArray($response);

        // Assert the expected result for points = 25
        $this->assertContains('Emma', $response['25']['names']);
        $this->assertArrayHasKey('average_age', $response['25']);
        $this->assertEquals(18, $response['25']['average_age']);

        // Assert the expected result for points = 2500
        $this->assertContains('Noah', $response['2500']['names']);
        $this->assertArrayHasKey('average_age', $response['2500']);
        $this->assertEquals(18, $response['2500']['average_age']);
    }

    public function testIndexWithSearch()
    {
        UserScore::create(['name' => 'Emma', 'points' => 25, 'age' => 18, 'address' => '123 fake street']);
        UserScore::create(['name' => 'Noah', 'points' => 25, 'age' => 18, 'address' => '123 fake street']);
        UserScore::create(['name' => 'Olivia', 'points' => 25, 'age' => 18, 'address' => '123 fake street']);

        $response = $this->get('/api/v1/user-score?search=Emma');
        $response->assertStatus(200);
        $response->assertJsonCount(1, 'data'); // expect only one user with the name 'Emma'
        $response->assertJsonFragment(['name' => 'Emma']);
    }

    public function testIndexWithoutSearch()
    {
        UserScore::create(['name' => 'Emma', 'points' => 25, 'age' => 18, 'address' => '123 fake street']);
        UserScore::create(['name' => 'Noah', 'points' => 25, 'age' => 18, 'address' => '123 fake street']);
        UserScore::create(['name' => 'Olivia', 'points' => 25, 'age' => 18, 'address' => '123 fake street']);
    
        $response = $this->get('/api/v1/user-score');
        $response->assertStatus(200);
        $response->assertJsonCount(3, 'data'); // expect all three users to be returned
    }
    
}