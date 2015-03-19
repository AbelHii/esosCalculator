/**
 *  @author: Abel Hii
 *  @date: 19/03/2015
 */
//only allows numbers to be input
function isNumber(evt)
{
   var charCode = (evt.which) ? evt.which : evt.keyCode;
   if (charCode !== 46 && charCode > 31 
     && (charCode < 48 || charCode > 57))
      return false;

   return true;
}
//where num is the max value you allow the user to input
function maxVal(input, max)
{
    if(input.value < 0){input.value = 0;}
    if(input.value > max){input.value = max;}
}
/*
function swapHeading(word){
    document.getElementById('heading').innerHTML = word;
}*/