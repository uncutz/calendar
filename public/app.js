import Api from "./app/api.js";

export default function App() {

    this.run = function () {


        Api.getAllEntries().then(
            data => {
                console.log(data)
                data.entries.forEach(
                    entry => {
                        console.log(entry)
                        $('#calendar').evoCalendar('addCalendarEvent', {
                            id: entry.id,
                            name: entry.name,
                            description: entry.content,
                            date: entry.entryDate,
                            type: (entry.type ? entry.type : '')
                        })
                    }
                )
            }
        )

        console.log($('#calendar').evoCalendar('getActiveDate'))
        document.querySelector('.js-submit').addEventListener('click', function () {

            collectEntryData();

            function collectEntryData() {

                const entry = {
                    id: 0,
                    name: document.getElementById('name').value,
                    content: document.getElementById('note').value,
                    type: document.getElementById('type').value,
                    date: document.getElementById('date').value
                }
                Api.saveEntry(entry)
                    .then(data => {
                            console.log(data)
                            $('#calendar').evoCalendar('addCalendarEvent', {
                                id: data.entry.id,
                                name: data.entry.name,
                                description: data.entry.content,
                                date: data.entry.entryDate,
                                type: data.entry.type
                            })
                        }
                    )
            }
        })
    }
}