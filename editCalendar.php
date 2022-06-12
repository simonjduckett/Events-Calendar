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
    <!-- <script src="/js/editCalendar.js"></script> -->
    <script src="./js/includes.js"></script>
    <script src="./js/editCalendar.js"></script>
    <title>Edit Calendar</title>
</head>

<body style='overflow-x: scroll'>
    <section class='container-fluid'>
        <div class='row' style='min-height: 100vh'>
            <div class='col-3 bg-light border-right' style='min-height: 100vh'>
                <div id='createTemplate'>
                    <form class='py-3' id='createTemplateForm' onsubmit='addTemplate(); return false'>
                        <div class='input-group'>
                            <input required type="text" id='templateName' class='form-control' placeholder="template name">
                            <div class='input-group-append'>
                                <input value='Add' type="submit" class='btn btn-primary'>
                            </div>
                        </div>
                    </form>
                </div>
                <h4 class='text-center'><u>Templates</u></h4>
                <div id='templateList'></div>
            </div>
            <div class='col-9 p-4'>
                <div class='d-flex justify-content-between'>
                    <h4>Current Template</h4>
                    <button id='saveBtn' onclick="saveTemplate()" class='btn btn-success ml-auto'>Save</button>
                </div>
                <p id='currentTemplate'>Choose Template</p>
                <hr />
                <form id='templateForm'>
                    <input type="hidden" id='template-key'>
                    <div class='row'>
                        <div class='col-3'>
                            <b class='d-block'>From</b>
                            <p>Start of the season</p>
                        </div>
                        <div class='col-9'>
                            <input type="date" name='startdate' id='startdate'>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-3'>
                            <b class='d-block'>To</b>
                            <p>End of the season</p>
                        </div>
                        <div class='col-9'>
                            <input type="date" name='enddate' id='enddate'>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-3'>
                            <b class='d-block'>Opening Times</b>
                        </div>
                        <div class='col-9'>
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#sunday" aria-expanded="true" aria-controls="sunday">
                                                Sunday
                                            </button>
                                        </h2>
                                    </div>

                                    <div id="sunday" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="form-group form-check">
                                                <input type="checkbox" class="form-check-input" id="sunday_open">
                                                <label class="form-check-label" for="sunday_open"><b>Open</b></label>
                                            </div>
                                            <div class="form-group">
                                                <label for="sunday_opening">Opening Time</label>
                                                <input type="text" class="form-control" id="sunday_opening">
                                            </div>
                                            <div class="form-group">
                                                <label for="sunday_last">Last Entry</label>
                                                <input type="text" class="form-control" id="sunday_last">
                                            </div>
                                            <div class="form-group">
                                                <label for="sunday_close">Closing Time</label>
                                                <input type="text" class="form-control" id="sunday_close">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingTwo">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#monday" aria-expanded="false" aria-controls="monday">
                                                Monday
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="monday" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="form-group form-check">
                                                <input type="checkbox" class="form-check-input" id="monday_open">
                                                <label class="form-check-label" for="monday_open"><b>Open</b></label>
                                            </div>
                                            <div class="form-group">
                                                <label for="monday_opening">Opening Time</label>
                                                <input type="text" class="form-control" id="monday_opening">
                                            </div>
                                            <div class="form-group">
                                                <label for="monday_last">Last Entry</label>
                                                <input type="text" class="form-control" id="monday_last">
                                            </div>
                                            <div class="form-group">
                                                <label for="monday_close">Closing Time</label>
                                                <input type="text" class="form-control" id="monday_close">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingThree">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#tuesday" aria-expanded="false" aria-controls="tuesday">
                                                Tuesday
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="tuesday" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="form-group form-check">
                                                <input type="checkbox" class="form-check-input" id="tuesday_open">
                                                <label class="form-check-label" for="tuesday_open"><b>Open</b></label>
                                            </div>
                                            <div class="form-group">
                                                <label for="tuesday_opening">Opening Time</label>
                                                <input type="text" class="form-control" id="tuesday_opening">
                                            </div>
                                            <div class="form-group">
                                                <label for="tuesday_last">Last Entry</label>
                                                <input type="text" class="form-control" id="tuesday_last">
                                            </div>
                                            <div class="form-group">
                                                <label for="tuesday_close">Closing Time</label>
                                                <input type="text" class="form-control" id="tuesday_close">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingThree">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#wednesday" aria-expanded="false" aria-controls="wednesday">
                                                Wednesday
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="wednesday" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="form-group form-check">
                                                <input type="checkbox" class="form-check-input" id="wednesday_open">
                                                <label class="form-check-label" for="wednesday_open"><b>Open</b></label>
                                            </div>
                                            <div class="form-group">
                                                <label for="wednesday_opening">Opening Time</label>
                                                <input type="text" class="form-control" id="wednesday_opening">
                                            </div>
                                            <div class="form-group">
                                                <label for="wednesday_last">Last Entry</label>
                                                <input type="text" class="form-control" id="wednesday_last">
                                            </div>
                                            <div class="form-group">
                                                <label for="wednesday_close">Closing Time</label>
                                                <input type="text" class="form-control" id="wednesday_close">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingThree">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#thursday" aria-expanded="false" aria-controls="thursday">
                                                Thursday
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="thursday" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="form-group form-check">
                                                <input type="checkbox" class="form-check-input" id="thursday_open">
                                                <label class="form-check-label" for="thursday_open"><b>Open</b></label>
                                            </div>
                                            <div class="form-group">
                                                <label for="thursday_opening">Opening Time</label>
                                                <input type="text" class="form-control" id="thursday_opening">
                                            </div>
                                            <div class="form-group">
                                                <label for="thursday_last">Last Entry</label>
                                                <input type="text" class="form-control" id="thursday_last">
                                            </div>
                                            <div class="form-group">
                                                <label for="thursday_close">Closing Time</label>
                                                <input type="text" class="form-control" id="thursday_close">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingThree">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#friday" aria-expanded="false" aria-controls="friday">
                                                friday
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="friday" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="form-group form-check">
                                                <input type="checkbox" class="form-check-input" id="friday_open">
                                                <label class="form-check-label" for="friday_open"><b>Open</b></label>
                                            </div>
                                            <div class="form-group">
                                                <label for="friday_opening">Opening Time</label>
                                                <input type="text" class="form-control" id="friday_opening">
                                            </div>
                                            <div class="form-group">
                                                <label for="friday_last">Last Entry</label>
                                                <input type="text" class="form-control" id="friday_last">
                                            </div>
                                            <div class="form-group">
                                                <label for="friday_close">Closing Time</label>
                                                <input type="text" class="form-control" id="friday_close">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingThree">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#saturday" aria-expanded="false" aria-controls="saturday">
                                                Saturday
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="saturday" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="form-group form-check">
                                                <input type="checkbox" class="form-check-input" id="saturday_open">
                                                <label class="form-check-label" for="saturday_open"><b>Open</b></label>
                                            </div>
                                            <div class="form-group">
                                                <label for="saturday_opening">Opening Time</label>
                                                <input type="text" class="form-control" id="saturday_opening">
                                            </div>
                                            <div class="form-group">
                                                <label for="saturday_last">Last Entry</label>
                                                <input type="text" class="form-control" id="saturday_last">
                                            </div>
                                            <div class="form-group">
                                                <label for="saturday_close">Closing Time</label>
                                                <input type="text" class="form-control" id="saturday_close">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </section>
    <style>
        #savedAlert {
            display: none;
        }
    </style>
    <div id='savedAlert' class="alert alert-success text-center fixed-top" role="alert" style='max-width: 400px'>
        Template Saved!
    </div>
</body>

</html>