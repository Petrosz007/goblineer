const endpoint = "cron/items.json";
const items = [];

const prom = fetch(endpoint)
    .then(blob => blob.json())
    .then(data => items.push(...data));

function findMatches(wordToMatch, items){
    return items.filter(item => {
        const regex = new RegExp(wordToMatch, 'gi');
        return item.name.match(regex);
    });
}


function displayMatches() {
    if(this.value.length > 4){
        const matchArray = findMatches(this.value, items);
        const html = matchArray.slice(0, 30).map(item => {
            const regex = new RegExp(this.value, 'gi');
            return `
            <option value="${item.name}">
            `;
        }).join('');
        suggestions.innerHTML = html;
    }
}

const searchInput = document.querySelector('.search');
const suggestions = document.querySelector('.suggestions');

searchInput.addEventListener('change', displayMatches);
searchInput.addEventListener('keyup', displayMatches);