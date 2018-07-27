var gulp = require("gulp");
var sass = require("gulp-sass");
var autoprefixer = require("gulp-autoprefixer");
var plumber = require('gulp-plumber');
var cleanCSS = require('gulp-clean-css');
var uglify = require('gulp-uglify');
var browserSync = require("browser-sync").create();

var paths = {
  dirs: {
    static: './static/'
  },
  php: '*.php',
  js: "./assets/scripts/**/*.js",
  sass: './assets/styles/**/*.scss',
}

// Styles
gulp.task("styles", function (done) {
  gulp
    .src(paths.sass)
    .pipe(sass())
    .pipe(
      autoprefixer({
        browsers: ["last 2 versions"],
        cascade: false
      })
    )
    .pipe(cleanCSS())
    .pipe(gulp.dest(paths.static + "styles"))
    .pipe(browserSync.stream());
  done();
});

// Concat & uglify scripts
gulp.task('scripts', function (done) {
  gulp
    .src(paths.js)
    .pipe(plumber())
    .pipe(uglify())
    .pipe(gulp.dest(paths.static + "scripts"))
    .pipe(browserSync.stream());
  done();
});

// Static Server + watching scss/html files
gulp.task("serve", function () {
  browserSync.init({
    proxy: "http://php-device-image-generator.localhost/"
  });

  gulp.watch(paths.sass, gulp.series("styles"));
  gulp.watch(paths.js, gulp.series("scripts"));
  gulp.watch(paths.php).on("change", browserSync.reload);
});

//Watch task
gulp.task("default", gulp.series("styles", "scripts", "serve"));
