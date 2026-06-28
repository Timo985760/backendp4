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
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h1 class="mb-0">{{ $title }}</h1>
            <a href="{{ route('allergeen.create') }}" class="btn btn-primary">Nieuw allergeen</a>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card shadow-sm">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Naam</th>
                                <th>Omschrijving</th>
                                <th class="text-end">Acties</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($allergenen as $allergeen)
                                <tr>
                                    <td>{{ $allergeen->Naam }}</td>
                                    <td>{{ $allergeen->Omschrijving }}</td>
                                    <td class="text-end">
                                        <a href="{{ route('allergeen.edit', $allergeen->Id) }}" class="btn btn-sm btn-success me-2">Wijzig</a>
                                        <form action="{{ route('allergeen.destroy', $allergeen->Id) }}" method="POST" class="d-inline" onsubmit="return confirm('Weet je zeker dat je dit allergeen wilt verwijderen?');">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger">Verwijderen</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3">Geen allergenen gevonden</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="mt-4">
            <a href="/" class="btn btn-link">Terug naar de homepage</a>
        </div>
    </div>
</body>
</html>
