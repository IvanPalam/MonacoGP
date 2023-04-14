# MonacoGP

There are 2 log files start.log and end.log that contain start and end data of the best lap for each racer of Formula 1 - Monaco 2018 Racing. (Start and end times are fictional, but the best lap times are true). Data contains only the first 20 minutes that refers to the first stage of the qualification.
Q1: For the first 20 minutes (Q1), all cars together on the track try to set the fastest time. The slowest seven cars are eliminated, earning the bottom grid positions. Drivers are allowed to complete as many laps as they want during this short space of time.
Top 15 cars are going to the Q2 stage. 
The third file abbreviations.txt contains abbreviation explanations.

Your task is to read data from 2 files, order racers by time and print a report that shows the top 15 racers and the rest after underline.

E.g.
1. Daniel Ricciardo      | RED BULL RACING TAG HEUER     | 1:12.013
2. Sebastian Vettel      | FERRARI                                            | 1:12.415
3. ...
------------------------------------------------------------------------
16. Brendon Hartley   | SCUDERIA TORO ROSSO HONDA | 1:13.179
17. Marcus Ericsson  | SAUBER FERRARI                            | 1:13.265

Requirements:
Data files should be stored in a separate folder.
You should have two general functions like a "build_report" and a "print_report".
The "print_report" function should get the result of the "build_report" function and generate an html report.
Add a command-line interface. The application has to have a few parameters.

For run console app write next commands:

php bin/console app:report --files logfiles
php bin/console app:report --files logfiles -s "ASC"
php bin/console app:report --files logfiles --sort_order "DESC"
php bin/console app:report --files logfiles --driver "Fernando Alonso" (or another driver)
php bin/console app:report --driver "Daniel Ricciardo" --files logfiles -s DESC


