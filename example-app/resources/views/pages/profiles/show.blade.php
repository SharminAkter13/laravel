@extends('master')

@section('content')
<div class="container mt-4">
    <h2>Profile Details</h2>

    <div class="card">
        <div class="card-body">
            @if($profile->profile_image)
                <img src="{{ asset('storage/' . $profile->profile_image) }}" width="100" class="mb-3">
            @endif

            <p><strong>Name:</strong> {{ $profile->name }}</p>
            <p><strong>Email:</strong> {{ $profile->email }}</p>
            <p><strong>Phone:</strong> {{ $profile->phone ?? 'N/A' }}</p>
            <p><strong>Country:</strong> {{ $profile->country ?? 'N/A' }}</p>
            <p><strong>Address:</strong> {{ $profile->address ?? 'N/A' }}</p>

            <a href="{{ route('profiles.edit', $profile->id) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('profiles.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</div>
@endsection
