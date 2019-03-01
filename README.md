# Symfony-unitary-and-functional-tests
Tests unitaires et fonctionnels sur Symfony 4

Installation des composants
```bash
composer install
```

Utilisation de make pour créer des classes de tests
```bash
php bin/console make:unit-test
php bin/console make:functional-test
```

## Tests Unitaires
```bash
./bin/phpunit test/unitary/01_FirstUnitaryTest.php --no-logging
./bin/phpunit test/unitary/02_TimeMeasureTest.php --no-logging
./bin/phpunit test/unitary/03_GroupesTest.php --no-logging
./bin/phpunit test/unitary/04_DataProviderTest.php --no-logging
./bin/phpunit test/unitary/05_DataProviderCSVTest.php --no-logging
./bin/phpunit test/unitary/06_SetUpTearDownTest.php --no-logging
./bin/phpunit test/unitary/07_SetUpBeforeAndTearDownAfterClassTest.php --no-logging
./bin/phpunit test/unitary/08_DependsTest.php --no-logging
./bin/phpunit test/unitary/A09_SuperFixtureTest.php --no-logging
./bin/phpunit test/unitary/10_ExtendsSuperFixtureTest.php --no-logging
./bin/phpunit test/unitary/11_SimpleDoctrineTest.php --no-logging
./bin/phpunit test/unitary/12_MockTest.php --no-logging
```

Base de données en manuel
```bash
doctrine:database:drop --force   # Suppression DB
doctrine:database:create         # Création DB
doctrine:schema:create			 # Création structure
```

Fixtures en manuel
```bash
php ./bin/console doctrine:fixtures:load
```

Groupes
```bash
php ./bin/phpunit --group Unit
php ./bin/phpunit --list-groups
```

TestSuite
```bash
php ./bin/phpunit --testsuite Unit
php ./bin/phpunit --testsuite Integration
php ./bin/phpunit --testsuite Unit,Integration

```

## Tests fonctionnels avec navigateur simulé
```bash
./bin/phpunit test/functional/01_NewsControllerTest.php --no-logging
```

## Tests fonctionnels avec navigateur
```bash
PANTHER_NO_HEADLESS=1 ./bin/phpunit test/panthera/01_NewsControllerTest.php --no-logging
PANTHER_NO_HEADLESS=1 ./bin/phpunit test/functional/02_JavascriptTest.php --no-logging
```