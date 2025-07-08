# MovieDB

## Objective
Create a database-driven MovieDB API that allows CRUD operations across multiple database tables using the Laravel Framework.

The MovieDB API have the following endpoints to perform the following actions:  
  
Movies
  
Endpoint	Action  
GET: /api/movies	returns all movies  
GET: /api/movies/{id}	returns a single movie including genre names  
POST: /api/movies	creates a new movie with optional genres  
PUT: /api/movies/{id}	updates a movie data including genres  
DELETE: /api/movies/{id}	deletes a movie include any rows on pivot table Genres  
  
Endpoint	Action  
GET: /api/genres	returns all genres  
GET: /api/genres/{id}	returns a single genre with movie titles and ids  
