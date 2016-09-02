# Charles W. Reace's Simple (I Hope) Blog Framework

The intent here is something where I can just upload markdown files for 
each article, and this will organize them by date and parse the markdown
into HTML. As a result, there is no admin interface, as the only "admin"
you need to do is use (S)FTP or whatever other method you prefer to
upload your post files.

## Blog Posts

Posts are stored as markdown files in the /posts directory. You need
a home page file called `home.md` there. Any other posts should start
with a date, be all lower-case, and using underscores where you would
logically have a space, e.g. `2016-08-38_my_new_post.md`. (Note that the
date portion controls the sorting, so use a "Y2K-compliant" style date
in YYYY-MM-DD format.) The [Parsedown package](http://parsedown.org) 
is used to convert the file to HTML. Additionally, I added code to 
convert " -- " (space, double-hypen, space) to HTML entities for 
thin-space, em-dash, thin-space. The CSS (in `/static/css/style.css`)
makes any image tags within the post float left.

## Images

The /static/img directory should contain an image file named `banner.jpg`
to be used as the background image in the page's banner. I used a
2,048px × 532px jpeg which seemed to work pretty well). You can also 
put a `favicon.ico` file there to be used as the blog's favicon.
You can use this directory to upload images you want to use in your
posts, if desired.