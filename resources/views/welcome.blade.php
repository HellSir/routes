<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Module 3</title>
        <link href="/css/style.css" rel="stylesheet">
        <script src="/js/vue.js" defer></script>
        <script src="/js/script.js" defer></script>

    </head>
    <body>

        <div id="app">
            <link rel="stylesheet" href="">
            <component :is="currentComponent" @changepage="changePage"></component>
        </div>
    </body>
</html>
