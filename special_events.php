<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" rel="stylesheet" type="text/css" media="none" onload="if(media!='all')media='all'" />
    <script src="./js/includes.js"></script>
    <script src="./js/specialEvent.js"></script>
</head>

<body style='overflow-x: scroll'>
    <section class='container-fluid'>
        <div class='row' style='min-height: 100vh'>
            <div class='col-3 bg-light border-right' style='min-height: 100vh'>
                <h4 class='text-center'><u>Events</u></h4>
                <div id='eventList'></div>
            </div>
            <div class='col-9 p-4'>
                <div class='d-flex justify-content-between'>
                    <button id='newBtn' onclick='newEvent()' class='btn btn-success'>New</button>
                    <div>
                        <a href="/" class='btn btn-primary'>View Calendar</a>
                        <button id='saveBtn' onclick='saveEvent()' class='btn btn-primary'>Save</button>

                    </div>
                </div>
                <hr class='my-3' />
                <form class='py-3' id='createEventForm' onsubmit='addSpecialEvent(); return false'>
                    <input type="hidden" id='event-key' value=''>
                    <div class='form-group'>
                        <label for="eventDate">Event Date</label>
                        <input required type="date" id='eventDate' class='form-control'>
                    </div>
                    <div class='form-group'>
                        <label for="eventName">Event Name</label>
                        <input required type="text" id='eventName' class='form-control'>
                    </div>
                    <div class='form-group'>
                        <label for="eventInfo">Event Info</label>
                        <textarea id="eventInfo" class='form-control'></textarea>
                    </div>
                    <div class='form-group'>
                        <input id='saveBtn' value='Add' type="submit" class='btn btn-primary'>
                    </div>
                </form>
            </div>
    </section>
    <style>
        #savedAlert {
            display: none;
        }
    </style>
    <div id='savedAlert' class="alert alert-success text-center fixed-top" role="alert" style='max-width: 400px'>
        Event Saved!
    </div>
</body>

</html>