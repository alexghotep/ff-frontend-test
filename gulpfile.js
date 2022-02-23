'use strict';

var envHost = require('./gulp.config');

var gulp = require('gulp'),
    browserSync = require('browser-sync').create(),
    sass = require('gulp-sass'),
    plumber = require('gulp-plumber'),
    sourcemaps = require('gulp-sourcemaps'),
    postcss = require('gulp-postcss'),
    autoprefixer = require('autoprefixer'),
    // cssnano = require('cssnano'),
    // eslint = require("gulp-eslint"),
    rename = require('gulp-rename'),
    uglify = require('gulp-uglify'),
    include = require('gulp-include'),
    regenerator = require('gulp-regenerator'),
    babel = require('gulp-babel');

var dirDev = 'dev',
    dirProd = 'docs';

gulp.task('styles', (done) => {
    gulp.src(dirDev + '/app.scss')
        .pipe(sourcemaps.init())
        .pipe(plumber())
        .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(sourcemaps.write({includeContent: false}))
        .pipe(sourcemaps.init({loadMaps: true}))
        .on('error', sass.logError)
        .pipe(postcss([autoprefixer('last 40 versions')/*, cssnano()*/]))
        .pipe(rename({suffix: '.min'}))
        .pipe(browserSync.reload({stream: true}))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest(dirProd + '/css/'));
    done();
});

gulp.task('scripts', (done) => {
    gulp.src(dirDev + '/app.js')
        .pipe(sourcemaps.init())
        .pipe(regenerator())
        .pipe(babel({
            presets: ['@babel/preset-env']
        }))
        // .pipe(eslint())
        // .pipe(eslint.format())
        // .pipe(eslint.failAfterError())
        .pipe(include())
        .pipe(rename({suffix: '.min'}))
        .pipe(uglify())
        .pipe(browserSync.reload({stream: true}))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest(dirProd + '/js/'));
    done();
});

gulp.task('browser-sync', function () {
    browserSync.init({
        notify: false, /* отключить браузерные уведомления */
        proxy: envHost.envHost(),
    });
    browserSync.watch('./**/*').on('change', browserSync.reload);
});

gulp.task('watch', gulp.parallel('browser-sync', 'styles', 'scripts', function (done) {
    gulp.watch('dev/**/*.scss', gulp.series('styles'), browserSync.reload);
    gulp.watch('dev/**/*.js', gulp.series('scripts'), browserSync.reload);
    gulp.watch('*.php', browserSync.reload);
    done();
}));

gulp.task('default', gulp.series(gulp.parallel('styles', 'scripts'), 'watch'));
gulp.task('build', gulp.series(gulp.parallel('styles', 'scripts')));