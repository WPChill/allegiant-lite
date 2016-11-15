jQuery(document).ready(function () {
    var allegiant_aboutpage = allegiantWelcomeScreenCustomizerObject.aboutpage;
    var allegiant_nr_actions_required = allegiantWelcomeScreenCustomizerObject.nr_actions_required;

    /* Number of required actions */
    if ((typeof allegiant_aboutpage !== 'undefined') && (typeof allegiant_nr_actions_required !== 'undefined') && (allegiant_nr_actions_required != '0')) {
        jQuery('#accordion-section-themes .accordion-section-title').append('<a href="' + allegiant_aboutpage + '"><span class="allegiant-actions-count">' + allegiant_nr_actions_required + '</span></a>');
    }


});
