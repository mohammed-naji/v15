<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Countries</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
</head>
<body>
    <div class="container">
        <h1>All Countries</h1>
        <table class="table table-hover table-borderd">
            <tr>
                <th>#ID</th>
                <th>Name</th>
                <th>Population</th>
                <th>Flag Image</th>
                <th>Flag Meaning</th>
                <th>Actions</th>
            </tr>

            @forelse ($countries as $country)
            <tr>
                <td>{{ $country->id }}</td>
                <td>{{ $country->name }}</td>
                <td>{{ $country->population }}</td>
                <td>{{ $country->flag->image }}</td>
                <td>{{ $country->flag->meaning }}</td>
                <td>

                </td>
            </tr>
            @empty
            <tr>
                <th>No Data Found</th>
            </tr>
            @endforelse
        </table>
    </div>
</body>
</html>
