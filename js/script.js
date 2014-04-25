// JavaScript Document
$(function(e) {		
   var msgData1 = $('.start-time').text();
   var msgData2 = $('.end-time').text();
   var msgData3 = $('.Location').text();

    var icsMSG = "BEGIN:VCALENDAR\nVERSION:2.0\nPRODID:-//Our Company//NONSGML v1.0//EN\nBEGIN:VEVENT\nUID:me@google.com\nDTSTAMP:20120315T170000Z\nATTENDEE;CN=My Self ;RSVP=TRUE:MAILTO:me@gmail.com\nORGANIZER;CN=Me:MAILTO::me@gmail.com\nDTSTART:" + msgData1 +"\nDTEND:" + msgData2 +"\nLOCATION:" + msgData3 + "\nSUMMARY:Our Meeting Office\nEND:VEVENT\nEND:VCALENDAR";
    console.log(icsMSG);

    $('#ical').click(function(){
        window.open( "data:text/calendar;charset=utf8," + escape(icsMSG));
    });

});
// ************ download iCal file



$(document).ready(function(e) {

//Datepicker
var nowTemp = new Date();
var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
 
var checkin = $('#start_date').datepicker({
  onRender: function(date) {
    return date.valueOf() < now.valueOf() ? 'disabled' : '';
  }
}).on('changeDate', function(ev) {
  if (ev.date.valueOf() > checkout.date.valueOf()) {
    var newDate = new Date(ev.date)
    newDate.setDate(newDate.getDate() + 1);
    checkout.setValue(newDate);
  }
  checkin.hide();
  $('#end_date')[0].focus();
}).data('datepicker');
var checkout = $('#end_date').datepicker({
  onRender: function(date) {
    return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
  }
}).on('changeDate', function(ev) {
  checkout.hide();
}).data('datepicker');
//End Datepicker  
  
  
  
$("#add-course-module").click(function(e) {
    var course_module = $(".course-module").first();
	
	$("#wraper").append(course_module.html());
});
        });
		$("#resetme").click(function(e){
	
			$().button('reset');
			});
			
			$(function(){
 
});
			
