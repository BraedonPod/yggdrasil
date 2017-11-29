<h1>Requirements</h1>
<ol>
    <li>PHP>=7.0</li>
    <li>Laravel 5.5</li>
    <li>Node 6.9.2</li>
    <li>NPM 5.5.1</li>
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
        <li>php artisan serve</li>
    </ol>
</ol>

<h1>ToDo</h1>
<ul>
    <li>Main</li>
        <ul>
            <li>Decide on data sources api/manual</li>
            <li>Reformat site to be my dynamic when loading each media type</li>
        </ul>
    <li>Movies</li>
        <ul>
            <li>Get Library Entries working (vuejs)</li>
            <li>Remove poor implementation of library entries</li>
        </ul>
    <li>Site</li>
        <ul>
            <li>Get search working (laravel/scout/vuejs/algolia) or Elasticsearch</li>
            <li>Add groups</li>
            <li>Clean up css</li>
            <li>Post Comments</li>
        </ul>
    <li>Profile</li>
        <ul>
            <li>Add follow</li>
            <li>get profile pages working and add other pages</li>
        </ul>
</ul>