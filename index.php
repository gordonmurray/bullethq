<?php

require_once('src/bullethq.php');
require_once('credentials.inc.php');

$bullet = new \bullethq\bullethq($username, $password);

// $clients = $bullet->get('clients'); // to receive a list of all existing clients

// $client = $bullet->get('clients', '12345'); // to receive the details attached to a specific client

// $invoices = $bullet->get('invoices'); // to receive all existing invoices

// $invoice = $bullet->get('invoices', '12345'); // to receive a specific invoice

// $suppliers = $bullet->get('suppliers'); // to receive all existing suppliers

// $supplier = $bullet->get('suppliers', '12345'); // to receive a specific suppier

/*
$new_client_data = array(
    "name" => "Gordon Test 3",
    "addressLine1" => "address 1",
    "addressLine2" => "address 2",
    "email" => "gordon@murrion.com",
    "phoneNumber" => "123456789",
    "vatNumber" => "ei23456",
    "country" => "Ireland"
);
*/

// $new_client = $bullet->post('clients', $new_client_data);

/*
$new_invoice_data = array(
    "clientName" => "Sample Client Name",
    "currency" => "EUR",
    "invoiceNumber" => 100,
    "issueDate" => "2014-01-01",
    "dueDate" => "2014-01-01",
    "draft" => true,
    "invoiceLines" => array(array(
        "quantity" => 1,
        "rate" => "500",
        "vatRate" => 0.23,
        "description" => "Testing",
        "item" => "Day"
    ))
);
*/

//$new_invoice = $bullet->post('invoices', $new_invoice_data);