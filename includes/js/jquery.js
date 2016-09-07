$.noConflict();
jQuery(document).ready(function(){
  jQuery("button").click(function(){
    jQuery("#show").slideToggle();
  });
});

jQuery(document).ready(function(){
	jQuery('[data-toggle="tooltip"]').tooltip();
});