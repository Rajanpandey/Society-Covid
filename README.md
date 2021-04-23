# Society-Covid

A multitenant architecture application to keep track of live covid cases in the society/community, with support for charts/graphs, platform to request/donate plasma, etc.

# Website link
I have hosted the site on Azure on my own subscription: https://covid.azurewebsites.net/

# Documentation to onboard your own society without coding!
Please find 'Onboarding Documentation.pdf' file in the repo and follow the steps to use the app for your own society.
The link will become https://covid.azurewebsites.net/{yoursociety}
Eg: for my society, it is https://covid.azurewebsites.net/PlanetM/

# How run the project
1. Clone the repo: `https://github.com/Rajanpandey/Society-Covid.git`
2. Install XAMPP software
3. Cut-Paste the repo into the htdocs folder of xampp, so it looks like this {xampp-installation-folder}/htdocs/{repo}. Eg, for me it is: C:/xampp/htdocs/Society-Covid
4. Run XAMPP and start Apache and MySQL server
5. Visit http://localhost/phpmyadmin/, click on Import from the upper tabs, and select 'data_dump.sql' file to generate the db and tables.
6. Visit http://localhost/Society-Covid/ to run the app!
