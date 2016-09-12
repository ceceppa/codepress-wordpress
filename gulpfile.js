/* eslint-disable */
'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass');
var pump = require('pump');
var concat = require('gulp-concat');
const babel = require('gulp-babel');
var minify = require('gulp-minify');

gulp.task('sass', function () {
  gulp.src('./assets/sass/**/style.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(gulp.dest('assets/css/'));
});

gulp.task('babel', () => {
    return gulp.src('assets/js/src/*.js')
        .pipe(babel({
            presets: ['es2015']
        }))
        .pipe(minify({
            ext:{
                min:'.min.js'
            }
        }))
        .pipe(gulp.dest('assets/js/min'));
});

gulp.task('build', ['sass', 'babel'], function() {
  return gulp.src('assets/js/min/*.min.js')
    .pipe(concat('bundle.min.js'))
    .pipe(gulp.dest('assets/js'));
});

gulp.task('watch', function() {
  gulp.watch('./assets/sass/**/*.scss', ['sass']);
  gulp.watch('./assets/js/src/*.js', ['build']);
})
