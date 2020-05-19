const gulp = require('gulp');
const sass = require('gulp-sass');
const plumber = require('gulp-plumber');
const autoprefixer = require('gulp-autoprefixer');
const concat = require('gulp-concat');
const browsersync = require('browser-sync').create();
const uglify = require('gulp-uglify');
const imagemin = require('gulp-imagemin');
const zip = require('gulp-zip');
const config = require('./config.json');

function browserSync(done) {
    browsersync.init({
        proxy: config.dev_ip
    });
    
    done();
}

function reload(done) {
    browsersync.reload();
    done();
}

function css() {
    return gulp
        .src("assets/scss/app.scss")
        .pipe(plumber())
        .pipe(sass({outputStyle: 'compressed'}))
        .pipe(concat('app.css'))
        .pipe(autoprefixer('last 2 versions'))
        .pipe(gulp.dest("app/css/"))
        .pipe(browsersync.stream());
}

function scripts() {
    return gulp
        .src("assets/js/app.js")
        .pipe(plumber())
        .pipe(uglify())
        .pipe(gulp.dest('app/js/'))
        .pipe(browsersync.stream());
}

function images() {
    return gulp
        .src('assets/img/*')
        .pipe(imagemin())
        .pipe(gulp.dest('app/img/'));
}

function package() {
    return gulp
        .src(['app/**/*', '!app/vendor/**/*', '!app/cache/*.php', '!app/**/*.lock'], {dot: true})
        .pipe(zip('site.zip'))
        .pipe(gulp.dest('./'))
}

function watchFiles() {
    gulp.watch("assets/scss/**/*", gulp.series(css, reload));
    gulp.watch("assets/js/**/*", scripts);
    gulp.watch("assets/img/**/*", images);
}

const build = gulp.series(css, scripts, images);
const watch = gulp.parallel(browserSync, watchFiles);

exports.css = css;
exports.scripts = scripts;
exports.images = images;
exports.build = build;
exports.watch = watch;
exports.package = package;
exports.default = build;