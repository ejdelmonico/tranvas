@extends('layouts.app')

@section('title', 'Events')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>Upcoming Events</h1>

                @foreach($upcomingEvents as $upcomingEvent)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3>
                                <a href="{{route('event-view', $upcomingEvent->id)}}">{{ $upcomingEvent->id }} {{ $upcomingEvent->title }}</a>
                            </h3>
                            <small class="padding-left-10">{{ $upcomingEvent->address }}</small>
                        </div>

                        <div class="panel-body">
                            <div class="meta-data margin-bottom-10">
                                <strong>Start date: </strong> {{ $upcomingEvent->start_date }}
                                <br>
                                <strong>End date: </strong> {{ $upcomingEvent->end_date }}
                                <br>
                                <strong>Created by: </strong> {{ $upcomingEvent->creator->name }}
                            </div>
                            <div class="description">
                                {{ $upcomingEvent->description }}
                            </div>

                        </div>
                    </div>
                @endforeach

            </div>
        </div>

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>Past Events</h1>

                @if(count($pastEvents) == 0)
                    <h3>No Past Events</h3>
                @else
                    @foreach($pastEvents as $pastEvent)
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3>
                                    <a href="{{route('event-view', $pastEvent->id)}}">{{ $pastEvent->id }} {{ $pastEvent->title }}</a>
                                </h3>
                                <small class="padding-left-10">{{ $pastEvent->address }}</small>
                            </div>

                            <div class="panel-body">
                                <div class="meta-data margin-bottom-10">
                                    <strong>Start date: </strong> {{ $pastEvent->start_date }}
                                    <br>
                                    <strong>End date: </strong> {{ $pastEvent->end_date }}
                                    <br>
                                    <strong>Created by: </strong> {{ $pastEvent->creator->name }}
                                </div>
                                <div class="description">
                                    {{ $pastEvent->description }}
                                </div>

                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection
