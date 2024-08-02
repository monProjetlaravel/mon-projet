<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container my-4">
    <h1>Tableau de bord</h1>
	        <nav class="menu">
            <h3>
                <ul>
                    <a href="projects/">Projets</a><br>
                    <a href="tasks/">Tâches</a>
                </ul>
            </h3>
        </nav>
    <!-- Filtre par projet et statut -->
    <div >
        <form action="{{ route('filterByTask.project') }}" method="GET">
            <div class="form-row">
                <div class="col-md-4">
                    <label for="project_filter">Filtre par Projet</label>
                    <select class="form-control" id="project_filter" name="project_filter">
                        @foreach ($projets as $projet )
                            <option value="{{$projet->id}}">{{$projet->name}}</option>
                         @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="status_filter">Filtrer par Status</label>
                    <select class="form-control" id="status_filter" name="status_filter">
                    <option value="Pending">Pending</option>   
                    <option value="In_progress">In_progress</option>
                    <option value="Completed">Completed</option>   
                    </select>
                </div>
            </div>
        <button type="button" class="btn btn-primary">Filter</button>
    </div>

    <!-- Liste des projets et des tâches -->
     @foreach ($projets as $projet )
     <div class="card mb-4" data-project-id="1">
        <div class="card-header">
            <h4>Projet: {{ $projet->name }}</h4>
        </div>
        <div class="card-body">
            <p>Description: {{ $projet->description }}</p>
            <ul class="list-group">
                @foreach ($projet->tasks as $task )
                <li class="list-group-item d-flex justify-content-between align-items-center" data-status="pending">
                    <span>
                        <p>Titre</p>
                        <strong>{{ $task->title }}</strong>
                    </span>
                    <span class="badge badge-secondary">{{ $task->status }}</span>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
     @endforeach


</div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>