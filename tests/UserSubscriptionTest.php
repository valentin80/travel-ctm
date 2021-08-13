<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class UserSubscriptionTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testUserSubscriptionCreate()
    {
        $this->post('/api/subscriptions', [
            "first_name" => "Valentin",
            "last_name" => "Chelaru",
            "email" => "chelaruvalentin6@gmail.com",
            "subscribed" => "1",
        ]);

        $this->assertResponseStatus(201);

        $responseContent = json_decode($this->response->getContent(), true);
        $this->assertArrayHasKey(
            "first_name", $responseContent
        );

        $this->assertArrayHasKey(
            "last_name", $responseContent
        );

        $this->assertArrayHasKey(
            "email", $responseContent
        );

        $this->assertArrayHasKey(
            "id", $responseContent
        );
    }

}
