var gulp = require('gulp');

var config = require('../../../gulp-config.json');

var extPath   = './extensions/templates/frontend/base';
var cssPath = extPath + '/css';
var lessPath = extPath + '/less';
var jsPath = extPath + '/js';

// Dependencies
var browserSync = require('browser-sync');
var minifyCSS   = require('gulp-minify-css');
var rename      = require('gulp-rename');
var del         = require('del');
var vinylPaths  = require('vinyl-paths');
var less        = require('gulp-less');
var uglify      = require('gulp-uglify');
var concat      = require('gulp-concat');
var zip         = require('gulp-zip');

// Clean
gulp.task('clean:templates.frontend.base', function() {
	return gulp.src(config.wwwDir + '/templates/base', { read: false })
		.pipe(vinylPaths(del));
});

// Copy
gulp.task('copy:templates.frontend.base',
	[
		'copy:templates.frontend.base:template'
	],
	function() {
});

// Copy template
gulp.task('copy:templates.frontend.base:template', ['clean:templates.frontend.base'], function() {
	return gulp.src([
		extPath + '/**'
	])
	.pipe(gulp.dest(config.wwwDir + '/templates/base'));
});

// Less
gulp.task('less:templates.frontend.base', function () {
	return gulp.src(lessPath + '/style.less')
		.pipe(less())
		.pipe(gulp.dest(cssPath))
		.pipe(gulp.dest(config.wwwDir + '/templates/base/css'))
		.pipe(minifyCSS({keepSpecialComments: '0'}))
		.pipe(rename(function (path) {
				path.basename += '.min';
		}))
		.pipe(gulp.dest(cssPath))
		.pipe(gulp.dest(config.wwwDir + '/templates/base/css'));
});

// Compile scripts
gulp.task('scripts:templates.frontend.base', function () {
	return gulp.src([
			jsPath + '/**/*.js',
			'!' + jsPath + '/**/*.min.js'
		])
		.pipe(gulp.dest(config.wwwDir + '/templates/base/js'))
		.pipe(uglify())
		.pipe(rename(function (path) {
				path.basename += '.min';
		}))
		.pipe(gulp.dest(jsPath))
		.pipe(gulp.dest(config.wwwDir + '/templates/base/js'));
});

// Watch
gulp.task('watch:templates.frontend.base',
	[
		'watch:templates.frontend.base:template',
		'watch:templates.frontend.base:scripts',
		'watch:templates.frontend.base:less'
	],
	function() {
});

// Watch: Template
gulp.task('watch:templates.frontend.base:template', function() {
	gulp.watch([
			extPath + '/**',
			'!' + lessPath,
			'!' + lessPath + '/**',
			'!' + jsPath,
			'!' + jsPath + '/**'
		],
		['copy:templates.frontend.base:template', browserSync.reload]);
});

// Watch: Scripts
gulp.task('watch:templates.frontend.base:scripts',
	function() {
		gulp.watch([
			jsPath + '/**/*.js',
			'!' + jsPath + '/**/*.min.js'
		],
		['scripts:templates.frontend.base', browserSync.reload]);
});

// Watch: Styles
gulp.task('watch:templates.frontend.base:less',
	function() {
		gulp.watch(
			[
				lessPath + '/**'
			],
			['less:templates.frontend.base', browserSync.reload]
		);
});