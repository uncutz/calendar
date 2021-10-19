function saveEntry(entry) {
    return fetch('/server.php', {
            method: 'POST',
            headers: {
                'Content-type': 'application/json'
            },
            body: JSON.stringify(entry)
        }
    ).then(response => response.json());
}

const API = {
    saveEntry
}

export default API