var gulp = require('gulp');
var sass = require('gulp-sass');
var mincss = require('gulp-minify-css');
var autoprefixer = require('gulp-autoprefixer');

gulp.task('css', function() {
	gulp.src('app/assets/sass/main.scss')
		.pipe(sass({style: 'compressed'}))
		.pipe(mincss())
		.pipe(autoprefixer('last 10 version'))
		.pipe(gulp.dest('public/css'));
});

gulp.task('watch', function() {
	gulp.watch('app/assets/sass/**/*.scss', ['css']);
});

gulp.task('default', ['watch']);
// gulp.task('default', ['css']);