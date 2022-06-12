<!DOCTYPE html>
<html>

<head>
    <title>Openening Times Calendar</title>
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
            var mobile = window.matchMedia("(max-width: 875px)")
            $.getJSON("/calData.json", function(data) {
                eventData = data.events;
                console.log(eventData)
                var calendarEl = document.getElementById("calendar");
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: "dayGridMonth",
                    //dateClick: function(info) {
                    //console.log(info.jsEvent.toElement)
                    //add a row in the table below the one your in
                    //you need to add a td with colspan='7'
                    //},
                    eventClick: function(info) {
                        info.jsEvent.preventDefault();
                        let props = info.event.extendedProps;
                        if (props.info) {
                            if (mobile.matches) {
                                var infobox = $(info.el).closest('td')
                                var content = `<td id='infobox' class='w-100' colspan='7'><div class='hob-bg'><span class='position-relative float-right pr-3 text-white' onclick='closeInfoBox()'>x</span><div class='p-4'><h2 class='text-white'>${info.event.title}</h2><p>${props.info}</p></div></div></td>`;
                            } else {
                                var infobox = $(info.el).closest('tr')
                                var content = `<tr id='infobox'><td colspan='7'><div class='hob-bg'><span class='position-relative float-right pr-3 text-white' onclick='closeInfoBox()'>x</span><div class='p-4'><h2 class='text-white'>${info.event.title}</h2><p>${props.info}</p></div></div></div></td></tr>`;
                            }

                            if ($('#infobox')) {
                                $('#infobox').remove()
                            }


                            infobox.after(content);
                            setTimeout(() => {
                                $('#infobox div').css('max-height', '1000px');
                            }, 100);
                        }
                    },
                    headerToolbar: {
                        start: '',
                        center: 'prev,title,next',
                        end: ''
                    },
                    // showNonCurrentDates: false,
                    events: [...eventData, ...data.specialEvents],
                    eventContent: function(data) {
                        let props = data.event.extendedProps;
                        let content = ''
                        if (props.info) {
                            content = `<div class='special-event'><strong>${data.event.title}</strong></div>`
                        } else {
                            if (props.open != 'false') {
                                content = `<strong>${props.openingTime} - ${props.closingTime}</strong>`;
                                content += `<p>Last entry: ${props.lastEntry}</p>`;
                            } else {
                                content = '<strong>Closed</strong>'
                            }
                        }

                        return {
                            html: content
                        }
                    }
                });
                calendar.render();
            })
        });

        function closeInfoBox() {
            $('#infobox div').css('max-height', '0px');
        }
        document.addEventListener("click", function() {
            closeInfoBox()
        });
    </script>
</head>

<body>
    <section id='openingTimesCal'>
        <div id='calControls'>
            <!-- <button id='calPrev'><span></span></button>
            <button id='calNext'><span></span></button> -->
        </div>
        <div id="calendar"></div>
    </section>
</body>

</html>