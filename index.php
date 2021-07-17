<!DOCTYPE html>
<html>

<head>
    <title>Hobbleclown</title>
    <meta charset="UTF-8" />
    <!-- <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.min.css" rel='stylesheet' /> -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.min.css" rel="stylesheet" />
    <link href="/css/hobbleCal.css" rel='stylesheet' />
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.min.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700&display=swap" rel="stylesheet">
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            eventData = [];
            $.getJSON("/calData.json", function(data) {
                eventData = data.events;
                console.log(eventData)
                var calendarEl = document.getElementById("calendar");
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: "dayGridMonth",
                    // dateClick: function() {
                    //     alert("a day has been clicked!");
                    // },
                    headerToolbar: false,
                    // showNonCurrentDates: false,
                    events: [...eventData],
                    eventContent: function(data) {
                        let props = data.event.extendedProps;
                        let content = ''
                        if (props.open != 'false') {
                            content = `<strong>${props.openingTime} - ${props.closingTime}</strong>`;
                            content += `<p>Last entry: ${props.lastEntry}</p>`;
                        } else {
                            content = '<strong>Closed</strong>'
                        }

                        return {
                            html: content
                        }
                    }
                });
                calendar.render();

                document.getElementById('calNext').addEventListener("click", function() {
                    calendar.next();
                })
                document.getElementById('calPrev').addEventListener("click", function() {
                    calendar.prev();
                })
            })
        });
    </script>
</head>

<body>
    <section id='openingTimesCal'>
        <div id='calControls'>
            <button id='calPrev'><span></span></button>
            <button id='calNext'><span></span></button>
        </div>
        <div id="calendar"></div>
    </section>
</body>

</html>