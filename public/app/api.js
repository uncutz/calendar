function saveEntry(entry) {
    return fetch('/save', {
            method: 'POST',
            headers: {
                'Content-type': 'application/json'
            },
            body: JSON.stringify(entry)
        }
    ).then(response => response.json());
}

function getAllEntries() {
    return fetch('/allEntries')
        .then(response => response.json())
}

const Api = {
    saveEntry,
    getAllEntries
}

export default Api