#Setup

XAMPP Version: 7.2.12
PHP Version 7.2.12
mySQL database


#Name of your chosen PHP framework and why.

Symfony 4 since I have been heavly been working on Drupal 8 for the past year.

#Steps needed to setup the solution and dependencies.
- Import database as provided.
- Change database details in .env file on line 18



#Steps needed to run the test suite.

To run all tests:
----------------
./bin/phpunit tests/UserTestFunctionalTest.php

To run individual tests:
---------------------------
NOTE that I don't think "testAddProduct" & "testEditProduct" is submitting properly.

Get Product Detail
./bin/phpunit tests/UserTestFunctionalTest.php --filter testShowProductDetail

Add Product
./bin/phpunit tests/UserTestFunctionalTest.php --filter testAddProduct

Edit Product
./bin/phpunit tests/UserTestFunctionalTest.php --filter testEditProduct

Delete Product
./bin/phpunit tests/UserTestFunctionalTest.php --filter testDeleteProduct


#Time taken to complete the test.
Only had 25th of November (Sunday) to do this and spent around 16 hours.


#Any compromises/shortcuts you made due to time considerations.

- Used KnpPaginatorBundle for pagination
- Almost no styling on page, only used a few styling with the use of Bootstrap
- Didn't add any messages such as "item has been added","item deleted" etc.


