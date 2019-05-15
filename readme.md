# Project 4
+ By: Michael Cuneo
+ Production URL: http://p4.cuneocourse.me

## Feature summary
+ Visitors can register/log in
+ Users can add/edit/delete their own mods
+ Users can search for mods via their category, or section, that they are created with
+ Users can search for mod names via a search bar
+ Each user can create and delete their own comments when logged in on each mod
+ The home page features
  + a list of all uploaded mods
  + a list of sections, with a link to each section that shows a page of mods within that section
  + a login/logout link
  + a button to create a mod

  
## Database summary
+ My application has 4 tables in total (`users`, `mods`, `sections`, `comments`)

+ There's a one-to-many relationship between `sections` and `mods`
+ There's a one-to-many relationship between `mods` and `comments` *May have misnamed this migration*
+ There's a one-to-many relationship between `users` and `mods`
+ There's a one-to-many relationship between `users` and `comments`

## Outside resources
In my `Exceptions/Handler.php`, I used code provided from https://stackoverflow.com/questions/30276325/laravel-5-how-do-i-handle-methodnotallowedhttpexception to help set up a redirect to home when a MethodNotAllowedHTTPException is thrown

## Code style divergences
+ Made use of divs and spans
+ The `null` value is capitalized everywhere
+ Used minimal necessary PHP code in master blade to populate section navigation links on every page load

## Notes for instructor
+ While in the authentication notes, you did offer a way to allow all views to have the `$user` variable populated with the logged in user's info, I found that when a view was yielded to the master view, it did not inherit this `$user` variable from the master view. In my controllers I had to return `$user` explicitly to get the data I needed to work with in some cases.
+ I did not use middleware as I was unsure of how to make it so only certain users could access certain pages, vs all logged in users. I instead opted to just put the functionality in my controller functions where needed.
+ I could have expanded this mod by
  + filtering the mods on the home page in some way so they all aren't just dumped there
  + giving each user their own personal page to view their mods and comments
  + making validation slightly more robust
