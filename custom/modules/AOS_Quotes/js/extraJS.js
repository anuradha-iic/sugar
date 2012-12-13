var myVar2;
myVar2 = setTimeout(function(){timecall2();},2000); 
function timecall2() {

    alert('Kaal');
    clearTimeout(myVar2);
}