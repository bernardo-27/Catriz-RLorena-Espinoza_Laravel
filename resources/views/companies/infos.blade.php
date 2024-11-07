<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BSIT-3A/StoredClientsInformation</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        body {
            background: url('{{ asset('images/company.png') }}') no-repeat center center fixed;
            background-size: cover;
        }
        .search {
            height: 38px;
            width: 14rem;
            border-radius: 5px;
            border: .1px solid black;
            font-style: italic;
            margin-bottom: 25px;
        }
        .btn-search {
            background: rgb(101, 101, 227);
            height: 38px;
            width: 6rem;
            border-radius: 5px;
            border-color: transparent;
            color: white;
        }

        .table-container {
            background-color: rgba(255, 255, 255, .8); /* White background with transparency */
            padding: 20px;
            border-radius: 10px;
            margin-top: 50px;
            margin-bottom: 50px;
        }

        h2 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        a {
            display: inline-block;
            margin-bottom: 15px;
            float: right;
        }
        .page {
            display: flex;
            justify-content: center;
            text-align: center;
        }
        .page a {
            font-size: 18px;
            font-weight: 700;
            letter-spacing: 2px;
            text-decoration: none;
            padding: 8px;
            border-radius: 10px;
            margin: 9px;
        }
        .page a:hover {
            text-decoration: underline;
            color: rgb(89, 89, 164);
        }
    </style>

</head>
    <body>

    {{-- <a href="{{ route('companies.infos', ['sort' => 'asc', 'search' => request('search')]) }}">Sort Ascending</a>
    <a href="{{ route('companies.infos', ['sort' => 'desc', 'search' => request('search')]) }}">Sort Descending</a> --}}
        <div class="container table-container">
            <h2>Stored Client Information</h2>
            <hr>
            @if($searchTerm)
                <div>
                    {{-- <a href="{{ route('companies.infos') }}" class="btn btn-primary back-search">Back</a>  --}}
                </div>
            @else
                <a href="{{ route('companies.clients') }}" class="btn btn-primary">Exit</a>
                <a href="{{ route('clients.add') }}" class="btn btn-success mb-3" style="margin-right: 15px;">Add New Client</a>
            @endif

        <form action="{{ route('companies.infos') }}" method="GET">
            <input type="text" name="search" placeholder="Search by name or address" value="{{ request('search') }}" class="search">
            <button type="submit" class="btn-search">Search</button>
        </form>


        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Address</th>
                    <th>Sex</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
                @php $count = 1;
                @endphp <!-- Initialize counter -->
                @foreach($clients as $client)

                <tr>
                    <td>{{ $count++ }}</td> <!-- Sequential Number -->
                    <td>{{ $client->name }}</td>
                    <td>{{ $client->age }}</td>
                    <td>{{ $client->address }}</td>
                    <td>{{ $client->sex }}</td>
                    <td>
                        <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-warning" >Edit</a>
                        <form action="{{ route('clients.delete', $client->id) }}" method="POST" onsubmit="return confirmDelete()">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                
                    @endforeach
                </tbody>
            </table>


            <p style="float: right; 
            margin-right:35px;
            font-weight:600;
            ">Total Clients: {{ $totalClients }}</p>




            @if($clients->isEmpty())
                <p>No clients found.</p>
            @else
                @foreach($clients as $client)
                @endforeach
            @endif

            <div class="page">
                <!-- Back button: only show if on a page greater than 1 -->
                @if($page > 1)
                    <a href="{{ route('companies.infos', ['page' => $page - 1, 'search' => request('search'), 'sort' => request('sort')]) }}">Previous</a>
                @endif

                <!-- Next button: only show if there are exactly 20 clients on this page -->
                @if($clients->count() == 25)
                    <a href="{{ route('companies.infos', ['page' => $page + 1, 'search' => request('search'), 'sort' => request('sort')]) }}">Next</a>
                    @else ()
                        <a href="{{ route('companies.infos') }}">Back</a>
                @endif
            </div>
        </div>


        <script>
            function confirmDelete() {
                return confirm("Are you sure you want to delete?");
            }
        </script>
</body>
</html>




