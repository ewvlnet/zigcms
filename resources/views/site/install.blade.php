<x-site-layout>
    <x-slot name="title">Install</x-slot>
    <x-slot name="hero">
        <section class="pb-4 pt-5" id="slider-home">
            <div class="p-4 text-white rounded bg-dark"
                 style="background-image: url('/site/assets/img/back-003.png');background-size: cover;">
                <div class="col-md-6 px-0">
                    <h1 class="display-4 fst-italic text-light">Install ZigCMS</h1>
                    <p class="lead my-3">Zig CMS is an open source CMS made with Laravel. You can use it as a starting
                        point
                        for your project, or even as a reference for your studies.</p>
                </div>
            </div>
        </section>
    </x-slot>

    <section class="home-articles row mb-2">
        <article class="card mb-3 card-show" style="padding: 0;width: 98%;">
            <div class="row overflow-hidden flex-md-row p-4 pt-2 mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">

                    <p class="card-text mb-4 text-danger">⚠️ This project was developed in the <a href="https://laravel.com/docs/10.x/sail" target="_blank">Laravel Sail</a> environment, so if you already have Docker in your development environment, this will make your life easier 😁</p>

                    <p class="card-text mb-3">To install, just clone the github repository:</p>
                    <ul>
                        <li><a href="https://github.com/ewvlnet/zigcms"
                               target="_blank">https://github.com/ewvlnet/zigcms</a></li>
                    </ul>

                    <pre class="card-text mb-3">git clone https://github.com/ewvlnet/zigcms.git NAMEOFYOURPROJECT</pre>

                    <p class="card-text mb-3">Enter the created folder</p>
                    <pre class="card-text mb-3">cd NAMEOFYOURPROJECT/</pre>

                    <p class="card-text mb-3">Now run the commands below</p>
                    <pre class="card-text mb-3">composer install</pre>
                    <pre class="card-text mb-3">cp .env.example .env</pre>
                    <pre class="card-text mb-3">php artisan key:generate</pre>

                    <p class="card-text mb-3">Do the require of Laravel Sail, then run the installation command</p>

                    <pre class="card-text mb-3">composer require laravel/sail --dev</pre>
                    <pre class="card-text mb-3"># Select MySQL and any other services you want</pre>
                    <pre class="card-text mb-3">php artisan sail:install</pre>

                    <pre class="card-text mb-3">💡After the Sail Installation command, the mysql container access data will be written to the .env file, and you can change them if you want</pre>
                    <pre class="card-text mb-3">DB_CONNECTION=mysql</pre>
                    <pre class="card-text mb-3">DB_HOST=mysql</pre>
                    <pre class="card-text mb-3">DB_PORT=3306</pre>
                    <pre class="card-text mb-3">DB_DATABASE=YOURDATABASENAME</pre>
                    <pre class="card-text mb-3">DB_USERNAME=sail</pre>
                    <pre class="card-text mb-3">DB_PASSWORD=password</pre>

                    <p class="card-text mb-3">Also, after the Sail installation command, in the next step it will create the images (making the build), and you only need to run the up command, after that</p>
                    <pre class="card-text mb-3">./vendor/bin/sail up -d</pre>

                    <p class="card-text mb-3">The <strong>-d</strong> at the end of the command prevents the terminal
                        from becoming locked, and you will be able to execute new commands</p>

                    <p class="card-text mb-3">Run the migrations</p>
                    <pre class="card-text mb-3">sail artisan migrate:fresh --seed</pre>

                    <h2 class="card-text mb-3">🥳🥂🎉🍻🎈</h2>
                    <p class="card-text mb-3">Once this is done, just access <a href="http://localhost" target="_blank">localhost</a>
                        in your browser and see the
                        screen <strong>ZigCMS</strong> home page.
                    </p>

                </div>
            </div>
        </article>
    </section>

    <x-slot name="css">{{--<style>CSS</style>--}}</x-slot>
    <x-slot name="js">{{--<script>JS</script>--}}</x-slot>
</x-site-layout>
