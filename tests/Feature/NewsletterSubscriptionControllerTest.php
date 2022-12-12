<?php

namespace Tests\Feature;

use Mockery;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Services\NewsletterSubscriptionService;
use Illuminate\Foundation\Testing\RefreshDatabase;

class NewsletterSubscriptionControllerTest extends TestCase
{
    /**
     * @test
     * Test success response is returned.
     *
     * @return void
     */
    public function success_response_is_returned()
    {
        $mock = Mockery::mock(NewsletterSubscriptionService::class)
            ->makePartial();

        $mock->shouldReceive('handle')
            ->once()
            ->withArgs(['mail@hidayatchandra.co.id'])
            ->andReturnNull();

        app()->instance(NewsletterSubscriptionService::class, $mock);
        
        $this->post('newsletter/subscriptions',[
            'email' => 'mail@hidayatchandra.co.id'
        ])->assertExactJson([
            'success' => true
        ]);
    }
}
