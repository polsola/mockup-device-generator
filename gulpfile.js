var gulp = require('gulp');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var browserSync = require('browser-sync').create();

// Static Server + watching scss/html files
gulp.task('serve', ['styles'], function() {

    browserSync.init({
        proxy: "merge_image.dev"
    });

    gulp.watch("./assets/scss/**/*.scss", ['styles']);
    gulp.watch("*.php").on('change', browserSync.reload);
});

gulp.task('styles', function() {
    gulp.src('./assets/scss/**/*.scss')
        .pipe(sass())
	    .pipe(autoprefixer({
            browsers: ['last 2 versions'],
            cascade: false
        }))
		.pipe(gulp.dest('assets/css/'))
		.pipe(browserSync.stream());
});

//Watch task
gulp.task('default', ['serve']);