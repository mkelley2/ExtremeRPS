$(document).ready(function(){
  $('input[name=choice1]').click(function(){
    $('.check1').show();
    $('.check1').parent().attr('class', "checkColor");
  });
  
  $('input[name=choice2]').click(function(){
    $('.check2').show();
    $('.check2').parent().attr('class', "checkColor");
  });
  
  $('btn').click(function(){
    $('.check1').hide();
    $('.check2').hide();
    
  });
  
  
});