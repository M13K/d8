(function($, Drupal, drupalSettings) {
// Your code...
// // New behavior
    Drupal.behaviors.myBehave = {
        attach: function (context) {
            $('#tabs').tabs();
        }
    }
})(jQuery, Drupal, drupalSettings);