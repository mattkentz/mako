var gulp  = require('gulp');
var gutil = require('gulp-util');
var sass = require('gulp-sass');
var sourcemaps = require('gulp-sourcemaps');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var eslint = require('gulp-eslint');
var postcss = require('gulp-postcss');
var autoprefixer = require('autoprefixer');
var cssnano = require('cssnano');
var rename = require("gulp-rename");
var replace = require("gulp-replace");
var del = require('del');
var sequence = require('run-sequence');

var timestamp;

gulp.task('default', ['watch']);

gulp.task('build-css', function () {
    var processors = [
        autoprefixer(),
    ];

    gutil.env.type === 'production' ? processors.push(cssnano()) : gutil.noop();

    return gulp.src('src/sass/**/*.scss')
        .pipe(sourcemaps.init())
        .pipe(sass())
        .pipe(postcss(processors))
        .pipe(sourcemaps.write('.'))
        .pipe(rename(function (path) {
            path.basename += "-" + timestamp;
        }))
        .pipe(gulp.dest('dist/css'));
});

gulp.task('build-js', function() {
    return gulp.src('src/js/**/*.js')
        .pipe(sourcemaps.init())
        .pipe(concat('bundle.js'))
        //only uglify if gulp is ran with '--type production'
        .pipe(gutil.env.type === 'production' ? uglify() : gutil.noop())
        .pipe(sourcemaps.write())
        .pipe(rename(function (path) {
            path.basename += "-" + timestamp;
        }))
        .pipe(gulp.dest('dist/js'));
});

gulp.task('eslint', function() {
    return gulp.src('src/js/**/*.js')
        .pipe(eslint());
});

gulp.task('build-html', function () {
    return gulp.src('./templates/**/*.template.php')
        .pipe(rename(function (path) {
            path.basename = path.basename.replace('.template', '');
        }))
        .pipe(replace('<TIMESTAMP>', '-' + timestamp))
        .pipe(gulp.dest('.'));
});

gulp.task('delete', function () {
    return del([
        'dist/'
    ]);
});

gulp.task('gen-time', function() {
    timestamp = new Date().getTime();
});

gulp.task('watch', function() {
    gulp.watch('src/js/**/*.js', function () {
        sequence('eslint', ['delete', 'gen-time'], ['build-js', 'build-css', 'build-html']);
    });
    gulp.watch('src/sass/**/*.scss', function () {
        sequence(['delete', 'gen-time'], ['build-js', 'build-css', 'build-html']);
    });
    gulp.watch('templates/**/*.template.php', function () {
        sequence(['delete', 'gen-time'], ['build-js', 'build-css', 'build-html']);
    });
});