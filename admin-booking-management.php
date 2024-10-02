<?php
// Add admin menu for bookings
function add_bookings_admin_menu() {
    add_menu_page(
        'Tour Bookings',  // Page title
        'Tour Bookings',  // Menu title
        'manage_options', // Capability
        'tour-bookings',  // Menu slug
        'display_bookings_page', // Callback function
        'dashicons-clipboard',   // Icon
        20                      // Position
    );
}
add_action('admin_menu', 'add_bookings_admin_menu');

// Display bookings page content
function display_bookings_page() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'tour_bookings';  // Your bookings table
    $bookings = $wpdb->get_results("SELECT * FROM $table_name");

    echo '<h1>Tour Bookings</h1>';
    if ($bookings) {
        echo '<table><thead><tr><th>ID</th><th>Full Name</th><th>Email</th></tr></thead><tbody>';
        foreach ($bookings as $booking) {
            echo '<tr><td>' . esc_html($booking->id) . '</td>';
            echo '<td>' . esc_html($booking->full_name) . '</td>';
            echo '<td>' . esc_html($booking->email) . '</td></tr>';
            echo '<td>' . esc_html($booking->phone) . '</td></tr>';
        }
        echo '</tbody></table>';
    } else {
        echo '<p>No bookings found.</p>';
    }
}
?>