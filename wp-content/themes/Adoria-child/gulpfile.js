'use strict';

var browserSyncWatchFiles = [
    './**/*.css',
    './**/*.js',
    './**/*.php',
    './**/*.scss'
];
// browser-sync options
// see: https://www.browsersync.io/docs/options/
var browserSyncOptions = {    
    proxy: "adoriasoft.loc/",     
    notify: false
};
var gulp = require('gulp');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var cleanCSS = require('gulp-clean-css');
var sourcemaps = require('gulp-sourcemaps');
var clean = require('gulp-clean');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var browserSync = require('browser-sync').create();
var reload = browserSync.reload;

var conf = {
    imagePath: './images',
    cssPath: './css',
    jsPath: './js',
    fontsPath: './fonts',
    sassSrc: './sass/**/*.scss',
    cssSrc: './css/*.css',
    browsers: [
        "Android 2.3",
        "Android >= 4",
        "Chrome >= 20",
        "Firefox >= 24",
        "Explorer >= 8",
        "iOS >= 6",
        "Opera >= 12",
        "Safari >= 6"
    ],
    sassIncludePaths: [
        "node_modules/bootstrap-sass/assets/stylesheets",
        "node_modules/font-awesome/scss"
    ],
    jsLibs: [
        'node_modules/bootstrap-sass/assets/javascripts/bootstrap.js'
    ],
    fontsLibs: [
        "node_modules/font-awesome/fonts/*",
        "sass/fonts/*"
    ]
};

gulp.task('clean', function () {
    gulp.src([conf.cssPath, conf.jsPath, conf.fontsPath])
        .pipe(clean());
});

gulp.task('sass', function () {
    gulp.src(conf.sassSrc)
        .pipe(
            sass({
                includePaths: conf.sassIncludePaths,
                imagePath: conf.imagePath
            }).on('error', sass.logError)
        )
        .pipe(autoprefixer({
            browsers: conf.browsers,
            cascade: false
        }))
        .pipe(gulp.dest(conf.cssPath));
});

gulp.task('script', function () {
    gulp.src(conf.jsLibs)
        .pipe(concat('bootstrap.js'))
        .pipe(gulp.dest(conf.jsPath));
});

gulp.task('fonts', function () {
    gulp.src(conf.fontsLibs)
        .pipe(gulp.dest(conf.fontsPath));
});
gulp.task('browser-sync', function() {
    browserSync.init(browserSyncWatchFiles, browserSyncOptions);
});
gulp.task('minify', ['fonts'], function () {
    gulp.src(conf.cssSrc)
        .pipe(sourcemaps.init())
        .pipe(cleanCSS({compatibility: 'ie8'}))
        .pipe(concat('style.min.css'))
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest(conf.cssPath));

    gulp.src(conf.jsLibs)
        .pipe(uglify())
        .pipe(sourcemaps.init())
        .pipe(concat('script.min.js'))
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest(conf.jsPath));
});

gulp.task('watch', function () {
    gulp.watch(conf.sassSrc, ['sass']);
});

gulp.task('default', ['clean', 'fonts', 'sass', 'script']);