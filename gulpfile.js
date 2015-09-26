var elixir = require('laravel-elixir');
var gulp = require('gulp');
var flatten = require('gulp-flatten');

gulp.task('copy:fonts', function () {
    var dest = './public/fonts';
    var src = [
        './resources/assets/bower_components/**/*.{eot,svg,ttf,woff,woff2}',
        './resources/assets/fonts/**/*.{eot,svg,ttf,woff,woff2}'
    ];

    return gulp.src(src)
        .pipe(flatten())
        .pipe(gulp.dest(dest));
});

elixir(function(mix) {
    mix.less('front.less', 'public/css/front.css');

    mix.version(['css/front.css']);

    mix.copy('resources/assets/images', 'public/build/images');
    mix.copy('public/fonts', 'public/build/fonts');

    mix.task('copy:fonts');
});
