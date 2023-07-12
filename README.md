##  DUC Profile Creator
The DUC profile creator is an easy to use tool to create a profile of use condition statements for a given asset. The process is based upon a series of Use Condition concepts, and an online form that gathers this information into a 'Profile'. These profiles can be updated at any time, and you decide what to include or not include in your asset profile. As a user, you can choose to leave a copy on the website or download the profile to your own computer. Whether saved on the site or downloaded, profiles can be reopened/uploaded for further editing later This tool can be accessed The tool can be accessed at [URL](https://duc.le.ac.uk/).
## Digital Use Condition (DUC)
**“Digital Use Conditions” (DUC)** is an operational data structure designed to standardise the way consent and use conditions (relating to any resource) are computationally represented. A DUC structure that has been populated with asset information and consent and use conditions is called a **DUC Profile**.
DUC has been devised and tested by a TaskForce of the International Rare Disease Research Consortium (IRDiRC).

More information about DUC,Use Conditions and FAQs can be found [Here](https://duc.le.ac.uk/Learn/index). You can contact [Spencer Gibson](mailto:spencer.gibson@leicester.ac.uk) for queries about DUC or CCE concept and using the the system to create profiles.

This tool is developed using **CodeIgniter** which is PHP full-stack web framwork that is light, fast, flexible and secure. More information about CodeIgniter can be found at the [official site](http://codeigniter.com).

### Development

#### Server Requirements

PHP version 7.3 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php)
- xml (enabled by default - don't turn it off)

#### Setup
Clone this repo into www directory of your server by running following command.

1. ``` git clone https://github.com/CafeVariomeUoL/Duc_Profile.git ```
2. ``` cd Duc_Profile ```
3. ``` php composer install ```
4. Create database and import DucSchema.sql to your database
5. tailor .env file for your application specifically the baseURL and any database settings.

This application allow you to create, download and upload profiles. It allows you to choose Use Condition terms from different groups if you wish to create your owm terms or save profiles to the system make sure you configure your database either in .env file or app/config/Database.php file. 

For any query about this setup please contact [Umar Riaz](mailto:ur13@leicester.ac.uk) or [Sean Raisi](mailto:tsr16@leicester.ac.uk). 