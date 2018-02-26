/* global require */
var gulp = require('gulp');
var browserSync = require('browser-sync').create();
var sass = require('gulp-sass');
var notify = require("gulp-notify");
var plumber = require("gulp-plumber");
var autoprefixer = require('gulp-autoprefixer');
var concat = require('gulp-concat');
var $ = require('gulp-load-plugins')();
var csscomb = require('gulp-csscomb');
var csso = require('gulp-csso');

/* Change your directory and settings here */
var settings = {
    // publicDir: './',
    // sassDir: './src/scss',
    // layoutDir: 'src',
    // partialsDir: 'src/includes',
    // dataDir: '/src/data',
    // cssDir: './',
    // /* change to disable system notification */
    // systemNotify: true,
    proxy: 'http://livegray.site/'
}
gulp.task('scripts', function () {
    return gulp.src('./src/js/*.js')
        .pipe(concat('all.js'))
        .pipe(gulp.dest('./js/'))
        .pipe(browserSync.stream());
});

/**
 * serve task, will launch browserSync and launch index.html files,
 * and watch the changes for jade and sass files.
 **/
gulp.task('serve', ['sass'], function () {
    /**
     * Launch BrowserSync from publicDir
     */
    browserSync.init({
        proxy: settings.proxy,
        notify: false
    });

    /**
     * watch for changes in sass files
     */
    gulp.watch("./src/scss/**/*.scss", ['sass','scripts']);
    gulp.watch(["./src/js/*.js"], ['scripts']);
});

/**
 * sass task, will compile the .SCSS files,
 * and handle the error through plumber and notify through system message.
 */
gulp.task('sass', function () {
    return gulp.src('./src/scss/**/**/**/*.scss')
        .pipe(plumber({
            errorHandler: settings.systemNotify ? notify.onError("Error: <%= error.messageOriginal %>") : function (err) {
                console.log(" ************** \n " + err.messageOriginal + "\n ************** ");
                this.emit('end');
            }
        }))
        .pipe(sass())
        .pipe(autoprefixer({
            browsers: ['last 2 versions', 'ie >= 11'],
            cascade: false
        }))
        .pipe($.csscomb())
        .pipe(csso())
        .pipe(gulp.dest('./'))
        .pipe(browserSync.stream());
});

/**
 * Default task, running just `gulp` will compile the sass,
 * compile the site, launch BrowserSync then watch
 * files for changes
 */
gulp.task('default', ['serve']);


