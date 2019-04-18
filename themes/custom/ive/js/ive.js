(function($, Drupal, drupalSettings) {
    Drupal.behaviors.externalLink = {
        attach: function (context, settings) {
            $("a[href^='http']", context, settings).attr('_target', 'blank');
        }
    }
    Drupal.behaviors.ive_node_externalLink = {
        attach: function (context, settings) {
            $(".node a[href^='http']", context, settings).addClass('node_externalLink');
        }
    }
    Drupal.behaviors.ive_block_squeeze = {
        attach: function (context, settings) {
            $(".sidebar .block h2", context, settings).click(function () {
                $(this).siblings('.content').toggle();
            });
        }
    }
})(jQuery, Drupal, drupalSettings);