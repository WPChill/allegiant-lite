jQuery(document).ready(function () {

    /* If there are required actions, add an icon with the number of required actions in the About allegiant page -> Actions required tab */
    var allegiant_nr_actions_required = allegiantWelcomeScreenObject.nr_actions_required;

    if ((typeof allegiant_nr_actions_required !== 'undefined') && (allegiant_nr_actions_required != '0')) {
        jQuery('li.allegiant-w-red-tab a').append('<span class="allegiant-actions-count">' + allegiant_nr_actions_required + '</span>');
    }

    /* Dismiss required actions */
    jQuery(".allegiant-dismiss-required-action").click(function () {

        var id = jQuery(this).attr('id');
        jQuery.ajax({
            type: "GET",
            data: {action: 'allegiant_dismiss_required_action', dismiss_id: id},
            dataType: "html",
            url: allegiantWelcomeScreenObject.ajaxurl,
            beforeSend: function (data, settings) {
                jQuery('.allegiant-tab-pane#actions_required h1').append('<div id="temp_load" style="text-align:center"><img src="' + allegiantWelcomeScreenObject.template_directory + '/inc/admin/welcome-screen/img/ajax-loader.gif" /></div>');
            },
            success: function (data) {
                location.reload();
                jQuery("#temp_load").remove();
                /* Remove loading gif */
                jQuery('#' + data).parent().slideToggle().remove();
                /* Remove required action box */
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR + " :: " + textStatus + " :: " + errorThrown);
            }
        });
    });
});
