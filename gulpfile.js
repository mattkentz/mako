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

gulp.task('default', ['build-js', 'build-css', 'watch']);

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
        .pipe(gulp.dest('dist/css'));
});

gulp.task('build-js', function() {
    return gulp.src('src/js/**/*.js')
        .pipe(sourcemaps.init())
        .pipe(concat('bundle.js'))
        //only uglify if gulp is ran with '--type production'
        .pipe(gutil.env.type === 'production' ? uglify() : gutil.noop())
        .pipe(sourcemaps.write())
        .pipe(gulp.dest('dist/js'));
});

gulp.task('eslint', function() {
    return gulp.src('src/js/**/*.js')
        .pipe(eslint());
});

gulp.task('watch', function() {
    gulp.watch('src/js/**/*.js', ['eslint', 'build-js']);
    gulp.watch('src/sass/**/*.scss', ['build-css']);
});