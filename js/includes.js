function saveToFile(deleted) {
    //ajax call to save json to file
    $.ajax({
        url: './ajax.php',
        method: 'post',
        data: { 'saveJSON': 1, 'calData': JSON.stringify(calData) },
        beforeSend: function () {
            $('#saveBtn').html("<div class='spinner-border' role='status'><span class='sr-only'>Loading...</span ></div >");
        },
        success: function (data) {
            $('#saveBtn').html("Save")
            console.log(data)
            if (!deleted) {
                $('#savedAlert').fadeIn();
                setTimeout(() => {
                    $('#savedAlert').fadeOut();
                }, 2000);
            }
        }
    })
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