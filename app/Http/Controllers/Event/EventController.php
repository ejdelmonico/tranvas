<?php

namespace App\Http\Controllers\Event;

use App\Modules\Event\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    public function index()
    {
        $today = Carbon::today()->format('Y-m-d');
        $upcomingEvents = Event::where('start_date', '>', $today)
                               ->orderBy('start_date', 'asc')
                               ->get();
        $pastEvents = Event::where('start_date', '<=', $today)
                           ->orderBy('start_date', 'asc')
                           ->limit(3)
                           ->get();

        return view('events.event-list', compact(['upcomingEvents', 'pastEvents']));
    }

    public function view(Event $event)
    {
        return view('events.event-view', compact('event'));
    }
}
