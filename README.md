# DC Punk Archive
## Drupal Theme & Files

#### Installation
To set up a local staging version of this site, follow these steps:
*  Download Drupal v7.38 and unzip to where you want the site to live.
*  Delete...
*  In that directory, run `git init .` to create a repo in the current directory.
*  Run `git remote add origin <https or ssh url>` to track this repo as origin.
*  Run `git pull origin master` to get the latest changes.
*  ...
*  Run a simple web server in the directory using `php -S localhost:80`. If it give you a permission issue, you might need to run it as sudo.
*  Viola! You can now make edits as normal and track your changes locally.

#### Exporting Views
It's important for us to make sure that we export and track our Views every once in a while. This is stored in the database, but to make sure that we have a back-up, please drop a new export of your changed Views into Git.
