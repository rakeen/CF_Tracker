![wtfpl](http://www.wtfpl.net/wp-content/uploads/2012/12/wtfpl-badge-2.png)

# CF_Tracker
tracks the performance of codeforces users


##Project Page:
[http://cfapi-rak1.c9.io/](http://cfapi-rak1.c9.io/)  


##About:

####Adding New User:
Sends an ajax call to CF api to retrieve the user info. Stores them into mysql db.  

####Update:
Retrieves all the user info from DB and send an ajax call to CF API for **ALL** the submissions!  
Note that the request takes a lot of time and is currently limited to fetch recent 100 submissions only.  
Otherwise it might exceed the timelimit of the server.  


##ToDo:

- [ ] Restructure the project directory  
- [ ] Make a seperate server config file and use that  
- [ ] Imporve the UI  
- [ ] Find a work around of the update mechanism 