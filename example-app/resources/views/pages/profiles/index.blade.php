@extends('master')

@section('content')
<div class="container m-5 p-8">
    <h2 class="mb-4">All Profiles</h2>

   

    <a href="{{ route('profiles.create') }}" class="btn btn-success mb-3">+ Create Profile</a>

    <table class="table table-success table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Country</th>
                <th scope="col">Address</th>
                <th scope="col">Image</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($profiles as $profile)
            <tr>
                <td scope="row">{{ $loop->iteration }}</td>
                <td>{{ $profile->name }}</td>
                <td>{{ $profile->email }}</td>
                <td>{{ $profile->phone }}</td>
                <td>{{ $profile->country }}</td>
                <td>{{ $profile->address }}</td>
                <td>
                    @if($profile->profile_image)
                        <img src="{{ asset('storage/' . $profile->profile_image) }}" width="50" height="50" class="rounded-circle">
                    @else
                        N/A
                    @endif
                </td>
                <td>
                      <div class="btn-group">
                    <a href="{{ route('profiles.show', $profile->id) }}" class="btn btn-sm btn-info">View</a>
                    <a href="{{ route('profiles.edit', $profile->id) }}" class="btn btn-sm btn-warning">Edit</a>
                   <form action="{{ route('profiles.destroy', $profile->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button 
                            type="submit" 
                            class="btn btn-sm btn-danger" 
                            onclick="return confirm('Are you sure you want to delete this profile?')"
                        >
                            Delete
                        </button>
                    </form>

                     </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>


@endsection
