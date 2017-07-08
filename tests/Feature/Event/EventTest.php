<?php

namespace Tests\Feature\Event;

use App\Modules\Event\Event;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EventTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    // @codingStandardsIgnoreLine
    public function a_user_can_see_a_list_of_events()
    {
        $event = factory(Event::class)->create();

        $this->get(route('events'))
            ->assertStatus(200)
            ->assertSeeText($event->title)
            ->assertSeeText($event->description);
    }

}
