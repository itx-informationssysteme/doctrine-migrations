# The Migrator Tool

## Installation (Composer)
* Add the extension by executing `composer req itx/migrator:<version>`
* In the Typo3 Backend, add the path where you want to save your version files and the appropriate namespace at `Settings > Extension Configuration > migrator`

## Usage
* The extension is controlled via CLI
* You can use commands with `vendor/bin/typo3 migrator:<command> <option>`

## Walkthrough
### Creating a version file
* To generate a version file at your chosen location, use `vendor/bin/typo3 migrator:generate`
* The created file is named Version{date}, {date} being its' time of creation in `YmdHis` format
* This file comes with three pregenerated, empty functions: `getDescription()`, `up()` and `down()`
* Enter the necessary SQL Code for your desired migration into the `up()` function, and the code which can revert the migration into the `down()` function like this: `$this->addSql('<your sql goes here>');`
* Take care to escape any single quotes inside the `addSql()` function

### Working with version files
* `vendor/bin/typo3 migrator:status` show the current status of the migrations: which version is currently in use, which is previous/next/latest one etc.
* Once you have a migration file prepared with the desired changes to your database, you can execute it by running either:
  * `vendor/bin/typo3 migrator:migrate` to automatically run every version file from your current state to the latest one, or
  * `vendor/bin/typo3 migrator:execute "Path\To\Your\File" --up` to only run the `up()` method of your selected version file
* Using `--down` instead of `--up` in the above command executes the version file's `down()` function instead
* For more information on these and some more commands and their options refer to [this](https://www.doctrine-project.org/projects/doctrine-migrations/en/3.8/reference/managing-migrations.html)

## Further Info
 * For more information on doctrine migrations, refer to [the official doctrine documentation](https://www.doctrine-project.org/projects/doctrine-migrations/en/3.8/reference/introduction.html#introduction)
