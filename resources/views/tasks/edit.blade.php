<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier la Tache</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .error-message {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <form action="{{ route('update.task', $task->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label for="projet_id" class="form-label">Projet_id</label>                
                <select class="form-control" id="project_id" name="projet_id" required>
                @foreach($projets as $projet)
                    <option value="{{ $projet->id }}" {{ isset($task) && $task->projet_id == $projet->id ? 'selected' : '' }}>
                        {{ $projet->name }}
                    </option>
                @endforeach
            </select>
                @if($errors->has('projet_id'))
                    <div class="error-message">{{ $errors->first('projet_id') }}</div>
                @endif            
            </div>
            <div class="mb-3">
                <label for="Titre" class="form-label">Titre</label>
                <input type="text" class="form-control" id="Titre" name="title" value="{{$task->title}}" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description">{{ old('description', $task->description) }}</textarea>
                @if($errors->has('description'))
                    <div class="error-message">{{ $errors->first('description') }}</div>
                @endif
            </div>
            <div class="mb-3">
                <label for="statut" class="form-label">Status</label>
                <select class="form-control" id="Status" name="status">
                    <option value="pending">Pending </option>
                    <option value="in_progress">In_progress</option>
                    <option value="completed">Completed</option>
                </select>
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Mettre à jour</button>
            </div>
        </form>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
