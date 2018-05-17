#Project Overview
# Introduction to the FAQ Project at NJIT

This project is to create a website + Chabot that work with slack and eventually other chat platforms.  The idea is to make a virtual teaching assistant that can help manage questions that I receive.   Once the basic system works I want to add features that turn answering questions into a game that students earn points for. 

There is a training program for people to participate, so that we can all have the same core skill set and know how to work on the project.  This training is similar to what you might receive when being on boarded to a new company.   

**The training program has 2 parts:**

1.  [Laravel Basics -> Laracast videos 1-20](https://laracasts.com/series/laravel-from-scratch-2017)

2.  [FAQ project introduction](https://www.youtube.com/playlist?list=PLytMRtonvCRUjrQqKaQeOd2KoYq_ifcpD) videos 1-4 now; however, there will be a total of about 10 - 12 videos by the time I’m done with making the training program.  Videos 5-10 will be about blade templates, routes, controllers, forms, and more testing.

The basic practices of this project are that you will take a task that is fairly small and complete the feature, testing, and everything needed to include that feature in the project.  Once we get going we will be using a task board.

There are a few different jobs that we will need eventually.   For example, we may want to have someone to design the visual of the feature and / or write specifications.  Eventually we need people to work on the hosting on Heroku or AWS.  We are also going to work on some data science things this summer.   I plan on converting the current FAQ project to use a graph database before launching it in the fall to use it in 5 classes with around 160 students.

## What do I (student)get out of this?

1. Professional experience on a project that will be used by a large number of people.
2. Students Developers will be featured in a "Hall of Fame" that hylights their contributions
3. This is a chance to work on small pieces of a project and to gain experience using current industry standard processes and technologies.
4. You help to build something that will last and can be used as a portfolio project that clearly identifies your contributions to the project
5. You are able to work on a  project with a team of people and make important contributions 

## What does NJIT / Professor Williams get out of this?

1. Students always ask me about projects and I don't know what to do, so this is a streamlined way to help more students.
2. I would like to upgrade the curriculum to focus more on data science and using Laravel will make developing a high quality application that will generate data for other classes
3. I want to use this project to showcase what our students are able to do for employers, so we get name brand recognition by local employers
4. I want investigate how technology can improve the educational experience and effectiveness for students.
5. I feel that this is a safe way for students to get experience
6. I feel this is way for students to demonstrate their abilities and hylight their work in a manageable way.


## Climb The Ladder - Roles and Process 

1. You start of as a student trainee and must demonstrate completion of the FAQ tutorial and the Laravel basics through the screencast, if you know Laravel you can start with the FAQ project tutorial series
2. Once you complete the tutorial you can be raised to a student developer and begin completing features
3. Student Developers can be promoted to other roles in the future and specialize in areas such as devops, data science, mobile, etc...

## To run the FAQ project:

1. git clone https://github.com/NJIT-WIS/faq.git
2. CD into FAQ and run composer install
3. cp .env.example to .env
4. run: php artisan key:generate
5. setup database / with sqlite or other https://laravel.com/docs/5.6/database
6. Run: php artisan migrate
7. Run: unit tests: phpunit
8. Run: seeds php artisan migrate:refresh --seed

## Project Resources:

## Prerequisites:
You need to complete upto video 20 where it has testing to begin this project, if you don't have previous experience with Laravel.

https://laracasts.com/series/laravel-from-scratch-2017

## FAQ Tutorial Playlist 
https://www.youtube.com/playlist?list=PLytMRtonvCRUjrQqKaQeOd2KoYq_ifcpD

## Relevant Laravel Resources:

https://laravel.com/docs/5.6/eloquent

https://laravel.com/docs/5.6/database

https://laravel.com/docs/5.6/seeding

https://laravel.com/docs/5.6/testing

## Relevant General Resources

https://www.atlassian.com/git/tutorials/comparing-workflows/gitflow-workflow

https://www.jetbrains.com/phpstorm/

http://agiledata.org/essays/tdd.html

## Free Alternative:
https://code.visualstudio.com/

##Technology Instructions
# Welcome to the NJIT FAQBot!
### Project Introduction 
---
The NJIT FAQBot is a student driven project that has been organized by Professor Williams. The focus of the project is to give students a hands on experience collaboratively working in an agile team environment that is similarly recognized in large tech companies.

The idea behind the NJIT FAQBot is to create a *smart QA forum* to help students find answers to their questions more efficiently.   

---
### Technology Stack
Configure the entire stack by following this [Docker](https://gist.github.com/jtn7/dfce2eb3fa7be967676e3aedeb223293#file-tutorial-md) tutorial. 

- **Laravel** ([Basic ToDo](https://laracasts.com/series/laravel-from-scratch-2017/episodes/1?autoplay=true), [FAQBot Project](https://www.youtube.com/watch?v=k_6hsa6wdmA&list=PLytMRtonvCRUjrQqKaQeOd2KoYq_ifcpD))
-  **Vue.JS** ([Tutorial with Laravel](https://medium.com/@connorleech/use-the-repository-design-pattern-in-a-laravel-application-13f0b46a3dce))
-  **Botman** ([Explanation Lecture](https://www.youtube.com/watch?v=4zzSw-0IShE))
-  **Dialogflow** ([Documentation](https://docs.google.com/document/d/1Ut6Hn9ZbOLDwCRHVLYBWU5oEaxR2AT4jqXKNlqzZ9y4/edit?usp=sharing))
-  **Elastic Search** ([Documentation](https://docs.google.com/document/d/160qh_hqMju7ecz0j2Ij78LMaBY4nE6G5EiSghcd5eD8/edit))
-  **PostgreSQL**
-  **Nginx - Alpine**
-  **Redis**
>Intergrations
- **Stack overflow**  ([Documentation](https://docs.google.com/document/pub?id=11n_dp6t2jpPcgqNuoEOO0fwLvKxYp_HH-zGoycAnUmY))
---
## Development Process

This project is engineered and maintained by using the [Test Driven Development](https://en.wikipedia.org/wiki/Test-driven_development). Each feature implemented should follow with a pull request on the designated branch ([github workflow](https://gist.github.com/Chaser324/ce0505fbed06b947d962)) 



## Usage

Add the following to .env:

DIALOGFLOW_API_KEY=<your_dialogflow_api_key>
SCOUT_ELASTIC_HOST=<your_elastic_search_node_ip:port>

Slack Installation:

1. Install slack driver php artisan botman:install-driver slack
2. Download ngrok: https://ngrok.com/ Open CMD Navigate to folder that ngrok.exe is, type "ngrok http 8000" ngrok will give you a new url next to the first "Forwarding" section
3. Create Slack Bot: https://api.slack.com/apps Create New App Button top right of screen Select a name and workspace for bot 
4. Select Interactive Components on sidebar under the Request URL enter the forwarding address that ngrok provided add to the end of the address /botman/tinker Ex: "http://3bfc36f2.ngrok.io/botman/tinker" Save Changes
5. Select Event Subscriptions under Request URL type in the same forwarding address as you did in the previous step but remove the tinker Ex: "http://3bfc36f2.ngrok.io/botman/" Save Changes
6. In the same window as the last step Subscribe to Workspace Events: meessage.im for messages
7. Select Bot Users Choose a name and default username. Save Changes
8. Under OAuth & Permissions record the token under Bot User OAuth Access Token Place this token in .env file as SLACK_TOKEN=<ACCESS_TOKEN>
9. Install App under Setting Install the app, Authorize


<p align="center"><img height="188" width="198" src="https://botman.io/img/botman.png"></p>
<h1 align="center">BotMan Studio</h1>

## About BotMan Studio

While BotMan itself is framework agnostic, BotMan is also available as a bundle with the great [Laravel](https://laravel.com) PHP framework. This bundled version is called BotMan Studio and makes your chatbot development experience even better. By providing testing tools, an out of the box web driver implementation and additional tools like an enhanced CLI with driver installation, class generation and configuration support, it speeds up the development significantly.

## Documentation

You can find the BotMan and BotMan Studio documentation at [http://botman.io](http://botman.io).



## Security Vulnerabilities

If you discover a security vulnerability within BotMan or BotMan Studio, please send an e-mail to Marcel Pociot at m.pociot@gmail.com. All security vulnerabilities will be promptly addressed.

## License

BotMan is free software distributed under the terms of the MIT license.
