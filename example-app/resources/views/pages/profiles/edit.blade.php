@extends('master')

@section('content')
<div class="container mt-4">
    <h2>Edit Profile</h2>

    <form action="{{ route('profiles.edit', $profile->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ $profile->name }}" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ $profile->email }}" required>
        </div>

        <div class="mb-3">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control" value="{{ $profile->phone }}">
        </div>

        <div class="mb-3">
            <label>Country</label>
            <input type="text" name="country" class="form-control" value="{{ $profile->country }}">
        </div>

        <div class="mb-3">
            <label>Address</label>
            <textarea name="address" class="form-control">{{ $profile->address }}</textarea>
        </div>

        <div class="mb-3">
            <label>Profile Image</label><br>
            @if($profile->profile_image)
                <img src="{{ asset('storage/' . $profile->profile_image) }}" width="60" class="mb-2">
            @endif
            <input type="file" name="profile_image" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Update Profile</button>
    </form>
</div>
@endsection
