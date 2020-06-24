DATABASE

Upgrades :
    - user table, add columns (firstname, lastname, username, type, status, token_confirmation)
    - media table, add columns (description, duration)
    - favorite table, add columns (id, media_id, user_id), add foreign keys
    - genre table, remove auto increment and small data, add real data from API