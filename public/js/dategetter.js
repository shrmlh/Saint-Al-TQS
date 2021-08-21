Number.prototype.AddZero= function(b,c){
    var  l= (String(b|| 10).length - String(this).length)+1;
    return l> 0? new Array(l).join(c|| '0')+this : this;
 }//to add zero to less than 10,



var date_setter = {
    set event_dates(num){
        var d = new Date();
        this.localDateTime= [d.getFullYear().AddZero(),
        (d.getMonth()+1).AddZero(),
        d.getDate()+num].join('-') +'T' +
        [d.getHours().AddZero(),
        d.getMinutes().AddZero()].join(':');
    }
};
date_setter.event_dates = 0;
document.getElementById("regstart").value = date_setter.localDateTime;
date_setter.event_dates = 7;
document.getElementById("eventstart").value = date_setter.localDateTime;
date_setter.event_dates = 8;
document.getElementById("eventend").value = date_setter.localDateTime;