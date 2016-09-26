# File Migrator
You want to migrate some large file from old server to new server but you have "slow connection" and do not have a ssh access? Maybe this simple app can help you.

# How to use it
Copy **move.php** to your server

Open it with your browser

You'll see a form with 2 fields
1. target url : the file url that you want to copy
2. filename : the file path where you want to save it

# Example
fill the target url with

``https://raw.githubusercontent.com/gmbelart/file-migrator/master/move.php``

and fill the filename with

``download/file-migrator.php``

click the Download button. After processing completed, check your server. You'll see a new folder called **download** and you'll see the **file-migrator.php** file inside the **download** folder.

# Tips
1. If you want to migrate a bunch of files, you can compress it first.
2. If you have ssh access, you don't need this app, you can use wget or similar app.