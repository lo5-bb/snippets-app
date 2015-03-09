'use strict';

// pluginy
var gulp            = require('gulp'),
	gutil           = require('gulp-util'),
	autoprefixer    = require('gulp-autoprefixer'),
	connect         = require('gulp-connect'),
	sass         	= require('gulp-sass');

gulp.task('connect', function () {
	connect.server({
		root: ['.'],
		port: 1234,
		livereload: true
	});
});

gulp.task('watch', function () {
	gulp.watch([ 'src/styles/**/*.scss'], ['sass']);
});

// sass
gulp.task('sass', function () {
	return gulp.src('./styles/**/*.scss')
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
		.pipe(gulp.dest('./styles'))
		.pipe(connect.reload());
});

gulp.task('serve', ['connect', 'sass', 'watch']);