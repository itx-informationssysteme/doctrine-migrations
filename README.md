# The Migrator Tool

## Installation (Composer)
* Add the extension by executing `composer req itx/migrator`
* In the Typo3 Backend, add the path where you want to save your version files at `Settings > Extension Configuration > migrator`

## Usage
* The extension is only usable in the CLI.
* You can use commands with `vendor/bin/typo3 migrator:<command>`
* For the usage of the individual commands and version files, refer to [the official doctrine documentation](https://www.doctrine-project.org/projects/doctrine-migrations/en/3.8/reference/introduction.html#introduction)
