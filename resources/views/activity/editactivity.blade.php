@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Activity</h1>

        <form action="{{ route('resource.update', $activity->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="type">Type</label>
                <select name="type" id="type" class="form-control" required>
                    <option value="surf" {{ $activity->type == 'surf' ? 'selected' : '' }}>Surf</option>
                    <option value="windsurf" {{ $activity->type == 'windsurf' ? 'selected' : '' }}>Windsurf</option>
                    <option value="kayak" {{ $activity->type == 'kayak' ? 'selected' : '' }}>Kayak</option>
                    <option value="atv" {{ $activity->type == 'atv' ? 'selected' : '' }}>ATV</option>
                    <option value="hot air balloon" {{ $activity->type == 'hot air balloon' ? 'selected' : '' }}>Hot Air Balloon</option>
                </select>
            </div>

            <div class="form-group">
                <label for="user_id">User</label>
                <input type="number" name="user_id" id="user_id" class="form-control" value="{{ $activity->user_id }}" required>
            </div>

            <div class="form-group">
                <label for="datetime">Date & Time</label>
                <input type="datetime-local" name="datetime" id="datetime" class="form-control" value="{{ $activity->datetime->format('Y-m-d\TH:i') }}" required>
            </div>

            <div class="form-group">
                <label for="notes">Notes</label>
                <textarea name="notes" id="notes" class="form-control" required>{{ $activity->notes }}</textarea>
            </div>

            <div class="form-group">
                <label for="satisfaction">Satisfaction</label>
                <input type="number" name="satisfaction" id="satisfaction" class="form-control" min="1" max="10" value="{{ $activity->satisfaction }}">
            </div>

            <div class="form-group">
                <label for="paid">Paid</label>
                <input type="checkbox" name="paid" id="paid" {{ $activity->paid ? 'checked' : '' }}>
            </div>

            <button type="submit" class="btn btn-primary">Edit Activity</button>
        </form>
    </div>
@endsection
