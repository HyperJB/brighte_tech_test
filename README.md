Brighte Tech Test
===

Setup
---
- XAMPP Version: 7.2.12.
- PHP Version: 7.2.12.
- mySQL database.
- GitBash as commandline
- Visual Code as editor


Name of your chosen PHP framework and why.
---
Symfony 4 since I have been heavly been working on Drupal 8 for the past year.

Steps needed to setup the solution and dependencies.
---
- Import database as provided (filename **brighte_tech_test_20181126.sql**).
- Change database details in .env file on line 18
- In terminal go to directory location Type **php bin/console server:start** if on windows then **php bin/console server:run**
- Browse to **http://localhost:8000** (or whatever the server is listening to that is stated after running previous step command)

Steps needed to run the test suite.
---
**To run individual tests:**

NOTE that I don't think "testAddProduct" & "testEditProduct" is submitting properly.

**Get Product Detail**

./bin/phpunit tests/UserTestFunctionalTest.php --filter testShowProductDetail

**Add Product**

./bin/phpunit tests/UserTestFunctionalTest.php --filter testAddProduct

**Edit Product**

./bin/phpunit tests/UserTestFunctionalTest.php --filter testEditProduct

**Delete Product**

./bin/phpunit tests/UserTestFunctionalTest.php --filter testDeleteProduct


Time taken to complete the test.
---
Spent around 16 hours.


Any compromises/shortcuts you made due to time considerations.
---
- Used KnpPaginatorBundle for pagination
- Almost no styling on page, only used a few styling with the use of Bootstrap
- Didn't add any messages such as "item has been added","item deleted" etc.
- Cut back on commenting due to time
- Didn't do any Unit testing before hand
- Didn't spend much time on Functional Test with PHPUnit Test
- Used Symfony/website-skeleton as base, so it would give me most of the bundles I needed


Last words
===
Thanks for giving me the time to do this test. Me as a person will always look to learn more from research and from others.  Teamwork is the foundation for success and I believe almost anything is achievable if everyone works together..."One Team, one Dream...".







