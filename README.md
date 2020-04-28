<h1> Example of Chartjs loading data from php rest api </h1>

Chartjs https://www.chartjs.org/


![Chart Image](readMeImages/chart1.PNG)



<h2>PHP Rest Api End Points</h2>
Directory Structure:
inc - folder
vendor - folder
.env - env variable files
api.php - api end file
composer.php - composer file
composer.lock - composer file

We have used https://github.com/vlucas/phpdotenv package to load enviroment variables from .env file. If you don't want to use it, you can remove .env , vendor (folder), composer.php and composer.lock and write env variables directly in api.php file


API : http://localhost/wop/php/prj0001-UsingChartJs/api/api.php?readLabels

Response:

["2001","2002","2003"]

------------------------------------------------------------

API : http://localhost/wop/php/prj0001-UsingChartJs/api/api.php?readDataSets

Response: 

[
    {
        "crime":"Kidnapping",
        "data":[0,1,1]
    },
    {"crime":"Murder","data":[1,2,1]},
    {"crime":"Rape","data":[1,1,0]}
]


