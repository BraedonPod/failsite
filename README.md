<h1>Description</h1>
Clone style site of fmylife

<h1>Requirements</h1>
<ol>
    <li>PHP>=7.0</li>
    <li>Laravel 5.5</li>
    <li>Node>=6.9.2</li>
    <li>NPM>=3.10</li>
</ol>


<h1>Installation</h1>
<ol>
    <li>Download this repo.</li>
    <li>Rename .env.example to .env and fill the options.</li>
    <li>Run the following commands:</li>
    <ol>
        <li>composer install</li>
        <li>npm install</li>
        <li>php artisan key:generate</li>
        <li>php artisan migrate</li>
        <li>php artisan db:seed</li>
        <li>php artisan serve</li>
    </ol>
</ol>

<h1>ToDo</h1>
<ul>
    <li>Main</li>
        <ul>
            <li>Track like/vote/smile based on ip address or cookies.</li>
            <li>Add fav/share to twitter/facebook.</li>
            <li>Make JS more jank</li>
        </ul>
</ul>