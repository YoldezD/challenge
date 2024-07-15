<div class="container">
    <h1>Search History for Brand: {{ $brand->name }}</h1>

    <ul class="list-group mt-4">
        @forelse ($searchHistories as $history)
            <li class="list-group-item">
                <strong>Search Query:</strong> {{ $history->search_query }}
                <br>
                <small>Searched At: {{ $history->created_at }}</small>
            </li>
        @empty
            <li class="list-group-item">No search history found.</li>
        @endforelse
    </ul>
</div>
