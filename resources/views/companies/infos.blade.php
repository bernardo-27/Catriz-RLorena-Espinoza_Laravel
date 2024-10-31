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

        .table-container {
            background-color: rgba(255, 255, 255, .8); /* White background with transparency */
            padding: 20px;
            border-radius: 10px;
            margin-top: 50px;
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
    </style>
</head>
    <body>

        <div class="container table-container">
            <h2>Stored Client Information</h2>
            <hr>
            <a href="{{ route('companies.clients') }}" class="btn btn-primary">Back</a>
            <a href="{{ route('clients.add') }}" class="btn btn-success mb-3" style="margin-right: 15px;">Add New Client</a>
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Address</th>
                        <th>Sex</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clients as $client)
                    <tr>
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
        </div>

        <script>
            function confirmDelete() {
                return confirm("Are you sure you want to delete?");
            }
            </script>
</body>
</html>




