# Planning
- Build login and registration page, connected to MySql database. (Tutorial)
- Secure against session hijacking.
- Secure MySql with prepared statements (or PDO?)
- Restricted User pages, like "My profile"
- Login options via SMS verification (46elks) / Or option to validate registration with SMS (46elks)
- Feed - Page where users can post updates/info (like twitter or FB)
- Users can reply/comment on the posts.
- Access levels on users. Superuser / Admin / User.

# SETUP
This login system is based on implementation of 46elks SMS/TEXT solution for sending 6 digit log-in code.
- Add your user- and password code from your 46elks account in the .htaccess file.
SetEnv ELKSUSER ""
SetEnv ELKSPASS ""
