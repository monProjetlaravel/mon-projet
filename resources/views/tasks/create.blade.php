<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create task</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1>Create Tasks</h1>
        <form action="{{ route('store.task') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="projet_id" class="form-label">Projet</label>
                <select class="form-control" id="projet_id" name="projet_id">
                    @foreach ($projets as $projet)
                      <option value="{{$projet->id}}">{{$projet->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="Titre" class="form-label">Titre</label>
                <input type="text" class="form-control" id="Titre" name="title" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description"></textarea>
            </div>
            <div class="mb-3">
                <label for="statut" class="form-label">Status</label>
                <select class="form-control" id="Status" name="status">
                    <option value="pending">Pending </option>
                    <option value="in_progress">In_progress</option>
                    <option value="completed">Completed</option>
                </select>
            </div>
            
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>



