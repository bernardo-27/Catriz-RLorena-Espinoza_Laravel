<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <title>BSIT-3A/InsertClientsInformation</title>

</head>
    <style>
        body {
            background: url('{{ asset('images/company.png') }}') no-repeat center center fixed;
            background-size: cover;
        }
        .container {
            background-color: rgba(255, 255, 255, .8); /* White background with transparency */
            padding: 20px;
            border-radius: 10px;
            margin-top: 50px;
        }
    </style>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Insert Client Information</h1>
        <hr>

        <form action="{{ route('storeClients') }}" method="POST" class="border p-4 rounded shadow">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Full Name" required>
            </div>

            <div class="mb-3">
                <label for="age" class="form-label">Age</label>
                <input type="number" name="age" id="age" class="form-control" placeholder="Age" required>
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Complete Address</label>
                <input type="text" name="address" id="address" class="form-control" placeholder="Complete Address" required>
            </div>

            <div class="mb-3">
                <label for="sex" class="form-label">Sex</label>
                <input type="text" name="sex" id="sex" class="form-control" placeholder="Sex" required>
            </div>

            <input type="submit" value="Submit Info" class="btn btn-primary">
        </form>

        @if (session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger mt-3">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

</body>
</html>
