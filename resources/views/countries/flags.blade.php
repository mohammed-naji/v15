<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Flags</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
</head>
<body>
    <div class="container">
        <h1>All Flags</h1>
        <table class="table table-hover table-borderd">
            <tr>
                <th>#ID</th>
                <th>Image</th>
                <th>Meaning</th>
                <th>Country Name</th>
                <th>Actions</th>
            </tr>

            @forelse ($flags as $flag)
            <tr>
                <td>{{ $flag->id }}</td>
                <td>{{ $flag->image }}</td>
                <td>{{ $flag->meaning }}</td>
                <td>{{ $flag->country->name }}</td>
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
