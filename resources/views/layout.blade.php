<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- metas -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- title -->
        <title> @yield('title', 'List Maker') </title>

        <!-- css stylesheets -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
            integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        @yield('external stylesheets')
        <link rel="stylesheet" href="../css/styles.css">
        <link rel="stylesheet" href="../css/fadeIn.css">
        @yield('stylesheets')
    </head>
    <body>
        @yield('body')
    </body>
</html>