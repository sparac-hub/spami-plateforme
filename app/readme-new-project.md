# Front directory
 - Copy: resources/views/front resources/views/new_project
 - Setup main menu. (file: resources/views/new_project/layouts/app_partials/main-menu.blade.php)
 - Check sql "like" syntax: config/cms.php [sql]
 - Add new_project TableSeeders to DatabaseSeeder
 - LocalizedUrlViewComposer: dont forget to bind variable to the locale picker view.

# Prod:
 - Remove html files from [public/back] and [public/front]
 - Check url [/register] is disabled

# Important
 - Add header_pagination to all modules that conatains pagintion on front
 - Add banner url to page header
 - Add custom parameters to contact module: text, address, phone number, (maybe json column in database) 
