function event_progress(startDate, endDate, incrementor){
    var start = new Date(startDate),
    end = new Date(endDate),
    today = new Date(), 
    p = Math.round(((today - start) / (end - start)) * 100);
    percentage = p + '%';
    // for progress
    if (today>start){
        if(p<=0){
            $('#progressor'+incrementor).css("width", "0%");
        }
        else if (p>0 && p<100){
            $('#progressor'+incrementor).css("width", percentage);
        }
        else if(p>=100){
            $('#progressor'+incrementor).css("width", "100%").after().append("100%");
        }
    }
    else if (today<start){
        $('#progressor'+incrementor).css("width", "0%");
    }
}

function progress(regDate, startDate, endDate, progressStatus, incrementor){
    // for status color
    if (progressStatus === 'Open'){
        $('#progressor'+incrementor).addClass("progress-bar-striped progress-bar-animated bg-success");
        $('#progressStatus'+incrementor).addClass("bg-success");
        event_progress(regDate, startDate, incrementor);
    }
    else if (progressStatus === 'Closed'){
        $('#progressor'+incrementor).css("width", "100%").after().append("Closed");
        $('#progressor'+incrementor).addClass("bg-dark");
        $('#progressStatus'+incrementor).addClass("bg-dark");
    }
    else if (progressStatus === 'Ongoing'){
        $('#progressor'+incrementor).addClass("progress-bar-striped progress-bar-animated bg-warning");
        $('#progressStatus'+incrementor).addClass("bg-warning");
        event_progress(startDate, endDate, incrementor);
    }
    else if (progressStatus === 'Cancelled'){
        $('#progressor'+incrementor).css("width", "100%").after().append("Cancelled");
        $('#progressor'+incrementor).addClass("bg-danger");
        $('#progressStatus'+incrementor).addClass("bg-danger");
    }
    else if (progressStatus === 'Completed'){
        $('#progressor'+incrementor).css("width", "100%").after().append("Completed");
        $('#progressor'+incrementor).addClass("bg-primary");
        $('#progressStatus'+incrementor).addClass("bg-primary");
    }
}

eventCount = document.getElementById('event_count').value;

for (let i = 0; i < eventCount; i++) {
    regDate = document.getElementById('reg_start'+(i+1)).value;
    startedDate = document.getElementById('event_start'+(i+1)).value;
    endedDate = document.getElementById('event_end'+(i+1)).value;
    progStatus = document.getElementById('event_status'+(i+1)).value;
    progress(regDate, startedDate, endedDate, progStatus, (i+1));
}

