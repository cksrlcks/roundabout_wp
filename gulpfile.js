var gulp = require("gulp");
var concat = require("gulp-concat");
var order = require("gulp-order");
//js
var babel = require("gulp-babel");
var uglify = require("gulp-uglify");
var minify = require("gulp-minify")
//css
var sass = require("gulp-sass");
var minificss = require("gulp-minify-css");
var autoprefixer = require("gulp-autoprefixer");
var del = require("del");
var imagemin = require("gulp-imagemin");

function gulp_js() {
  return gulp
    .src("front/js/main.js", { sourcemaps: true })
    .pipe(babel())
    .pipe(uglify())
    .pipe(concat("script.js"))
    .pipe(gulp.dest("js/"));
}
function gulp_vendor_js() {
  return gulp
    .src("front/js/vendor/*.js")
    .pipe(minify({
      ext:{
        min:'.js'
      }, 
      noSource: true}))
    .pipe(gulp.dest("js/vendor"));
}
function gulp_scss() {
  return gulp
    .src("front/sass/**/*.scss", { sourcemaps: true })
    .pipe(
      autoprefixer({
        cascade: false,
      })
    )
    .pipe(
      order(["lib/*.scss", "fonts.scss", "reset.scss", "layout.scss", "*.scss"]) //우선순위 적용
    )
    .pipe(sass().on("error", sass.logError))
    .pipe(minificss())
    .pipe(concat("style.css"))
    .pipe(gulp.dest("css/"));
}

function gulp_watch() {
  gulp.watch("front/js/**/*.js", gulp_js);
  gulp.watch("front/sass/", gulp_scss);
}


function clean() {
	return del(["./js", "./css"]);
}

gulp.task("default", gulp.series(clean,gulp.parallel(gulp.series(gulp_js, gulp_scss, gulp_vendor_js), gulp_watch)));
