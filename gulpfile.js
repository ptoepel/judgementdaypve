var gulp = require('gulp');
var sass = require('gulp-sass');

gulp.task('sass-styles',function(){
    return gulp.src('scss/styles.scss').pipe(sass()).pipe(gulp.dest('public/css/'));
});

gulp.task('sass-flex',function(){
    return gulp.src('scss/flex.scss').pipe(sass()).pipe(gulp.dest('public/css/'));
});

gulp.task('sass-theme',function(){
    return gulp.src('scss/theme.scss').pipe(sass()).pipe(gulp.dest('public/css/'));
});

gulp.task('sass-config',function(){
    return gulp.src('scss/config.scss').pipe(sass()).pipe(gulp.dest('public/css/'));
});

gulp.task('sass-mobile',function(){
    return gulp.src('scss/mobile.scss').pipe(sass()).pipe(gulp.dest('public/css/'));
});

gulp.task('sass-survivor-theme',function(){
    return gulp.src('scss/survivor-theme.scss').pipe(sass()).pipe(gulp.dest('public/css/'));
});