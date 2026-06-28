@vite(['resources/css/app.css', 'resources/js/app.js'])
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h1 class="h3 mb-4">{{ $title }}</h1>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form id="allergeenFormEdit" action="{{ route('allergeen.update', $allergeen->Id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="Naam" class="form-label">Naam</label>
                                <input type="text" name="Naam" id="Naam" class="form-control" value="{{ old('Naam', $allergeen->Naam) }}" required maxlength="100">
                                <div class="form-text">Voer maximaal 50 karakters voor de naam in.</div>
                                <div id="clientErrorEdit" class="alert alert-danger mt-2 d-none" role="alert"></div>
                            </div>

                            <div class="mb-3">
                                <label for="Omschrijving" class="form-label">Omschrijving</label>
                                <textarea name="Omschrijving" id="Omschrijving" class="form-control" rows="4" required maxlength="255">{{ old('Omschrijving', $allergeen->Omschrijving) }}</textarea>
                                <div class="form-text">Noteer hier de omschrijving van het allergeen.</div>
                            </div>

                            <button type="submit" class="btn btn-primary">Opslaan</button>
                            <a href="{{ route('allergeen.index') }}" class="btn btn-secondary ms-2">Annuleren</a>
                        </form>

                        <script>
                            (function() {
                                const form = document.getElementById('allergeenFormEdit');
                                const naam = document.getElementById('Naam');
                                const clientError = document.getElementById('clientErrorEdit');

                                form.addEventListener('submit', function(e) {
                                    if (naam.value.trim().length > 50) {
                                        e.preventDefault();
                                        clientError.textContent = 'De naam mag maximaal 50 karakters bevatten.';
                                        clientError.classList.remove('d-none');
                                        naam.focus();
                                    }
                                });
                            })();
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
