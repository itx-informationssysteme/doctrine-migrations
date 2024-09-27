# Doctrine Migrations Extension for TYPO3

This extension provides a CLI for [doctrine migrations](https://www.doctrine-project.org/projects/doctrine-migrations/en/3.8/reference/introduction.html#introduction) to manage database migrations in TYPO3.
Migrations are defined in versioned files, which can be created and executed via the CLI.

## Installation (Composer)
* Add the extension by executing `composer req itx/doctrine-migrations:<version>`
* Create a folder e.g. `Classes/Migrations` inside your extension's folder
* In the TYPO3 Backend, add the path where you want to save your version files and the appropriate namespace at `Settings > Extension Configuration > doctrine_migrations`
* Alternatively you can configure these paths inside your additional.php file
e.g.
```php
$GLOBALS['TYPO3_CONF_VARS']['EXTENSIONS']['doctrine_migrations']['migrationFilesLocation'] = 'EXT:your_extension/Migrations';
$GLOBALS['TYPO3_CONF_VARS']['EXTENSIONS']['doctrine_migrations']['migrationsFilesNamespace'] = 'YourExtension\Migrations';
```

Optionally you can override the [default doctrine migrations](https://www.doctrine-project.org/projects/doctrine-migrations/en/3.8/reference/configuration.html#migrations-configuration) configuration by
providing an array like so in your additional.php file:
```php
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['doctrine_migrations']['overrideConfiguration'] = [
	'table_storage' => [
			'table_name' => 'different_table_name_xyz',
	],
];
```

## Usage
* The extension is controlled via CLI
* You can use commands with `vendor/bin/typo3 migrations:<command> <option>`

## Walkthrough
### Creating a version file
* To generate a version file at your chosen location, use `vendor/bin/typo3 migrations:generate`
* The created file is named Version{date}, {date} being its' time of creation in `YmdHis` format
* This file comes with three pregenerated, empty functions: `getDescription()`, `up()` and `down()`
* Enter the necessary SQL Code for your desired migration into the `up()` function, and the code which can revert the migration into the `down()` function like this: `$this->addSql('<your sql goes here>');`
* Take care to escape any single quotes inside the `addSql()` function

### Working with version files
* `vendor/bin/typo3 migrations:status` show the current status of the migrations: which version is currently in use, which is previous/next/latest one etc.
* Once you have a migration file prepared with the desired changes to your database, you can execute it by running either:
  * `vendor/bin/typo3 migrations:migrate` to automatically run every version file from your current state to the latest one, or
  * `vendor/bin/typo3 migrations:execute "Path\To\Your\File" --up` to only run the `up()` method of your selected version file
* Using `--down` instead of `--up` in the above command executes the version file's `down()` function instead
* For more information on these and some more commands and their options refer to [this](https://www.doctrine-project.org/projects/doctrine-migrations/en/3.8/reference/managing-migrations.html)

## Further Info
 * For more information on doctrine migrations, refer to [the official doctrine documentation](https://www.doctrine-project.org/projects/doctrine-migrations/en/3.8/reference/introduction.html#introduction)
