import API from "./app/API.js";

export default function App() {

    this.run = function () {

        document.querySelector('.js-submit').addEventListener('click', function () {

            /*$('#calendar').evoCalendar('addCalendarEvent', {
                id: 'vcdxmcemx',
                name: document.getElementById('name').value,
                description: document.getElementById('note').value,
                date: document.getElementById('date').value,
                type: document.getElementById('type').value
            })*/
            collectEntryData();

            function collectEntryData() {

                const entry = {
                    id: 'vcdxmcemx',
                    name: document.getElementById('name').value,
                    description: document.getElementById('note').value,
                    date: document.getElementById('date').value,
                    type: document.getElementById('type').value
                }
                console.log(entry)
                API.saveEntry(entry)
                    .then(data => console.log(data))
            }
        })
    }
}
//'October 27, 2021'