<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BSIT-3A/InsertClientsInformation</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        body {
            background: url('{{ asset('images/company.png') }}') no-repeat center center fixed;
            background-size: cover;
        }
        .container {
            background-color: rgba(255, 255, 255, .8);
            padding: 20px;
            border-radius: 10px;
            margin-top: 50px;
        }
        .btn-success {
            float: right;
        }
        .floating-alert {
            position: fixed;
            z-index: 1050;
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
        }
        .floating-alert.show {
            opacity: 1;
        }
    </style>
</head>
<body>
    <div class="container mt-5">

        @if (session('success'))
        <div class="alert alert-success mt-3 floating-alert show" id="floatingAlert">
            {{ session('success') }}
        </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger  floating-alert show" id="floatingAlert" >
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h1 class="text-center">Insert Client Information</h1>
        <hr>

        <a href="{{ route('companies.infos') }}" class="btn btn-success">All Clients Informations</a>

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
                <label for="sex" class="form-label">Sex:</label>
                <select name="sex" id="sex" class="form-select" required>
                    <option hidden>Select</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>

            <input type="submit" value="Submit Info" class="btn btn-primary">
        </form>
    </div>

    <script>
        // Automatically hide the floating alert after 3 seconds
        document.addEventListener("DOMContentLoaded", function () {
            const alert = document.getElementById("floatingAlert");
            if (alert) {
                setTimeout(() => {
                    alert.classList.remove("show");
                }, 3000); // Hide after 3 seconds
            }
        });
    </script>
</body>
</html>
