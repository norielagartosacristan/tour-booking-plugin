<?php
// Handle form submission and save to database
function save_booking_to_database() {
    if (isset($_POST['tour_booking_submit'])) {
        global $wpdb;
        $table_name = $wpdb->prefix . 'tour_bookings';
        
        $full_name = sanitize_text_field($_POST['full_name']);
        $email = sanitize_email($_POST['email']);
        $phone = sanitize_text_field($_POST['phone']);
        $tour_package = sanitize_text_field($_POST['tour_package']);
        $booking_date = sanitize_text_field($_POST['booking_date']);
        $number_of_people = intval($_POST['number_of_people']);

        $wpdb->insert($table_name, [
            'full_name' => $full_name,
            'email' => $email,
            'phone' => $phone,
            'tour_package' => $tour_package,
            'booking_date' => $booking_date,
            'number_of_people' => $number_of_people,
            'created_at' => current_time('mysql')
        ]);

        // Send email notification (if needed)
        send_booking_notification($full_name, $email, $phone, $tour_package, $booking_date, $number_of_people);
    }
}
add_action('init', 'save_booking_to_database');  // Hook to WordPress init to handle form submission
?>