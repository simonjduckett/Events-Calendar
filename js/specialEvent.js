$(document).ready(function () {
    getData();
})

let calData = {};

function getData() {
    $.getJSON("ajax.php?getJSON=1", function (data) {
        calData = data;
        console.log(calData);
        loadSpecialEvents()
    })
}

function loadSpecialEvents(){
    let eventList = document.querySelector('#eventList');
    eventList.innerHTML = "";

    Object.keys(calData.specialEvents).forEach(key => {
        let item = calData.specialEvents[key];
        const event = document.createElement('div');
        event.classList.add('d-flex', 'justify-content-between', 'border-bottom', 'py-3');
        event.innerHTML = item.title;

        eventList.appendChild(event);

        const edit = document.createElement('span');
        edit.classList.add('ml-auto');
        edit.innerHTML = '<i class="far fa-edit text-secondary"></i>';
        edit.addEventListener("click", () => { loadEvent(key); }, false)
        event.appendChild(edit);

        const del = document.createElement('span');
        del.innerHTML = '<i class="fas fa-trash-alt text-danger px-3"></i>';
        del.addEventListener("click", () => { deleteEvent(key); }, false)
        event.appendChild(del);
    });
}

function specialEvent(date, name, info){
    this.start = formatDate(date);
    this.title = name;
    this.extendedProps = {
        info: info
    }
}

function addSpecialEvent(){
    let key = $('#event-key').val();
    if(key != '') {
        alert('please finish editing current or click New')
        return false;
    }
    let eventDate = $('#eventDate').val();
    let eventName = $('#eventName').val();
    let eventInfo = $('#eventInfo').val();

    calData.specialEvents.push(new specialEvent(eventDate, eventName, eventInfo));
    saveToFile();
    loadSpecialEvents();
    newEvent();
}

function deleteEvent(key) {
    let deleteEvent = confirm('Are you sure you want to delete this event?');

    if (deleteEvent) {
        calData.specialEvents.splice(key, 1);
        loadSpecialEvents()
        //$('#template-key').val('');
        $('#createEventForm').trigger('reset')
        //$('#currentTemplate').html('Choose Template');
        saveToFile(true);
    }
}

function loadEvent(key) {

    if (calData.specialEvents[key]) {
        $('#event-key').val(key);
        $('#eventDate').val(calData.specialEvents[key].start);
        $('#eventInfo').val(calData.specialEvents[key].extendedProps.info)
        $('#eventName').val(calData.specialEvents[key].title)
    }

}

function saveEvent() {
    let key = $('#event-key').val();
    if (key) {
        calData.specialEvents[key].title = $('#eventName').val();
        calData.specialEvents[key].extendedProps.info = $('#eventInfo').val();
        calData.specialEvents[key].start = $('#eventDate').val();

        saveToFile();
    }
    else {
        alert('Please select an Event to edit before saving')
    }

}

function newEvent(){
    let key = $('#event-key').val('');
    $('#eventName').val('');
    $('#eventInfo').val('');
    $('#eventDate').val('');
}