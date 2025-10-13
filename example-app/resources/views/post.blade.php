@extends('master')

@section('content')
<div class="container m-5 p-8">
    <h2 class="mb-4">All comments</h2>

   

    <a href="#" class="btn btn-success mb-3">+ Create `comment`</a>

    <table class="table table-success table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Details</th>

                <th scope="col">User Name</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($posts as $comment)
            <tr>
                <td scope="row">{{ $loop->iteration }}</td>
                <td>{{ $comment->title }}</td>
                <td>{{ $comment->details }}</td>
                <!-- <td>{{ $comment->phone }}</td> -->

                <td>
                    @foreach( $comment->comments as $c)
                    
                    {{ $c->name }} <br>
                   @endforeach

                </td>
                <td>
                    @foreach ($comment->comments as $c )

                    {{ $c->details }} <br>
                   @endforeach

                </td>
            
            </td>

                <td>
                      <div class="btn-group">
                    <a href="#" class="btn btn-sm btn-info">View</a>
                    <a href="#" class="btn btn-sm btn-warning">Edit</a>
                   <form action="#" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button 
                            type="submit" 
                            class="btn btn-sm btn-danger" 
                            onclick="return confirm('Are you sure you want to delete this comment?')"
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
