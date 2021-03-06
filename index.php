<?php

require_once('src/bullethq.php');
require_once('credentials.inc.php');

$bullet = new \bullethq\bullethq($username, $password);

// $clients = $bullet->get('clients'); // to receive a list of all existing clients

// $client = $bullet->get('clients', '12345'); // to receive the details attached to a specific client

// $invoices = $bullet->get('invoices'); // to receive all existing invoices

// $invoice = $bullet->get('invoices', '12345'); // to receive a specific invoice

// $suppliers = $bullet->get('suppliers'); // to receive all existing suppliers

// $supplier = $bullet->get('suppliers', '12345'); // to receive a specific supplier

// $client_payments = $bullet->get('clientPayments'); // to retrieve all client payments

// $client_payment = $bullet->get('clientPayments', '28854'); // to retrieve a client payment

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

/*
$new_supplier_data = array(
    "name" => "New Supplier 1",
    "addressLine1" => "address 1",
    "addressLine2" => "address 2",
    "phoneNumber" => "123456789",
    "vatNumber" => "ei23456",
    "country" => "Ireland"
);
*/

// $new_supplier = $bullet->post('suppliers', $new_supplier_data);

/*
$new_payment_data = array(
    'amount' => '100', // The Euro amount that the client has paid
    'dateReceived' => '2014-01-01',
    'currency' => 'EUR',
    'bankAccountId' => 1234, // Your Bank account ID in Bullet HQ
    'clientId' => 12345, // The client that has made a payment
    'invoiceIds' => array(array('1234')) // An existing Invoice ID that a client is paying
);
*/

// $new_payment = $bullet->post('clientPayments', $new_payment_data);

// $bullet->delete('invoices', '12345'); // delete an invoice  (note: this is not YOUR invoice ID, it is BulletHQ's ID for the record)

// $bullet->delete('clients', '12345'); // delete a client (note: all payment data attached to the client must be deleted first

// $bullet->delete('suppliers', '12345'); // delete a supplier (note: all payment data attached to the client must be deleted first

// $results = $bullet->delete_all('suppliers'); // delete all suppliers (lists all suppliers first then deletes them individually)

// $results = $bullet->delete_all('invoices'); // delete all invoices (lists all invoices first then deletes them individually)

// $results = $bullet->delete_all('clients'); // delete all invoices (lists all invoices first then deletes them individually)

// $results = $bullet->delete_all('clientPayments'); // delete all client payments
