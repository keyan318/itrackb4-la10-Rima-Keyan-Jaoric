# Laboratory Activity 9 — Your Own Table, Your Own Model

## Part F — README

### F1. Which column did you make nullable, and why that one and not another?

I made `rating` nullable. A movie can have a title, genre, year, director and duration the moment I add it, but it might not have a rating yet if it hasn't been released, like the upcoming movie I put in my seeder. The other columns always have a value, so I left them required.

### F2. Which step failed first for you, and what did the error say?

The first failure was the one I was supposed to get, in Part B. Before I added `$fillable` to my `Movie` model, I tried `Movie::create(['title' => 'Inception'])` in Tinker and got a `MassAssignmentException`. The error told me `title` wasn't in the model's fillable list, which is exactly the property I added right after to fix it.

### F3. You changed no Blade file in Part D, yet your pages still work. Why not?

My Blade files only ever used variable names like `$items`, `$item`, `$genre` and `$year`, and read fields with `$movie['title']` style array access. My controller still passes those same variable names, and Eloquent models let me read their columns with `['title']` just like a plain array did. So from the view's side nothing looks different — only where the data comes from changed.
