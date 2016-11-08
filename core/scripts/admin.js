jQuery(document).ready(function(){
    
	/* IMAGE LIST FIELD */
	//Change border color when selecting the image
    jQuery('.cpotheme-imagelist-item img').click(function() {
        
        //Change other borders
        var parent = jQuery(this).parent().parent();
        jQuery(parent).find('img').each(function() {
            jQuery(this).removeClass('cpotheme-imagelist-selected');
        });
        
        //Selected image
        jQuery(this).addClass('cpotheme-imagelist-selected');        
    });
	
	
	/* ICON LIST FIELD */
	//Change border color when selecting the image
    jQuery('.cpotheme-iconlist label').click(function() {
        
        //Change other borders
        var parent = jQuery(this).parent().parent();
        jQuery(parent).find('label').each(function() {
            jQuery(this).removeClass('cpotheme-iconlist-selected');
        });
        
        //Selected image
        jQuery(this).addClass('cpotheme-iconlist-selected');        
    });
	
});