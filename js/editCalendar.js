$(document).ready(function() {
    getData();
})

let calData = {};

function getData() {
    $.getJSON("/data.json", function (data) {
        calData = data;
        console.log(calData);
        loadTemplates()
    })
}

function loadTemplates() {
    let templateList = document.querySelector('#templateList');
    templateList.innerHTML = "";

    Object.keys(calData.templates).forEach(key => {
        let item            = calData.templates[key];
        const template      = document.createElement('div');
        template.id         = item.id;
        template.innerHTML  = item.name;
        template.addEventListener("click", () => { loadTemplate(key); }, false);

        templateList.appendChild(template);
    });
}

function loadTemplate(key) {

    $('#template-key').val(key);
    $('#currentTemplate').html(calData.templates[key].name);
    $('#startdate').val(calData.templates[key].startDate)
    $('#enddate').val(calData.templates[key].endDate)

    calData.templates[key].days.forEach(item => {
        let open    = item.day + '_open';
        let opening = item.day + '_opening';
        let last    = item.day + '_last';
        let close   = item.day + '_close';

        if(item.open === 'true') {
            $('#'+open).prop('checked', true);
        }
        else {
            $('#' + open).prop('checked', false);
        }
        $('#'+opening).val(item.openingTime);
        $('#'+last).val(item.lastEntry);
        $('#'+close).val(item.closingTime);
    });

}

function newDay(day) {
    this.day            = day
    this.closingTime    = ""
    this.lastEntry      = ""
    this.open           = "false"
    this.openingTime    = ""
}

function newTemplate(name) {
    this.name = name;
    this.startDate = ''
    this.endDate = ''
    this.id = name
    this.days = []
    let days = ['sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday']
    days.forEach(day => {
        this.days.push(new newDay(day))
    })
}

function addTemplate() {
    var template = new newTemplate($('#templateName').val())
    calData.templates.push(template);
    console.log(calData)
    loadTemplates()
    loadTemplate(calData.templates.length -1)

    $('#createTemplateForm').trigger('reset');
}

function calEvent(templateKey, date) {
    this.start  = formatDate(date)
    this.open   = calData.templates[templateKey].days[date.getDay()].open;
    this.title  = calData.templates[templateKey].days[date.getDay()].openingTime;
}

function saveTemplate() {
    let key = $('#template-key').val();

    calData.templates[key].startDate = $('#startdate').val();
    calData.templates[key].endDate = $('#enddate').val();

    calData.templates[key].days.forEach(item => {
        let open = item.day + '_open';
        let opening = item.day + '_opening';
        let last = item.day + '_last';
        let close = item.day + '_close';

        item.closingTime = $('#'+close).val();
        if($('#'+open).prop('checked') == true) {
            item.open = 'true';
        }
        else {
            item.open = 'false';
        }
        item.openingTime = $('#'+opening).val();
        item.lastEntry = $('#'+last).val();
        
    })

    calData.events = [];
    Object.keys(calData.templates).forEach(key => {
        let newEvents = generateDates(key)
        calData.events = [...calData.events, ...newEvents]
    })
    console.log(calData)
}

function generateDates(key) {
    let eventDates = getDates(new Date(calData.templates[key].startDate), new Date(calData.templates[key].endDate));

    eventObjects = [];
    eventDates.forEach(date => {
        eventObjects.push(new calEvent(key, date));
    });

    eventObjects.forEach(item => {
        calData.events.forEach(date => {
            if (item.start === date.start) {
                const index = calData.events.indexOf(date);
                if (index > -1) {
                    calData.events.splice(index, 1);
                }
                return
            }
        })
    })
    return eventObjects;
}

Date.prototype.addDays = function (days) {
    var dat = new Date(this.valueOf())
    dat.setDate(dat.getDate() + days);
    return dat;
}

function getDates(startDate, stopDate) {
    var dateArray = new Array();
    var currentDate = startDate;
    while (currentDate <= stopDate) {
        dateArray.push(currentDate)
        currentDate = currentDate.addDays(1);
    }
    return dateArray;
}

function formatDate(date) {
    var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2)
        month = '0' + month;
    if (day.length < 2)
        day = '0' + day;

    return [year, month, day].join('-');
}

//add delete template option
//this will remove the template and regenerate all the even times.