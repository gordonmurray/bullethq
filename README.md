A PHP wrapper for BulletHQ's API
================================

BulletHQ is an online Invoicing and payroll application, for more information visit http://www.bullethq.com/

BulletHQ have a great API and it's already quite easy to work with.
The class file in src/bullethq.php was created to learn the API and perhaps make it a tiny bit easier for other PHP developers to use it.

##Usage##

First, add your username and API key to credentials.inc.php and then in your PHP file(s) use the following:

Add the following at the top of your PHP page

	require_once('src/bullethq.php');
	require_once('credentials.inc.php');
	$bullet = new \bullethq\bullethq($username, $password);

####Retrieve Client data####

    $clients = $bullet->get('clients'); // to receive a list of all existing clients

	$client = $bullet->get('clients', '12345'); // to receive the details attached to a specific client, where 12345 is a client ID taken from the initial list of clients

####Retrieve Invoice data####

	$invoices = $bullet->get('invoices'); // to receive all existing invoices

	$invoice = $bullet->get('invoices', '12345'); // to receive a specific invoice

####Retrieve Supplier data####

	$suppliers = $bullet->get('suppliers'); // to receive all existing suppliers

	$supplier = $bullet->get('suppliers', '12345'); // to receive a specific supplier

####Retrieve Client payment data####

	$client_payments = $bullet->get('clientPayments'); // to retrieve all client payments

	$client_payment = $bullet->get('clientPayments', '28854'); // to retrieve a client payment

####Submit new Client####

	$new_client_data = array(
	    "name" => "New Client name",
	    "addressLine1" => "address 1",
	    "addressLine2" => "address 2",
	    "email" => "example@domain.com",
	    "phoneNumber" => "123456789",
	    "vatNumber" => "ei23456",
	    "country" => "Ireland"
	);

	$new_client = $bullet->post('clients', $new_client_data);

####Submit new Invoice####

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
	
	$new_invoice = $bullet->post('invoices', $new_invoice_data);

####Submit new Supplier####

	$new_supplier_data = array(
	    "name" => "New Supplier 1",
	    "addressLine1" => "address 1",
	    "addressLine2" => "address 2",
	    "phoneNumber" => "123456789",
	    "vatNumber" => "ei23456",
	    "country" => "Ireland"
	);
	
	$new_supplier = $bullet->post('suppliers', $new_supplier_data);

####Submit new client payment data####

	$new_payment_data = array(
	    'amount' => '100', // The Euro amount that the client has paid
	    'dateReceived' => '2014-01-01',
	    'currency' => 'EUR',
	    'bankAccountId' => 1234, // Your Bank account ID in Bullet HQ
	    'clientId' => 12345, // The client that has made a payment
	    'invoiceIds' => array(array('1234')) // An existing Invoice ID that a client is paying
	);

	$new_payment = $bullet->post('clientPayments', $new_payment_data);

####Delete Invoice data####

	$bullet->delete('invoices', '12345'); // delete an invoice  (note: this is not YOUR invoice ID, it is BulletHQ's ID for the record)

	$results = $bullet->delete_all('invoices'); // delete all invoices (lists all invoices first then deletes them individually)


####Delete Client data####

	$bullet->delete('clients', '12345'); // delete a client (note: all payment data attached to the client must be deleted first

	$results = $bullet->delete_all('clients'); // delete all invoices (lists all invoices first then deletes them individually)

####Delete Supplier data####

	$bullet->delete('suppliers', '12345'); // delete a supplier (note: all payment data attached to the client must be deleted first

	$results = $bullet->delete_all('suppliers'); // delete all suppliers (lists all suppliers first then deletes them individually)

####Delete Client Payment data####

	$bullet->delete('clientPayments', '12345'); // delete a client payment 

	$results = $bullet->delete_all('clientPayments'); // delete all client payments

##Test status##

![Alt text](https://www.codeship.io/projects/e6244400-6823-0131-e745-4e0bf8440b1e/status "Codeship Status")


