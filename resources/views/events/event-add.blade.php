@extends('layouts.app')

@section('title', 'Page')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <form action="{{ route('event-save') }}" method="POST" id="locationForm">
                <div class="col-sm-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Add new event</h3>
                        </div>
                        <div class="panel-body">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}"><label for="title">Event title</label>
                                <input type="text"
                                       name="title"
                                       id="title"
                                       class="form-control"
                                       placeholder="Enter the event"
                                       value="{{ old('title') }}">
                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                <label for="address">Address</label>
                                <input type="text"
                                       name="address"
                                       id="address"
                                       class="form-control"
                                       placeholder="Enter the event address"
                                       value="{{ old('address') }}">
                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('start_date') ? ' has-error' : '' }}">
                                <label for="">Start date</label>
                                <input type="date"
                                       name="start_date"
                                       id="start_date"
                                       class="form-control"
                                       placeholder="Enter the event start date"
                                       value="{{ old('start_date') }}">
                                @if ($errors->has('start_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('start_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('end_date') ? ' has-error' : '' }}">
                                <label for="end_date">End date</label>
                                <input type="date"
                                       name="end_date"
                                       id="end_date"
                                       class="form-control"
                                       placeholder="Enter the event end date"
                                       value="{{ old('end_date') }}">
                                @if ($errors->has('end_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('end_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                <label for="description"></label>
                                <textarea
                                        name="description"
                                        id="description"
                                        class="form-control"
                                        placeholder="Enter the description"
                                        rows="8">
                                {{ old('description') }}
                            </textarea>
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="fa fa-save"></i> Save
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Select the location</h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                {{--<span class="error">{{$errors->first('lat')}}</span>--}}
                                {{--<span class="error">{{$errors->first('long')}}</span>--}}

                                <event-location></event-location>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
