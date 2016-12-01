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

1.  Setup laravel homestead https://laravel.com/docs/5.3/homestead
2.  Clone the audubon repo https://help.github.com/articles/cloning-a-repository/
3.  Create a database (either via vagrant ssh or using mysql workbench)
4.  Copy .env.example and create a new file .env
5.  Configure .env (database name, username, and password should be the only ones potentionally changed)

## Vagrant

Vagrant is installed during during the laravel homestead step.  Once the steps above are complete, the following needs to be done. 

1.  vagrant ssh (in the Homestead directory)
2.  Go to the audubon project directory
3.  composer install
4.  php artisan doctrine:generate:proxies
5.  php artisan migrate

### Unit tests
Second, all great developers use unit testing to verify their code is working properly.  There is no longer a setup required to run tests (composer install installs all the needed plugins).  

To run tests use the command vendor/bin/peridot tests/unit

References: <br />
Peridot- http://peridot-php.github.io/ <br />
Leo- http://peridot-php.github.io/leo/

#### Setting up the ORM

No setup for the ORM is required.  Configuring the database info in the .env file is all that is needed for the ORM.

At this point you may find the [Doctrine documentation](http://doctrine-orm.readthedocs.org/en/latest/reference/working-with-objects.html) helpful to figure out how to save and retrieve records.

That's it!

Useful laravel references<br />
Laravel- https://laravel.com/docs/5.3<br />
Migrations- https://laravel.com/docs/5.3/migrations<br />
Query builder- https://laravel.com/docs/5.3/queries
