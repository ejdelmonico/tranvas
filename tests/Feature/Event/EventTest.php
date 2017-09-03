<?php

namespace Tests\Feature\Event;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class EventTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp()
    {
        parent::setUp();
    }

    /** @test */
    // @codingStandardsIgnoreLine
    public function a_guest_should_not_see_event_section()
    {
        $this->withExceptionHandling();

        $this->get(route('events'))
            ->assertRedirect(route('login'));
    }


    /** @test */
    // @codingStandardsIgnoreLine
    public function a_user_can_see_a_list_of_events()
    {
        $this->signIn();

        $event = create('App\Modules\Event\Event');

        $this->get(route('events'))
            ->assertStatus(200)
            ->assertSeeText($event->title)
            ->assertSeeText(limit_words($event->description, 50));
    }

    /** @test */
    // @codingStandardsIgnoreLine
    public function a_user_can_view_event_details()
    {
        $this->signIn();
        $event = create('App\Modules\Event\Event');

        $this->get(route('event-view', $event->slug))
            ->assertSee($event->title)
            ->assertSee($event->description)
            ->assertSee($event->creator->name);
    }

    /** @test */
    // @codingStandardsIgnoreLine
    public function a_user_can_create_an_event_and_view_it()
    {
        $this->signIn();

        $event = create('App\Modules\Event\Event');

        $this->post(route('event-save'), $event->toArray());

        $this->get(route('events'))
            ->assertSee($event->title);
    }

    /** @test */
    // @codingStandardsIgnoreLine
    public function confirm_fields_are_required_to_create_event()
    {
        $this->signIn();

        $this->post(route('event-save'), [])
            ->assertSessionHasErrors([
                'title',
                'description',
                'address',
                'start_date',
                'end_date',
                'lat',
                'lng'
            ]);
    }


}
