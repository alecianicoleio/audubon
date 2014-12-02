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

## Setting up your environment

The following will help you set up your project in a way that will let you follow best practices.

First, you will need to [install Composer](https://getcomposer.org/doc/00-intro.md#globally), so that you will be able to easily manage all the third party dependencies that your app will require.

Once composer is installed, run

    composer install
    
from the root directory of your repository, which will automatically download and install all your third party dependencies into your project.

### Unit tests
Second, since all great developers use unit testing to verify their code is working properly, you will probably want to install PHPUnit.

Since we are all linuxy and stuff, it's really easy to do through terminal:

    sudo apt-get install PHPUnit

Now you should be able to *start unit testing*! From the root directory of your repository, just use

    phpunit

to run all the unit tests and see everything broken (or working!) in your code. :)

### Persistence
Third, you will probably need some sort of persistence or storage solution, so that you can list out all the sightings that your aunt's coworker's website tracks.  Luckily, you will be able to do this process relatively easily.  To open the MySQL command line interface, run
    
    mysql -u 'your-username' -p

> Your username is probably 'root', unless you took the time to make your local database extra secure.

From inside the MySQL CLI, create the Audubon database by running
    
    create database audubon;
    
This creates an empty database ready to be loaded with tables, which will be handled in the next step.  You can now run `exit` to leave MySQL.

#### Setting up the ORM

Finally, you will need to set up an [ORM](en.wikipedia.org/wiki/Object-relational_mapping), which is a framework (in our case, a PHP framework) that accesses the database for us.  This is a preferable alternative to mixing MySQL queries with our business logic.

An ORM framework called Doctrine has already been installed for you by Composer, but you still need to configure and run it.

In the `config/` folder, create a new file called `local.php`. Copy the following code into it, changing `*YOUR-DATABASE-PASSWORD-HERE*` to your actual MySQL password.

    <?php
    
     $local = array(
         'password'  =>  '*YOUR-DATABASE-PASSWORD-HERE*',
     );

     $db = array_replace($db,$local);

     ?>

This `config/local.php` file is gitignored, so no one else will be able to see your password.

Once your password has been updated, Doctrine is now configured to be able to access your Audubon database. You can use the Doctrine CLI to generate your database tables. From the root directory of your repository, run

    php vendor/bin/doctrine orm:schema-tool:create

If all went well, you should now have a working database!  Log back in to MySQL and run
    
    use Audubon;
    show tables;
    
to check out what Doctrine did for you.

At this point you may find the [Doctrine documentation](http://doctrine-orm.readthedocs.org/en/latest/reference/working-with-objects.html) helpful to figure out how to save and retrieve records.

That's it!