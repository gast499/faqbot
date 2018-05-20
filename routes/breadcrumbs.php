<?php
// Welcome Page
Breadcrumbs::register('home', function ($breadcrumbs) {
    $breadcrumbs->push('Home', route('welcome'));
});
// Home > Login
Breadcrumbs::register('login', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Login', route('login'));
});
// Home > Register
Breadcrumbs::register('register', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Register', route('register'));
});
// Home > Login > Forgot Password
Breadcrumbs::register('password-request', function ($breadcrumbs) {
    $breadcrumbs->parent('login');
    $breadcrumbs->push('Forgot Password', route('password.request'));
});
// Home > Login > Forgot Password > Reset Password
Breadcrumbs::register('password-reset', function ($breadcrumbs) {
    $breadcrumbs->parent('password-request');
    $breadcrumbs->push('Reset Password', route('password.reset'));
});
// HomePage
Breadcrumbs::register('Home', function ($breadcrumbs) {
    $breadcrumbs->push('Home', route('home'));
});
// HomePage > My Profile
Breadcrumbs::register('MyProfile', function ($breadcrumbs) {
    $breadcrumbs->parent('Home');
    $breadcrumbs->push('My Profile', route('profile.show', ['user_id' => Auth::user()->id,'profile_id' => Auth::user()->profile->id]));
});
// HomePage > Create Profile
Breadcrumbs::register('CreateProfile', function ($breadcrumbs) {
    $breadcrumbs->parent('Home');
    $breadcrumbs->push('Create Profile', route('profile.create', ['user_id' => Auth::user()->id]));
});
// HomePage > Edit Profile
Breadcrumbs::register('EditProfile', function ($breadcrumbs,$profile) {
    $breadcrumbs->parent('Home');
    $breadcrumbs->push('Edit Profile', route('profile.edit', ['profile_id' => $profile->id,'user_id' => $profile->user->id]));
});
// HomePage > ViewQuestion
Breadcrumbs::register('ViewQuestion', function ($breadcrumbs,$questionID) {
    $breadcrumbs->parent('Home');
    $breadcrumbs->push('Question '.$questionID, route('question.show', ['id' => $questionID]));
});
// HomePage > Question -> Edit Question
Breadcrumbs::register('EditQuestion', function ($breadcrumbs,$questionID) {
    $breadcrumbs->parent('ViewQuestion',$questionID);
    $breadcrumbs->push('Edit Question', route('question.edit',['id'=> $questionID]));
});
// HomePage > New Question
Breadcrumbs::register('CreateQuestion', function ($breadcrumbs) {
    $breadcrumbs->parent('Home');
    $breadcrumbs->push('Post New Question', route('question.create'));
});
// HomePage > Question -> New Answer
Breadcrumbs::register('NewAnswer', function ($breadcrumbs,$questionID) {
    $breadcrumbs->parent('ViewQuestion',$questionID);
    $breadcrumbs->push('Post New Answer', route('answers.create',['question_id'=> $questionID]));
});
// HomePage > Question -> View Answer
Breadcrumbs::register('ViewAnswer', function ($breadcrumbs,$questionID,$answerID) {
    $breadcrumbs->parent('ViewQuestion',$questionID);
    $breadcrumbs->push('Answer '.$answerID, route('answers.show', ['question_id'=> $questionID,'answer_id' => $answerID]));
});
// HomePage > Question -> View Answer --> Edit Answer
Breadcrumbs::register('EditAnswer', function ($breadcrumbs,$questionID,$answerID) {
    $breadcrumbs->parent('ViewAnswer',$questionID,$answerID);
    $breadcrumbs->push('Edit Answer', route('answers.edit',['question_id'=> $questionID, 'answer_id'=> $answerID]));
});