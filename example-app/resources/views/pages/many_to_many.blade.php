@extends('master')

@section('content')
<div class="container m-5 p-8">
    <h2 class="mb-4">All Products</h2>

   

    <a href="#" class="btn btn-success mb-3">+ Create </a>

    <table class="table table-success table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Details</th>
                <th scope="col">Post details</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($products as $p)
            <tr>
                <td scope="row">{{ $loop->iteration }}</td>
                <td>{{ $p->name }}</td>
                <td>{{ $p->details }}</td>

                <td>
                    @foreach( $p->products as $c)
                    
                    {{ $c->name }} <br>
                   @endforeach

                </td>
                <td>
                    @foreach ($p->products as $c )

                    {{ $c->details }} <br>
                   @endforeach

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
                            onclick="return confirm('Are you sure you want to delete this p?')"
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
