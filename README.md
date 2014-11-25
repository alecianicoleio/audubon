#Audobon Society

It's time to apply your newly acquired (or refreshed) web chops by building a small app.

## The Task

The local Audubon society wants a way for people to report sightings of rare or endangered birds in the Grand Valley area.  Ideally, this would be a single-page form, with no signup required, for local birdwatchers to easily add sightings to the Audubon database.  Your aunt's coworker, who happens to be on the board, heard you "know computers" and naturally assumes you're perfect to make this for her.

### Requirements

#### Part 1

First, you will need an HTML page with a form on it through which people can submit the details of their bird sightings.  The information it needs to collect is as follows:

- Name, email, and phone number of the person reporting the sighting (marked as optional fields)
- Date, time, and location of sighting (marked as required fields)
- Species and description of the bird (also required)

Second, you want to make sure no one is submitting incomplete or incoherent data.  To do this, you will need a Javascript script that validates the data before submitting it.  Be sure to check for things like:

- Email and phone number look like real emails and phone numbers
- The date is not in the future
- The required fields have data in them

Third and finally, you will need an action for the form to perform on submission.  This will be a PHP script that loads the form data into an object, `Sighting`, then saves that data.

#### Part 2

If you have time, the Audubon society thought it might be nice for the public to be able to browse recorded sightings so they could find good places to birdwatch.  For this, you will need a second page that lists out all sightings in your database.  It will of course need to first load that data through PHP.

The list should show:

- Date, time, and location
- Bird species and description

However, it would be best not to print out the name and contact details of the person who reported the sighting.

Your aunt's coworker is going to be just thrilled to have your help!

###### Notes

In order to complete part 2, you should probably begin to use best practices for web development.

First, you will need to install [Composer](https://getcomposer.org/doc/00-intro.md#globally), so that you will be able to easliy manage all the third party dependencies that your app will require.

Once composer is installed, you should be able to run `composer install` from the root directory of your repository, and all your third party dependencies will download and install into your project automatically.

Second, since all great developers use unit testing to verify their code is working properly, you will probably want to install PHPUnit.

Since we are all linuxy and stuff, it's really easy to do through terminal:

`sudo apt-get install PHPUnit`

Now you should be able to *start unit testing*! Just use the command `phpunit` from  the root directory of your repository, and all the unit tests will run and tell you everything wrong with your code :)

Third, you will probably need some sort of persistance or storage solution, so that you can list out all the sightings that your aunt's coworker website tracks.

Luckily, you will be able to do this process relatively easily. Open MySQL command line interface using `mysql -u 'your-username' -p`.

> NOTE: Your username is probably 'root', unless you took the time to make your local database extra secure.

Once inside of the MySQL CLI, just run `create database audubon;`. Finally, `exit` from MySQL.

Finally, you will need to set up our [ORM](en.wikipedia.org/wiki/Object-relational_mapping), which will allow us to obfuscate our database access, and make us not directly access our database in our code.

To Set up Doctrine (ORM), you need to complete two steps.

In the config folder, create a new file called *local.php*. Copy the following code into it, changing the *YOUR-DATABASE-PASSWORD-HERE* to your actual database password.

    <?php

     $local = array(
         'password'  =>  '*YOUR-DATABASE-PASSWORD-HERE*',
     );

     $dbParams = array_replace($db,$local);

     ?>

Don't worry, your changes will not be tracked, so no one else will be able to see your password.

Once your database password has been updated, you will need to use Doctrine's cool CLI to generate your database. From the root directory of your repository run:

`php vendor/bin/doctrine orm:schema-tool:create`

If all goes well, you should now be wired in to use the database to save your data!

It would probably be beneficial at this point to read [here](http://doctrine-orm.readthedocs.org/en/latest/reference/working-with-objects.html) to figure out how to save and retrieve records using Doctrine's entity manager and repositories.

That should be it!