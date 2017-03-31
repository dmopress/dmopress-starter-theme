// Load plugins
var pkg = require('./package.json'),
    secrets = require('./secrets.json'),
    gulp = require('gulp'),
    cache = require('gulp-cache'),
    changed = require('gulp-changed'),
    cleancss = require('gulp-clean-css'),
    concat = require('gulp-concat'),
    del = require('del'),
    ftp = require('vinyl-ftp'),
    gutil = require('gulp-util'),
    notify = require('gulp-notify'),
    rename = require('gulp-rename'),
    sass = require('gulp-sass'),
    sourcemaps = require('gulp-sourcemaps'),
    uglify = require('gulp-uglify');

// Main Task
gulp.task('default', function() {
    gulp.watch(['package.json', 'src/**/*.html', 'src/**/*.php', 'src/**/style.css', 'src/**/*.png', 'src/**/*.md', 'src/**/*.txt', 'src/**/*.json', 'src/LICENSE'], ['source']);
    gulp.watch(['package.json', 'src/scss/dmopress-starter-theme.scss'], ['stylesheets']);
    gulp.watch(['package.json', 'src/**/*.js'], ['js']);
});

gulp.task('source', function() {
    gulp.src(['src/**/*.html', 'src/**/*.php', 'src/**/style.css', 'src/**/*.png', 'src/**/*.md', 'src/**/*.txt', 'src/**/*.json'])
        .pipe(changed(secrets.localPath))
        .pipe(gulp.dest(secrets.localPath));
});

gulp.task('stylesheets', function() {
    var filesToProcess = pkg.themeDependencies.stylesheets;
    gulp.src(filesToProcess)
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest(secrets.localPath + '/css'));
});

gulp.task('js', function() {
    var js = pkg.themeDependencies.javascript;
    js.push('./src/js/dmopress-starter-theme.js');
    gulp.src(js)
        .pipe(gulp.dest(secrets.localPath + '/js'));
});

gulp.task('build', function() {
    gulp.src(['src/**/*.html', 'src/**/*.php', 'src/**/style.css', 'src/**/*.png', 'src/**/*.md', 'src/**/*.txt', 'src/**/*.json', 'src/LICENSE'])
    .pipe(gulp.dest('build/dmopress-starter-theme'));
    
    var stylesheets = pkg.themeDependencies.stylesheets;
    gulp.src(stylesheets)
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('build/dmopress-starter-theme/css'));
    
    var js = pkg.themeDependencies.javascript;
    js.push('./src/js/dmopress-starter-theme.js');
    gulp.src(js)
        .pipe(gulp.dest('build/dmopress-starter-theme/js'));
});