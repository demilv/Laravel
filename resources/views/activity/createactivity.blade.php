@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create New Activity</h1>

        <form action="{{ route('resource.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="type">Type</label>
                <select name="type" id="type" class="form-control" required>
                    <option value="surf">Surf</option>
                    <option value="windsurf">Windsurf</option>
                    <option value="kayak">Kayak</option>
                    <option value="atv">ATV</option>
                    <option value="hot air balloon">Hot Air Balloon</option>
                </select>
            </div>

            <div class="form-group">
                <label for="user_id">User</label>
                <input type="number" name="user_id" id="user_id" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="datetime">Date & Time</label>
                <input type="datetime-local" name="datetime" id="datetime" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="notes">Notes</label>
                <textarea name="notes" id="notes" class="form-control" required></textarea>
            </div>

            <div class="form-group">
                <label for="satisfaction">Satisfaction</label>
                <input type="number" name="satisfaction" id="satisfaction" class="form-control" min="1" max="10">
            </div>

            <div class="form-group">
                <label for="paid">Paid</label>
                <input type="checkbox" name="paid" id="paid">
            </div>

            <button type="submit" class="btn btn-primary">Create Activity</button>
        </form>
    </div>
@endsection
