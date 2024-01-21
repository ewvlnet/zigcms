<x-site-layout>
    <x-slot name="title">About</x-slot>
    <x-slot name="hero">
        <section class="pb-4 pt-5" id="slider-home">
            <div class="p-4 text-white rounded bg-dark"
                 style="background-image: url('/site/assets/img/back-002.png');background-size: cover;">
                <div class="col-md-6 px-0">
                    <h1 class="display-4 fst-italic text-light">About ZigCMS</h1>
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
                <p class="col p-4 d-flex flex-column position-static">
                <h3 class="mb-3">Hello,</h3>

                <p class="card-text mb-3">My name is <a href="https://www.linkedin.com/in/eric-weber"
                                                        target="_blank"><strong>Eric Weber</strong></a>, and I developed
                    <strong>ZigCMS</strong> in my free time, to share
                    knowledge and contribute in some way if you are starting to use <a href="https://laravel.com/"
                                                                                       target="_blank">Laravel</a>.</p>

                <p class="card-text mb-3"><a href="https://laravel.com/" target="_blank">Laravel</a> is a fantastic PHP
                    framework, it will save your time building
                    practically any web project you want to develop.</p>

                <p class="card-text mb-3">This is the first version of <strong>ZigCMS</strong>, and with it you can have
                    a starting point for your blog or institutional website.</p>

                <p class="card-text mb-3">Over time, I intend to increase the project, according to user demand.</p>

                <p class="card-text mb-3">In the frontend of the project I used the theme:</p>
                <ul>
                    <li>
                        <a href="https://themewagon.com/themes/quriarbox-free-bootstrap-5-html5-courier-service-website-template/"
                           target="_blank">https://themewagon.com/themes/quriarbox-free-bootstrap-5-html5-courier-service-website-template/</a>
                    </li>
                    <li><a href="https://themewagon.github.io/courier/v1.0.0/" target="_blank">https://themewagon.github.io/courier/v1.0.0/</a>
                    </li>
                </ul>

                <p class="card-text mb-3">In the admin part, I used the theme:</p>
                <ul>
                    <li><a href="https://themewagon.com/themes/free-responsive-bootstrap-5-html5-admin-template-sneat/"
                           target="_blank">https://themewagon.com/themes/free-responsive-bootstrap-5-html5-admin-template-sneat/</a>
                    </li>
                    <li><a href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template-free/html/"
                           target="_blank">https://demos.themeselection.com/sneat-bootstrap-html-admin-template-free/html/</a>
                    </li>
                </ul>

                <p class="card-text mb-3">Did you like <strong>ZigCMS</strong>? This project is open source, So just
                    download and use it however you want.</p>

                <p class="card-text mb-3">Share the project on your networks and leave some stars(😁) on github:</p>
                <ul>
                    <li><a href="https://github.com/ewvlnet/zigcms"
                           target="_blank">https://github.com/ewvlnet/zigcms</a></li>
                </ul>

                <p class="card-text mb-3">If you have any questions, please contact me directly:</p>
                <ul>
                    <li><a href="https://www.linkedin.com/in/eric-weber" target="_blank">Eric Weber - Linkedin</a></li>
                </ul>

            </div>
        </article>
    </section>

    <x-slot name="css">{{--<style>CSS</style>--}}</x-slot>
    <x-slot name="js">{{--<script>JS</script>--}}</x-slot>
</x-site-layout>
