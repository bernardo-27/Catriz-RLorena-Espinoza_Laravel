<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>BSIT-3A/EditClientsInformation</title>
</head>

<style>
    body {
        background: url('{{ asset('images/company.png') }}') no-repeat center center fixed;
        background-size: cover;
    }

    form {
        background-color: rgba(255, 255, 255, .8); /* White background with transparency */
        padding: 10px 20px 50px 20px;
        border-radius: 10px;
    }

    h2 {
        color: #333;
        text-align: center;
        margin-bottom: 20px;
    }
</style>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Update Client</h2>
        <hr>

        <form action="{{ route('clients.update', $clients->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" name="name" id="name" value="{{ $clients->name }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="age" class="form-label">Age:</label>
                <input type="number" name="age" id="age" value="{{ $clients->age }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Address:</label>
                <input type="text" name="address" id="address" value="{{ $clients->address }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="sex" class="form-label">Sex:</label>
                <select name="sex" id="sex" class="form-select" required>
                    <option value="Male" {{ $clients->sex == 'Male' ? 'selected' : '' }}>Male</option>
                    <option value="Female" {{ $clients->sex == 'Female' ? 'selected' : '' }}>Female</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update Client</button>
            <a href="{{ route('companies.infos') }}" class="btn btn-secondary ms-2">Back</a>
        </form>
    </div>


</body>
</html>
