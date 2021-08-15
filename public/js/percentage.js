function event_progress(startDate, endDate, incrementor){
    var start = new Date(startDate),
    end = new Date(endDate),
    today = new Date(), 
    p = Math.round(((today - start) / (end - start)) * 100);
    percentage = p + '%';
    if (today>start && start<end){
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


eventCount = document.getElementById('event_count').value;

for (let i = 0; i < eventCount; i++) {
    startedDate = document.getElementById('event_start'+(i+1)).value;
    endedDate = document.getElementById('event_end'+(i+1)).value;
    event_progress(startedDate, endedDate, (i+1));
}

