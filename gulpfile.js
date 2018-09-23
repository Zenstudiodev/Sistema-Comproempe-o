/**
 * Created by Carlos on 22/09/2018.
 */
var gulp = require("gulp"),
    watch = require("gulp-watch"),
    plumber = require("gulp-plumber"),
    gulpsass = require("gulp-sass"),
    autoprefixer = require("gulp-autoprefixer"),
    cleanCss = require("gulp-clean-css"),
    sourcemaps = require("gulp-sourcemaps"),
    concat = require("gulp-concat"),
    jshint = require("gulp-jshint"),
    uglify = require("gulp-uglify"),
    imagemin = require("gulp-imagemin"),
    livereload = require("gulp-livereload"),
    notify = require("gulp-notify");

var onError = function(err){
    console.log("Se ha producido un error: ", err.message);
    this.emit("end");
}

gulp.task("sass", function(){
    return gulp.src("./ui/public/scss/style.scss")
        .pipe(plumber({errorHandler:onError}))
        .pipe(sourcemaps.init())
        .pipe(gulpsass())
        .pipe(autoprefixer("last 2 versions"))
        .pipe(gulp.dest("./ui/public/css/"))
        .pipe(cleanCss({keepSpecialComments: 1}))
        .pipe(sourcemaps.write("."))
        .pipe(gulp.dest("./ui/public/css/"))
        .pipe(livereload())
        .pipe(notify({message: "Sass task finalizada"}))
});
gulp.task("watch", function(){
    livereload.listen();
    gulp.watch("./ui/public/scss/**/*.scss", ["sass"])
});
gulp.task("default", ["sass",  "watch"], function(){

});