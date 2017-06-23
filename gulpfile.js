var elixir = require('laravel-elixir');

elixir(function(mix) {
    mix.sass('gnscs/global.scss', 'public/css/gnscs');
    mix.sass('gnscs/pages_out/home.scss', 'public/css/gnscs/pages_out');
    mix.sass('gnscs/pages_out/careers.scss', 'public/css/gnscs/pages_out');
    mix.sass('gnscs/pages_out/about.scss', 'public/css/gnscs/pages_out');
    mix.sass('gnscs/pages_out/services.scss', 'public/css/gnscs/pages_out');
    mix.sass('gnscs/pages_out/contactus.scss', 'public/css/gnscs/pages_out');
    mix.sass('gnscs/pages_out/master.scss', 'public/css/gnscs/pages_out');

    mix.sass('gnscs/admin/master.scss', 'public/css/gnscs/admin');
    mix.sass('gnscs/admin/applicants.scss', 'public/css/gnscs/admin');
    mix.sass('gnscs/admin/jobs.scss', 'public/css/gnscs/admin');

    mix.sass('gnscs/resumes/resume1.scss', 'public/css/gnscs/resumes');
});

elixir(function(mix) {
    mix.webpack('pages_out/careers.js', 'public/app/pages_out');
    mix.webpack('pages_out/home.js', 'public/app/pages_out');
    mix.webpack('pages_out/about.js', 'public/app/pages_out');
    mix.webpack('pages_out/services.js', 'public/app/pages_out');
    mix.webpack('pages_out/contactus.js', 'public/app/pages_out');

    mix.webpack('admin/ng_admin.js', 'public/app/admin');
    mix.webpack('admin/ng_admin_applicants.js', 'public/app/admin');
    mix.webpack('admin/ng_admin_jobs.js', 'public/app/admin');

    mix.webpack('global_jquery/global.js', 'public/app/jquery');
});