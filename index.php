<!DOCTYPE html>
<html>

<head>
    <title>Hobbleclown</title>
    <meta charset="UTF-8" />
    <!-- <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.min.css" rel='stylesheet' /> -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            eventData = [];
            $.getJSON("/calData.json", function(data) {
                eventData = data.events;
                console.log(eventData)
                var calendarEl = document.getElementById("calendar");
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: "dayGridMonth",
                    dateClick: function() {
                        alert("a day has been clicked!");
                    },
                    events: [...eventData]
                });
                calendar.render();
    
                document.getElementById('btn').addEventListener("click", function() {
                    calendar.next();
                })
            })
        });
    </script>
</head>

<body>
    <div id="calendar"></div>
    <button id='btn'>change month</button>
</body>

</html>