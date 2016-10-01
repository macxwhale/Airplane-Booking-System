$.noConflict();
jQuery(document).ready(function(){
  jQuery("button").click(function(){
    jQuery("#show").slideToggle();
  });
});

jQuery( function(){
    jQuery( "#fromDatepicker" ).datepicker();
});

jQuery( function(){
    jQuery( "#toDatepicker" ).datepicker();
})
