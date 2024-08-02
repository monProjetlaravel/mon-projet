<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionnaire de Projet</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-4">Projets</h1>
        <a href="{{route('create.project')}}" class="btn btn-primary mb-3">Create Project</a>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projets as $projet )
                    <tr>
                        <td>{{ $projet->id}}</td>
                        <td>{{ $projet->name }}</td>
                        <td>{{ $projet->description }}</td>
                        <td>{{ $projet->start_date }}</td>
                        <td>{{ $projet->end_date }}</td>
                        <td>
                            <!-- <a href="{{ route('show.project',$projet->id) }}" class="btn btn-warning btn-sm">View</a> -->
                            <a href="{{ route('edit.project',$projet->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('destroy.project', $projet->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
