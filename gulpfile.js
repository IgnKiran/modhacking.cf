var elixir =  require('laravel-elixir');

elixir(function(mix){
    mix.styles([
            'bootstrap.css',
            'font-awesome.css',
            'metisMenu.css',
            'sb-admin-2.css',
            'blog-home.css',
            'style.css'
        ],'./public/css/libs.css')
        .scripts([
            'jquery.js',
            'bootstrap.js',
            'metisMenu.js',
            'sb-admin-2.js',
            'app.js'
        ],'./public/js/libs.js')
});
