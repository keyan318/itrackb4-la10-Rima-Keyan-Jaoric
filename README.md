# Laboratory Activity 10 — Your Own Table, Your Own Model

## Part G — README

### G1. Which column did you turn into a table, and why that one and not another?

I turned the `genre` column into a separate table because a movie can belong to a specific genre, and multiple movies can share the same genre. Instead of repeating the genre name for every movie, I created a separate table and connected it to the movies using a relationship.

### G2. What number did screenshot 6 show, and why exactly that number?

Screenshot 6 showed 3 because that was the total number of records returned by the query. The result depended on the data I had inserted and the conditions used in the query.

### G3. Your belongsTo method is named in the singular. What would break if you made it plural?

The `belongsTo` method is named in the singular because each movie belongs to one genre. If I made the method name plural, any code that calls the original singular relationship method would fail unless I also updated those references to use the new name.