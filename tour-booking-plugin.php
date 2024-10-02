<?php
/*
Plugin Name: Tour Booking Plugin
Description: A simple tour booking plugin.
Version: 1.0
*/

// Add the admin menu for bookings
require_once plugin_dir_path(__FILE__) . 'admin-booking-management.php';

// Handle form submission
require_once plugin_dir_path(__FILE__) . 'form-handler.php';

// Add shortcodes for the booking form
function tour_booking_form_shortcode() {
    ob_start();
    include 'booking-form.php';  // Assuming you have a form file
    return ob_get_clean();
}
add_shortcode('tour_booking_form', 'tour_booking_form_shortcode');
?>