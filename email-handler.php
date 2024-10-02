<?php

function send_booking_notification($full_name, $email, $phone, $tour_package, $booking_date, $number_of_people) {
    // Send email to admin
    $to = get_option('admin_email');
    $subject = "New Tour Booking";
    $message = "Booking details:\n\n" .
               "Name: $full_name\n" .
               "Email: $email\n" .
               "Tour: $tour_package\n" .
               "Date: $booking_date\n" .
               "People: $number_of_people\n";

    wp_mail($to, $subject, $message);

    // Send confirmation email to customer
    $customer_subject = "Your Booking Confirmation";
    $customer_message = "Thank you for booking $tour_package.\nWe look forward to your visit.";
    wp_mail($email, $customer_subject, $customer_message);
}
?>