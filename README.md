###Introduction to the FAQ Project at NJIT

##Project Overview 

The intent of this project is to create a website and chatbot that will work with slack and eventually other chat platforms.  The idea is to make a virtual teaching assistant that can help manage questions that are received.   Once the basic system works, ideally features will be added that turn answering questions into a game that students earn points for.

There is a training program for people to participate, so that we can all have the same core skill set and know how to work on the project.  This training is similar to what you might receive when being on boarded to a new company.

##Training Program
Laravel Basics  Laracast videos 1-24; this is a prerequisite and must be completed up to video 24 where it has testing to begin this project, if you don’t have previous experience with Laravel.
FAQ project introduction videos 1-4 now; however, there will be a total of about 10 - 12 videos by the time I’m done with making the training program. Videos 5-10 will be about blade templates, routes, controllers, forms, and more testing.
The basic practices of this project are that you will take a task that is fairly small and complete the feature, testing, and everything needed to include that feature in the project. Once we get going we will be using a task board.
There are a few different jobs that we will need eventually. For example, we may want to have someone to design the visual of the feature and / or write specifications. Eventually we need people to work on the hosting on Heroku or AWS. We are also going to work on some data science things this summer. I plan on converting the current FAQ project to use a graph database before launching it in the fall to use it in 5 classes with around 160 students.


##What do I (student) get out of this?
 
Professional experience on a project that will be used by a large number of people.
Students Developers will be featured in a "Hall of Fame" that highlights their contributions
This is a chance to work on small pieces of a project and to gain experience using current industry standard processes and technologies.
You help to build something that will last and can be used as a portfolio project that clearly identifies your contributions to the project
You are able to work on a project with a team of people and make important contributions

##What does NJIT / Professor Williams get out of this?

Students always ask me about projects and I don't know what to do, so this is a streamlined way to help more students.
I would like to upgrade the curriculum to focus more on data science and using Laravel will make developing a high-quality application that will generate data for other classes
I want to use this project to showcase what our students are able to do for employers, so we get name brand recognition by local employers
I want to investigate how technology can improve the educational experience and effectiveness for students.
I feel that this is a safe way for students to get experience
I feel this is way for students to demonstrate their abilities and highlight their work in a manageable way.

##Climb The Ladder: Roles and Succession

You start of as a student trainee and must demonstrate completion of the FAQ tutorial and the Laravel basics through the screencast, if you know Laravel you can start with the FAQ project tutorial series
Once you complete the tutorial you can be raised to a student developer and begin completing features
Student Developers can be promoted to other roles in the future and specialize in areas such as devops, data science, mobile, etc...

##Running the FAQ project:

git clone https://github.com/NJIT-WIS/faq.git
cd faqbot and run composer install
cp .env.example to .env
run: php artisan key: generate
setup database / with SQLite or other https://laravel.com/docs/5.6/database
Run: php artisan migrate
Run: unit tests: phpunit
add this to your .env file: SCOUT_ELASTIC_HOST=54.89.213.69:9200
Run: seeds php artisan migrate:refresh –seed

##Technology Instructions
Configure the entire stack by following this Docker tutorial.  This project is engineered and maintained by using the Test Driven Development. Each feature implemented should follow with a pull request on the designated branch (GitHub workflow).
--Laravel (Basic To-do, FAQBot Project)
--Vue.JS (Tutorial with Laravel)
--Botman (Explanation Lecture)
--Dialogflow (Documentation)
--Elastic Search (Documentation)
--PostgreSQL
--Nginx - Alpine
--Redis
--Project Docker Video (Our Project Using Docker)
--Stack overflow (Documentation)
##Configuration
Add the following to .env:
DIALOGFLOW_API_KEY=<your_dialogflow_api_key> SCOUT_ELASTIC_HOST=<your_elastic_search_node_ip:port>

Download ngrok: https://ngrok.com/ Open CMD Navigate to folder that ngrok.exe is, type "ngrok http 8000" ngrok will give you a new url next to the first "Forwarding" section
Create Slack Bot: https://api.slack.com/apps Create New App Button top right of screen Select a name and workspace for bot
Select Interactive Components on sidebar under the Request URL enter the forwarding address that ngrok provided add to the end of the address /botman/tinker Ex: "http://3bfc36f2.ngrok.io/botman/tinker" Save Changes
Select Event Subscriptions under Request URL type in the same forwarding address as you did in the previous step but remove the tinker Ex: "http://3bfc36f2.ngrok.io/botman/" Save Changes
In the same window as the last step Subscribe to Workspace Events: meessage.im for messages
Select Bot Users Choose a name and default username. Save Changes
Under OAuth & Permissions record the token under Bot User OAuth Access Token Place this token in .env file as SLACK_TOKEN=<ACCESS_TOKEN>
Install App under Setting Install the app, Authorize
Dialog Flow
##To-Do:
Make instructions for installing ES and have it work correctly with docker

##Resources
###Relevant Laravel Resources:
https://laravel.com/docs/5.6/eloquent
https://laravel.com/docs/5.6/database
https://laravel.com/docs/5.6/seeding
https://laravel.com/docs/5.6/testing
Relevant General Resources:
https://www.atlassian.com/git/tutorials/comparing-workflows/gitflow-workflow
https://www.jetbrains.com/phpstorm/
http://agiledata.org/essays/tdd.html
Free Alternative:
https://code.visualstudio.com/

##About BotMan Studio
While BotMan itself is framework agnostic, BotMan is also available as a bundle with the great Laravel PHP framework. This bundled version is called BotMan Studio and makes your chatbot development experience even better. By providing testing tools, an out of the box web driver implementation and additional tools like an enhanced CLI with driver installation, class generation and configuration support, it speeds up the development significantly.
##Documentation
You can find the BotMan and BotMan Studio documentation at http://botman.io. 
##Security Vulnerabilities
If you discover a security vulnerability within BotMan or BotMan Studio, please send an e-mail to Marcel Pociot at m.pociot@gmail.com. All security vulnerabilities will be promptly addressed.#
##License
BotMan is free software distributed under the terms of the MIT license. 
