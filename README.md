# The Migrator Tool

## Installation (Composer)
* Add the extension by executing `composer req itx/migrator`
* In the Typo3 Backend, add the path where you want to save your version files and the appropriate namespace at `Settings > Extension Configuration > migrator`

## Usage
* The extension is controlled via CLI
* You can use commands with `vendor/bin/typo3 migrator:<command>`

## Walkthrough
### Creating the version file
* To generate a version file at your specified location, use `vendor/bin/typo3 migrator:generate`
* The created file is named Version{date}, {date} being its' time of creation in `YmdHis` format
* This file comes with three pregenerated, empty function: `getDescription`, `up()` and `down()`
* Enter the code necessary for your desired migration into the `up()` function, and the code necessary to revert the migration into `down`. 

### Working with version files
* `vendor/bin/typo3 migrator:status` show the current status of the migrations
* Once you have a migration file prepared with your desired code, you can execute it's `up()` migration by running `vendor/bin/typo3 migrator:migrate`
* The `migrate` command always executes every migration between the current migration and the latest version
* Alternatively, you can execute singular functions of a version file using `vendor/bin/typo3 migrator:execute Path\To\File --<function>`
* For more information on the commands and their options refer to [this](https://www.doctrine-project.org/projects/doctrine-migrations/en/3.8/reference/managing-migrations.html)

## Further Info
 * For more information on doctrine, refer to [the official doctrine documentation](https://www.doctrine-project.org/projects/doctrine-migrations/en/3.8/reference/introduction.html#introduction)
