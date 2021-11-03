require('./bootstrap');

/**
 * Modal
 */


 const filmModal = document.querySelector('.film-modal');
 const modalOverlay = document.querySelector('.modal-overlay');
 const modalBody = document.querySelector('.modal-body');

 function showFilmModal(id) {
	axios.get('/films/' + id)
    .then(function (response) {
        const item = response.data.data;
        modalBody.innerHTML = `<img src="${item.image_url}" alt="image du film"/><h3>${item.titre}</h3><small>${item.genre}</small>`;
        filmModal.style.display = 'flex';
    })
    .catch(function (error) {
        console.log(error);
    });
 }

 function closeFilmModal() {
    filmModal.style.display = 'none';
 }

 modalOverlay.addEventListener('click', closeFilmModal);

/**
 * AutoComplete
 */
const searchInput = document.querySelector('.search-input');
const searchOverlay = document.querySelector('.search-overlay');
const searchWrap = document.querySelector('.search-wrapper');
const suggestionsList = document.querySelector('.search-suggestions ul');
const suggestionsListItems = document.querySelector('.search-suggestions ul li');

function search(str) {
	axios.post('/films/autocomplete', {q: str})
    .then(function (response) {
	    showSuggestions(response.data.data, str);
    })
    .catch(function (error) {
        console.log(error);
    });
}

function searchHandler(e) {
	const inputVal = e.currentTarget.value;
	if (inputVal.length > 0) {
		search(inputVal);
	} else {
		dismissSuggestions();
    }
}

function dismissSuggestions() {
    suggestionsList.innerHTML = '';
    searchWrap.classList.remove('has-suggestions');
}

function showSuggestions(results, inputVal) {
    
    suggestionsList.innerHTML = '';

	if (results.length > 0) {
		for (i = 0; i < results.length; i++) {
			let item = results[i];
            let node = document.createElement('li');
            node.dataset.id = item.id;
            node.innerHTML = `${item.titre} - <small>${item.genre}</small>`;
            node.onclick = useSuggestion;
			suggestionsList.appendChild(node);
		}
		searchWrap.classList.add('has-suggestions');
	} else {
		dismissSuggestions();
	}
}

function useSuggestion(e) {
    showFilmModal(e.target.dataset.id);
    dismissSuggestions();
}

searchInput.addEventListener('keyup', searchHandler);
searchInput.addEventListener('focus', searchHandler);
searchOverlay.addEventListener('click', dismissSuggestions);