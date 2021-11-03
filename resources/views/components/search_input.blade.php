<form action="{{ route('films.search') }}" method="GET" class="search-wrapper" autocomplete="off">
	<div class="search-overlay"></div>
    <input type="search" name="q" class="search-input" value="{{ $term ?? '' }}" placeholder="Chercher un film par titre ou genre ..."/>
	<div class="search-suggestions">
		<ul></ul>
        <button type="submit" class="search-the-rest">tous les resultats</a>
	</div>
</form>