'use strict';

// pluginy
var gulp            = require('gulp'),
	gutil           = require('gulp-util'),
	autoprefixer    = require('gulp-autoprefixer'),
	connect         = require('gulp-connect'),
	sass         	= require('gulp-sass');

gulp.task('watch', function () {
	gulp.watch([ 'scss/**/*.scss'], ['sass']);
});


// sass
gulp.task('sass', function () {
	return gulp.src('scss/**/*.scss')
		.pipe(sass({
			onError: function (error) {
				gutil.log(gutil.colors.red(error));
				gutil.beep();
			},
			onSuccess: function () {
				gutil.log(gutil.colors.green('Sass styles compiled successfully.'));
			}
		}))
		.pipe(autoprefixer())
		.pipe(gulp.dest('./css'));
});

gulp.task('serve', ['sass', 'watch']);