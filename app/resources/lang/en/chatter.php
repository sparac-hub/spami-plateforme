<?php

return [
    'success' => [
        'title' => 'Well done!',
        'reason' => [
            'submitted_to_post' => 'Response successfully submitted to ' . mb_strtolower('Discussion') . '.',
            'updated_post' => 'Successfully updated the ' . mb_strtolower('Discussion') . '.',
            'destroy_post' => 'Successfully deleted the response and ' . mb_strtolower('Discussion') . '.',
            'destroy_from_discussion' => 'Successfully deleted the response from the ' . mb_strtolower('Discussion') . '.',
            'created_discussion' => 'Successfully created a new ' . mb_strtolower('Discussion') . '.',
        ],
    ],
    'info' => [
        'title' => 'Heads Up!',
    ],
    'warning' => [
        'title' => 'Wuh Oh!',
    ],
    'danger' => [
        'title' => 'Oh Snap!',
        'reason' => [
            'errors' => 'Please fix the following errors:',
            'prevent_spam' => 'In order to prevent spam, please allow at least :minutes in between submitting content.',
            'trouble' => 'Sorry, there seems to have been a problem submitting your response.',
            'update_post' => 'Nah ah ah... Could not update your response. Make sure you\'re not doing anything shady.',
            'destroy_post' => 'Nah ah ah... Could not delete the response. Make sure you\'re not doing anything shady.',
            'create_discussion' => 'Whoops :( There seems to be a problem creating your ' . mb_strtolower('Discussion') . '.',
            'title_required' => 'Please write a title',
            'title_min' => 'The title has to have at least :min characters.',
            'title_max' => 'The title has to have no more than :max characters.',
            'content_required' => 'Please write some content',
            'content_min' => 'The content has to have at least :min characters',
            'category_required' => 'Please choose a category',


        ],
    ],
    'titles' => [
        'discussion' => 'Discussion',
        'discussions' => 'Discussions',
    ],

    'headline' => 'Welcome to Chatter',
    'description' => 'A simple forum package for your Laravel app.',
    'preheader' => 'Just wanted to let you know that someone has responded to a forum post.',
    'greeting' => 'Hi there,',
    'body' => 'Just wanted to let you know that someone has responded to a forum post at',
    'view_discussion' => 'View the ' . mb_strtolower('Discussion') . '.',
    'farewell' => 'Have a great day!',
    'unsuscribe' => [
        'message' => 'If you no longer wish to be notified when someone responds to this form post be sure to uncheck the notification setting at the bottom of the page :)',
        'action' => 'Don\'t like these emails?',
        'link' => 'Unsubscribe to this ' . mb_strtolower('Discussion') . '.',
    ],
    'words' => [
        'cancel' => 'Cancel',
        'delete' => 'Delete',
        'edit' => 'Edit',
        'yes' => 'Yes',
        'no' => 'No',
        'minutes' => '1 minute| :count minutes',
    ],

    'discussion' => [
        'new' => 'New discussion',
        'all' => 'All discussion en',
        'create' => 'Create discussion',
        'posted_by' => 'Posted by',
        'head_details' => 'Posted in Category',

    ],
    'response' => [
        'confirm' => 'Are you sure you want to delete this response?',
        'yes_confirm' => 'Yes Delete It',
        'no_confirm' => 'No Thanks',
        'submit' => 'Submit response',
        'update' => 'Update Response',
    ],

    'editor' => [
        'title' => 'Title of discussion',
        'select' => 'Select a Category',
        'tinymce_placeholder' => 'Type Your discussion' . ' Here...',
        'select_color_text' => 'Select a Color for this discussion' . ' (optional)',
    ],

    'email' => [
        'notify' => 'Notify me when someone replies',
    ],
];
