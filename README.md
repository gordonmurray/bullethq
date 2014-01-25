A PHP wrapper for BulletHQ's API
================================

BulletHQ is an online Invoicing and payroll application, for more information visit http://www.bullethq.com/

BulletHQ have a great API and it's already quite easy to work with.
The class file in src/bullethq.php was created to learn the API and perhaps make it a tiny bit easier for other PHP developers to use it.

Usage
-----

    require_once('src/bullethq.php');
    require_once('credentials.inc.php');

    $bullet = new \bullethq\bullethq($username, $password);

    $clients = $bullet->get('clients'); // to receive a list of all existing clients

Test status
-----------

![Alt text](https://www.codeship.io/projects/e6244400-6823-0131-e745-4e0bf8440b1e/status "Codeship Status")


