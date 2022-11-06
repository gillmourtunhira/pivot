const { parallel } = require('gulp');
const { src, dest } = require('gulp');
const babel = require('gulp-babel');
const { watch, gulp } = require('gulp');
const uglify = require( 'gulp-uglify' );
const rename = require( 'gulp-rename' );
const sass = require('gulp-sass')(require('sass'));

function css_watch(cb){
	return src( 'assets/css/*.scss' )
	.pipe(sass())
	.pipe(dest( 'dist/css/' ));
	cb();
}

function js_watch(cb){
	return src('assets/js/*.js')
	.pipe(babel())
	.pipe(uglify())
	.pipe(rename({ extname: '.min.js' }))
	.pipe(dest('dist/js/'));
	cb();
}

function watchTasks(){
	watch( [ 'assets/css/*.scss', 'assets/js/*.js' ], parallel(css_watch,js_watch) );
}

exports.default = watchTasks