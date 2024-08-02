<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le Projet</title>
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
        <form action="{{ route('update.project', $projet->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label for="name" class="form-label">Nom</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $projet->name) }}" required>
                @if($errors->has('name'))
                    <div class="error-message">{{ $errors->first('name') }}</div>
                @endif
            </div>


            
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description">{{ old('description', $projet->description) }}</textarea>
                @if($errors->has('description'))
                    <div class="error-message">{{ $errors->first('description') }}</div>
                @endif
            </div>
            
            <div class="mb-3">
                <label for="start_date" class="form-label">Date de début</label>
                <input type="date" class="form-control" id="start_date" name="start_date" value="{{ old('start_date', $projet->start_date) }}" required>
                @if($errors->has('start_date'))
                    <div class="error-message">{{ $errors->first('start_date') }}</div>
                @endif
            </div>
            
            <div class="mb-3">
                <label for="end_date" class="form-label">Date de fin</label>
                <input type="date" class="form-control" id="end_date" name="end_date" value="{{ old('end_date', $projet->end_date) }}" required>
                @if($errors->has('end_date'))
                    <div class="error-message">{{ $errors->first('end_date') }}</div>
                @endif
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
