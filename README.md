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
